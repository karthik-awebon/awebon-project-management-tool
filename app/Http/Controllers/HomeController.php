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
        
                
        $total_no_of_hours=0;
        $total_cost_spent=0; 

        $variable = [];


        foreach ($projects as $project){

            /* echo "<pre>"; print_r($project['id']); "</pre>"; */
            
            

                if($selectProject == 0 ){

                    $workhours = Workhours::where('project_id', '=', $project['id'])->get(); 
                   
                }
                elseif( $project['id'] != $selectProject ){
                    continue;                   
                }else{
                    $workhours = Workhours::where('project_id', '=', $selectProject )->get();
                }

                         
                $total_no_of_hours=0;
                $total_cost_spent=0;   

                foreach ($workhours as $workhour) {
                    
                    $total_no_of_hours += $workhour->no_of_hours;
                    $total_cost_spent += $workhour->no_of_hours * $workhour->hourly_rate;
                    
                }
                    $variable[] = $total_cost_spent;

               
            }
            

            
            $projects->selectProject = $selectProject;

        $chart = Charts::multi('bar', 'highcharts')

                  ->title("my project chart")

                  ->elementLabel('Total')

                  ->dimensions(0, 300) 

                  ->responsive(true)

                  ->labels($projects->pluck('project_name'))
                  ->dataset('Project Cost', $projects->pluck('project_price'))
                  ->dataset('Project Expense Price',  $variable);  

                  
                          
        return view('home', compact('projects'), compact('chart'));
        

    }
    
  
}
