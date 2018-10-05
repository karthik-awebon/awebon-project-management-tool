<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Charts;
use App\Projects;



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

        $chart = Charts::database(Projects::all(), 'bar', 'highcharts')

                  ->title("my project chart")

                  ->elementLabel('Total')

                  ->dimensions(0, 300) 

                  ->responsive(false)
                  
                  ->groupBy('project_name');
                 
               
                  
        return view('home',['chart' => $chart] );

        /* return view(''); */
    }


  
}
