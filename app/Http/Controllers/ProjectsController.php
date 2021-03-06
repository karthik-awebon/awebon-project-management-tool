<?php

namespace App\Http\Controllers;

use App\Projects;
use Illuminate\Http\Request;
use App\Http\Requests\ProjectRequest;
use App\Workhours;
use App\Resource;

class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Projects::paginate(env('ROW_PER_PAGE', 10));
        
        return view('projects.index', compact('projects'));
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
        $timestamp = date("Y-m-d", strtotime($project->start_date));
        $project->start_date =  $timestamp;

        $project->ETA = $request->ETA;
        $timestampeta = date("Y-m-d", strtotime($project->ETA));
        $project->ETA =  $timestampeta;
      

        if ($project->save()) {
            $request->Session()->flash('alert-success', 'projects details inserted was  successful!');
            return redirect('admin/projects');
        } else {
            $request->Session()->flash('alert-error', 'projects details inserted was failed!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Projects  $projects
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $selectResource = $request['selectresource'];

        $project = Projects::find($id);

        $resource = Resource::all();

        $workours = Workhours::find($id);

        if ($selectResource == 0) {
            $workhours  = Workhours::where('project_id', '=', $id)->paginate(env('ROW_PER_PAGE', 10));
        } elseif ($selectResource) {
            $workhours  = Workhours::where('project_id', '=', $id)->where('resource_id', '=', $selectResource)->paginate(env('ROW_PER_PAGE', 10));
        }
   
        $total_no_of_hours=0;
        $total_cost_spent=0;
        

        foreach ($workhours as $workhour) {
            $total_no_of_hours += $workhour['no_of_hours'];
            $total_cost_spent += $workhour['no_of_hours'] * $workhour['hourly_rate'];
        }
        
        $total_no_of_hours =$total_no_of_hours;
        $total_cost_spent =$total_cost_spent;

        $selectResource = $selectResource;
        
        
        if ($request->ajax()) {
            return view('ajax.projectdetailsajax', compact('project', 'resource', 'workours', 'total_no_of_hours', 'total_cost_spent', 'selectResource'));
        } else {
            return view('projects.details', compact('project', 'resource', 'workours', 'total_no_of_hours', 'total_cost_spent', 'selectResource'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Projects  $projects
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $project = Projects::find($id);

        return view('projects.edit', compact('project'));
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
            'project_price' => 'required|numeric',
        ]);
      
        $project = Projects::find($request->id);

        $project->project_name = $request->project_name;
        $project->project_price = $request->project_price;
       
        if (!empty($request->status)) {
            $project->status = $request->status;
        } else {
            [];
        }

        if (!empty($request->actual_completion_date)) {
            $project->actual_completion_date = $request->actual_completion_date;
            $timestamp = date("Y-m-d", strtotime($project->actual_completion_date));
            $project->actual_completion_date =  $timestamp;
        } else {
            [];
        }

        if ($project->save()) {
            $request->Session()->flash('alert-success', 'projects details updated was  successful!');
            return redirect('admin/projects');
        } else {
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

        if ($project->delete()) {
            $request->Session()->flash('alert-danger', 'projects details deleted was  successful!');
            return redirect('admin/projects');
        } else {
            $request->Session()->flash('alert-error', 'projects details deleted was  failed!');
        }
    }
}
