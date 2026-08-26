<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AdminProjectController extends Controller
{
    public function index(Request $request)
    {
        $filters = $request->validate([
            'search' => 'nullable|string|max:255',
            'category' => 'nullable|integer|in:1,2,3,4',
            'status' => 'nullable|in:completed,process',
            'home' => 'nullable|in:featured,not_featured',
        ]);

        $projectsQuery = Project::query()
            ->when($filters['category'] ?? null, fn ($query, int $category) => $query->where('category', $category))
            ->when($filters['status'] ?? null, fn ($query, string $status) => $query->where('status', $status === 'completed'))
            ->when(($filters['home'] ?? null) === 'featured', fn ($query) => $query->whereNotNull('home_order'))
            ->when(($filters['home'] ?? null) === 'not_featured', fn ($query) => $query->whereNull('home_order'))
            ->orderByRaw('CASE WHEN home_order IS NULL THEN 1 ELSE 0 END')
            ->orderBy('home_order')
            ->latest();

        $projects = $filters['search'] ?? null
            ? $this->searchProjects($projectsQuery->get(), $filters['search'], $request)
            : $projectsQuery->paginate(12)->withQueryString();

        $homeProjectsCount = Project::whereNotNull('home_order')->count();

        return view('admin.proyectos.index', compact('projects', 'filters', 'homeProjectsCount'));
    }

    public function create()
    {
        return view('admin.proyectos.create');
    }

    public function store(Request $request)
    {
        $data = $this->validatedData($request);

        if ($request->hasFile('marker_image')) {
            $data['marker_image'] = $request->file('marker_image')->store('projects', 'public');
        }

        $data['status'] = $request->boolean('status');
        $this->syncHomeOrder($data);

        Project::create($data);

        return redirect()->route('admin.proyectos.index')->with('success', 'Proyecto creado exitosamente.');
    }

    public function edit(Project $proyecto)
    {
        return view('admin.proyectos.edit', ['project' => $proyecto]);
    }

    public function update(Request $request, Project $proyecto)
    {
        $data = $this->validatedData($request, false);

        if ($request->hasFile('marker_image')) {
            if ($proyecto->marker_image) {
                Storage::disk('public')->delete($proyecto->marker_image);
            }

            $data['marker_image'] = $request->file('marker_image')->store('projects', 'public');
        }

        $data['status'] = $request->boolean('status');
        $this->syncHomeOrder($data, $proyecto);

        $proyecto->update($data);

        return redirect()->route('admin.proyectos.index')->with('success', 'Proyecto actualizado exitosamente.');
    }

    public function destroy(Project $proyecto)
    {
        if ($proyecto->marker_image) {
            Storage::disk('public')->delete($proyecto->marker_image);
        }

        $proyecto->delete();

        return redirect()->route('admin.proyectos.index')->with('success', 'Proyecto eliminado exitosamente.');
    }

    public function toggleHome(Project $proyecto)
    {
        if ($proyecto->home_order) {
            $proyecto->update(['home_order' => null]);

            return redirect()->route('admin.proyectos.index')
                ->with('success', 'El proyecto fue retirado de la portada.');
        }

        $availablePosition = collect(range(1, 5))
            ->first(fn (int $position) => ! Project::where('home_order', $position)->exists());

        if (! $availablePosition) {
            return redirect()->route('admin.proyectos.index')
                ->with('success', 'Ya tienes 5 proyectos activos en portada. Libera uno para agregar otro.');
        }

        $proyecto->update(['home_order' => $availablePosition]);

        return redirect()->route('admin.proyectos.index')
            ->with('success', "El proyecto ahora aparece en portada en la posición {$availablePosition}.");
    }

    private function validatedData(Request $request, bool $imageRequired = true): array
    {
        return $request->validate([
            'title' => 'required|string|max:255',
            'title_en' => 'nullable|string|max:255',
            'address' => 'required|string|max:255',
            'address_en' => 'nullable|string|max:255',
            'category' => 'required|integer|in:1,2,3,4',
            'status' => 'nullable|boolean',
            'home_order' => 'nullable|integer|in:1,2,3,4,5',
            'home_year' => 'nullable|string|max:20',
            'home_time' => 'nullable|string|max:60',
            'home_time_en' => 'nullable|string|max:60',
            'description' => 'nullable|string|max:3000',
            'description_en' => 'nullable|string|max:3000',
            'latitude' => 'required|numeric|between:-90,90',
            'longitude' => 'required|numeric|between:-180,180',
            'marker_image' => ($imageRequired ? 'required' : 'nullable') . '|image|mimes:jpeg,png,jpg,gif,webp|max:20480|dimensions:ratio=16/9',
        ], [
            'marker_image.dimensions' => 'La imagen debe tener una proporción exacta de 16:9. Usa el recortador antes de guardarla.',
        ]);
    }

    private function searchProjects(Collection $projects, string $search, Request $request): LengthAwarePaginator
    {
        $needle = $this->normalizeSearchText($search);
        $filtered = $projects->filter(function (Project $project) use ($needle) {
            $haystack = $this->normalizeSearchText(implode(' ', [
                $project->title,
                $project->title_en,
                $project->address,
                $project->address_en,
                $project->description,
                $project->description_en,
            ]));

            return str_contains($haystack, $needle);
        })->values();

        $page = LengthAwarePaginator::resolveCurrentPage();
        $perPage = 12;

        return (new LengthAwarePaginator(
            $filtered->forPage($page, $perPage),
            $filtered->count(),
            $perPage,
            $page,
            [
                'path' => $request->url(),
                'query' => $request->query(),
            ]
        ));
    }

    private function normalizeSearchText(?string $text): string
    {
        return Str::of($text ?? '')
            ->ascii()
            ->lower()
            ->squish()
            ->toString();
    }

    private function syncHomeOrder(array &$data, ?Project $project = null): void
    {
        if (blank($data['home_order'] ?? null)) {
            $data['home_order'] = null;
            $data['home_year'] = null;
            $data['home_time_en'] = blank($data['home_time_en'] ?? null) ? null : $data['home_time_en'];
            $data['home_time'] = blank($data['home_time'] ?? null) ? null : $data['home_time'];
            if (blank($data['home_time'] ?? null)) {
                $data['home_time_en'] = null;
            }
            if (blank($data['home_year'] ?? null)) {
                $data['home_year'] = null;
            }
            return;
        }

        Project::where('home_order', $data['home_order'])
            ->when($project, fn ($query) => $query->whereKeyNot($project->getKey()))
            ->update(['home_order' => null]);

        $data['home_year'] = blank($data['home_year'] ?? null) ? null : $data['home_year'];
        $data['home_time'] = blank($data['home_time'] ?? null) ? null : $data['home_time'];
        $data['home_time_en'] = blank($data['home_time_en'] ?? null) ? null : $data['home_time_en'];
    }
}
