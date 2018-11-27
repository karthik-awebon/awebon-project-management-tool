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
            <h4 class="card-title">New Projects</h4>
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
            <form action={{ route('store-projects') }} method="POST">
            {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-6">
                    <div class="form-group">
                        <label class="bmd-label-floating">Project Name</label>
                        <input type="text" name="project_name" class="form-control">
                    </div>
                    </div>
                </div>   
                <div class="row">
                    <div class="col-md-6">
                    <div class="form-group">
                        <label class="bmd-label-floating">Project Price (USD)</label>
                        <input type="number" name="project_price" class="form-control">
                    </div>
                    </div>
                </div> 
                <div>
                <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="datepicker" class="bmd-label-floating focus">Start Date</label>
                                <input id="datepicker" name="start_date" class="form-control focus" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="bmd-label-floating">ETA</label>
                                <input id="datepickers" name="ETA" class="form-control" />
                            </div>
                        </div>
                    </div> 
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                    <div class="form-group">
                        <input type="submit" name="submit" value="submit" class="btn btn-primary">
                    </div>
                    </div>
                </div>   
            </form>    
        </div>
      </div>
      
    </div>
  </div>
    <script>
        $('#datepickers').datepicker({
            modal: true,
            close: function (e) {
                $('.focus' ).focus();
            },
            minDate: function() {
                var date = new Date();
                date.setDate(date.getDate());
                return new Date(date.getFullYear(), date.getMonth(), date.getDate());
            },
            format: 'yyyy-mm-dd'  
        });
    
       
    </script> 

    <script>
        
         $('#datepicker').datepicker({
            modal: true,
            close: function (e) {
                $('.focus' ).focus();
            },
            maxDate: function() {
                var date = new Date();
                date.setDate(date.getDate());
                return new Date(date.getFullYear(), date.getMonth(), date.getDate());
            },
            format: 'yyyy-mm-dd'  
        });
        
    </script> 
@endsection 

  

