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
    public function index(Request $request)
    {
        

        
        $selectedMonth = date('m');
        if(isset($request->selectname)){
            $selectedMonth = $request->selectname;
        }

       /*  $selectedMonth = $request->selectname; */

        /* echo $selectedMonth;
        exit(); */


        $projects = Projects::whereMonth('start_date', $selectedMonth)->get(); 
        $projects->project =  $selectedMonth;

       // echo "<pre>";  print_r($projects); "</pre>";
       // exit();
        /* 
        echo "</br>";

        echo $selectedMonth. '</br>'; */
       /*  exit(); */

        $total_no_of_hours=0;
        $total_cost_spent=0; 
        
        foreach ($projects as $project){
            
            $workhours  = Workhours::where('project_id', '=', $project->id )->get();

            /* echo "<pre>";  print_r($workhours); "</pre>"; */
          
            $total_no_of_hours=0;
            $total_cost_spent=0;   
   
           foreach ($workhours as $workhour) {
               $total_no_of_hours += $workhour->no_of_hours;
               $total_cost_spent += $workhour->no_of_hours * $workhour->hourly_rate;
           }
           /* echo "<pre>";  print_r($total_no_of_hours ); "</pre>"; */
         /*   echo "<pre>";  print_r($total_cost_spent ); "</pre>"; */
           
        }   
       /*  exit(); */
     

        
        $chart = Charts::multi('bar', 'highcharts')

                  ->title("my project chart")

                  ->elementLabel('Total')

                  ->dimensions(0, 300) 

                  ->responsive(true)

                  ->labels($projects->pluck('project_name'))
                  ->dataset('project_name', $projects->pluck('project_name'))
                  ->dataset('Project Expense Price', [$total_cost_spent]);
                
       /*  echo "<pre>"; print_r($chart); "</pre>"; 
        exit(); */
                          
        return view('home',compact('projects'), compact('chart') );
        

    }
    
  
}
