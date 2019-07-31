@extends('layouts.master')
   @section('js')
   
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

		</div>
	</div>
		<!-- Breadcrumbs-->
		

      <div class="row">
        <div class="col-10 offset-1">
			<div class="card col-md-10 offset-1">
				<div class="card-header"><h4 class="text-center">Edit Fleet Profile</h4></div>
				
				<div class="card-body">
		{!! Form::open(['action' => array('RenewalMasterController@update', $app->id),'method'=>'PUT']) !!}
					<div class="form-row">
						<div class="form-group col-md-6">
						  <label for="inputEmail4">Renewal Name *</label>
						  {{ Form::text('name',$app->name,array('class' => 'input-md form-control', 'required', 'placeholder'=>'Enter renewal name ')) }} 
						</div>
						<div class="form-group col-md-6">
						  <label for="inputPassword4">Description</label>
						  {{ Form::text('desc',$app->desc,array('class' => 'input-md form-control', 'placeholder'=>'Describe renewal')) }} 
						</div>
					 </div> 
					<div class="form-row">
						<div class="form-group col-md-6">
						  <label for="inputEmail4">Issuer Name </label>
						  {{ Form::text('issuer',$app->issuer,array('class' => 'input-md form-control','placeholder'=>'Enter Issuing authority')) }} 
						</div>
						<div class="form-group col-md-6">
						  <label for="inputPassword4">Issuer Address </label>
						  {{  Form::text('issuerAdd',$app->issuerAddress,array('class' => 'input-md form-control', 'placeholder'=>'Enter issuer location or address')) }}
						  
						</div>					
					 </div> 					 
					<div class="form-row">
						<div class="form-group col-md-6">
						  <label>Contact Name </label>
						  {{ Form::text('contact',$app->contactName,array('class' => 'input-md form-control','placeholder'=>'Enter issuer personnel contact')) }} 
						</div>
						<div class="form-group col-md-6">
						  <label for="inputPassword4">Contact Number</label>
						  {{  Form::text('contactNum',$app->contactNum,array('class' => 'input-md form-control', 'placeholder'=>'Enter issuer personnel contact phone')) }}
						  
						</div>	
					 </div> 						 
					<div class="form-row">
						<div class="form-group col-md-6">
						  <label for="inputEmail4">Renewal Frequency</label>
						  {{ Form::select('freq',config('app.frequency'),$app->frequency,array('class' => 'input-md form-control','placeholder'=>'Select Renewal Frequency', 'required')) }} 
						</div>
						<div class="form-group col-md-6">
						<label for="inputPassword4">Validity</label>	
						<div class="input-group">
						  <input type="number" name="validity" class="form-control" placeholder="Enter validity period" aria-label="Vehicle cost" value="{{ $app->validity }}" aria-describedby="basic-addon2">
						  <div class="input-group-append">
							<span class="input-group-text" id="basic-addon2">{{ Form::select('uom',config('app.uom'),[$app->valid_uom=>$app->valid_uom], array('id'=>'uomSel','data-uom')) }} </span>
						  </div>
						</div>
						</div>					
					 </div> 	
		  {{ Form::submit('Update Renewal',array('class' => 'btn btn-primary btn-block')) }} 
         
      
		{{ Form::close() }}
      </div>

		  
			</div>
      </div>
  
	</div>
   @endsection
