<?php

namespace App\Http\Controllers;

use App\Models\ProjectFrontend;
use Illuminate\Http\Request;
use App\Models\Project;

class ProjectFrontendController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::get();
        return view('project', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ProjectFrontend $projectFrontend)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProjectFrontend $projectFrontend)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProjectFrontend $projectFrontend)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProjectFrontend $projectFrontend)
    {
        //
    }
}
