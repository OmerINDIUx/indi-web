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
        $posts = Post::orderBy('created_at', 'desc')->get();
        return view('admin.prensa.index', compact('posts'));
    }

    public function create()
    {
        return view('admin.prensa.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|in:maritimo,construccion,infraestructura,ferroviario',
            'content' => 'required|string',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:3072',
        ]);

        $slug = Str::slug($request->title);
        
        // Evitar duplicados de slugs
        $count = Post::where('slug', 'like', $slug . '%')->count();
        if ($count > 0) {
            $slug = $slug . '-' . ($count + 1);
        }

        $thumbnailPath = null;
        if ($request->hasFile('thumbnail')) {
            $thumbnailPath = $request->file('thumbnail')->store('prensa', 'public');
        }

        Post::create([
            'title' => $request->title,
            'slug' => $slug,
            'category' => $request->category,
            'content' => $request->content,
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
            'category' => 'required|string|in:maritimo,construccion,infraestructura,ferroviario',
            'content' => 'required|string',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:3072',
        ]);

        // Si el título cambió, recalcular slug
        if ($post->title !== $request->title) {
            $slug = Str::slug($request->title);
            $count = Post::where('slug', 'like', $slug . '%')->where('id', '!=', $id)->count();
            if ($count > 0) {
                $slug = $slug . '-' . ($count + 1);
            }
            $post->slug = $slug;
        }

        if ($request->hasFile('thumbnail')) {
            // Eliminar imagen anterior si existe
            if ($post->thumbnail) {
                Storage::disk('public')->delete($post->thumbnail);
            }
            $post->thumbnail = $request->file('thumbnail')->store('prensa', 'public');
        }

        $post->title = $request->title;
        $post->category = $request->category;
        $post->content = $request->content;
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
        $post->save();

        $status = $post->is_published ? 'publicado' : 'guardado como borrador';
        return redirect()->route('admin.prensa.index')->with('success', "El artículo ahora está {$status}.");
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
}
