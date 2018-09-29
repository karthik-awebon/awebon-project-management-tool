@extends('layouts.app')

@section('content')
<div class="wrapper ">
      
      @include('sidebar')

    <div class="main-panel">
      <!-- Navbar -->
     
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
        <div class="card">
        <div class="card-header card-header-primary">
            <h4 class="card-title">New Work Hours</h4>
        </div>
        <div class="card-body">
        <div class="col-md-12">
          @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
          @endif
        </div>
            <form action="{{ ('store-workhours') }}" method="POST">
            @csrf
                <div class="row">
                    <div class="col-md-6">
                    <div class="form-group">
                        <label class="bmd-label-floating">Date</label>
                        <!-- <input type="date" name="date" class="form-control"> -->
                        <input id="datepicker" name="date" class="form-control" />

                    </div>
                    </div>
                </div> 
                <div class="row">
                    <div class="col-md-6">
                    <div class="form-group">
                        <label class="bmd-label-floating">No Of Hours</label>
                        <input type="number" name="no_of_hours" class="form-control">
                    </div>
                    </div>
                </div>  

                     
                <div class="row">
                    <div class="col-md-6">
                    <div class="form-group">
                        <label class="bmd-label-floating">Hourly Rate</label>
                        <input type="number" name="hourly_rate" class="form-control">
                    </div>
                    </div>
                </div>   
                <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <select class="select-text" name="project_id" required>
                              <option value="" disabled selected></option>
                              
                              @foreach ($projects as $project)

                              <option value="{{ $project['id'] }}">
                                  {{ $project['project_name'] }}
                              </option>

                              @endforeach 

                            </select>
                            <span class="select-highlight"></span>
                            <span class="select-bar"></span>
                            <label class="select-label">Project Name</label>     
                      </div>
                    </div>
                </div>  
               
                <div class="row">
                    <div class="col-md-6">
                    <div class="form-group">
                        <input type="submit" value="submit" name="submit" class="btn btn-success">
                    </div>
                    </div>
                </div>   
            </form>    
        </div>
      </div>
    </div>
  </div>
    <script>
        /* $('#datepicker').datepicker({  }); */
        var today, datepicker;
            today = new Date(new Date().getFullYear(), new Date().getMonth(), new Date().getDate());
            datepicker = $('#datepicker').datepicker({
                format: 'yyyy-mm-dd',   
                maxDate: today
            });
        
    </script> 
@endsection 

  

