<?php

namespace App\Http\Controllers;

use App\UserWorkhour;
use App\Projects;
use App\Workhours;
use App\Resource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserWorkhourController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /* $projects = Projects::all();

        return view('users.userworkhors', $projects); */
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

        
        return view('users.userworkhors', $projects, $resources);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $users = Auth::user();

        $resource = Resource::all();

        $resources = Resource::where('user_id', '=', $users->id)->first();

       /*  $resources['resource'] = $resources['id']; */

       /* dd($resources->id);  */
              
      

        $projects['projects'] = Projects::all();

        $workhour = new workhours;
        $timestamp = date("Y-m-d", strtotime($workhour->date));
        $workhour->date = $timestamp;
        $workhour->no_of_hours = $request->no_of_hours;
        $workhour->hourly_rate = $resources->hourly_rate;
        $workhour->project_id = $request->project_id;

        $workhour->resource_id = $resources->id;
        $workhour->note = $request->note;

        if($workhour->save()){
            
            $request->Session()->flash('alert-success', 'Work hours details created was  successful!');
            return redirect('create-userworkhours');
        }else{
            $request->Session()->flash('alert-error', 'Work hours details inserted was  failed!');
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\UserWorkhour  $userWorkhour
     * @return \Illuminate\Http\Response
     */
    public function show(UserWorkhour $userWorkhour)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\UserWorkhour  $userWorkhour
     * @return \Illuminate\Http\Response
     */
    public function edit(UserWorkhour $userWorkhour)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\UserWorkhour  $userWorkhour
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserWorkhour $userWorkhour)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\UserWorkhour  $userWorkhour
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserWorkhour $userWorkhour)
    {
        //
    }
}
