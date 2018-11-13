<?php

namespace App\Http\Controllers;

use App\Resource;
use App\Workhours;
use App\Projects;
use Illuminate\Http\Request;

class ResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $resources['resources'] = Resource::paginate(10);
        
        return view('resource.index', $resources);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('resource.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $resource = new Resource;
        $resource->resource_name = $request->resource_name;
        
        if($resource->save()){
            $request->Session()->flash('alert-success', 'resources details inserted was  successful!');
            return redirect('index-resource');
            
        }else{
            $request->Session()->flash('alert-error', 'resources details inserted was  failed!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Resource  $resource
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {

        

       

        $selectedMonth = date('m');
        if(isset($request['monthselect'])){
            $selectedMonth = $request['monthselect'];
        }
 
        $resources['resource'] = Resource::paginate(10)->find($id);

        /* print_r($request->selectproject);
        exit(); */

        $selectproject = $request->selectproject;

        $resources['projects'] = Projects::all();

        $resources['workhours']  = Workhours::where('project_id', '=', $selectproject)->get();

       /*  echo "<pre>"; print_r($resources['workhours']); "</pre>";
        exit(); */
        
        $resources['workhours']  = Workhours::whereMonth('date', $selectedMonth)->where('resource_id', '=', $id)->get();
    
        $total_no_of_hours=0;
        $total_cost_spent=0;   

            
            foreach ($resources['workhours'] as $workhour) {

                $total_no_of_hours += $workhour['no_of_hours'];
                $total_cost_spent += $workhour['no_of_hours'] * $workhour['hourly_rate'];

            }
        
        $resources['total_no_of_hours']=$total_no_of_hours;
        $resources['total_cost_spent']=$total_cost_spent;
        $resources['selectedMonth']= $selectedMonth;


        return view('resource.details', $resources);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Resource  $resource
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $resource['resource'] = Resource::find($id);

        return view('resource.edit', $resource);
    }

    /**
     * Update the specified resource in storage.    
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Resource  $resource
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $resource = Resource::find($request->id);

        $resource->resource_name = $request->resource_name;
        
        if($resource->save()){
            $request->Session()->flash('alert-success', 'resources details updated was  successful!');
            return redirect('index-resource');
        }else{
            $request->Session()->flash('alert-error', 'resources details updated was  failed!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Resource  $resource
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request, $id)
    {
        $resource = Resource::find($id);

        if($resource->delete()){
            $request->Session()->flash('alert-danger', 'projects details deleted was  successful!');
            return redirect('index-resource');
        }else{
            $request->Session()->flash('alert-error', 'projects details deleted was  failed!');
        }
    }
}
