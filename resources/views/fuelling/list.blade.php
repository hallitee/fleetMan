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
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-industry"></i> Fuel Records</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-sm table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
				  <th>#</th>
                  <th>Fuel date</th>
                  <th>Fleet dept</th>
                  <th>Vehicle</th>
				  <th>Reg No.</th>
                  <th>Driver</th>
				  <th>Fuel Station</th>
				  <th>Ltr Price</th>
                  <th>Meter reading</th>
				  <th>Ltr Pumped</th>
				  <th>Cost (NGN)</th>
                  <th>Last Milage</th>
				  <th>Fuel Economy</th>                  
                </tr>
              </thead>

              <tbody>
			  
					 @foreach($app as $num=>$l)
						<tr>
						  <th scope="row">{{ $loop->iteration}}</th>
						  <td>{{ explode(' ',$l->created_at)[0] }}</td>
						  <td>{{ $l->fleet->department->name.' '.$l->fleet->department->company->name }}</td>
					
						  <td>{{$l->fleet->make.' '.$l->fleet->model}}</td>     
						  <td>{{$l->fleet->regNo}}</td>
						  <td>{{$l->remarks}}</td>     
						  <td>{{$l->fillingStation }}</td>
						  <td>{{$l->pricePerLitre}}</td>
						  <td>{{$l->meterReading}}</td>     
						  <td>{{$l->pumpedLitres }}</td>
						  <td>{{ ($l->pricePerLitre * $l->pumpedLitres) }}</td>
						  <td>{{$l->lastMilage}}</td>     
						  <td></td>
						  
						</tr>
						@endforeach

 
              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer small text-muted">{{ Carbon\Carbon::now() }}</div>
      </div>

@endsection