@extends('layouts.master')

@section('content')
    <div class="container-fluid">
      <!-- Breadcrumbs-->
   

      <!-- Area Chart Example-->

      <div class="row">
        <div class="col-md-12">
			
			<div class="page-header">
			@if (session('status'))
				<div class="alert alert-{{ session('alert')}} h4 text-center">
					{{ session('status') }}
				</div>
			@endif			
            </div> 
			
				  <div class="container">
	<div class="card mx-auto">
      <div class="card-header text-center"><div class="h4">@if($req->reqStatus<10) Update  Reservation @else Reservation Progress @endif </div></div>
      <div class="card-body">
	  					
				  <ul class="list-unstyled multi-steps">
					<li @if(($req->reqStatus==NULL)||($req->reqStatus==1)) class="is-active" @endif>
					@if(($req->reqStatus==1))
						System Cancelled 
					@else 
						Awaiting Approval 
					@endif
					</li>
	
					@if(($req->reqStatus==8))
					<li class="is-active">Dismissed By HOD</li>
					@elseif($req->reqStatus==5)
					<li class="is-active">Cancelled By User</li>
					@else
					<li @if($req->reqStatus==10) class="is-active" @endif>Approved By HOD</li>	
					@endif				
					@if($req->reqStatus==15)
					<li class="is-active">Decline BY GA</li>
					@else
					<li  @if($req->reqStatus==20) class="is-active" @endif>Car Allocated</li>
					@endif
					<li @if($req->reqStatus==25) class="is-active" @endif>Trip Start</li>
					@if($req->reqStatus==28)
					<li>Trip Overtime</li>
					<li   class="is-active">Completed</li>
					@else
					<li>Trip End</li>
					<li   class="is-active">Completed</li>
					@endif
					
				  </ul>		
			
		<div class="table-responsive">
            <table class="table table-bordered" id="datatable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th colspan="4" class="text-center">Request Details</th>
 
                </tr>
              </thead>        
			  <tbody>
                <tr>
                  <th>First Name:</th>
                  <td>{{ (explode(' ',$req->reqName)[0]) }}</td>
                  <th>Last Name:</th>
                  <td>{{ (explode(' ',$req->reqName)[1]) }}</td>             
                </tr>  
                <tr>
                  <th>Email:</th>
                  <td>{{ $req->reqEmail }}</td>    
                  <th>Tracking Code:</th>
                  <td>{{ $req->reqCode }}</td>  				  
                </tr> 
                <tr>
                  <th>Company:</th>
                  <td>{{ $req->reqComp }}</td>
                  <th>Department:</th>
                  <td>{{$req->reqDept }}</td>             
                </tr>				
                <tr>
                  <th>Location:</th>
                  <td>{{ $req->location }}</td>
                  <th>Destination:</th>
                  <td>{{$req->reqDest }}</td>             
                </tr>
                <tr>
                  <th>Depature Date:</th>
                  <td>{{ $req->reqDate }}
				  
				  
				  </td>
                  	<td><b>Departure Time:</b> {{$req->reqTime.' HR'}}</td>
    <td><b>Duration: </b>
	@php
	if($req->reqStatus<20){
		echo $req->reqDur.' min';
	}
	else if($req->reqStatus>=20){
	$start = Carbon\Carbon::parse(date_create($req->reqDate.' '.$req->reqTime)->format('Y-m-d H:i:s'));
	$end =  Carbon\Carbon::parse(date_create($req->retTime)->format('Y-m-d H:i:s'));
	echo $start->diffInMinutes($end).' min';		
	}	
	@endphp 
</td>             
                </tr>
				
				@if($req->retTime)
                <tr>
                  <th>Expected Return Time:</th>
                  <td colspan='3'>{{ $req->retTime }}				  
				  </td>          
                </tr>				
				@endif
				@if(($req->tripStart)||($req->tripEnd))	
			  <tr>
                  <th>Trip Start:</th>
                  <td>{{ $req->tripStart }}</td>
                  <th>Trip End:</th>
                  <td>{{ $req->tripEnd }}</td>             
                </tr>		
				
				@endif
                <tr>
                  <th>Passenger:</th>
                  <td>{{ $req->reqPass }}</td>
                  <th>Load:</th>
                  <td>{{ $req->passLoad }}</td>             
                </tr>	
                <tr>
                  <th>HOD Email:</th>
                  <td colspan="3">{{ $req->hodName }}</td>                              
                </tr> 	
                <tr>
                  <th>Purpose:</th>
                  <td colspan="3">{{ $req->purpose }}</td>                              
                </tr> 	
@if($req->hodRemark)
                <tr>
                  <th>HOD Remark:</th>
                  <td colspan="3">{{ $req->hodRemark}}</td>                              
                </tr> 			
@endif				
              </tbody>
            </table>
         
		 </div>
  @if(($req->reqStatus==10) && (Auth::user()->role>=3))
			<div class="h5 text-center ">Allocation Update</div>
			<hr>
			 <input type="hidden" id="tripDate">
			
		{{ Form::open(['action' => array('RequestController@allocate', $req->id),'id'=>'alloc', 'name'=>'alloc','method'=>'POST']) }}
		{!! csrf_field() !!}
		<input type='hidden' id='reqID' name='reqID' value={{$req->id }}>
			  <div class="form-group row">
				<label for="staticEmail" class="col-sm-2 col-form-label">Available Vehicles:</label>
				<div class="col-sm-6">
		{{ Form::select('availVeh',$car,[],array('class' => 'form-control','id'=>'availVeh','required')) }} 
				</div>
								<label for="staticEmail" class="col-sm-2 col-form-label">Assigned Driver:</label>
				<div class="col-sm-2">
				{{ Form::text('driver','',array('class' => 'form-control','id'=>'driver','readonly')) }} 
				</div>
			  </div>
		
  			  <div class="form-group row">
				<label for="staticEmail" class="col-sm-2 col-form-label">Change Driver:</label>
				<div class="col-sm-6">
				{{ Form::select('changeDriver',$drvd,[],array('class' => 'form-control','id'=>'changeDriver')) }} 
				</div>
				<label for="staticEmail" class="col-sm-2 col-form-label">Estimated Return Time (min):</label>
				<div class="col-sm-2">
				{{ Form::number('rtnTime',0,array('class' => 'form-control','id'=>'rtnTime','onkeypress'=>'return (event.charCode == 8 || event.charCode == 0) ? null : event.charCode >= 48 && event.charCode <= 57','min'=>'-9999', 'required' ))}} 
				</div>
			  </div>
  			  <div class="form-group row" id="gaRem" style="display:none">
				<label for="staticEmail" class="col-sm-2 col-form-label">Remark:</label>
				<div class="col-sm-8">
				{{	Form::textarea('ganotes','',array('size'=>'70x3', 'class' => 'form-control','maxlength'=>1000,'id'=>'ganotes') ) }}	
				</div>

			  </div>		  
			  <br>
			  <div class="form-group row">
			<div class="col-md-4 offset-md-2 ">
					  {{ Form::submit('ALLOCATE',array('class' => 'btn btn-success btn-block actBtn','name'=>'subBtn')) }} 
         </div>
		 	<div class="col-md-4 offset-md-1 ">
					{{ Form::submit('DECLINE',array('class' => 'btn btn-danger btn-block   decBtn','name'=>'subBtn')) }} 
			</div>

			  </div>
		{{ Form::close() }}
		@endif		

		 </div>
		 </div>
 				
		
        </div>

      </div>

  
	</div>

   @endsection