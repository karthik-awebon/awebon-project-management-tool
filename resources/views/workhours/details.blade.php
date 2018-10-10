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
              <h4 class="card-title">Material Dashboard Heading</h4>
              <p class="card-category">Created using Roboto Font Family</p>
            </div>
            <div class="card-body">
              <div id="typography">
                <div class="card-title">
                  <h2>Projects</h2>
                </div>
                <div class="row">
                  <div class="tim-typo">
                    <h2>
                      <span class="tim-note">Workhours 1</span> <span>date</span> <span>no of hours</span> <span>hourly rate</span> <span>project_name</span>
                    </h2>
                  </div>
                </div>
                <div class="row">
                  <div class="tim-typo">
                    <h2>
                    <span class="tim-note">Workhours 1</span> <span>date</span> <span>no of hours</span> <span>hourly rate</span> <span>project_name</span>
                    </h2>
                  </div>
                </div>
              </div>
            </div>
          </div>
      </div>
     
    </div>
  </div>
@endsection 

  

