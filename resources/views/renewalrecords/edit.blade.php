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

		</div>
	</div>
		<!-- Breadcrumbs-->
		

      <div class="row">
        <div class="col-10 offset-1">
			<div class="card col-md-10 offset-1">
				<div class="card-header"><h4 class="text-center">Renew {{ $app->renewmaster->name}}</h4></div>
				
				<div class="card-body">
	   
		   {!! Form::open(['action' => array('RenewalRecordController@update', $app->id),'params'=>'renew','method'=>'PUT']) !!}
					<div class="form-row">
						<div class="form-group col-md-12">
						  <label for="inputEmail4">Fleet *</label>
						  {{ Form::text('fleetid',$app->fleet->make.' '.$app->fleet->model.' '.$app->fleet->regNo,array('class' => 'input-md form-control', 'required', 'placeholder'=>'Enter renewal name ', 'readonly')) }} 
						</div>
					 </div> 
					<div class="form-row">
						<div class="form-group col-md-6">
						  <label for="inputEmail4">Renewal Type</label>
						  {{ Form::text('renewal',$app->renewmaster->name,array('class' => 'input-md form-control','placeholder'=>'Enter renewal type', 'readonly')) }} 
						</div>	
						<div class="form-group col-md-6">
						  <label for="inputEmail4">Validity Period</label>
						  {{ Form::text('expiry',$app->renewmaster->validity.' '.$app->renewmaster->valid_uom,array('class' => 'input-md form-control','placeholder'=>'Enter validity period', 'readonly')) }} 
						  
						</div>
						
					 </div> 					 
					<div class="form-row">
						<div class="form-group col-md-4">
						  <label>Valid From *</label>
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
						  <input type="text" name="notify" value="{{ $app->notType }}" id="notText" class="form-control">
						  <div class="input-group-append">
							<span class="input-group-text" id="basic-addon2">{{ Form::select('notUom',[''=>'','Hour'=>'Hour','Day'=>'Day','Week'=>'Week'],$app->notFreq, array('id'=>'notUomSel')) }} </span>
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
						  {{ Form::text('renCost',$app->renewalCost,array('class' => 'input-md form-control','placeholder'=>'Cost of renewal')) }} 
						</div>
						<div class="form-group col-md-6">
						  <label for="inputPassword4">Paid By </label>
						  {{  Form::text('payee',$app->paidBy,array('class' => 'input-md form-control', 'placeholder'=>'Renewal paid by ')) }}
						  
						</div>

									
					 </div> 


	<br>
	<br>
		  {{ Form::submit('Reactivate Renewal',array('class' => 'btn btn-primary btn-block')) }} 
         
      
		{{ Form::close() }}
      </div>

		  
			</div>
      </div>
  
	</div>
   @endsection
   @section('js')
 <script>

renewal =  {!!  $app->renewmaster->toJson()  !!}

console.log(" Activated script");

</script>  
   @endsection