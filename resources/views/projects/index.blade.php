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
      
      <!-- Navbar -->
     
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
           <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Projects</h4>
                </div>
                <div class="col-md-8">
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead class=" text-primary">
                        <th>Project Name</th>
                        <th>Project Price (USD)</th>
                        <th>Status</th>
                        <th>Action</th>    
                    </thead>
                      <tbody>
                        @foreach($projects as $project)
                        <tr>
                          <td><a href="details-projects/ {{ $project['id'] }}">{{ $project['project_name'] }}</a></td>
                          <td>{{ $project['project_price'] }}</td>
                          <td>{{ $project['status'] }}</td>
                          <td>
                            <a href="projects/{{$project['id']}}"><i class="material-icons">edit</i></a>
                            <a href="delete-projects/{{ $project['id'] }}"><i class="material-icons">delete</i></a></td>
                        </tr>
                        @endforeach  
                      </tbody>
                    </table>
                  </div>
                  <div class="row">
                      <div class="col-md-6 ">
                          <div class=" pagination">
                            {{ $projects->links() }} 
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

  

