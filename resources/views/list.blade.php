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
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Reservation List</div>
        <div class="card-body">
			@include('listing')
		</div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
      </div>
  
  
  
	</div>
   @endsection