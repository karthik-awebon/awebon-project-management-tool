<?php

namespace App\Http\Controllers;

use App\Workhours;
use Illuminate\Http\Request;

class WorkhoursController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('workhours.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('workhours.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $workhour = new Workhours;
        $workhour->date = $request->date;
        $workhour->no_of_hourly = $request->no_of_hourly;
        $workhour->hourly_rate = $request->hourly_rate;
        $workhour->project_id = $request->project_id;

        if($workhour->save()){
            echo "insert data success";
            return redirect('projects');
            
        }else{
            echo "insert data success";
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
    public function edit(Workhours $workhours)
    {
        return view('workhours.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Workhours  $workhours
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Workhours $workhours)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Workhours  $workhours
     * @return \Illuminate\Http\Response
     */
    public function destroy(Workhours $workhours)
    {
        //
    }
}
