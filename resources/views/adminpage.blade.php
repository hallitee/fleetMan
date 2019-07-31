@extends('layouts.master')
@section('css')
	<script>
		$(document).ready(function(){
		
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
			
				  <div class="container">
    <div class="card mx-auto mt-8">
      <div class="card-header"> Dashboard </div>
      <div class="card-body">

      <div class="row">
        <div class="col-xl-6 col-sm-6 mb-3">
          <div class="card text-white bg-primary o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-group"></i>
              </div>
            <div class="row">
			<div class="col-xl-6">Available</div>
			<div class="col-xl-6">{{ $drv }}</div>
			</div>
            <div class="row">
			<div class="col-xl-6">On Trip</div>
			<div class="col-xl-6">{{ $drvOut }}</div>
			</div>			
            </div>
            <a class="card-footer text-white clearfix small z-1" href="#">
              <h4 class="float-left">Drivers</h4>
              <span class="float-right">
               
              </span>
            </a>
          </div>
        </div>
        <div class="col-xl-6 col-sm-6 mb-3">
          <div class="card text-white bg-warning o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-cab"></i>
              </div>
            <div class="row">
			<div class="col-xl-6">Available</div>
			<div class="col-xl-6">{{ $car }}</div>
			</div>
            <div class="row">
			<div class="col-xl-6">On Trip</div>
			<div class="col-xl-6">{{ $drvOut }}</div>
			</div>	
            </div>
            <a class="card-footer text-white clearfix small z-1" href="#">
              <h4 class="float-left">Cars</h4>
              <span class="float-right">
               
              </span>
            </a>
          </div>
        </div>
		<!--
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-success o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-shopping-cart"></i>
              </div>
              <div class="mr-5">123 New Orders!</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="#">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-danger o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-support"></i>
              </div>
              <div class="mr-5">13 New Tickets!</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="#">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
     
				-->
	 </div>
	        <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-area-chart"></i> Monthly Reservations</div>
        <div class="card-body">
          <canvas id="myAreaChart" width="100%" height="30"></canvas>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
      </div>
      </div>
    </div>
  </div>
 				
		
        </div>

      </div>

  
	</div>
   @endsection