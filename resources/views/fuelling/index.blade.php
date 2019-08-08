@extends('layouts.master')
   @section('js')
      <script>
		console.log(" Within fuelling index");
		fleet =  {!!  $dept->toJson()  !!}
		console.log(fleet);
		deptSel = document.querySelector("select[name='dept']");
		deptSel.addEventListener('change', (index)=>{
		//	console.log(fleet[index.target.value-1]);
			f = fleet[index.target.value-1];
			
			if(index.target.value==f.id){
				veh = document.querySelector("select[name='fleet']");
				$("select[name='fleet']").empty();
				f.fleets.forEach((i)=>{
					opt = document.createElement('option');
					opt.value =  i.id;
					opt.innerText = i.make+' '+i.model+' '+i.regNo;
					veh.append(opt);
				});			
			}
			
		});
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

		</div>
	</div>
		<!-- Breadcrumbs-->
		

      <div class="row">
	  
	  
	  
        <div class="col-12">
			<div class="card col-md-10 offset-1">
			
				   

			
				<div class="card-header"><h4 class="text-center">Create New Fuel Record</h4></div>
				
				<div class="card-body">
       {{ Form::open(['action' => array('FuellingController@store'),'id'=>'fuelstore', 'name'=>'fuelSave']) }}
					<div class="form-row">
						<div class="form-group col-md-6">
						  <label for="inputEmail4">Department *</label>
						  {{ Form::select('dept',$dep,"",array('class' => 'input-md form-control', 'required', 'placeholder'=>'Select fleet department ')) }} 
						</div>
						<div class="form-group col-md-6">
						  <label for="inputPassword4">Vehicle *</label>
						  {{ Form::select('fleet',[],'',array('class' => 'input-md form-control','required', 'placeholder'=>'Select vehicle')) }} 
						</div>
					 </div> 
					<div class="form-row">
						<div class="form-group col-md-12">
						  <label for="inputEmail4">Driver Name *</label>
						  {{ Form::select('driver',$drv,'',array('class' => 'input-md form-control','placeholder'=>'Select driver name', 'required')) }} 
						</div>
					
					 </div> 					 
					<div class="form-row">
						<div class="form-group col-md-4">
						  <label>Filling Station *</label>
						  {{ Form::select('station',config('app.stations'),"",array('class' => 'input-md form-control','placeholder'=>'Select fuel station', 'required')) }} 
						</div>
						<div class="form-group col-md-4">
						  <label for="inputPassword4">Fuel Type* </label>
						  {{  Form::select('type',config('app.fuel'),'',array('class' => 'input-md form-control', 'placeholder'=>'Select fuel type', 'required')) }}
						  
						</div>
						<div class="form-group col-md-4">
						  <label for="inputPassword4">Price/Litre* (NGN) </label>
						  {{  Form::text('price','',array('class' => 'input-md form-control', 'placeholder'=>'Enter Price','min'=>130, 'max'=>150, 'onkeypress'=>'return (event.charCode == 8 || event.charCode == 0) ? null : event.charCode >= 48 && event.charCode <= 57')) }}
						  
						</div>
									
					 </div> 						 
					<div class="form-row">
						<div class="form-group col-md-6">
						  <label for="inputEmail4">Meter Reading *</label>
						  {{ Form::text('mtr',"",array('class' => 'input-md form-control','placeholder'=>'Vehicle meter reading', 'required')) }} 
						</div>
						<div class="form-group col-md-6">
						  <label for="inputPassword4">Litres Pumped * </label>
						  {{  Form::text('pumped','', array('class' => 'input-md form-control','required', 'placeholder'=>'Enter litres filled', 'onkeypress'=>'return (event.charCode == 8 || event.charCode == 0) ? null : event.charCode >= 48 && event.charCode <= 57')) }}						  
						</div>						
					 </div> 	



	
		  {{ Form::submit('Create Fleet',array('class' => 'btn btn-primary btn-block')) }} 
         
      
		{{ Form::close() }}
		
 

      </div>

		  
			</div>
      </div>
  
	</div>
   @endsection
   @section('js')

   @endsection
