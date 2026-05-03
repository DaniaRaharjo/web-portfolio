<?php

namespace App\Http\Controllers;

use App\Models\Projects;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Projects::latest()->get();
        return view('projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('manage', Projects::class);
        return view('projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('manage', Projects::class);

        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'github_url' => 'required|url',
            'live_url' => 'nullable|url',
        ]);

        $validated['slug'] = Str::slig($request->title);

        Projects::create($validated);

        return redirect()->route('projects.index')->with('success', 'Project added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Projects $projects)
    {
        return view('projects.show', compact('projects'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Projects $projects)
    {
        $this->authorize('update', $projects);
        return view('projects.edit', compact('projects'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Projects $projects)
    {
        $this->authorize('update', $projects);

        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'github_url' => 'required|url',
        ]);

        $projects->update($validated);

        return redirect()->route('projects.show', $projects)->with('success', 'Updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Projects $projects)
    {
        //
    }
}
