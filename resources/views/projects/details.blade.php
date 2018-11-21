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
                </div> 
              </div>  
                    
              <div class="row">    
                     <table class="table">
                        <thead class=" text-primary">
                          <th>Workhours Date</th>
                          <th>Project Start Date</th>
                          <th>Project End Date</th>
                          <th>No Of Hours</th>
                          <th>Hourly Rate</th>
                          
                          {{-- <th>Project Name</th> --}}
                        </thead>
                        <tbody>
                          @foreach ($workhours as $workhour)
                        
                          <tr>
                            <td>{{ $workhour['date']}}</td>
                            <td> <?php $odate = $workhour['project']['start_date']; $newDate = date("d-m-Y", strtotime($odate));
                              echo $newDate."\n"; ?> </td>
                            <td><?php $odate = $workhour['project']['ETA']; $newDate = date("d-m-Y", strtotime($odate));
                              echo $newDate."\n"; ?></td>
                            <td>{{ $workhour['no_of_hours']}}</td>
                            <td>{{ $workhour['hourly_rate'] }}</td>
                            {{-- <td>{{ $workhour['project']['project_name'] }}</td> --}}
                          </tr>
                          @endforeach 

                        </tbody>
                      </table>
                    </div>  
                <div class="row">
                    <div class="col-md-6 ">
                        <div class=" pagination">
                              {{ $workhours->links() }}
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
            </form>    
        </div>
      </div>
    </div>
  </div>
@endsection 

  

