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
    <div class="card card-register mx-auto mt-5">
      <div class="card-header"> New Vehicle Reservation </div>
      <div class="card-body">
       {{ Form::open(['action' => array('RequestController@update', $req->id),'id'=>'reqstore', 'name'=>'reservation','method'=>'PUT']) }}
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="exampleInputName">First name * </label>
                {{ Form::text('firstName',(explode(' ',$req->reqName)[0]),array('class' => 'input-md form-control', 'readonly','placeholder'=>'Enter first name')) }} 
              </div>
              <div class="col-md-6">
                <label for="exampleInputLastName">Last name *</label>
               	{{ Form::text('lastName',(explode(' ',$req->reqName)[1]),array('class' => 'input-md form-control', 'readonly','placeholder'=>'Enter last name')) }} 
              </div>
            </div>
          </div>
	  
          <div class="form-group">
            <label for="exampleInputEmail1">Email address *</label>
            <input class="form-control" id="exampleInputEmail1" type="email" aria-describedby="emailHelp" name="email" value="{{ $req->reqEmail    }}" placeholder="Enter email" readonly> 
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">HOD Email *</label>
            <input class="form-control" type="text" aria-describedby="emailHelp" name="hodemailfbf" value="{{ $req->hodName }}" placeholder="Enter email" readonly>
          </div>		  
		  		<input type="hidden" name="hodid" id="hodid">
		   <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="exampleInputName">Company *</label>
				{{ Form::text('company',$req->reqComp,array('class' => 'input-md form-control','readonly')) }} 
           
              </div>
              <div class="col-md-6">
                <label for="exampleInputLastName">Department *</label>
				{{ Form::text('dept',$req->reqDept,array('class' => 'input-md form-control','readonly')) }} 
              </div>
            </div>
          </div>
		  

		    <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="exampleInputName">Location *</label>
				{{ Form::text('location',$req->location,array('class' => 'input-md form-control','readonly')) }}
			           
              </div>
              <div class="col-md-6">
                <label for="exampleInputLastName">Destination *</label>
				{{ Form::text('dest',$req->reqDest,array('class' => 'input-md form-control','readonly')) }} 
              </div>
            </div>
          </div>
		  
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="exampleInputPassword1">Date *</label>
				<span class="errDate text-danger"></span>
                 {{ Form::date('tripDate',$req->reqDate,array('class' => 'input-md form-control','placeholder'=>'Enter Date', 'readonly')) }} 
              </div>
              <div class="col-md-3">
                <label for="exampleConfirmPassword">Time *</label>
				<span class="errTime text-danger"></span>
                {{ Form::time('tripTime',$req->reqTime,array('class' => 'input-md form-control ','placeholder'=>'Enter Time','readonly')) }} 
              </div>
              <div class="col-md-3">
                <label for="exampleConfirmPassword">Duration(min) *</label>
				<span class="errTime text-danger"></span>
                {{ Form::text('tripDur',$req->reqDur,array('class' => 'input-md form-control ','placeholder'=>'Enter Duration','id'=>'tripDur','required','readonly')) }} 
              </div>			  
            </div>
          </div>
		  
		  

		  
			<div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="exampleInputName">Passenger</label>
				{{ Form::text('passenger',$req->reqPass,array('class' => 'form-control','placeholder'=>'Enter passengers','readonly')) }} 
           
              </div>
              <div class="col-md-6">
                <label for="exampleInputLastName">Load </label>
				{{ Form::text('load', ($req->passLoad) ? 'YES':'NO',array('class' => 'input-md form-control','readonly')) }} 
              </div>
            </div>
          </div>
	
	


			<div class="form-group">
            <label for="exampleInputEmail1">Purpose</label>
            
			{{	Form::textarea('notes',$req->purpose,array('size'=>'70x3', 'class' => 'form-control','maxlength'=>100,'required','readonly') ) }}	
          </div>
		  	<div class="form-group">
            <label for="exampleInputEmail1">HOD Remarks</label>            
			{{	Form::textarea('hodnotes','',array('size'=>'70x2', 'class' => 'form-control','maxlength'=>300,'id'=>'hodnotes','required') ) }}	
			</div>
		  
		  
		  			<div class="form-group">
            <div class="form-row">
			<div class="col-md-6">
					  {{ Form::submit('APPROVE',array('class' => 'btn btn-success btn-block subBtn','name'=>'subBtn')) }} 
         </div>
		 	<div class="col-md-6">
					{{ Form::submit('DISMISS',array('class' => 'btn btn-danger btn-block  subBtn','name'=>'subBtn')) }} 
			</div>
          </div>

		{{ Form::close() }}
		
      </div>
    </div>
  </div>
 				
		
        </div>

      </div>

  
	</div>
   @endsection