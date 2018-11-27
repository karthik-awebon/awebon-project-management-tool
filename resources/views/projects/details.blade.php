@extends('layouts.app')

@section('content')
<div class="wrapper ">
      
      @include('sidebar')

    <div class="main-panel">
      <div class="col-md-12">
        @foreach (['danger', 'warning', 'success', 'info'] as $msg)
          @if(Session::has('alert-' . $msg))
            <div class="row">
              <div class="col-md-6">
                <div id="errorAlert">
                  <p class="alert alert-{{ $msg }}"> {{ Session::get('alert-' .$msg) }}<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</p>
                </div>
              </div>
            </div>
          @endif  
        @endforeach
      </div>  
      <!-- Navbar -->
     
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
        <div class="card">
          <div class="card-header card-header-primary">
              <h4 class="card-title">Read Projects</h4>
          </div>
        <div class="card-body">
          <div id="typography">
              <div class="card-title">
                <h4>Projects:</h4>
              </div>
              <div class="row">
                <div class="col-md-12">
                    <div>  
                      <h5>Project Name: {{ $project['project_name'] }} </h5>
                    </div>  
                    <div>
                      {{-- <h5>Project Price: {{ $project['project_price'] }} </h5> --}}
                    </div>
                    <div>  
                      <h5>No Of hours: {{ $total_no_of_hours }} </h5>
                    </div>  
                    <div>
                        <h5>Project Spent price: {{ $total_cost_spent }} </h5>
                    </div>   
                    <div>
                        <h5>Project Start Date: <?php $date = $project['start_date']; $date = date('d-M-Y', strtotime($date));
                          echo $date; ?>  </h5>
                    </div>
                    <div>
                        <h5>Project End Date: <?php $date = $project['ETA']; $date = date('d-M-Y', strtotime($date));
                          echo $date; ?> </h5>
                    </div>                    
                </div> 
              </div>  
                    
              <div class="row">    
                     <table class="table">
                        <thead class=" text-primary">
                          <th>Workhours Date</th>
                          <th>No Of Hours</th>
                          <th>Hourly Rate</th>
                          <th>Resource Name</th>
                          {{-- <th>Project Name</th> --}}
                        </thead>
                        <tbody>
                          @foreach ($workhours as $workhour)
                        
                          <tr>
                            <td><?php $date = $workhour['date']; $date = date('d-M-Y', strtotime($date));
                              echo $date; ?></td>
                            <td>{{ $workhour['no_of_hours']}}</td>
                            <td>{{ $workhour['hourly_rate'] }}</td>
                            {{-- <td>{{ $workhour['project']['project_name'] }}</td> --}}
                            <td>{{ $workhour['resource']['resource_name'] }}</td>
                          </tr>
                          @endforeach 

                        </tbody>
                      </table>
                    </div>  

                   <div class="row">
                   <form action="{{ route('details-projects', ['id' => $project['id']] )  }}" method="POST">
                      <div class="col-md-6">
                          {{ csrf_field() }}
                              <div class="select selectboxgraph">
                                <select onchange="this.form.submit()" name="selectresource" class="select-text" required>
                                <option value ="0"   
                                    <?php if ( $selectResource == 0){ echo 'selected="selected"'; }?> 
                                > All</option>
                                @foreach($resource as $resource)    

                                  <option value="{{ $resource['id'] }}" 
                                    <?php if($resource['id'] == $selectResource){ echo 'selected="selected"'; } ?> 
                                  > {{ $resource['resource_name'] }} </option>

                                @endforeach
                                </select> 
                                  <span class="select-highlight"></span>
                                  <span class="select-bar"></span>
                                  <label class="select-label">Select</label>
                              </div>
                          <!--Select with pure css-->
                      </div>  
                  </div>
                    
                    <div class="row" style = "padding-top: 2%;">
                        <div class="col-md-6 ">
                            <div class=" pagination">
                                <?php 
                                  echo $workhours->appends(['selectresource' => $selectResource])->render(); 
                                ?>
                              </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                            <a href="../projects"><input type="submit" value="Back"  class="btn btn-primary pull-right"></a>
                        </div>
                        </div>
                    </div> 
                </div>
            </div>  
          </div>
      </div>
    </div>
@endsection 

  

