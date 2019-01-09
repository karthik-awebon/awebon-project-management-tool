<?php

namespace App\Http\Controllers;

use App\UserWorkhour;
use App\Projects;
use App\Workhours;
use App\Resource;
use Mail;
use App\Mail\WelcomedeveloperEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserWorkhourController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        /* sortarray define */

        if (!isset($request->sort)) {
            $sortarray['date'] = 'desc';
        } else {
            $sortarray[$request->sort] = $request->direction;
        }

        $selectDate = $request['selectdate'];
        
        $selectedMonth = $request['monthselect'];

        $selectProject = $request['selectproject'];

        $selectResource = $request['selectresource'];

        $workhours = Workhours::with('project', 'resource')->sortable($sortarray)->paginate(env('ROW_PER_PAGE', 10));

        $users = Auth::user();

        $resources = Resource::where('user_id', '=', $users['id'])->first();

        $projects = Projects::all();


        if ($selectDate) {
            if ($selectProject) {
                $workhours = Workhours::where('date', '=', $selectDate)->where('project_id', '=', $selectProject)->where('resource_id', '=', $resources['id'])->sortable()->paginate(env('ROW_PER_PAGE', 10));
            } elseif ($selectProject == 0) {
                $workhours = Workhours::where('date', '=', $selectDate)->where('project_id', '>', 0)->where('resource_id', '=', $resources['id'])->sortable()->paginate(env('ROW_PER_PAGE', 10));
            } else {
                $workhours = Workhours::Where('date', '=', $selectDate)->where('resource_id', '=', $resources['id'])->sortable()->paginate(env('ROW_PER_PAGE', 10));
            }
        } elseif ($selectProject && $selectedMonth == 0) {
            $workhours = Workhours::where('project_id', '=', $selectProject)->where('resource_id', '=', $resources['id'])->sortable()->paginate(env('ROW_PER_PAGE', 10));
        } elseif ($selectProject == 0  && $selectedMonth == 0) {
            $workhours = Workhours::where('project_id', '>', 0)->where('resource_id', '=', $resources['id'])->sortable()->paginate(env('ROW_PER_PAGE', 10));
        } elseif ($selectProject == 0 && $selectedMonth) {
            $workhours = Workhours::whereMonth('date', $selectedMonth)->where('resource_id', '=', $resources['id'])->sortable()->paginate(env('ROW_PER_PAGE', 10));
        } elseif ($selectProject && $selectedMonth) {
            $workhours = Workhours::whereMonth('date', $selectedMonth)->where('project_id', '=', $selectProject)->where('resource_id', '=', $resources['id'])->sortable()->paginate(env('ROW_PER_PAGE', 10));
        } elseif (isset($selectedMonth)) {
            if ($selectedMonth == 0) {
                $workhours = Workhours::where('project_id', '>', 0)->where('resource_id', '=', $resources['id'])->sortable()->paginate(env('ROW_PER_PAGE', 10));
            } else {
                $workhours = Workhours::whereMonth('date', $selectedMonth)->where('resource_id', '=', $resources['id'])->sortable()->paginate(env('ROW_PER_PAGE', 10));
            }
        }
        
        $selectedMonth = $selectedMonth;
        $selectProject = $selectProject;
        $selectDate = $selectDate;
        
        if ($request->ajax()) {
            return view('ajax.workhourindexajax', compact('workhours', 'users', 'resources', 'projects', 'selectedMonth', 'selectProject', 'selectDate'));
        } else {
            return view('users.userworkhoursindex', compact('workhours', 'users', 'resources', 'projects', 'selectedMonth', 'selectProject', 'selectDate'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $projects = Projects::all();

        $resources = Resource::all();

        
        return view('users.userworkhors', compact('projects', 'resources'));
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
            'date' => 'required',
            'no_of_hours' => 'required|numeric',
            'project_id' => 'required',
            'resource_id' => 'required',
        ]);

        $users = Auth::user();

        $resource = Resource::all();

        $resources = Resource::where('user_id', '=', $users->id)->first();

        $projects['projects'] = Projects::all();

        $workhour = new workhours;

        $workhour->date = $request->date;
        $timestamp = date("Y-m-d", strtotime($workhour->date));
        $workhour->date = $timestamp;

        $workhour->date = $timestamp;
        $workhour->no_of_hours = $request->no_of_hours;
        $workhour->hourly_rate = $resources->hourly_rate;
        $workhour->project_id = $request->project_id;

        $workhour->resource_id = $resources->id;
        $workhour->note = $request->note;

        if ($workhour->save()) {
            $request->Session()->flash('alert-success', 'Work hours details created was  successful!');
            Mail::to('prasathkarnan98@gmail.com')->send(new WelcomeDeveloperEmail($resources->resources));
            return redirect('create-userworkhours');
        } else {
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
    public function edit($id)
    {
        $projects = Projects::all();

        $resources = Resource::all();
       
        $workhour = Workhours::find($id);

        return view('users.userworkhoursedit', compact('workhour', 'projects', 'resources'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\UserWorkhour  $userWorkhour
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
        
        if ($workhour->save()) {
            $request->Session()->flash('alert-success', 'Workhours updated Successfully');
            return redirect('index-userworkhours');
        } else {
            $request->Session()->flash('alert-error', 'Workhours update Failed');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\UserWorkhour  $userWorkhour
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request, $id)
    {
        $workhour = Workhours::find($id);

        if ($workhour->delete()) {
            $request->Session()->flash('alert-danger', 'work hours details deleted was successful!');
            return redirect('index-userworkhours');
        } else {
            $request->Session()->flash('alert-error', 'work hours details deleted was  failed!');
        }
    }
}
