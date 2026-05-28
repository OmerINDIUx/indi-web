<?php

namespace App\Http\Controllers;

use App\Models\Project;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::orderBy('category')
            ->orderBy('id')
            ->get()
            ->map(function (Project $project) {
                return [
                    'id' => $project->id,
                    'title' => $project->localized_title,
                    'category' => $project->category,
                    'status' => $project->status ? 1 : 0,
                    'marker_image' => $project->marker_image ? 'storage/' . $project->marker_image : null,
                    'address' => $project->localized_address,
                    'latitude' => (string) $project->latitude,
                    'longitude' => (string) $project->longitude,
                    'description' => $project->localized_description,
                ];
            })
            ->all();

        return view('proyectos', compact('projects'));
    }
}
