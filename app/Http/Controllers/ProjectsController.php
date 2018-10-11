<?php

namespace App\Http\Controllers;

use App\Projects;
use Illuminate\Http\Request;
use App\Http\Requests\ProjectRequest;
use App\Workhours;

class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects['projects'] = Projects::paginate(10);
        
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
        $project->start_date = $request->start_date;
        $project->ETA = $request->ETA;
       
        
        if($project->save()){
            $request->Session()->flash('alert-success', 'projects details inserted was  successful!');
            return redirect('projects');
            
        }else{
            $request->Session()->flash('alert-error', 'projects details inserted was  failed!');
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
        $projects['project'] = Projects::paginate(10)->find($id);

        $projects['workhours']  = Workhours::where('project_id', '=', $id)->get();
        
        $total_no_of_hours=0;
        $total_cost_spent=0;   

        foreach ($projects['workhours'] as $workhour) {
            $total_no_of_hours += $workhour['no_of_hours'];
            $total_cost_spent += $workhour['no_of_hours'] * $workhour['hourly_rate'];
        }
        
        $projects['total_no_of_hours']=$total_no_of_hours;
        $projects['total_cost_spent']=$total_cost_spent;
    
        return view('projects.details', $projects);
        

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
    public function update(Request $request)
    {

        $validatedData = $request->validate([
            'project_name' => 'required',
            'project_price' => 'required',
            'status' => 'required',
            'actual_completion_date' => 'required',  
        ]);
      
        $project = Projects::find($request->id);

        $project->project_name = $request->project_name;
        $project->project_price = $request->project_price;
        $project->status = $request->status;
        $project->actual_completion_date = $request->actual_completion_date;
        
        if($project->save()){
            $request->Session()->flash('alert-success', 'projects details updated was  successful!');
            return redirect('projects');
        }else{
            $request->Session()->flash('alert-error', 'projects details updated was  failed!');
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
            $request->Session()->flash('alert-error', 'projects details deleted was  failed!');
        }
    }

  
}
