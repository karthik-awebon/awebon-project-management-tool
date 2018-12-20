<div class="card-header card-header-primary">
    <h4 class="card-title ">Work Hours</h4>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table">
        <thead class=" text-primary">
          <th >@sortablelink('date')</th>
          <th>No Of Hours</th>
          <th>Hourly Rate</th>
          <th>Project Name</th>
          <th>Resource Name</th>
          {{-- <th>Note</th> --}}
          <th>Action</th>    
      </thead>
        <tbody>
     @if($workhours->count())    
        @foreach($workhours as $workhour)
            <tr>
            <td>
              <?php $date = $workhour['date']; $date = date('d-M-Y', strtotime($date));
              echo $date;?>
            </td>
            <td>{{ $workhour['no_of_hours'] }}</td>
            <td>{{ $workhour['hourly_rate'] }}</td>
            <td>{{ $workhour['project']['project_name'] }}</td>
            <td>{{ $workhour['resource']['resource_name'] }}</td>
            {{-- <td>{{ $workhour['note'] }}</td> --}}
            <td>
             <a href="workhours/{{$workhour['id']}}"><i class="material-icons">edit</i></a>
             <a href="delete-workhours/{{$workhour['id']}}"><i class="material-icons">delete</i></a>
            </td>
           
          </tr>
          @endforeach   
      @endif           
        </tbody>
      </table>
    </div>