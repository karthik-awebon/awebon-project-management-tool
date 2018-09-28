<?php

namespace App\Http\Controllers;

use App\Workhours;
use Illuminate\Http\Request;

use App\Http\Controllers\ProjectsController;
use App\Http\Requests\WhorkhoursRequest;


use App\Projects;

class WorkhoursController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $workhours['workhours']  = Workhours::with('project')->get();
        $workhours['workhours'] = Workhours::paginate(10);

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

        return view('workhours.create', $projects);
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

        $workhour['workhour'] = Workhours::find($id);

        return view('workhours.edit', $workhour, $projects);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Workhours  $workhours
     * @return \Illuminate\Http\Response
     */
    public function update(WhorkhoursRequest $request)
    {
        $workhour = Workhours::find($request->id);

        $workhour->date = $request->date;
        $workhour->no_of_hours = $request->no_of_hours;
        $workhour->hourly_rate = $request->hourly_rate;
        $workhour->project_id = $request->project_id;
        
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
