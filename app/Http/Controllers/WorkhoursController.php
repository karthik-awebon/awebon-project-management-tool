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

        /* sortarray define */

        if(!isset($request->sort)){

            $sortarray['date'] = 'desc';

        }else{
            
            $sortarray[$request->sort] = $request->direction;
        }


        $selectDate = $request['selectdate'];
        
        $selectedMonth = $request['monthselect'];

        $selectProject = $request['selectproject'];

        $selectResource = $request['selectresource'];

        $workhours = Workhours::with('project', 'resource')->sortable($sortarray)->paginate(env('ROW_PER_PAGE', 10));

        $projects = Projects::all();

        $resources = Resource::all();

        if($selectDate ){
            if($selectProject && $selectResource){

                $workhours = Workhours::where('date', '=', $selectDate)->where('project_id', '=', $selectProject)->where('resource_id', '=', $selectResource)->sortable()->paginate(env('ROW_PER_PAGE', 10));

            }elseif($selectProject == 0 && $selectResource){
                $workhours = Workhours::where('date', '=', $selectDate)->where('project_id', '>', 0)->where('resource_id', '=', $selectResource)->sortable()->paginate(env('ROW_PER_PAGE', 10));
            }
            else{
                $workhours = Workhours::Where('date', '=', $selectDate)->sortable()->paginate(env('ROW_PER_PAGE', 10));
            }
        } 
       elseif($selectProject && $selectedMonth == 0 && $selectResource){

            $workhours = Workhours::where('project_id', '=', $selectProject)->where('resource_id', '=', $selectResource)->sortable()->paginate(env('ROW_PER_PAGE', 10));
            
       }
       elseif($selectProject == 0 && $selectResource ==0  && $selectedMonth == 0){

            $workhours = Workhours::where('project_id', '>', 0)->where('resource_id', '>', 0)->sortable()->paginate(env('ROW_PER_PAGE', 10));
            
        }
        elseif($selectProject == 0  && $selectResource == 0  && $selectedMonth){

            $workhours = Workhours::whereMonth('date', $selectedMonth )->sortable()->paginate(env('ROW_PER_PAGE', 10));
            
        }
         elseif($selectProject == 0  && $selectResource  && $selectedMonth == 0){

            $workhours = Workhours::where('resource_id', '=', $selectResource )->sortable()->paginate(env('ROW_PER_PAGE', 10));
            
        }
        elseif($selectProject == 0  && $selectResource && $selectedMonth){

            $workhours = Workhours::whereMonth('date', $selectedMonth )->where('resource_id', '=', $selectResource)->sortable()->paginate(env('ROW_PER_PAGE', 10));
            
        }
        elseif($selectProject  && $selectResource == 0  && $selectedMonth == 0 ){

            $workhours = Workhours::where('project_id', '=', $selectProject)->sortable()->paginate(env('ROW_PER_PAGE', 10));
            
        }
        elseif($selectProject && $selectResource == 0 && $selectedMonth){

            $workhours = Workhours::whereMonth('date', $selectedMonth )->where('project_id', '=', $selectProject)->sortable()->paginate(env('ROW_PER_PAGE', 10));
            
        }
        elseif(isset($selectedMonth) && (isset($selectProject)) && (isset($selectResource))){
  
            $workhours = Workhours::whereMonth('date', $selectedMonth)->where('resource_id', '=', $selectResource)->where('project_id', '=', $selectProject)->sortable()->paginate(env('ROW_PER_PAGE', 10));
            
        } 
      
        elseif(isset($selectedMonth)){

            if($selectedMonth == 0){
                $workhours = Workhours::where('project_id', '>', 0)->sortable()->paginate(env('ROW_PER_PAGE', 10));
            }else{
                $workhours = Workhours::whereMonth('date', $selectedMonth )->sortable()->paginate(env('ROW_PER_PAGE', 10));
            }
        }


        
        $workhours = $selectedMonth;
        $workhours = $selectProject;
        $workhours = $selectDate;
        $workhours = $selectResource;

        if($request->ajax()){
            return view('ajax.workhourindexajax', compact('workhours', 'projects', 'resources'));
        }else{
            return view('workhours.index', compact('workhours', 'projects', 'resources'));
        }   
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
        $validatedData = $request->validate([
            'date' => 'required',
            'no_of_hours' => 'required|numeric',
            'project_id' => 'required',
            'resource_id' => 'required',  
        ]);

        $resourceId = $request->resource_id; 
              
        $resource = Resource::find($resourceId);

        $workhour = new Workhours;

        $workhour->date = $request->date;
        $timestamp = date("Y-m-d", strtotime($workhour->date));
        $workhour->date = $timestamp;
        
        $workhour->no_of_hours = $request->no_of_hours;
        $workhour->hourly_rate = $resource->hourly_rate;
        $workhour->project_id = $request->project_id;
        $workhour->project_id = $request->project_id;
        $workhour->resource_id = $request->resource_id;
        $workhour->note = $request->note;

        if($workhour->save()){
            $request->Session()->flash('alert-success', 'Work hours details created was  successful!');
            return redirect('admin/workhours');
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
        $projects = Projects::all();

        $resources = Resource::all();
       
        $workhour = Workhours::find($id);

        return view('workhours.edit', compact('workhour'))->with(compact('projects'))->with(compact('resources'));
        
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
            'project_id' => 'required',
            'resource_id' => 'required',  
        ]);

        $workhour = Workhours::find($request->id);

        $date = $request->date;
        $timestamps = date("Y-m-d", strtotime($date));

        $workhour->date = $timestamps;
        $workhour->no_of_hours = $request->no_of_hours;
        $workhour->project_id = $request->project_id;
        $workhour->resource_id = $request->resource_id;
        $workhour->note = $request->note;
        
        if($workhour->save()){
            $request->Session()->flash('alert-success', 'Workhours updated Successfully');
            return redirect('admin/workhours');
            
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
            return redirect('admin/workhours');
        }else{
            $request->Session()->flash('alert-error', 'work hours details deleted was  failed!');
        }
    }

}



