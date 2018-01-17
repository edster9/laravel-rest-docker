<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Project;
use App\Http\Resources\Project as ProjectResource;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get projects
        $projects = Project::paginate(15);

        // Return collection of projects as resource
        return ProjectResource::collection($projects);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Create or Update the project
        $project = $request->isMethod('put') ? Project::findOrFail($request->id) : new Project;

        $project->id = $request->input('id');
        $project->name = $request->input('name');
        
        if($project->save()) {
            return new ProjectResource($project);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Get project
        $project = Project::findOrFail($id);

        // Return single project as a resource
        return new ProjectResource($project);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Delete project
        $project = Project::findOrFail($id);

        if($project->delete()) {
            return new ProjectResource($project);
        }
    }
}
