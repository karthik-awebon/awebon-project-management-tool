<?php

namespace App\Http\Controllers;

use App\Resource;
use App\Workhours;
use App\Projects;
use App\User;
use Illuminate\Support\Facades\Hash;
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
        $resources = Resource::paginate(env('ROW_PER_PAGE', 10));
        
        return view('resource.index', compact('resources'));
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
        $validatedData = $request->validate([
            'resource_name' => 'required',
            'hourly_rate' => 'required|numeric',
        ]);

        $resource = new Resource;
        $resource->resource_name = $request->resource_name;
        $resource->hourly_rate = $request->hourly_rate;


        $user = new User;
        $user->name = $request->resource_name;
        $user->email = $request->email;
        $user->password =Hash::make($request->password);
        $user->role_id = config('app.developerroleid');
 
        $user->save();

        $resource->user_id = $user->id;
         

        if ($resource->save()) {
            $request->Session()->flash('alert-success', 'resources details inserted was  successful!');
            return redirect('admin/index-resource');
        } else {
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
        $selectedMonth = $request['monthselect'];
        $selectProject = $request['selectproject'];

        $resource = Resource::find($id);

        $projects = Projects::all();

        if (!isset($selectedMonth) && (!isset($selectProject))) {
            $selectedMonth = date('m');
            $selectProject= '';

            $workhours = Workhours::whereMonth('date', $selectedMonth)->where('resource_id', '=', $id)->paginate(env('ROW_PER_PAGE', 10));
        } elseif (isset($selectedMonth) && (!isset($selectProject))) {
            if ($selectedMonth == 0) {
                $workhours = Workhours::where('resource_id', '=', $id)->where('project_id', '=', $selectProject)->paginate(env('ROW_PER_PAGE', 10));
            } else {
                $workhours = Workhours::whereMonth('date', $selectedMonth)->where('resource_id', '=', $id)->paginate(env('ROW_PER_PAGE', 10));
            }
        } elseif ($selectProject && $selectedMonth == 0) {
            $workhours = Workhours::where('resource_id', '=', $id)->where('project_id', '=', $selectProject)->paginate(env('ROW_PER_PAGE', 10));
        } elseif ($selectProject == 0 && $selectedMonth) {
            $workhours = Workhours::whereMonth('date', $selectedMonth)->where('resource_id', '=', $id)->paginate(env('ROW_PER_PAGE', 10));
        } elseif ($selectProject == 0 && $selectedMonth == 0) {
            $workhours = Workhours::where('resource_id', '=', $id)->paginate(env('ROW_PER_PAGE', 10));
        } elseif (isset($selectedMonth) && (isset($selectProject))) {
            $workhours = Workhours::whereMonth('date', $selectedMonth)->where('project_id', '=', $selectProject)->where('resource_id', '=', $id)->paginate(env('ROW_PER_PAGE', 10));
        }
        
        
        $total_no_of_hours=0;
        $total_cost_spent=0;
            
        foreach ($workhours as $workhour) {
            $total_no_of_hours += $workhour['no_of_hours'];
            $total_cost_spent += $workhour['no_of_hours'] * $workhour['hourly_rate'];
        }
        
        $total_no_of_hours = $total_no_of_hours;
        $total_cost_spent = $total_cost_spent;
        $selectedMonth = $selectedMonth;
        $selectProject = $selectProject;


        if ($request->ajax()) {
            return view('ajax.resourcedetailsajax', compact('resource', 'projects', 'selectProject', 'workhours', 'total_no_of_hours', 'total_cost_spent', 'selectedMonth', 'selectProject'));
        } else {
            return view('resource.details', compact('resource', 'projects', 'selectProject', 'workhours', 'total_no_of_hours', 'total_cost_spent', 'selectedMonth', 'selectProject'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Resource  $resource
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $resource = Resource::find($id);

        return view('resource.edit', compact('resource'));
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
        $validatedData = $request->validate([
            'resource_name' => 'required',
            'hourly_rate' => 'required|numeric',
        ]);

        $resource = Resource::find($request->id);

        $resource->resource_name = $request->resource_name;
        $resource->hourly_rate = $request->hourly_rate;
        
        if ($resource->save()) {
            $request->Session()->flash('alert-success', 'resources details updated was  successful!');
            return redirect('admin/index-resource');
        } else {
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

        if ($resource->delete()) {
            $request->Session()->flash('alert-danger', 'projects details deleted was  successful!');
            return redirect('admin/index-resource');
        } else {
            $request->Session()->flash('alert-error', 'projects details deleted was  failed!');
        }
    }
}
