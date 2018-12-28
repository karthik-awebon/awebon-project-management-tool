<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

use Charts;

use App\Projects;

use App\Workhours;

use Illuminate\Support\Facades\Auth;


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

        $price = [];

        $name = [];



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

                    $projectPrice = $project['project_price'];
                    $projectName = $project['project_name'];

                    $price [] = $projectPrice;

                    $name [] = $projectName;
                  
            }
            
         /*    echo $projectPrice;
           
            exit(); */

            
            $projects->selectProject = $selectProject;

            $chart = Charts::multi('bar', 'highcharts')

                  ->title("My project chart")

                  ->elementLabel('Total')

                  ->dimensions(0, 300) 

                  ->responsive(true)

                  ->labels($name)
                  ->dataset('Project Cost', $price)
                  ->dataset('Project Expense Price',  $variable);  

           
            
            $user = Auth::user();

       /*  if($user['role_id'] == 1){ */

            if($request->ajax()){

                return view('ajax.homeajax', compact('projects'), compact('chart'));
                
            }else{

                return view('home', compact('projects'), compact('chart'));
                
            }     


      /*   }elseif($user['role_id'] == 2){

            return redirect('create-userworkhours');
        }   
                */ 
    }




    
  
}
