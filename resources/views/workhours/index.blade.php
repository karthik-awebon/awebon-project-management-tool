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
                        <th>Action</th>    
                    </thead>
                      <tbody>

                      @foreach($workhours as $workhour)
                        <tr>
                          <td>{{ $workhour['date'] }}</td>
                          <td>{{ $workhour['no_of_hours'] }}</td>
                          <td>{{ $workhour['hourly_rate'] }}</td>
                          <td>{{ $workhour['project']['project_name'] }}</td>
                          
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
                    <div class="col-md-12 justify-content-center">
                      <div class="justify-content-center">
                        {{ $workhours->links() }} 
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

  

