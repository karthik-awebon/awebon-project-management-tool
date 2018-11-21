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
            <form action="{{ route('update-resource') }}" method="POST">
            {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-6">
                    <div class="form-group">
                        <label class="bmd-label-floating">Resource Name</label>

                        <input type="hidden" name="id" value="{{ ($resource['id']) }}">

                        <input type="text" name="resource_name" value="{{ $resource['resource_name'] }}" class="form-control">

                    </div>
                    </div>
                </div>   
                <div class="row">
                        <div class="col-md-6">
                        <div class="form-group">
                            <label class="bmd-label-floating">Hourly Rate</label>
                            <input type="text" name="hourly_rate" value="{{ $resource['hourly_rate'] }}" class="form-control">
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

  

