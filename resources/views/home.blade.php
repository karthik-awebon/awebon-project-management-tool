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
                          <?php
                            ['MONTHNAME']
                          ?>
                        </select>
                        <span class="select-highlight"></span>
                        <span class="select-bar"></span>
                        <label class="select-label">Select</label>
                      </div>
              <!--Select with pure css-->
               
                  
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

  

