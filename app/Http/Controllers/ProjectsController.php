<?php

namespace App\Http\Controllers;

use App\Projects;
use Illuminate\Http\Request;
use App\Http\Requests\ProjectRequest;

class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects['projects'] = Projects::all();
        
        return view('projects.index', $projects);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('projects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProjectRequest $request)
    {
       
      

        $project = new Projects;
        $project->project_name = $request->project_name;
        $project->project_price = $request->project_price;

        if($project->save()){
            $request->Session()->flash('alert-success', 'projects details inserted was  successful!');
            return redirect('projects');
            
        }else{
            echo "insert data success";
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Projects  $projects
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $project['project'] = Projects::find($id);

        return view('projects.details', $project);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Projects  $projects
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $project['project'] = Projects::find($id);

        return view('projects.edit', $project);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Projects  $projects
     * @return \Illuminate\Http\Response
     */
    public function update(ProjectRequest $request)
    {
       /*  $validatedData = $request->validate([
            'Project Name' => 'required',
            'Project Price (USD)' => 'required',
        ]); */


        $project = Projects::find($request->id);

        $project->project_name = $request->project_name;
        $project->project_price = $request->project_price;

        if($project->save()){
            $request->Session()->flash('alert-success', 'projects details updated was  successful!');
            return redirect('projects');
        }else{
            echo "insert data success";
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Projects  $projects
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request, $id)
    {
        $project = Projects::find($id);

        if($project->delete()){
            $request->Session()->flash('alert-danger', 'projects details deleted was  successful!');
            return redirect('projects');
        }else{
            echo "insert data success";
        }
    }
}
