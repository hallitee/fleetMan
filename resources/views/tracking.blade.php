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
		@if($req)
      <div class="card-header text-center"><div class="h4">@if($req->reqStatus<10) STATUS TRACKING @else STATUS TRACKING @endif </div></div>
      <div class="card-body">
	  					
				  <ul class="list-unstyled multi-steps">
					@if($req->reqStatus==NULL) 
					<li class="is-active">Awaiting Approval</li>
					@elseif($req->reqStatus==1)
					<li class="is-active">System cancelled</li>
					@endif
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
                  <th>Date:</th>
                  <td>{{ $req->reqDate }}</td>
                  <th>Time:</th>
                  <td>{{$req->reqTime.' HR'}}</td>             
                </tr>
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
  @if(Auth::guest() && (($req->reqStatus==NULL)||($req->reqStatus==10)||($req->reqStatus==20)) )
		
			<hr>
			
			{!! Form::open(['action' => array('RequestController@tracking'),'method'=>'GET','id'=>'canTrip']) !!}
				<input type="hidden" id="tripDate">
			 <br>
			 {{	Form::textarea('canRem','',array('size'=>'50x3', 'class' => 'form-control','maxlength'=>500,'required','placeholder'=>'Enter cancel remark','id'=>'canRem','style'=>'display:none') ) }}
			 <br>			 
			  <br>
			 
			  <div class="form-group row">
			<input type="hidden" value="{{$req->id}}" name="reqID">
		 	<div class="col-md-4 offset-md-4">
				{{ Form::button('Cancel Trip',array('class' => 'btn btn-danger btn-block','name'=>'subBtn', 'id'=>'cancelTrip')) }} 
			</div>

			  </div>
		{!! Form::close() !!}
		@endif	

		 </div>
		 @else
			       <div class="card-header text-center"><div class="h4 text-danger">No record found </div></div>
      <div class="card-body">
		 @endif
		 </div>
 				
		
        </div>

      </div>

  
	</div>

   @endsection