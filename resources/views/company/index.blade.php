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
				<div class="card-header"><h4 class="text-center">New Company Profile</h4></div>
				
				<div class="card-body">
       {{ Form::open(['action' => array('CompanyController@store'),'id'=>'compstore', 'name'=>'companySave']) }}
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-12">
                <label for="exampleInputLastName">Company Name *</label>
               	{{ Form::select('compName',["ESRNL"=>"ESRNL","NPRNL"=>"NPRNL", "PFNL"=>"PFNL"],"",array('class' => 'input-md form-control', 'required','required', 'placeholder'=>'Select a company')) }} 
              </div>
            </div>
          </div>		  
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-12">
                <label for="exampleInputLastName">Company Location *</label>
               	{{ Form::select('compLoc',["AGBARA"=>"AGBARA","IKOYI"=>"IKOYI"],"",array('class' => 'input-md form-control', 'required', 'placeholder'=>'Select a location')) }} 
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-12">
                <label for="exampleInputLastName">General Manager's Name *</label>
               	{{ Form::text('gmName','',array('class' => 'input-md form-control','required')) }} 
              </div>
            </div>
          </div>
		  
          <div class="form-group">
            <label for="exampleInputEmail1">General Manager's Email *</label>
            <input class="form-control" id="exampleInputEmail1" type="email" aria-describedby="emailHelp" name="gmEmail" placeholder="Enter email"> 
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-12">
                <label for="exampleInputLastName">Latitude</label>
               	{{ Form::text('lat','',array('class' => 'input-md form-control')) }} 
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-12">
                <label for="exampleInputLastName">Longitude</label>
               	{{ Form::text('long','',array('class' => 'input-md form-control')) }} 
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-12">
                <label for="exampleInputLastName">Company Address</label>
               	{{ Form::text('address','',array('class' => 'input-md form-control')) }} 
              </div>
            </div>
          </div>		  


		  
		  {{ Form::submit('Create Company',array('class' => 'btn btn-primary btn-block')) }} 
         
      
		{{ Form::close() }}
		
 

      </div>

		  
			</div>
      </div>
  
	</div>
   @endsection
