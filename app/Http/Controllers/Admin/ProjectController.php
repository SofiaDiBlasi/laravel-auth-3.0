<?php

namespace App\Http\Controllers\Admin;

use App\Models\Project;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Technology;
use App\Models\Type;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Project::all();
        return view('admin.projects.index' , compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Type::all();
        $technologies = Technology::all();
        return view('admin.projects.create' , compact('data', 'technologies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProjectRequest  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(StoreProjectRequest $request)
    public function store(Request $request)
    {
        $data =  $this->validateProject( $request->all() );

        $newProject = new Project();
        $newProject->name = $data['name'];
        $newProject->description = $data['description'];
        $newProject->link = $data['link'];
        $newProject->type_id = $data['type'];
        $newProject->save();

        $newProject->technologies()->attach($data["technologies"]);

        return  redirect()->route('admin.projects.show', $newProject->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $project = Project::find($id);
        return view('admin.projects.show' , compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        $data = Type::all();
        $technologies = Technology::all();
        return view('admin.projects.edit' , compact('project', 'data', 'technologies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProjectRequest  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    //public function update(UpdateProjectRequest $request, Project $project)
    public function update(Request $request, Project $project)
    {
        $data =  $this->validateProject( $request->all() );

        $project->name = $data['name'];
        $project->description = $data['description'];
        $project->link = $data['link'];
        $project->type_id = $data['type'];
        $project->update();

        $project->technologies()->sync($data["technologies"]);

        return  redirect()->route('admin.projects.show', $project->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('admin.projects.index');
    }

    private function validateProject($data) {
        $validator = Validator::make($data, [
            "name" => "required|min:5|max:50",
            "description" => "required|min:5|max:65535",
            "link" => "required|max:65535",
            "type" => "required",
            "technologies" =>"required"
        ], [
            "name.required" => "Il nome è obbligatorio",
            "name.min" => "Il nome deve essere almeno di :min caratteri",
            "name.max"=> "Il nome è troppo lungo",

            "description.required" => "La descrizione è obbligatoria",
            "description.min" => "La descrizione deve essere almeno di :min caratteri",
            "description.max"=> "La descrizione è troppo lunga",

            "link.required" => "L'immagine è obbligatoria",
            "link.max"=> "Link immagine non valido",

            "type.required" => "La tipologia è obbligatoria",

            "technologies.required" => "Almeno una tecnologia è obbligatoria!"
        ])->validate();

        return $validator;
    }
}


