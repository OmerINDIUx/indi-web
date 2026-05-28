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
        ]);

        $projectsQuery = Project::query()
            ->when($filters['category'] ?? null, fn ($query, int $category) => $query->where('category', $category))
            ->when($filters['status'] ?? null, fn ($query, string $status) => $query->where('status', $status === 'completed'))
            ->latest();

        $projects = $filters['search'] ?? null
            ? $this->searchProjects($projectsQuery->get(), $filters['search'], $request)
            : $projectsQuery->paginate(12)->withQueryString();

        return view('admin.proyectos.index', compact('projects', 'filters'));
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

    private function validatedData(Request $request, bool $imageRequired = true): array
    {
        return $request->validate([
            'title' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'category' => 'required|integer|in:1,2,3,4',
            'status' => 'nullable|boolean',
            'description' => 'nullable|string|max:3000',
            'latitude' => 'required|numeric|between:-90,90',
            'longitude' => 'required|numeric|between:-180,180',
            'marker_image' => ($imageRequired ? 'required' : 'nullable') . '|image|mimes:jpeg,png,jpg,gif,webp|max:20480',
        ]);
    }

    private function searchProjects(Collection $projects, string $search, Request $request): LengthAwarePaginator
    {
        $needle = $this->normalizeSearchText($search);
        $filtered = $projects->filter(function (Project $project) use ($needle) {
            $haystack = $this->normalizeSearchText(implode(' ', [
                $project->title,
                $project->address,
                $project->description,
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
}
