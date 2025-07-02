<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::latest()->get();
        return view('admin.v_project.index', compact('projects'));
    }

    public function create()
    {
        // Kalau modal, biasanya form di-load via AJAX partial
        return view('admin.v_project._form', [
            'project' => new Project()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'tgl_upload' => 'nullable|date',
            'screenshot' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'github_link' => 'nullable|url'
        ]);

        $data = $request->only(['title', 'description', 'github_link', 'tgl_upload']);

        if ($request->hasFile('screenshot')) {
            $file = $request->file('screenshot');
            $path = $file->store('uploads/screenshots', 'public');
            $data['screenshot'] = 'storage/' . $path;
        }

        $project = Project::create($data);

        if ($request->ajax()) {
            return response()->json([
                'message' => 'Project berhasil ditambahkan!',
                'project' => $project
            ]);
        }

        return redirect()->route('admin.project')->with('success', 'Project berhasil ditambahkan!');
    }

    public function show(Project $project)
    {
        return view('admin.v_project.show', compact('project'));
    }

    public function edit(Project $project)
    {
        return view('admin.v_project._form', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'tgl_upload' => 'nullable|date',
            'screenshot' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'github_link' => 'nullable|url'
        ]);

        $data = $request->only(['title', 'description', 'github_link', 'tgl_upload']);

        if ($request->hasFile('screenshot')) {
            $file = $request->file('screenshot');
            $path = $file->store('uploads/screenshots', 'public');
            $data['screenshot'] = 'storage/' . $path;
        }

        $project->update($data);

        if ($request->ajax()) {
            return response()->json([
                'message' => 'Project berhasil diperbarui!',
                'project' => $project
            ]);
        }

        return redirect()->route('admin.project')->with('success', 'Project berhasil diperbarui!');
    }

    public function destroy(Project $project)
    {
        $project->delete();

        if (request()->ajax()) {
            return response()->json([
                'message' => 'Project berhasil dihapus!'
            ]);
        }

        return redirect()->route('admin.project')->with('success', 'Project berhasil dihapus!');
    }
}
