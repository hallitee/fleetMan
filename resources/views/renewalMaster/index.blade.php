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
	  
	  
	  
        <div class="col-12">
			<div class="card col-md-10 offset-1">
			
				   

			
				<div class="card-header"><h4 class="text-center">Create Renewal</h4></div>
				
				<div class="card-body">
       {{ Form::open(['action' => array('RenewalMasterController@store'),'id'=>'renewMasterStore', 'name'=>'renewMasterSave']) }}
					<div class="form-row">
						<div class="form-group col-md-6">
						  <label for="inputEmail4">Renewal Name *</label>
						  {{ Form::text('name','',array('class' => 'input-md form-control', 'required', 'placeholder'=>'Enter renewal name ')) }} 
						</div>
						<div class="form-group col-md-6">
						  <label for="inputPassword4">Description</label>
						  {{ Form::text('desc','',array('class' => 'input-md form-control', 'placeholder'=>'Describe renewal')) }} 
						</div>
					 </div> 
					<div class="form-row">
						<div class="form-group col-md-6">
						  <label for="inputEmail4">Issuer Name </label>
						  {{ Form::text('issuer',"",array('class' => 'input-md form-control','placeholder'=>'Enter Issuing authority')) }} 
						</div>
						<div class="form-group col-md-6">
						  <label for="inputPassword4">Issuer Address </label>
						  {{  Form::text('issuerAdd','',array('class' => 'input-md form-control', 'placeholder'=>'Enter issuer location or address')) }}
						  
						</div>					
					 </div> 					 
					<div class="form-row">
						<div class="form-group col-md-6">
						  <label>Contact Name </label>
						  {{ Form::text('contact',"",array('class' => 'input-md form-control','placeholder'=>'Enter issuer personnel contact')) }} 
						</div>
						<div class="form-group col-md-6">
						  <label for="inputPassword4">Contact Number</label>
						  {{  Form::text('contactNum','',array('class' => 'input-md form-control', 'placeholder'=>'Enter issuer personnel contact phone')) }}
						  
						</div>

									
					 </div> 						 
					<div class="form-row">
						<div class="form-group col-md-12">
						<label for="inputPassword4">Validity *</label>	
						<div class="input-group">
						  <input type="number" name="validity" required class="form-control" placeholder="Enter validity period" aria-label="Vehicle cost" aria-describedby="basic-addon2">
						  <div class="input-group-append">
							<span class="input-group-text" id="basic-addon2">{{ Form::select('uom',config('app.uom'),"", array('id'=>'uomSel','data-uom','required')) }} </span>
						  </div>
						</div>
						</div>					
					 </div> 	



	
		  {{ Form::submit('Create Renewal',array('class' => 'btn btn-primary btn-block')) }} 
         
      
		{{ Form::close() }}
		
 

      </div>

		  
			</div>
      </div>
  
	</div>
   @endsection
