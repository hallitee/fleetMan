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
				<div class="card-header"><h4 class="text-center">Edit Department </h4></div>
				
				<div class="card-body">
 {!! Form::open(['action' => array('DepartmentController@update', $comp->id),'method'=>'PUT']) !!}
<div class="form-group">
            <div class="form-row">
              <div class="col-md-12">
                <label for="exampleInputLastName">Department Name *</label>
					{{ Form::text('deptName',$comp->name,array('class' => 'input-md form-control','required')) }} 
              </div>
            </div>
          </div>	
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-12">
                <label for="exampleInputLastName">Company Name *</label>
			
               	{{ Form::select('compName',$arr,[$comp->company->id],array('class' => 'input-md form-control','required', 'placeholder'=>'Select a company')) }} 
              </div>
            </div>
          </div>			  

          <div class="form-group">
            <div class="form-row">
              <div class="col-md-12">
                <label for="exampleInputLastName">HOD Name</label>
               	{{ Form::text('hodName',$comp->hodName,array('class' => 'input-md form-control')) }} 
              </div>
            </div>
          </div>
		  
          <div class="form-group">
            <label for="exampleInputEmail1">HOD's Email</label>
            <input class="form-control" id="exampleInputEmail1" value="{{ $comp->hodEmail }}" type="email" aria-describedby="emailHelp" name="hodEmail" placeholder="Enter email"> 
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-12">
                <label for="exampleInputLastName">Department Size</label>
               	{{ Form::number('size', $comp->deptSize,array('class' => 'input-md form-control')) }} 
              </div>
            </div>
          </div>	  


		  
		  	  {{ Form::submit('Update Department',array('class' => 'btn btn-primary btn-block')) }}
         
      
		{{ Form::close() }}
		
 

      </div>

		  
			</div>
      </div>
  
	</div>
   @endsection
