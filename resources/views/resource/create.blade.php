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
            <h4 class="card-title">New Resource</h4>
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
            <form action={{ route('store-resource') }} method="POST">
            {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="bmd-label-floating">Resource Name</label>
                        <input type="text" name="resource_name" value="{{old('resource_name')}}" class="form-control">
                        </div>
                    </div>
                </div> 
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="bmd-label-floating">Email</label>
                            <input type="text" name="email" value="{{ old('email') }}" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="bmd-label-floating">Hourly Rate</label>
                            <input type="text" name="hourly_rate" value="{{ old('hourly_rate') }}" class="form-control">
                        </div>
                    </div>
                </div> 
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="bmd-label-floating">Password</label>
                            <input type="password" name="password" value="{{ old('password') }}" class="form-control">
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
    
@endsection 

  

