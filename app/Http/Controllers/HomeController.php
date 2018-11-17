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
        

        $projects = Projects::whereMonth('start_date', 'selectname')->get();
        $selectedMonth = date('m');
        if(isset($request->selectname)){
            $selectedMonth = $request->selectname;
        }

        $projects = Projects::whereMonth('start_date', $selectedMonth)->get(); 
        $projects->project =  $selectedMonth;

        $total_no_of_hours=0;
        $total_cost_spent=0; 
        
        foreach ($projects as $project){
            
            $workhours  = Workhours::where('project_id', '=', $project->id )->get();
          
            $total_no_of_hours=0;
            $total_cost_spent=0;   
   
           foreach ($workhours as $workhour) {
               $total_no_of_hours += $workhour->no_of_hours;
               $total_cost_spent += $workhour->no_of_hours * $workhour->hourly_rate;
           }
           
        }   
     

        
        $chart = Charts::multi('bar', 'highcharts')

                  ->title("my project chart")

                  ->elementLabel('Total')

                  ->dimensions(0, 300) 

                  ->responsive(true)

                  ->labels($projects->pluck('project_name'))
                  ->dataset('project_name', $projects->pluck('project_name'))
                  ->dataset('Project Expense Price', [$total_cost_spent]);
                
                          
        return view('home',compact('projects'), compact('chart') );
        

    }
    
  
}
