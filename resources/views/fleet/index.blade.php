@extends('layouts.master')
   @section('js')
      <script>
   	function getDept(){	
		const company = document.getElementById('selComp');
		company.addEventListener('change',(elem)=>{
				$.ajax({
					type: 'GET',
					url: "/load/dept?id="+company.value,
					dataType: 'JSON',
					beforeSend: function(xhr)
					{xhr.setRequestHeader('X-CSRF-Token', $('meta[name="csrf-token"]').attr('content'))},
					data: {
					},  
					error: function( xhr ){ 
					// alert("ERROR ON SUBMIT");
				//	console.log("error on submit"+xhr);
					},
					success: function( data ){ 
					console.log(data);
				  const dept =  document.getElementById('selDept');
				  dept.remove(dept.children);
				  data.forEach(function(num){
					 let opt = document.createElement('Option'); 
					 opt.value = num.id;
					 opt.innerText = num.name;
					 dept.append(opt);
					});
					}
					
				});	
			
			
		/*	fetch('/load/dept?id='+company.value, {
				method: 'get',
				headers: {
				  "Content-type": "application/x-www-form-urlencoded; charset=UTF-8"
				},
				
			  })
			  .then(function(response) {
					return response.json();
				  })
			  .then(function (data) {
				  const dept =  document.getElementById('selDept');
				  dept.remove(dept.children);
				  data.forEach((num)=>{
					 let opt = document.createElement('Option'); 
					 opt.value = num.id;
					 opt.innerText = num.name;
					 dept.append(opt);					  
				  });
				console.log('Request succeeded with JSON response', data.length);
			  })
			  .catch(function (error) {
				console.log('Request failed', error);
			  });
				*/
			/*
			fetch('/load/dept?id='+company.value)
			  .then(status)
			  .then(function(data) {
				console.log('Request succeeded with JSON response', data );
			  }).catch(function(error) {
				console.log('Request failed', error);
			  });

			*/
			console.log(" company changed " + company.value );
			}, false);
			
	}
	getDept();
   	function  validateDate(){
			month = document.querySelector('input[type="month"]');
			month.addEventListener('blur',(e)=>{
				arr = month.value.split(/(-|\/)/i);
				date = new Date();
				if(arr.length===3){
					const year = arr[0];
					const month = arr[2];
					
					if(Number(arr[0])>1990 && Number(arr[0])<=date.getFullYear()){
						//error function runs here						
						if(Number(arr[2])>0 && Number(arr[2])<=12){
							is_valid(true);
						}
						else{
							//error function
							is_valid(false);
								console.log("Month error");
						}
						
					}else{
						//errro function rns here
							console.log("Year error");
							is_valid(false);
					}
					
					
				}
				else{
					
				}
			}, false);
			
			
			
		}
		validateDate();
			function is_valid(valid){
			dateField = document.querySelector('#regDate');
			btn = document.querySelector('input[type="submit"]');
			
			if(valid){
				console.log("Within valid");
				btn.disabled = false;				
				dateField.style = '';
			}else{
				console.log("Within valid else");
				btn.disabled = true;				
				dateField.style.border = '0.09em solid red';		
				
			}		
			
		}

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
			
				   

			
				<div class="card-header"><h4 class="text-center">Create New Fleet</h4></div>
				
				<div class="card-body">
       {{ Form::open(['action' => array('FleetController@store'),'id'=>'fleetstore', 'name'=>'fleetSave']) }}
					<div class="form-row">
						<div class="form-group col-md-6">
						  <label for="inputEmail4">Make *</label>
						  {{ Form::select('make',config('app.make'),"",array('class' => 'input-md form-control', 'required', 'placeholder'=>'Select a car make ')) }} 
						</div>
						<div class="form-group col-md-6">
						  <label for="inputPassword4">Model *</label>
						  {{ Form::text('model','',array('class' => 'input-md form-control','required', 'placeholder'=>'Enter car model')) }} 
						</div>
					 </div> 
					<div class="form-row">
						<div class="form-group col-md-4">
						  <label for="inputEmail4">Body Style *</label>
						  {{ Form::select('style',config('app.style'),"",array('class' => 'input-md form-control','placeholder'=>'Select car body type ', 'required')) }} 
						</div>
						<div class="form-group col-md-4">
						  <label for="inputPassword4">Year (Manufacture) </label>
						  {{  Form::selectYear('year', 1995, 2019,'2019',array('class' => 'input-md form-control', 'placeholder'=>'Enter car manufacture year')) }}
						  
						</div>
						<div class="form-group col-md-4">
						  <label for="inputPassword4">Registration Date *</label>
						<input type="month" id='regDate' class="input-md form-control"  placeholder="date format: 2019-10" name="regDate" required>
						</div>						
					 </div> 					 
					<div class="form-row">
						<div class="form-group col-md-4">
						  <label>Registration Number *</label>
						  {{ Form::text('regNo',"",array('class' => 'input-md form-control','placeholder'=>'Enter vehicle registration number', 'required')) }} 
						</div>
						<div class="form-group col-md-4">
						  <label for="inputPassword4">VIN Number (Chasis) </label>
						  {{  Form::text('chasis','',array('class' => 'input-md form-control', 'placeholder'=>'Enter vehicle chasis number')) }}
						  
						</div>
						<div class="form-group col-md-4">
						<label for="inputPassword4">Cost</label>	
						<div class="input-group">
						  <input type="number" name="cost" class="form-control" placeholder="Vehicle cost" aria-label="Vehicle cost" aria-describedby="basic-addon2">
						  <div class="input-group-append">
							<span class="input-group-text" id="basic-addon2">{{ Form::select('curr',["NGN"=>"NGN","USD"=>"USD"],"") }} </span>
						  </div>
						</div>
						</div>
									
					 </div> 						 
					<div class="form-row">
						<div class="form-group col-md-4">
						  <label for="inputEmail4">Company *</label>
						  {{ Form::select('comp',$comp,"",array('class' => 'input-md form-control','id'=>'selComp','placeholder'=>'Select company', 'required')) }} 
						</div>
						<div class="form-group col-md-4">
						  <label for="inputPassword4">Department * </label>
						  {{  Form::select('dept', [],'', array('class' => 'input-md form-control','id'=>'selDept','required', 'placeholder'=>'Select Department')) }}						  
						</div>
						<div class="form-group col-md-4">
						  <label for="inputPassword4">PIC </label>
							<input type="text" class="input-md form-control"  name="pic">
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
