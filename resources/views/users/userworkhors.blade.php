@extends('layouts.user')

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
      
    @include('usersidebar')

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
            <form action="{{ ('store-userworkhours') }}" method="POST">
            {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-6">
                    <div class="form-group div">
                        <label class="bmd-label-floating">Date</label>
                        <!-- <input type="date" name="date" class="form-control"> -->
                        <input type="text" name="date" id="datepicker" value="<?php echo date('d M Y'); ?>" class="form-control"/>
                    </div>
                    </div>
                </div> 
                <div class="row">
                    <div class="col-md-6">
                    <div class="form-group">
                        <label class="bmd-label-floating">No Of Hours</label>
                        <input type="text" name="no_of_hours" value="{{ old('no_of_hours') }}" class="form-control">
                    </div>
                    </div>
                </div>  

                <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <select class="select-text" name="project_id"  required>
                              <option value="" disabled selected></option>
                              
                              @foreach ($projects as $project)

                              <option value="{{ $project['id'] }} " 
                              @if( old('project_id')  == $project['id']) selected="selected" @endif>
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
                            <label class="bmd-label-floating">Note</label>
                            <textarea type="text" name="note" class="form-control"></textarea>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                    <div class="form-group">
                        <input type="submit" value="submit" name="submit" class="btn btn-primary">
                    </div>
                    </div>
                </div>   
            </form>    
        </div>
      </div>
    </div>
  </div>

<script>
    $('#datepicker').datepicker({
        modal: true,
        select: function (e) {
            e.target.focus();
        },
        maxDate: function() {
            var date = new Date();
            date.setDate(date.getDate());
            return new Date(date.getFullYear(), date.getMonth(), date.getDate());
        },
        format: 'dd mmm yyyy'  
    });
</script> 
@endsection