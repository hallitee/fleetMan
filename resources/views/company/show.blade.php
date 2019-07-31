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
        <div class="col-8 offset-2">
			<div class="card col-md-8 offset-2">
				<div class="card-header"><h4 class="text-center">Company Profile</h4></div>
				
				<div class="card-body">
       {{ Form::open(['action' => array('CompanyController@store'),'id'=>'compstore', 'name'=>'companySave']) }}
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-12">
                <label for="exampleInputLastName">Company Name *</label>
               	{{ Form::text('compName',$comp->name,array('class' => 'input-md form-control', 'required','required', 'placeholder'=>'Select a company', 'readonly')) }} 
              </div>
            </div>
          </div>		  
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-12">
                <label for="exampleInputLastName">Company Location *</label>
               	{{ Form::text('compLoc',$comp->location,array('class' => 'input-md form-control', 'readonly', 'placeholder'=>'Select a location')) }} 
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-12">
                <label for="exampleInputLastName">General Manager's Name *</label>
               	{{ Form::text('gmName',$comp->gmName,array('class' => 'input-md form-control','readonly')) }} 
              </div>
            </div>
          </div>
		  
          <div class="form-group">
            <label for="exampleInputEmail1">General Manager's Email *</label>
            <input class="form-control" id="exampleInputEmail1" type="email" aria-describedby="emailHelp" value="{{ $comp->gmEmail }}" name="gmEmail" placeholder="Enter email" readonly> 
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-12">
                <label for="exampleInputLastName">Latitude</label>
               	{{ Form::text('lat',$comp->lat,array('class' => 'input-md form-control','readonly')) }} 
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-12">
                <label for="exampleInputLastName">Longitude</label>
               	{{ Form::text('long',$comp->long,array('class' => 'input-md form-control', 'readonly')) }} 
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-12">
                <label for="exampleInputLastName">Company Address</label>
               	{{ Form::text('address',$comp->address,array('class' => 'input-md form-control','readonly')) }} 
              </div>
            </div>
          </div>	       
      
		{{ Form::close() }}
		
 

      </div>

		  
			</div>
      </div>
  
	</div>
   @endsection
