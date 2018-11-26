@extends('layouts.app')

@section('content')

<div class="col-md-10 offset-md-2">
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

<div class="wrapper ">
   
      @include('sidebar')

      
      <div class="main-panel">
      
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">

           <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Work Hours</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead class=" text-primary">
                        <th>Date</th>
                        <th>No Of Hours</th>
                        <th>Hourly Rate</th>
                        <th>Project Name</th>
                        <th>Resource Name</th>
                        <th>Note</th>
                        <th>Action</th>    
                    </thead>
                      <tbody>

                      @foreach($workhours as $workhour)
                        <tr>
                          <td>{{ $workhour['date'] }}</td>
                          <td>{{ $workhour['no_of_hours'] }}</td>
                          <td>{{ $workhour['hourly_rate'] }}</td>
                          <td>{{ $workhour['project']['project_name'] }}</td>
                          <td>{{ $workhour['resource']['resource_name'] }}</td>
                          <td>{{ $workhour['note'] }}</td>
                          <td>
                           <a href="workhours/{{$workhour['id']}}"><i class="material-icons">edit</i></a>
                           <a href="delete-workhours/{{$workhour['id']}}"><i class="material-icons">delete</i></a>
                          </td>

                        </tr>
                        @endforeach   

                      </tbody>
                    </table>
                  </div>

                  <div class="row">
                    <div class="col-md-6">
                    <form action="{{ ('workhours') }}" method="POST">
                      {{ csrf_field() }}
                        <div class="select selectboxgraph">
                            <select onchange="this.form.submit()" name="monthselect" class="select-text" required>
                                <option  value="0" >All</option>
                              @for ($i = 1; $i < 13; $i++)
                              <option value="{{$i}}" {{ ($i == $selectedMonth ) ? 'selected' : '' }}><?php 
                                
                                $dt = DateTime::createFromFormat('!m', $i);
                                echo $dt->format('F'); 

                              ?></option>
                              @endfor
                            </select> 
                              <span class="select-highlight"></span>
                              <span class="select-bar"></span>
                              <label class="select-label">Select</label>
                          </div> 
                        </div>   
                        <div class="col-md-6">
                              <div class="select selectboxgraph">
                                <select onchange="this.form.submit()" name="selectproject" class="select-text" required>
                                  <option value="">Select a Project</option>
                              <option value ="0" 
                                <?php if ( $selectProject == 0){ echo 'selected="selected"'; }?> 
                              > All</option>

                                    @foreach($projects as $project)
                                      <option value="{{ $project['id'] }}"
                                        <?php
                                            if($project['id'] == $selectProject){ echo 'selected="selected"'; }   
                                        ?> > {{$project['project_name'] }} </option>
                                    @endforeach  

                                  </select> 

                                    <span class="select-highlight"></span>
                                    <span class="select-bar"></span>
                                    <label class="select-label">Select</label>
                                </div>
                        </form>  
                        </div>  
                    </div>  

                  <div class="row">
                      <div class="col-md-6 ">
                          <div class=" pagination">
                              <?php 
                          
                                echo $workhours->appends(['monthselect' => $selectedMonth, 'selectproject' => $selectProject])->render(); 
                              
                              ?>
                          </div>
                      </div>
                  </div> 
                </div>
              </div>
            </div>
          </div>
      </div>
     
    </div>
  </div>
@endsection 

  

