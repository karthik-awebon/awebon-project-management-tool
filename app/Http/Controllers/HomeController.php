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
        

        $selectProject = $request->selectproject;

        $projects = Projects::all();

       /*  echo "<pre>"; print_r($queries); "</pre>";
        exit(); */
      
        

       /*  if($selectProject == 0){

            $projects = Projects::where('id', '>', 0)->get();

        }else{

            $projects = Projects::where('id', '=', $selectProject)->get();
        }
        */
       

        $total_no_of_hours=0;
        $total_cost_spent=0; 
        
        foreach ($projects as $project){

            if($selectProject == 0){
                $workhours['projects']  = Workhours::where('project_id', '>', 0 )->get(); 
            }else{
                $workhours['projects']  = Workhours::where('project_id', '=', $selectProject )->get();
            }

            $total_no_of_hours=0;
            $total_cost_spent=0;   
   
           foreach ($workhours['projects'] as $workhour) {
               
               $total_no_of_hours += $workhour->no_of_hours;
               $total_cost_spent += $workhour->no_of_hours * $workhour->hourly_rate;

           }
            
        }   
        
      
        $projects->selectProject = $selectProject;

        //print_r($projects->pluck('project_price'));

       // echo $total_cost_spent;
       // exit();

        $chart = Charts::multi('bar', 'highcharts')

                  ->title("my project chart")

                  ->elementLabel('Total')

                  ->dimensions(0, 300) 

                  ->responsive(true)

                  ->labels($projects->pluck('project_name'))
                  ->dataset('Project Cost', $projects->pluck('project_price'))
                  ->dataset('Project Expense Price',  $workhours[projects]->pluck('project_price'));  

        

                          
        return view('home', compact('projects'), compact('chart'));
        

    }
    
  
}