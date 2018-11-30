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
    public function index(Request $request)
    {

        $selectDate = $request['selectdate'];

      /*   echo $selectDate;
        exit(); */

       

       /*  echo "<pre>"; print_r($workhours['workhours']); "</pre>";
        exit(); */
        
        $selectedMonth = $request['monthselect'];

        $selectProject = $request['selectproject'];

        $workhours['workhours'] = Workhours::with('project', 'resource')->sortable()->paginate(env('ROW_PER_PAGE', 10));

        $workhours['projects'] = Projects::all();


        if($selectDate ){
            if($selectProject){

                $workhours['workhours'] = Workhours::where('date', '=', $selectDate)->where('project_id', '=', $selectProject)->sortable()->paginate(env('ROW_PER_PAGE', 10));

            }
            else{
                $workhours['workhours'] = Workhours::Where('date', '=', $selectDate)->sortable()->paginate(env('ROW_PER_PAGE', 10));
            }
          
        } 
       elseif($selectProject && $selectedMonth == 0){

            $workhours['workhours'] = Workhours::where('project_id', '=', $selectProject)->sortable()->paginate(env('ROW_PER_PAGE', 10));
            
       }
       elseif($selectProject == 0 && $selectedMonth == 0){

            $workhours['workhours'] = Workhours::where('project_id', '>', 0)->sortable()->paginate(env('ROW_PER_PAGE', 10));
            
        }
        elseif($selectProject == 0  && $selectedMonth){

            $workhours['workhours'] = Workhours::whereMonth('date', $selectedMonth )->sortable()->paginate(env('ROW_PER_PAGE', 10));
            
        }
        elseif(isset($selectedMonth) && (isset($selectProject))){
  
            $workhours['workhours'] = Workhours::whereMonth('date', $selectedMonth)->where('project_id', '=', $selectProject)->sortable()->paginate(env('ROW_PER_PAGE', 10));
            
        } 
        elseif(isset($selectedMonth)){

            if($selectedMonth == 0){
                $workhours['workhours'] = Workhours::where('project_id', '>', 0)->sortable()->paginate(env('ROW_PER_PAGE', 10));
            }else{
                $workhours['workhours'] = Workhours::whereMonth('date', $selectedMonth )->sortable()->paginate(env('ROW_PER_PAGE', 10));
            }
        }
        
        $workhours['selectedMonth'] = $selectedMonth;
        $workhours['selectProject'] = $selectProject;
        $workhours['selectDate'] = $selectDate;

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

        $resourceId = $request->resource_id; 
              
        $resource = Resource::find($resourceId);

        $workhour = new Workhours;

        $workhour->date = $request->date;
        $workhour->no_of_hours = $request->no_of_hours;
        $workhour->hourly_rate = $resource->hourly_rate;
        $workhour->project_id = $request->project_id;
        $workhour->project_id = $request->project_id;
        $workhour->resource_id = $request->resource_id;
        $workhour->note = $request->note;

        
        $workhour->date  = $request->date->format('yyyy-mm-dd');

        if($workhour->save()){
            $request->Session()->flash('alert-success', 'Work hours details created was  successful!');
            return redirect('workhours');
        }else{
            $request->Session()->flash('alert-error', 'Work hours details inserted was  failed!');
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
            'no_of_hours' => 'required|numeric',
            /* 'hourly_rate' => 'required|numeric', */
            'project_id' => 'required',
            'resource_id' => 'required',  
            /* 'note' => 'required', */
        ]);

        $workhour = Workhours::find($request->id);

        $workhour->date = $request->date;
        $workhour->no_of_hours = $request->no_of_hours;
       /*  $workhour->hourly_rate = $resource->hourly_rate; */
        $workhour->project_id = $request->project_id;
        $workhour->resource_id = $request->resource_id;
        $workhour->note = $request->note;
        
        if($workhour->save()){
            $request->Session()->flash('alert-success', 'Workhours updated Successfully');
            return redirect('workhours');
            
        }else{
            $request->Session()->flash('alert-error', 'Workhours update Failed');
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
            $request->Session()->flash('alert-danger', 'work hours details deleted was successful!');
            return redirect('workhours');
        }else{
            $request->Session()->flash('alert-error', 'work hours details deleted was  failed!');
        }
    }

}



