@extends('layouts.app')

@section('content')
<div class="wrapper ">
      
      @include('usersidebar')

    <div class="main-panel">
      <!-- Navbar -->
      
      <!-- End Navbar -->

      <div class="content">
            <div class="container-fluid">
               <div class="row">
                <div class="col-md-12">
                  <div class="card">
                    <div class="card-header card-header-primary">
                      <h4 class="card-title ">Work Hours</h4>
                    </div>
                    <div class="col-md-8">
                    </div>
                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="table">
                          <thead class=" text-primary">
                            <th >@sortablelink('date')</th>
                            <th>No Of Hours</th>
                            <th>Hourly Rate</th>
                            <th>Project Name</th>
                            <th>Resource Name</th>
                        </thead>
                          <tbody>
                        
                                @foreach($workhours as $workhour)
                                <tr>
                                <td>
                                  <?php $date = $workhour['date']; $date = date('d-M-Y', strtotime($date));
                                  echo $date;?>
                                </td>
                                <td>{{ $workhour['no_of_hours'] }}</td>
                                <td>{{ $workhour['hourly_rate'] }}</td>
                                <td>{{ $workhour['project']['project_name'] }}</td>
                                <td>{{ $workhour['resource']['resource_name'] }}</td>
                              </tr>
                              @endforeach 
                        
                          </tbody>
                        </table>
                      </div>
                      <div class="row">
                          <div class="col-md-6 ">
                              <div class=" pagination">
                                {{-- {{ $workhours->links() }}  --}}
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

  

