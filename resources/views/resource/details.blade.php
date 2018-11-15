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
              <h4 class="card-title">Read Resource</h4>
          </div>
        <div class="card-body">
          <div id="typography">
              <div class="card-title">
                <h4>Resource: - type</h4>
              </div>
              <div class="row">
                <div class="col-md-12">
                    <div>  
                      <h5>Resource Name: {{ $resource['resource_name'] }} </h5>
                    </div>  
                       <div>  
                      <h5>No Of hours: {{ $total_no_of_hours }} </h5>
                    </div>  
                    <div>
                        <h5>Project Spent price: {{ $total_cost_spent }} </h5>
                    </div>  
                    <div>
                       {{--  <h5>Resource No of hours: {{ $resource_total_no_of_hours }} </h5> --}}
                    </div>                             
                </div> 
              </div>  
                    
              <div class="row">    
                     <table class="table">
                        <thead class=" text-primary">
                            <th>Workhours Date</th>
                          <th>No Of Hours</th>
                          <th>Hourly Rate</th>
                          <th>Project Name</th>
                        </thead>
                        <tbody>

                          @foreach ($workhours as $workhour)
                        
                          <tr>
                            <td>{{ $workhour['date']}}</td>
                            <td>{{ $workhour['no_of_hours']}}</td>
                            <td>{{ $workhour['hourly_rate'] }}</td>
                            <td>{{ $workhour['project']['project_name'] }}</td>
                            {{-- <td>{{ $workhour['resource']['resource_name'] }}</td> --}}
                          </tr>
                          @endforeach 

                         
                        </tbody>
                      </table>
                    </div>  
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{ route('details-resource', ['id' => $resource['id']]) }}" method="POST">
                            {{ csrf_field() }}
                                <div class="select selectboxgraph">
                                  <select onchange="this.form.submit()" name="monthselect" class="select-text" required>
                                    <option  value="0" >All</option>
                                  @for ($i = 1; $i < 13; $i++)
                                  <option value="{{$i}}" {{ ($i == $selectedMonth) ? 'selected' : '' }}><?php 

                                    $dt = DateTime::createFromFormat('!m', $i);
                                    echo $dt->format('F'); 
                                  
                                  ?></option>
                                  @endfor
                                  </select> 
                                    <span class="select-highlight"></span>
                                    <span class="select-bar"></span>
                                    <label class="select-label">Select</label>
                                </div>
                            <!--Select with pure css-->
                        </form>  
                    </div>
                    <div class="col-md-6">
                        <form action="{{ route('details-resource', ['id' => $resource['id']]) }}" method="POST">
                            {{ csrf_field() }}
                                <div class="select selectboxgraph">
                                  <select onchange="this.form.submit()" name="selectproject" class="select-text" required>

                                   
                                        <option value= "0" 
      
                                        <?php
                                          foreach($workhours as $workhour){
                                            if ($workhour['id'] = 0){echo ' selected="selected"';}   
                                          }
                                        ?>
                                    
                                    
                                    > All</option>
                                    
                                    @foreach($projects as $project)
                                      <option value="{{ $project['id'] }}"
                                        <?php
                                          foreach($workhours as $workhour){
                                            if ($project['id'] == $workhour['project_id']){echo ' selected="selected"';}   
                                          }
                                        ?>> {{$project['project_name'] }} </option>

                                    @endforeach  

                                  </select> 

                                    <span class="select-highlight"></span>
                                    <span class="select-bar"></span>
                                    <label class="select-label">Select</label>
                                </div>
                            <!--Select with pure css-->
                        </form>  
                    </div>  
                    <div class="col-md-6">
                    <div class="form-group">
                        <a href="../index-resource"><input type="submit" value="Back"  class="btn btn-primary pull-right"></a>
                    </div>
                    </div>
                </div>  
              </div>
            </div>
        </div>
            </form>    
        </div>
      </div>
      
    </div>
  </div>
@endsection 

  

