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
              <form onchange="this.form.submit()">
                    <div class="select selectboxgraph">

                        <select name="selectname"  class="select-text" required>
                          <option  value="" disabled selected></option>
                          <option name="January" value="01">January</option>
                          <option name="February" value="02">February</option>
                          <option name="March" value="03">March</option>
                          <option name="April" value="04">April</option>
                          <option name="May" value="05">May</option>
                          <option name="June" value="06">June</option>
                          <option name="July" value="07">July</option>
                          <option name="August" value="08">August</option>
                          <option name="September" value="09">September</option>
                          <option name="October" value="10">October</option>
                          <option name="November" value="11">November</option>
                          <option name="December" value="12">December</option>
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

  

