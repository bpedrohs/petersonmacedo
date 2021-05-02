<?php

namespace App\Http\Controllers\Template;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Category;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * The user repository instance.
     */
    protected $project;

    /**
     * Create a new controller instance.
     *
     * @param  Project  $project
     * @return void
     */
    public function __construct(Project $project)
    {
        $this->project = $project;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = $this->project->all();
        $categories = Category::all();

        return view('template.project.index', compact('projects', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PostProject  $postProject
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return view('template.project.project', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PostProject  $postProject
     * @return \Illuminate\Http\Response
     */
    public function edit(PostProject $postProject)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PostProject  $postProject
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PostProject $postProject)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PostProject  $postProject
     * @return \Illuminate\Http\Response
     */
    public function destroy(PostProject $postProject)
    {
        //
    }
}
