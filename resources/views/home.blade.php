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
                    <div class="select selectboxgraph">
                        <select class="select-text" required>
                          <option value="" disabled selected></option>
                          <option value="01">January</option>
                          <option value="02">February</option>
                          <option value="03">March</option>
                          <option value="04">April</option>
                          <option value="05">May</option>
                          <option value="06">June</option>
                          <option value="07">July</option>
                          <option value="08">August</option>
                          <option value="09">September</option>
                          <option value="10">October</option>
                          <option value="11">November</option>
                          <option value="12">December</option>
                        </select>
                        <span class="select-highlight"></span>
                        <span class="select-bar"></span>
                        <label class="select-label">Select</label>
                      </div>
              <!--Select with pure css-->

              <?php
                  $total=0;
                  $total1=0;
                  $total2=0;
                  $total3=0;
              ?>

              <div class="row">
                    @foreach($projects as $project)
                    <div class="col-md-3">Project Name: {{ $project->project_name }}</div>
                    
                    <div class="col-md-2">Project Price: {{ $project->project_price}}</div>

                    <div class="col-md-7">
                     
                    </div>
                    @endforeach
              </div>
              <hr>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">access_time</i> campaign sent 2 days ago
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

  

