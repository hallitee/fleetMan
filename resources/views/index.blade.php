@extends('layouts.master')
   @section('js')
   <script>
   	function pad(t) {
   var st = "" + t;

   while (st.length < 2)
   st = "0" + st;

   return st;  
	}
   	document.getElementById("tripDate").valueAsDate = new Date();
	local = new Date();
	localTime = pad((local.getHours()+1)) + ":" + pad(local.getMinutes());
	document.getElementById("tripTime").value = localTime;	

   </script>
   
   @endsection
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
       {{ Form::open(['action' => array('RequestController@store'),'id'=>'reqstore', 'name'=>'reservation']) }}
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="exampleInputName">First name * </label>
                {{ Form::text('firstName',"",array('class' => 'input-md form-control', 'required','placeholder'=>'Enter first name')) }} 
              </div>
              <div class="col-md-6">
                <label for="exampleInputLastName">Last name *</label>
               	{{ Form::text('lastName',"",array('class' => 'input-md form-control', 'required','placeholder'=>'Enter last name')) }} 
              </div>
            </div>
          </div>
	  
          <div class="form-group">
            <label for="exampleInputEmail1">Email address *</label>
            <input class="form-control" id="exampleInputEmail1" type="email" aria-describedby="emailHelp" name="email" placeholder="Enter email" required> 
          </div>
		  
		  		<input type="hidden" name="hodid" id="hodid">
		   <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="exampleInputName">Company *</label>
				{{ Form::select('company',config('app.company'),"",array('class' => 'input-md form-control','id'=>'company','required')) }}            
              </div>
              <div class="col-md-6">
                <label for="exampleInputLastName">Department *</label>
				{{ Form::select('dept',config('app.department'),"",array('class' => 'input-md form-control','id'=>'dept','required')) }} 
              </div>
            </div>
          </div>
		  

		    <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="exampleInputName">Location *</label>
				{{ Form::select('location',config('app.location'),"",array('class' => 'input-md form-control','id'=>'location','required')) }}
			           
              </div>
              <div class="col-md-6">
                <label for="exampleInputLastName">Destination *</label>
				{{ Form::select('dest',[],'',array('class' => 'input-md form-control','id'=>'dest','required')) }} 
              </div>
			<div class="col-md-4 other" style='display:none'>
                <label for="exampleInputLastName">Others *</label>
				{{ Form::text('otherDest','',array('class' => 'input-md form-control')) }} 
              </div>
            </div>
          </div>
		  @if(Auth::check())
		 @if((Auth::user()->role)>=3)
		    <div class="form-group">
            <div class="form-row">
              <div class="col-md-12">
                <label class="col-md-6" for="exampleInputName"><strong>Emergency Booking</strong>
				<span><input type="checkbox" name="urgent"  id="urgent">  </span></label>
              </div>
            </div>
          </div>
		@endif
		@endif		  
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-4">
                <label for="exampleInputPassword1">Date (YYYY-MM-DD) *</label>
				<span class="errDate small text-danger"></span>
                 {{ Form::date('tripDate',date('m/d/Y'),array('class' => 'input-md form-control','placeholder'=>'Enter Date','id'=>'tripDate', 'required')) }} 
              </div>
              <div class="col-md-4">
                <label for="exampleConfirmPassword">Time (HH:MM) *</label>
				<span class="errTime small text-danger"></span>
                {{ Form::time('tripTime','',array('class' => 'input-md form-control ','placeholder'=>'Enter Time','id'=>'tripTime','required')) }} 
              </div>
              <div class="col-md-4">
                <label for="exampleConfirmPassword">Duration(min) *</label>
			
                {{ Form::number('tripDur','',array('class' => 'input-md form-control ','placeholder'=>'Enter Duration','min'=>'30', 'id'=>'tripDur','required')) }} 
              </div>			  
            </div>
          </div>
		  	  
			<div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="exampleInputName">Passenger</label>
				{{ Form::select('passenger',config('app.passenger'),"",array('class' => 'form-control','placeholder'=>'Enter passengers')) }} 
           
              </div>
              <div class="col-md-6">
                <label for="exampleInputLastName">Load </label>
				{{ Form::select('load',[''=>'','1'=>'YES','0'=>'NO'],"",array('class' => 'input-md form-control')) }} 
              </div>
            </div>
          </div>
	
	          <div class="form-group">
				<label for="exampleInputEmail1">HOD Email *</label>
				<input class="form-control" id="hodemail" type="hodemail" aria-describedby="emailHelp" name="hodemail" placeholder="Enter email" readonly required>
			  </div>


			<div class="form-group">
            <label for="exampleInputEmail1">Purpose *</label>
            
			{{	Form::textarea('notes','',array('size'=>'70x3', 'class' => 'form-control','maxlength'=>300,'id'=>'notes','required') ) }}	
          </div>
		  
		  {{ Form::submit('Make Reservation',array('class' => 'btn btn-primary btn-block  submt')) }} 
         
      
		{{ Form::close() }}
		
      </div>
    </div>
  </div>
 				
		
        </div>

      </div>

  
	</div>
   @endsection
