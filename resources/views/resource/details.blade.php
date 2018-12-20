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
              <h4 class="card-title">Read Resource</h4>
          </div>
        <div class="card-body">
          <div id="typography">
              <div class="col-md-12" id="resourcedetailsajax">
                        
                  @include('ajax.resourcedetailsajax')      
              
              </div>
                <div class="row">
                    <div class="col-md-6">
                      {{--   <form action="{{ route('details-resource', ['id' => $resource['id']] ) }}" method="POST"> --}}
                            {{ csrf_field() }}
                                <div class="select selectboxgraph">
                                  <select  id="monthselect" name="monthselect" class="select-text" required>
                                    <option  value="0" >All</option>
                                  @for ($i = 1; $i < 13; $i++)
                                  <option value="{{$i}}" {{ ($i == $selectedMonth) ? 'selected' : '' }}><?php 

                                    $dt = DateTime::createFromFormat('!m', $i);
                                    echo $dt->format('F'); 
                                  
                                  ?></option>
                                  @endfor
                                  </select> 
                                    <span class="select-highlight"></span>
                                    <span class="select-bar"></span>
                                    <label class="select-label">Select</label>
                                </div>
                            <!--Select with pure css-->
                    </div>   
                    <div class="col-md-6">
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
                            <!--Select with pure css-->
                      {{--   </form>  --}} 
                    </div>  
                    </div>  
                  </div>  
                    <div class="col-md-6">
                    <div class="form-group">
                        <a href="../index-resource"><input type="submit" value="Back"  class="btn btn-primary pull-right"></a>
                    </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6 ">
                        <div class=" pagination">
                          <?php 
                            echo $workhours->appends(['monthselect' => $selectedMonth, 'selectproject' => $selectProject])->render(); 
                          ?>
                        </div>
                      </ul>
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
  <script type="text/javascript">
    $(document).ready(function(){
        
        $("select").change(function(){

            var monthselect = $("#monthselect").val();
            var selectproject = $("#selectproject").val();
            var token = $('input[name="_token"]').val();

            $.ajax({
                
                type: "POST",
                data: "monthselect=" + monthselect + "&selectproject=" + selectproject + "&_token=" + token,
                url: "{{ route('details-resource', ['id' => $resource['id']] ) }}",
                success: function(dataHtml){
                    $('#resourcedetailsajax').html(dataHtml);
                }

            });
        });

    });
  </script> 

@endsection 



  

