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

        $projects = Projects::whereMonth('start_date','10' )->get();
        

        $chart = Charts::multi('bar', 'highcharts')

                  ->title("my project chart")

                  ->elementLabel('Total')

                  ->dimensions(0, 300) 

                  ->responsive(true)

                  ->labels($projects->pluck('project_name'))
                  ->dataset('Project Cost', $projects->pluck('project_price'))
                  ->dataset('Project Expense Price',  [10, 30, 40, 30, 30, 50, 40]);    
        
    /* $projects = Projects::whereMonth('start_date','10' )->get(); */
    /* $workhours = DB::table('workhours')->whereMonth('start_date', '=', '10')->get(); */
        
            
        //$workhours = Workhours::whereMonth('date','10')->get();    
              
        return view('home',compact('projects'), compact('chart') );

    }


  
}
