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
                            <div class="panel-heading">Chart Demo</div>

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

                       <!-- <select onchange="this.form.submit()" name="selectname"  class="select-text" required>
                          <option  value="" 
                          <?php // if ($projects->project == '') echo ' selected="selected"'; ?>
                          disabled selected></option>
                          <option name="January" 
                            <?php // if ($projects->project == '01') echo ' selected="selected"'; ?>
                          value="01">January</option>
                          <option name="February" 
                          <?php //if ($projects->project == '02') echo ' selected="selected"'; ?>
                          value="02">February</option>
                          <option name="March" 
                          <?php //if ($projects->project == '03') echo ' selected="selected"'; ?>
                          value="03">March</option>
                          <option name="April" 
                          <?php //if ($projects->project == '04') echo ' selected="selected"'; ?>
                          value="04">April</option>
                          <option name="May" 
                          <?php //if ($projects->project == '05') echo ' selected="selected"'; ?>
                          value="05">May</option>
                          <option name="June" 
                          <?php //if ($projects->project == '06') echo ' selected="selected"'; ?>
                          value="06">June</option>
                          <option name="July" 
                          <?php //if ($projects->project == '07') echo ' selected="selected"'; ?>
                          value="07">July</option>
                          <option name="August"
                          <?php //if ($projects->project == '08') echo ' selected="selected"'; ?>
                          value="08">August</option>
                          <option name="September"
                          <?php //if ($projects->project == '09') echo ' selected="selected"'; ?>
                          value="09">September</option>
                          <option name="October" 
                          <?php //if ($projects->project == '10') echo ' selected="selected"'; ?>
                          value="10">October</option>
                          <option name="November" 
                          <?php //if ($projects->project == '11') echo ' selected="selected"'; ?>
                          value="11">November</option>
                          <option name="December"
                          <?php //if ($projects->project == '12') echo ' selected="selected"'; ?>
                          value="12">December</option>
                        </select> -->

                        <span class="select-highlight"></span>
                        <span class="select-bar"></span>
                        <label class="select-label">Select</label>
                      </div>

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
              <hr>
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

  

