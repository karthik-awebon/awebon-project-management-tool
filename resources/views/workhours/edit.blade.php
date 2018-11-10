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
            <h4 class="card-title">Edit Projects</h4>
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
        <form action="{{ route('update-workhours') }}" method="POST">
        {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                          <label class="bmd-label-floating">Date</label>

                          <input type="hidden" name="id" value="{{ $workhour['id'] }}" >
                          
                          <input id="datepicker" name="date" value="{{ $workhour['date'] }}" class="form-control">
                          <!-- <input  name="date" class="form-control" /> -->
                      </div>
                    </div>
                </div>   
                <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                          <label class="bmd-label-floating">No Of Hours</label>
                          <input type="text" name="no_of_hours" value="{{ $workhour['no_of_hours'] }}" class="form-control">
                      </div>
                    </div>
                </div>  
                <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                          <label class="bmd-label-floating">Hourly Rate</label>
                          <input type="text" name="hourly_rate" value="{{ $workhour['hourly_rate'] }}" class="form-control">
                      </div>
                    </div>
                </div>   

                 <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <select class="select-text" name="project_id">
                              <option value="" disabled selected></option>
                              
                              @foreach ($projects as $project)

                              <option value="{{ $project['id'] }}" 
                              {{ $workhour['project_id'] == $project['id']? 'selected' : '' }}>
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
                        <select class="select-text" name="resource_id">
                                <option value="" disabled selected></option>
                                
                                @foreach($resources as $resource)

                                <option value="{{ $resource['id'] }}"
                                {{ $workhour['resource_id'] == $resource['id']? 'selected' : '' }} >
                                    {{ $resource['resource_name'] }} 
                                </option>

                                @endforeach
                              
                            </select>
                            <span class="select-highlight"></span>
                            <span class="select-bar"></span>
                            <label class="select-label">Resource Name</label>     
                        </div>
                    </div>
                </div>  
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="bmd-label-floating">Note</label>
                        <textarea type="text" name="note" value="" class="form-control">{{ $workhour['note'] }}</textarea>
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

  

