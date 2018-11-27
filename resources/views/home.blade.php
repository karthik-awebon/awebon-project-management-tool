@extends('layouts.app')

@section('content')
<div class="wrapper ">
      
      @include('sidebar')

    <div class="main-panel">
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card card-chart">
                <div class="card-header card-header-warning">
                 <!--  <div class="ct-chart" id="websiteViewsChart"></div> -->
                 <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">My Projet Charts</div>

                            <div class="panel-body">
                                {!! $chart->html() !!}
                                
                            </div>
                        </div>
                    </div>
                </div>
                </div>
                <div class="card-body">
              <!--Select with pure css-->
              <form action="{{ route('home') }}" method="POST">
                {{ csrf_field() }}
                      <div class="select selectboxgraph">
                          <select onchange="this.form.submit()" name="selectproject"  class="select-text" required>
                              <option value="0">All </option>  
                            
                              @foreach($projects as $project)
      
                                <option value="{{ $project->id }}" 
                                <?php 
                                    if($project->id == $projects->selectProject ){ echo 'selected="selected"'; } 
                                ?>>
                                    {{ $project->project_name }}
                                </option>    
      
                              @endforeach
                            
                                
                          </select>  
                          <span class="select-highlight"></span>
                          <span class="select-bar"></span>
                          <label class="select-label">Select</label>

                      </div>

                <!--Select with pure css-->
              </form>         
              <div class="row">
                    <div class="col-md-7">
                        <p id="demo"></p>
                    </div>
              </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>  
    {!! Charts::scripts() !!}
    {!! $chart->script() !!}

   
@endsection 

  

