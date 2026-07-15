<?php

namespace App\Http\Controllers;

use App\Models\BerandaBackend;
use App\Models\Project;
use Illuminate\Http\Request;

class BerandaBackendController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $totalProjects = Project::count();
        $projectsWithGithub = Project::whereNotNull('github_link')->where('github_link', '!=', '')->count();
        return view('admin.v_beranda.index', compact('totalProjects', 'projectsWithGithub'));
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
    public function show(BerandaBackend $berandaBackend)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BerandaBackend $berandaBackend)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BerandaBackend $berandaBackend)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BerandaBackend $berandaBackend)
    {
        //
    }
}
