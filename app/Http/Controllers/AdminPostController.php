<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class AdminPostController extends Controller
{
    public function index()
    {
        $filters = request()->only(['search', 'category', 'status', 'featured']);

        $posts = Post::query()
            ->when(filled($filters['search'] ?? null), function ($query) use ($filters) {
                $search = trim($filters['search']);

                $query->where(function ($innerQuery) use ($search) {
                    $innerQuery->where('title', 'like', "%{$search}%")
                        ->orWhere('title_en', 'like', "%{$search}%")
                        ->orWhere('slug', 'like', "%{$search}%")
                        ->orWhere('slug_en', 'like', "%{$search}%");
                });
            })
            ->when(filled($filters['category'] ?? null), fn ($query) => $query->where('category', $filters['category']))
            ->when(($filters['status'] ?? null) === 'published', fn ($query) => $query->where('is_published', true))
            ->when(($filters['status'] ?? null) === 'draft', fn ($query) => $query->where('is_published', false))
            ->when(($filters['featured'] ?? null) === 'featured', fn ($query) => $query->where('is_featured', true))
            ->when(($filters['featured'] ?? null) === 'not_featured', fn ($query) => $query->where('is_featured', false))
            ->orderByDesc('is_featured')
            ->orderBy('created_at', 'desc')
            ->get();

        $featuredCount = Post::where('is_featured', true)->count();

        return view('admin.prensa.index', compact('posts', 'filters', 'featuredCount'));
    }

    public function create()
    {
        return view('admin.prensa.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'title_en' => 'nullable|string|max:255',
            'category' => 'required|string|in:maritimo,construccion,infraestructura,ferroviario',
            'content' => 'required|string',
            'content_en' => 'nullable|string',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:3072',
        ]);

        $slug = $this->uniqueSlug($request->title, 'slug');
        $slugEn = filled($request->title_en) ? $this->uniqueSlug($request->title_en, 'slug_en') : null;

        $thumbnailPath = null;
        if ($request->hasFile('thumbnail')) {
            $thumbnailPath = $request->file('thumbnail')->store('prensa', 'public');
        }

        Post::create([
            'title' => $request->title,
            'title_en' => $request->title_en,
            'slug' => $slug,
            'slug_en' => $slugEn,
            'category' => $request->category,
            'content' => $request->content,
            'content_en' => $request->content_en,
            'thumbnail' => $thumbnailPath,
            'is_published' => $request->has('is_published'),
        ]);

        return redirect()->route('admin.prensa.index')->with('success', '¡Artículo creado exitosamente!');
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('admin.prensa.edit', compact('post'));
    }

    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'title_en' => 'nullable|string|max:255',
            'category' => 'required|string|in:maritimo,construccion,infraestructura,ferroviario',
            'content' => 'required|string',
            'content_en' => 'nullable|string',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:3072',
        ]);

        // Si el título cambió, recalcular slug
        if ($post->title !== $request->title) {
            $post->slug = $this->uniqueSlug($request->title, 'slug', $post->id);
        }

        if ($post->title_en !== $request->title_en) {
            $post->slug_en = filled($request->title_en)
                ? $this->uniqueSlug($request->title_en, 'slug_en', $post->id)
                : null;
        }

        if ($request->hasFile('thumbnail')) {
            // Eliminar imagen anterior si existe
            if ($post->thumbnail) {
                Storage::disk('public')->delete($post->thumbnail);
            }
            $post->thumbnail = $request->file('thumbnail')->store('prensa', 'public');
        }

        $post->title = $request->title;
        $post->title_en = $request->title_en;
        $post->category = $request->category;
        $post->content = $request->content;
        $post->content_en = $request->content_en;
        $post->is_published = $request->has('is_published');
        
        $post->save();

        return redirect()->route('admin.prensa.index')->with('success', '¡Artículo actualizado exitosamente!');
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);

        // Eliminar miniatura
        if ($post->thumbnail) {
            Storage::disk('public')->delete($post->thumbnail);
        }

        $post->delete();

        return redirect()->route('admin.prensa.index')->with('success', '¡Artículo eliminado exitosamente!');
    }

    public function togglePublish($id)
    {
        $post = Post::findOrFail($id);
        $post->is_published = !$post->is_published;

        if (! $post->is_published) {
            $post->is_featured = false;
        }

        $post->save();

        $status = $post->is_published ? 'publicado' : 'guardado como borrador';
        return redirect()->route('admin.prensa.index')->with('success', "El artículo ahora está {$status}.");
    }

    public function toggleFeatured($id)
    {
        $post = Post::findOrFail($id);

        if (! $post->is_published) {
            return redirect()->route('admin.prensa.index')->with('success', 'Solo puedes destacar artículos publicados.');
        }

        if (! $post->is_featured && Post::where('is_featured', true)->count() >= 3) {
            return redirect()->route('admin.prensa.index')->with('success', 'Solo puedes tener 3 artículos destacados al mismo tiempo.');
        }

        $post->is_featured = ! $post->is_featured;
        $post->save();

        $status = $post->is_featured ? 'destacado en Pensamiento Estratégico' : 'retirado de Pensamiento Estratégico';
        return redirect()->route('admin.prensa.index')->with('success', "El artículo fue {$status}.");
    }

    public function uploadBlockImage(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('prensa/blocks', 'public');
            return response()->json([
                'success' => true,
                'url' => asset('storage/' . $path)
            ]);
        }

        return response()->json(['success' => false, 'message' => 'No se pudo subir la imagen.'], 400);
    }

    private function uniqueSlug(string $title, string $column, ?int $ignoreId = null): string
    {
        $baseSlug = Str::slug($title);
        $slug = $baseSlug;
        $counter = 2;

        while (Post::where($column, $slug)
            ->when($ignoreId, fn ($query) => $query->where('id', '!=', $ignoreId))
            ->exists()) {
            $slug = $baseSlug . '-' . $counter;
            $counter++;
        }

        return $slug;
    }
}
