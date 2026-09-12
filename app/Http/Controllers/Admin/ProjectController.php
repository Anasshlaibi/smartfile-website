<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::orderBy('order')->latest()->get();
        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        return view('admin.projects.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'client_name' => 'nullable|string|max:255',
            'category' => 'required|string|max:100',
            'video_url' => 'nullable|string',
            'thumbnail' => 'nullable|string',
            'description' => 'nullable|string',
            'duration' => 'nullable|string|max:20',
            'year' => 'nullable|string|max:10',
            'metrics' => 'nullable|string|max:255',
        ]);

        $project = new Project();
        $project->title = $request->title;
        $project->slug = $request->slug ? Str::slug($request->slug) : Str::slug($request->title);
        $project->client_name = $request->client_name;
        $project->category = $request->category;
        $project->video_url = $request->video_url;
        $project->thumbnail = $request->thumbnail;
        $project->description = $request->description;
        $project->duration = $request->duration;
        $project->year = $request->year;
        $project->metrics = $request->metrics;
        $project->is_featured = $request->has('is_featured');
        $project->order = $request->order ?? 0;
        $project->save();

        return redirect()->route('admin.projects.index')->with('success', 'Projet ajouté avec succès au portfolio.');
    }

    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:100',
        ]);

        $project->title = $request->title;
        $project->slug = $request->slug ? Str::slug($request->slug) : Str::slug($request->title);
        $project->client_name = $request->client_name;
        $project->category = $request->category;
        $project->video_url = $request->video_url;
        $project->thumbnail = $request->thumbnail;
        $project->description = $request->description;
        $project->duration = $request->duration;
        $project->year = $request->year;
        $project->metrics = $request->metrics;
        $project->is_featured = $request->has('is_featured');
        $project->order = $request->order ?? 0;
        $project->save();

        return redirect()->route('admin.projects.index')->with('success', 'Projet mis à jour avec succès.');
    }

    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('admin.projects.index')->with('success', 'Projet supprimé.');
    }
}
