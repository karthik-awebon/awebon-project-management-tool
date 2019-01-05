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
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">

           <div class="row">
            <div class="col-md-12">
              <div class="card">
              <div>
                <div class="col-md-12" id="userworkhourindexajax">
                        
                  @include('ajax.userworkhourindexajax')      
              
                </div>
              </div>
              <div class="" >      
                 {{--  <form action="{{ ('workhours') }}" method="POST" id="formsubmit"> --}}
                      {{ csrf_field() }}
                  <div class="row" style="padding-left:20px;">
                      <div class="col-md-4">
                          <div class="form-group div">
                              <label class="bmd-label-floating">Date</label>
                      <div id="formsubmit">        
                          <input type="text" id="selectdate" name="selectdate" value="{{ $selectDate }}" 
                              class="form-control"/> 
                      </div>        
                          </div>

                      </div> 
                      <div class="col-md-4">
                        <div class="select selectboxgraph">
                            <select  id="monthselect" name="monthselect" class="select-text" required>
                                <option  value="0" >All</option>
                              @for ($i = 1; $i < 13; $i++)
                              <option value="{{$i}}" {{ ($i == $selectedMonth ) ? 'selected' : '' }}><?php 
                                
                                $dt = DateTime::createFromFormat('!m', $i);
                                echo $dt->format('F'); 

                              ?></option>
                              @endfor
                            </select> 
                              <span class="select-highlight"></span>
                              <span class="select-bar"></span>
                              <label class="select-label">Select</label>
                          </div> 
                        </div>   
                         
                        <div class="col-md-4">
                              <div class="select selectboxgraph">
                                <select id="selectproject" name="selectproject" class="select-text" required>
                                  <option value="">Select a Project</option>
                              <option value ="0" 
                                <?php if ( $selectProject == 0){ echo 'selected="selected"'; }?> 
                              > All</option>

                                    @foreach($projects as $project)
                                      <option value="{{ $project['id'] }}"
                                        <?php
                                            if($project['id'] == $selectProject){ echo 'selected="selected"'; }   
                                        ?> > {{$project['project_name'] }} </option>
                                    @endforeach  
                                  
                                  </select> 

                                    <span class="select-highlight"></span>
                                    <span class="select-bar"></span>
                                    <label class="select-label">Select</label>
                                </div>
                          </div>  

                          

                    {{--   </form> --}}
                    </div>  
                  </div>

                  <div class="row" style="padding-top:2%;">
                      <div class="col-md-6 ">
                          <div class=" pagination">
                              <?php 
                          
                                echo $workhours->appends(['monthselect' => $selectedMonth, 'selectproject' => $selectProject])->render(); 
                              
                              ?>
                          </div>
                      </div>
                  </div> 
                </div>
              </div>
            </div>
          </div>
      </div>
     
    </div>
  </div>

<script>
  
  $(document).ready(function(){
        
        $("select").change(function(){

            var monthselect = $("#monthselect").val();
            var selectproject = $("#selectproject").val();
            var selectresource = $("#selectresource").val();
            var token = $('input[name="_token"]').val();

            $.ajax({
                
                type: "POST",
                data: "monthselect=" + monthselect + "&selectproject=" + selectproject + "&selectresource=" + selectresource + "&_token=" + token,
                url: "index-userworkhours",
                success: function(dataHtml){
                    $('#userworkhourindexajax').html(dataHtml);
                }

            });
        });

    });

    $('#selectdate').datepicker({
        modal: true,
        close: function (e) {
         
          var selectdate = $("#selectdate").val();
          var token = $('input[name="_token"]').val();
          $.ajax({
                type: "POST",
                data: "selectdate=" + selectdate + "&_token=" + token,
                url: "index-userworkhours",
                success: function(dataHtml){
                    $('#userworkhourindexajax').html(dataHtml);
                }
            });

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

  

