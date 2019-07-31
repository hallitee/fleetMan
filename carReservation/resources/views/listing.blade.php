  <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
				  <th>#</th>
                  <th>Code</th>
                  <th>Requestor</th>
                  <th>Department</th>
                  <th>Date</th>
                  <th>Time</th>
                  <th>Destination</th>
				  <th>Status</th>
				  <th>Action</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
				  <th>#</th>
                  <th>Code</th>
                  <th>Requestor</th>
                  <th>Department</th>
                  <th>Date</th>
                  <th>Time</th>
                  <th>Destination</th>
				  <th>Status</th>
				  <th>Action</th>
                </tr>
              </tfoot>
              <tbody>
			  @foreach($req as $r)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $r->reqCode }}</td>
                  <td>{{ $r->reqName }}</td>
                  <td>{{ $r->reqDept }}</td>
                  <td>{{ $r->reqDate }}</td>
				  <td>{{ $r->reqTime }}</td>
                  <td>{{ $r->reqDest }}</td>
				  <td>
				  @php 
				  $request=$r->reqStatus;
				  if($r->reqStatus==NULL){
					  echo "<strong class='text-info'>AWAITING APPROVAL</strong>";
				  }
				  elseif($r->reqStatus==1){
					  echo "<strong class='text-info'>SYSTEM CANCELLED</strong>"; 
				  }
				elseif($r->reqStatus==5){
					 echo "<strong class='text-danger'>CANCELLED BY USER</strong>";
				  }				  
				  elseif($r->reqStatus==10){
					 echo "<strong class='text-primary'>APPROVED BY HOD</strong>";
				  }
				  elseif($r->reqStatus==8){
					 echo "<strong class='text-danger'>DISMISSED BY HOD</strong>";
				  }				  
				  elseif($r->reqStatus==15){
					 echo "<strong class='text-danger'>G.A DECLINED</strong>";
				  }	
				  elseif($r->reqStatus==20){
					 echo "<strong class='text-warning'>RESERVED</strong>";
				  }	
				  elseif($r->reqStatus==25){
					 echo "<strong class='text-success'>TRIP START</strong>";
				  }	
				  elseif($r->reqStatus==28){
					 echo "<strong class='text-danger'>TRIP OVERTIME</strong>";					
				  }	
				  elseif($r->reqStatus==30){
					echo "<strong class='text-success'>COMPLETED</strong>";
				  }						  
				  @endphp
				  </td>
                  <td>
				
						<div class="text-center">
						  <a style="text-decoration:none" class="d-block small" href="{{ route('reserve.edit', $r->id) }}">
						  <button class="btn btn-primary btn-block">Review</button>
						  </a>
						  @if($r->reqStatus>=20)				
 						  <a style="text-decoration:none" class="d-block small" href="{{ route('reserve.gate', [$r->id,$r->reqCode]) }}">
						  <button class="btn btn-success btn-block">Gatepass</button>
						  </a>
						  @endif
						</div>  
				
				  
				  </td>				  
                </tr>
				@endforeach
              </tbody>
            </table>
          </div>
        
		