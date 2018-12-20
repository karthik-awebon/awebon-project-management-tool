<div class="card-title">
        <h4>Projects:</h4>
      </div>
      <div class="row">
        <div class="col-md-12">
            <div>  
              <h5>Project Name: {{ $project['project_name'] }} </h5>
            </div>  
            <div>
              {{-- <h5>Project Price: {{ $project['project_price'] }} </h5> --}}
            </div>
            <div>  
              <h5>No Of hours: {{ $total_no_of_hours }} </h5>
            </div>  
            <div>
                <h5>Project Spent price: {{ $total_cost_spent }} </h5>
            </div>   
            <div>
                <h5>Project Start Date: <?php $date = $project['start_date']; $date = date('d-M-Y', strtotime($date));
                  echo $date; ?>  </h5>
            </div>
            <div>
                <h5>Project End Date: <?php $date = $project['ETA']; $date = date('d-M-Y', strtotime($date));
                  echo $date; ?> </h5>
            </div>                    
        </div> 
      </div>  
            
      <div class="row">    
             <table class="table">
                <thead class=" text-primary">
                  <th>Workhours Date</th>
                  <th>No Of Hours</th>
                  <th>Hourly Rate</th>
                  <th>Resource Name</th>
                  {{-- <th>Project Name</th> --}}
                </thead>
                <tbody>
                  @foreach ($workhours as $workhour)
                
                  <tr>
                    <td><?php $date = $workhour['date']; $date = date('d-M-Y', strtotime($date));
                      echo $date; ?></td>
                    <td>{{ $workhour['no_of_hours']}}</td>
                    <td>{{ $workhour['hourly_rate'] }}</td>
                    {{-- <td>{{ $workhour['project']['project_name'] }}</td> --}}
                    <td>{{ $workhour['resource']['resource_name'] }}</td>
                  </tr>
                  @endforeach 

                </tbody>
              </table>
      </div>  