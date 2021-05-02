<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Category;
use App\Models\Project;
use Illuminate\Support\Facades\Storage;
use Illuminate\Pagination\Paginator;
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
        Paginator::useBootstrap();

        $projects =  $this->project->paginate(10);
        
        return view('dashboard.project.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all(['id', 'name']);

        return view('dashboard.project.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        
        $project = $this->project->create($data);

        $project->categories()->sync($data['categories']);

        if ($request->hasFile('photos')) {
            $images = $this->imageUpload($request, 'photo');

            // inserção dessas imagens/referências na base
            $project->photos()->createMany($images);
        }

        flash('Projeto adicionado com sucesso!')->success();
        return redirect()->route('admin.project.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($project)
    {
        $project = $this->project->findOrFail($project);
        $categories = Category::all(['id', 'name']);

        return view('dashboard.project.edit', compact('project', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProjectRequest $request, $project)
    {
        $data = $request->all();

        $project = $this->project->findOrFail($project);

        if ($request->hasFile('photos')) {
            $images = $this->imageUpload($request, 'photo');

            // inserção dessas imagens/referências na base
            $project->photos()->createMany($images);
        }

        $project->update($data);
        $project->categories()->sync($data['categories']);

        flash('Projeto atualizado com sucesso!')->success();
        return redirect()->route('admin.project.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($project)
    {
        $project = $this->project::findOrFail($project);
        $project->delete();

        flash('Projeto excluído com sucesso!')->success();
        return redirect()->route('admin.project.index');
    }

    public function imageUpload(Request $request, $imageColumn)
    {
        $images = $request->file('photos');
        $uploadedImages = [];

        foreach($images as $image){
            $uploadedImages[] = [$imageColumn => $image->store('products', 'public')];
        }

        return $uploadedImages;
    }
}
