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
            <h4 class="card-title">Read Projects</h4>
        </div>
        <div class="card-body">
          <div id="typography">
            <div class="card-title">
              <h2>Projects</h2>
            </div>
            <div class="row">
              <div class="col-md-12">
              <div class="row">
                <div class="col-md-3"><h3>Project Name: {{ $project['project_name'] }} </h3></div>
                
                <div class="col-md-3"><h3>Project_Price: {{ $project['project_price'] }} </h3></div>
              </div>  
              <div class="row">
                    <div class="col-md-12">
                    <div class="form-group">
                        <a href="/projects"><input type="submit" value="Back"  class="btn btn-primary pull-right"></a>
                    </div>
                    </div>
                </div>  
              </div>
            </div>
        </div>
            </form>    
        </div>
      </div>
      
    </div>
  </div>
@endsection 

  

