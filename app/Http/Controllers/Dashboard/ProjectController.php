<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::orderBy('order')->get();
        return view('dashboard.projects.index', compact('projects'));
    }

    public function create()
    {
        return view('dashboard.projects.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'client_name' => 'required|string|max:255',
            'image' => 'nullable|image|max:2048',
            'category' => 'nullable|string|max:255',
            'completion_date' => 'nullable|date',
            'order' => 'nullable|integer',
            'is_featured' => 'boolean',
            'is_active' => 'boolean',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('projects', 'public');
        }

        Project::create($validated);

        return redirect()->route('dashboard.projects.index')
            ->with('success', 'Project created successfully.');
    }

    public function edit(Project $project)
    {
        return view('dashboard.projects.edit', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'client_name' => 'required|string|max:255',
            'image' => 'nullable|image|max:2048',
            'category' => 'nullable|string|max:255',
            'completion_date' => 'nullable|date',
            'order' => 'nullable|integer',
            'is_featured' => 'boolean',
            'is_active' => 'boolean',
        ]);

        if ($request->hasFile('image')) {
            if ($project->image) {
                Storage::disk('public')->delete($project->image);
            }
            $validated['image'] = $request->file('image')->store('projects', 'public');
        }

        $project->update($validated);

        return redirect()->route('dashboard.projects.index')
            ->with('success', 'Project updated successfully.');
    }

    public function destroy(Project $project)
    {
        if ($project->image) {
            Storage::disk('public')->delete($project->image);
        }

        $project->delete();

        return redirect()->route('dashboard.projects.index')
            ->with('success', 'Project deleted successfully.');
    }

    public function toggleActive(Project $project)
    {
        $project->update(['is_active' => !$project->is_active]);

        return back()->with('success', 'Project status updated.');
    }

    public function toggleFeatured(Project $project)
    {
        $project->update(['is_featured' => !$project->is_featured]);

        return back()->with('success', 'Project featured status updated.');
    }
}
