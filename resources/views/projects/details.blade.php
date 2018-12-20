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

              <div class="row">
                  <div class="col-md-12" id="projectdetailsajax">
                      
                          @include('ajax.projectdetailsajax')      
                      
                  </div>
              </div>

                   <div class="row">
                   {{-- <form action="{{ route('details-projects', ['id' => $project['id']] )  }}" method="POST"> --}}
                      <div class="col-md-6">
                          {{ csrf_field() }}
                              <div class="select selectboxgraph">
                                <select id="selectresource"  name="selectresource" class="select-text" required>
                                <option value ="0"   
                                    <?php if ( $selectResource == 0){ echo 'selected="selected"'; }?> 
                                > All</option>
                                @foreach($resource as $resource)    

                                  <option value="{{ $resource['id'] }}" 
                                    <?php if($resource['id'] == $selectResource){ echo 'selected="selected"'; } ?> 
                                  > {{ $resource['resource_name'] }} </option>

                                @endforeach
                                </select> 
                                  <span class="select-highlight"></span>
                                  <span class="select-bar"></span>
                                  <label class="select-label">Select</label>
                              </div>
                          <!--Select with pure css-->
                      </div>  
                  </div>
                    
                    <div class="row" style = "padding-top: 2%;">
                        <div class="col-md-6 ">
                            <div class=" pagination">
                               <?php
                                  echo $workhours->appends(['selectresource' => $selectResource])->render(); 
                                ?>
                              </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                            <a href="../projects"><input type="submit" value="Back"  class="btn btn-primary pull-right"></a>
                        </div>
                        </div>
                    </div> 
                </div>
            </div>  
          </div>
      </div>
    </div>

    <script type="text/javascript">
      $(document).ready(function(){
          
          $("select").change(function(){
  
              var selectresource = $("#selectresource").val();
              var token = $('input[name="_token"]').val();
  
              $.ajax({
                  
                  type: "POST",
                  data: "selectresource=" + selectresource + "&_token=" + token,
                  url: '{{ route('details-projects', ['id' => $project['id']] )  }}',
                  success: function(dataHtml){
                      $('#projectdetailsajax').html(dataHtml);
                  }
  
              });
          });
  
      });
  </script>
@endsection 

  

