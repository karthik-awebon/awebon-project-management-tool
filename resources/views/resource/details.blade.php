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
                <h4>Rsource:</h4>
              </div>
              <div class="row">
                <div class="col-md-12">
                    <div>  
                      <h5>Resource Name: {{ $resource['resource_name'] }} </h5>
                    </div>  
                    <div>  
                      <h5>No Of hours:  </h5>
                    </div>  
                    <div>
                        <h5>Resource Spent price:  </h5>
                    </div>                       
                </div> 
              </div>  
                    
              <div class="row">    
                     <table class="table">
                        <thead class=" text-primary">
                          <th>No Of Hours</th>
                          <th>Hourly Rate</th>
                          <th>Resource Name</th>
                        </thead>
                        <tbody>

                          @foreach ($workhours as $workhour)
                        
                          <tr>
                            <td>{{ $workhour['no_of_hours']}}</td>
                            <td>{{ $workhour['hourly_rate'] }}</td>
                            <td>{{ $workhour['resource']['resource_name'] }}</td>
                          </tr>
                          @endforeach 

                          


                         
                        </tbody>
                      </table>
                    </div>  
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{('details-resource')}}" method="POST">
                            {{ csrf_field() }}
                                <div class="select selectboxgraph">
            
                                    <select onchange="this.form.submit()" name="monthselect"  class="select-text" required>
                                        <option  value="" disabled selected></option>
                                        <option name="January" value="01">January</option>
                                        <option name="February" value="02">February</option>
                                        <option name="March" value="03">March</option>
                                        <option name="April" value="04">April</option>
                                        <option name="May" value="05">May</option>
                                        <option name="June" value="06">June</option>
                                        <option name="July" value="07">July</option>
                                        <option name="August" value="08">August</option>
                                        <option name="September" value="09">September</option>
                                        <option name="October" value="10">October</option>
                                        <option name="November" value="11">November</option>
                                        <option name="December" value="12">December</option>
                                    </select>
            
                                    <span class="select-highlight"></span>
                                    <span class="select-bar"></span>
                                    <label class="select-label">Select</label>
                                </div>
                            <!--Select with pure css-->
                        </form>  
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
            </form>    
        </div>
      </div>
      
    </div>
  </div>
@endsection 

  

