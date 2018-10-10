<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

use Charts;

use App\Projects;

use App\Workhours;




class HomeController extends Controller
{       
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data = Projects::where('start_date', '2018-10-05')->get();

        $chart = Charts::create('bar', 'highcharts')

                  ->title("my project chart")

                  ->elementLabel('Total')

                  ->dimensions(0, 300) 

                  ->responsive(false)

                  ->labels($data->pluck('project_name'))
                 
                  ->values($data->pluck('project_price'));
        
    /* $projects = Projects::whereMonth('start_date','10' )->get(); */
    /* $workhours = DB::table('workhours')->whereMonth('start_date', '=', '10')->get(); */
        
        $projects = Projects::whereMonth('start_date','10' )->get();    
        $workhours = Workhours::whereMonth('date','10')->get();    
              
        return view('home',compact('projects', 'workhours'), compact('chart') );

    }


  
}
