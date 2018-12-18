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
                    <div class="col-md-12" id="homeajax">
                        
                            @include('ajax.homeajax')      
                        
                    </div>
                </div>
                </div>
                <div class="card-body">
              <!--Select with pure css-->
            
                {{ csrf_field() }}
                      <div class="select selectboxgraph">
                          <select id="selectproject" class="select-text" required>
                              <option value="0">All </option>  
                            
                              @foreach($projects as $project)
      
                                <option value="{{ $project->id }}" 
                                <?php 
                                    if($project->id == $projects->selectProject ){ echo 'selected="selected"'; } 
                                ?> >
                                    {{ $project->project_name }}
                                </option>    
      
                              @endforeach
                            
                                
                          </select>  
                          <span class="select-highlight"></span>
                          <span class="select-bar"></span>
                          <label class="select-label">Select</label>

                      </div>

                <!--Select with pure css-->
              
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

    <script type="text/javascript">
      $(document).ready(function(){
          
          $("select").change(function(){
  
            console.log('raj');
              
              var selectproject = $("#selectproject").val();
              var token = $('input[name="_token"]').val();
  
              $.ajax({
                  
                  type: "POST",
                  data: "selectproject=" + selectproject + "&_token=" + token,
                  url: "home",
                  success: function(dataHtml){
                      $('#homeajax').html(dataHtml);
                  }
  
              });
          });
  
      });
  </script>
   
@endsection 


  

