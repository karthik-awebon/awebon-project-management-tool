<?php

namespace App\Http\Controllers;

use App\Workhours;
use Illuminate\Http\Request;

use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\ResourceController;
use App\Http\Requests\WhorkhoursRequest;


use App\Projects;
use App\Resource;

class WorkhoursController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $workhours['workhours'] = Workhours::with('project', 'resource')->paginate(10);

        
        return view('workhours.index', $workhours);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $projects['projects'] = Projects::all();

        $resources['resources'] = Resource::all();

        return view('workhours.create', $projects, $resources);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(WhorkhoursRequest $request)
    {
      
        $workhour = new Workhours;

        $workhour->date = $request->date;
        $workhour->no_of_hours = $request->no_of_hours;
        $workhour->hourly_rate = $request->hourly_rate;
        $workhour->project_id = $request->project_id;
        $workhour->resource_id = $request->resource_id;

        

        if($workhour->save()){
            $request->Session()->flash('alert-success', 'projects details created was  successful!');
            return redirect('workhours');
        }else{
            $request->Session()->flash('alert-error', 'projects details inserted was  failed!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Workhours  $workhours
     * @return \Illuminate\Http\Response
     */
    public function show(Workhours $workhours)
    {
        return view('workhours.details');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Workhours  $workhours
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $projects['projects'] = Projects::all();

        $resources['resources'] = Resource::all();
       
    /* 
        print_r($resources['resources']);
        exit(); */

        $workhour['workhour'] = Workhours::find($id);

        return view('workhours.edit', $workhour, $projects)->with($resources);;
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Workhours  $workhours
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $validatedData = $request->validate([
            'date' => 'required',
            'no_of_hours' => 'required',
            'hourly_rate' => 'required',
            'project_id' => 'required',  
        ]);


        $workhour = Workhours::find($request->id);

        $workhour->date = $request->date;
        $workhour->no_of_hours = $request->no_of_hours;
        $workhour->hourly_rate = $request->hourly_rate;
        $workhour->project_id = $request->project_id;
        $workhour->resource_id = $request->resource_id;

        
        
        if($workhour->save()){
            $request->Session()->flash('alert-success', 'projects details updated was successful!');
            return redirect('workhours');
            
        }else{
            $request->Session()->flash('alert-error', 'projects details updated was  failed!');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Workhours  $workhours
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request, $id)
    {
        $workhour = Workhours::find($id);

        if($workhour->delete()){
            $request->Session()->flash('alert-danger', 'projects details deleted was successful!');
            return redirect('workhours');
        }else{
            $request->Session()->flash('alert-error', 'projects details deleted was  failed!');
        }
    }

}
