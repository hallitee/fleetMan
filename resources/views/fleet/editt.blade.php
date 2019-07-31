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
 {!! Form::open(['action' => array('FleetController@update', $app->id),'method'=>'PUT']) !!}
   					<div class="form-row">
						<div class="form-group col-md-6">
						  <label for="inputEmail4">Make *</label>
						  {{ Form::select('make',config('app.make'),[$app->make=>$app->make],array('class' => 'input-md form-control', 'required', 'placeholder'=>'Select a car make ')) }} 
						</div>
						<div class="form-group col-md-6">
						  <label for="inputPassword4">Model *</label>
						  {{ Form::text('model',$app->model,array('class' => 'input-md form-control','required', 'placeholder'=>'Enter car model')) }} 
						</div>
					 </div> 
					<div class="form-row">
						<div class="form-group col-md-4">
						  <label for="inputEmail4">Body Style *</label>
						  {{ Form::select('style',config('app.style'),[$app->type=>$app->type],array('class' => 'input-md form-control','placeholder'=>'Select car body type ', 'required')) }} 
						</div>
						<div class="form-group col-md-4">
						  <label for="inputPassword4">Year (Manufacture) </label>
						  {{  Form::selectYear('year', $app->chasis, 2019,'2019',array('class' => 'input-md form-control', 'placeholder'=>'Enter car manufacture year')) }}
						  
						</div>
						<div class="form-group col-md-4">
						  <label for="inputPassword4">Registration Date *</label>
						<input type="month" id='regDate' value="{{ $app->regDate }}" class="input-md form-control" value="{{ $app->regDate }}"  placeholder="date format: 2019-10" name="regDate" required>
						</div>						
					 </div> 					 
					<div class="form-row">
						<div class="form-group col-md-4">
						  <label>Registration Number *</label>
						  {{ Form::text('regNo',$app->regNo,array('class' => 'input-md form-control','placeholder'=>'Enter vehicle registration number', 'required')) }} 
						</div>
						<div class="form-group col-md-4">
						  <label for="inputPassword4">VIN Number (Chasis) </label>
						  {{  Form::text('chasis',$app->vin,array('class' => 'input-md form-control', 'placeholder'=>'Enter vehicle chasis number')) }}
						  
						</div>
						<div class="form-group col-md-4">
						<label for="inputPassword4">Cost</label>	
						<div class="input-group">
						  <input type="number" name="cost" value="{{ explode(" ", $app->cost)[1] }}" class="form-control" placeholder="Vehicle cost" aria-label="Vehicle cost" aria-describedby="basic-addon2">
						  <div class="input-group-append">
							<span class="input-group-text" id="basic-addon2">{{ Form::select('curr',["NGN"=>"NGN","USD"=>"USD"],[explode(" ",$app->cost)[0]=>explode(" ",$app->cost)[0]]) }} </span>
						  </div>
						</div>
						</div>
									
					 </div> 						 
					<div class="form-row">
						<div class="form-group col-md-4">
						  <label>Company *</label>
						  {{ Form::select('comp',$comp,[$app->compani->id],array('class' => 'input-md form-control','id'=>'selComp','placeholder'=>'Select company', 'required')) }} 
						</div>
						<div class="form-group col-md-4">
						  <label>Department * </label>
						  {{  Form::select('dept',$dept,[$app->dept], array('class' => 'input-md form-control','id'=>'selDept','required', 'placeholder'=>'Select Department')) }}						  
						</div>
						<div class="form-group col-md-4">
						  <label>PIC </label>
							<input type="text" class="input-md form-control" value="{{ $app->PIC }}"  name="pic">
						</div>						
					 </div> 	


		  
		  {{ Form::submit('Update Fleet Record',array('class' => 'btn btn-primary btn-block')) }} 
         
      
		{{ Form::close() }}
		
 

      </div>

		  
			</div>
      </div>
  
	</div>
   @endsection
