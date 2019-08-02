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
			
				   

			
				<div class="card-header"><h4 class="text-center">Add Renewal</h4></div>
				
				<div class="card-body">
       {{ Form::open(['action' => array('RenewalRecordController@store'),'id'=>'renewRecordStore', 'name'=>'renewRecordSave']) }}
					<div class="form-row">
						<div class="form-group col-md-12">
						  <label for="inputEmail4">Fleet *</label>
						  {{ Form::select('fleetid',$fleet,'',array('class' => 'input-md form-control', 'required', 'placeholder'=>'Enter renewal name ')) }} 
						</div>
					 </div> 
					<div class="form-row">
						<div class="form-group col-md-6">
						  <label for="inputEmail4">Renewal Type</label>
						  {{ Form::select('renewal',$renew,[],array('class' => 'input-md form-control','placeholder'=>'Enter renewal type', 'required')) }} 
						</div>	
						<div class="form-group col-md-6">
						  <label for="inputEmail4">Validity Period</label>
						  {{ Form::text('expiry','',array('class' => 'input-md form-control','placeholder'=>'Enter validity period', 'readonly')) }} 						  
						</div>									
					 </div> 					 
					<div class="form-row">
						<div class="form-group col-md-4">
						  <label>Renewal Start Date *</label>
						  {{ Form::date('payDate',"",array('class' => 'input-md form-control','placeholder'=>'Enter payment date', 'id'=>'payDate', 'required')) }} 
						</div>
						<div class="form-group col-md-4">
						  <label for="inputPassword4">Next Renewal</label>
						  {{  Form::text('nextPay','',array('class' => 'input-md form-control', 'placeholder'=>'Next Payment Date', 'id'=>'nextDate', 'readonly')) }}
						  <input type="text" name="nextDateH" hidden>
						</div>	
						<div class="form-group col-md-4">
						<label for="inputPassword4">Notification Span</label>	
						<div class="input-group">
						  <input type="text" name="notify" value="1" id="notText" class="form-control">
						  <div class="input-group-append">
							<span class="input-group-text" id="basic-addon2">{{ Form::select('notUom',[''=>'','Hour'=>'Hour','Day'=>'Day','Week'=>'Week'],"", array('id'=>'notUomSel')) }} </span>
						  </div>
						  <div class="input-group-append">
							<span class="input-group-text" id="basic-addon2">Before Expiry</span>
						  </div>						  
						</div>
						</div>					
					</div> 		
					<div class="form-row">
						<div class="form-group col-md-6">
						  <label>Renewal Cost </label>
						  {{ Form::text('renCost',"",array('class' => 'input-md form-control','placeholder'=>'Cost of renewal')) }} 
						</div>
						<div class="form-group col-md-6">
						  <label for="inputPassword4">Paid By </label>
						  {{  Form::text('payee','',array('class' => 'input-md form-control', 'placeholder'=>'Renewal paid by ')) }}
						  
						</div>

									
					 </div> 


	<br>
	<br>
		  {{ Form::submit('Create Renewal',array('class' => 'btn btn-primary btn-block')) }} 
         
      
		{{ Form::close() }}
		
 

      </div>

		  
			</div>
      </div>
  
	</div>
   @endsection
