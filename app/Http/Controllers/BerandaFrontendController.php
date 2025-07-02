<?php

namespace App\Http\Controllers;

use App\Models\BerandaFrontend;
use Illuminate\Http\Request;
use App\Models\Project;

class BerandaFrontendController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $latestProject = Project::orderBy('tgl_upload', 'desc')->first();
        return view('index', compact('latestProject'));
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
    public function show(BerandaFrontend $berandaFrontend)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BerandaFrontend $berandaFrontend)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BerandaFrontend $berandaFrontend)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BerandaFrontend $berandaFrontend)
    {
        //
    }
}
