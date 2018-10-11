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
       
        
        $projects = Projects::whereMonth('start_date', 'selectname')->get();

        print_r($projects);
        exit();
        
        foreach ($projects as $project){
            
            $workhours  = Workhours::where('project_id', '=', $project->id )->get();

            $total_no_of_hours=0;
            $total_cost_spent=0;   
   
           foreach ($workhours as $workhour) {
               $total_no_of_hours += $workhour->no_of_hours;
               $total_cost_spent += $workhour->no_of_hours * $workhour->hourly_rate;
           }
           
          /*  $workhours->total_no_of_hours = $total_no_of_hours;
           $workhours->total_cost_spent = $total_cost_spent; */
   
            /* echo "Project id:". ($project->id);
            echo "<br>";
            echo "Total No of Hours:" . $total_no_of_hours;
            echo "<br>";
            echo "Total Cost Spent:" . $total_cost_spent;
            echo "<br>";  */
            
        }

        $chart = Charts::multi('bar', 'highcharts')

                  ->title("my project chart")

                  ->elementLabel('Total')

                  ->dimensions(0, 300) 

                  ->responsive(true)

                  ->labels($projects->pluck('project_name'))
                  ->dataset('Project Cost', $projects->pluck('project_price'))
                  ->dataset('Project Expense Price',  [$total_cost_spent]);    
    
                  
                  
        return view('home',compact('projects'), compact('chart') );

    }


  
}
