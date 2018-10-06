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
            <h4 class="card-title">Edit Projects</h4>
        </div>
        <div class="card-body">
        <div class="row">
            <div class="col-md-6">  
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
        </div>    
            <form action="{{ route('update-projects') }}" method="POST">
            {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-6">
                    <div class="form-group">
                        <label class="bmd-label-floating">Project Name</label>

                        <input type="hidden" name="id" value="{{ ($project['id']) }}">

                        <input type="text" name="project_name" value="{{ $project['project_name'] }}" class="form-control">
                    </div>
                    </div>
                </div>   
                <div class="row">
                    <div class="col-md-6">
                    <div class="form-group">
                        <label class="bmd-label-floating">Project Price (USD)</label>
                        <input type="text" name="project_price" value="{{ $project['project_price'] }}" class="form-control">
                    </div>
                    </div>
                </div>   
                <div class="row">
                    <div class="col-md-2">     
                        <div class="form-check">
                            <label class="form-check-label padeditproject">
                                <input type="checkbox" name="status" value="completed" class="form-check-input"> 
                                <span class="form-check-sign">
                                <span class="check"></span>
                                </span>
                            </label>
                                <span class="check">Completion</span>
                        </div>
                    </div>
                    <div class="row">
                    <div class="col-md-10">
                    <div class="form-group">
                        <label class="bmd-label-floating">Date</label>
                        <!-- <input type="date" name="completion_date" class="form-control"> -->
                        <input id="datepicker" name="completion_date" class="form-control" />

                    </div>
                    </div>
                </div> 
                </div>   
                <div class="row">
                    <div class="col-md-6">
                    <div class="form-group">
                        <input type="submit" value="Update" name="submit" class="btn btn-primary pull-right">
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

  

