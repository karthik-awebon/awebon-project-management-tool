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
                  <div class="ct-chart" id="websiteViewsChart"></div>
                </div>
                <div class="card-body">
               
              <!--Select with pure css-->
                    <div class="select selectboxgraph">
                        <select class="select-text" required>
                          <option value="" disabled selected></option>
                          <option value="1">January </option>
                          <option value="2">February</option>
                          <option value="3">March</option>
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
   
@endsection 

  

