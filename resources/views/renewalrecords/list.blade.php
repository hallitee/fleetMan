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
          <i class="fa fa-industry"></i> Renewals List </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-sm table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
				  <th>#</th>
				  <th>Make</th>
				  
				  <th>Model</th>
				  <th>Reg. No</th>
                  <th>Renewal</th>
                  <th>Validity</th>
                  <th>Last Sub</th>
				  <th>Next Date</th>
				  <th>Cost</th>
				  <th>{{ ((Auth::user()->role>=3)? "Edit" : "View" )}}</th>
				  @if(Auth::user()->role>=4)
                  <th>Delete</th>			
				  @endif			  
                </tr>
              </thead>
           

			<tbody>
			  
					 @foreach($app as $num=>$l)
						<tr>
						  <th scope="row">{{ $loop->iteration}}</th>
						  <td>{{ $l->fleet->make }}</td>
						  <td>{{ $l->fleet->model }}</td>
						  <td>{{ $l->fleet->regNo }}</td>
						  <td>{{ $l->renewmaster->name }}</td>					
						  <td>{{$l->renewmaster->validity.' '.$l->renewmaster->valid_uom }}</td>     
						  <td>{{$l->lastSub}}</td>
						  <td>{{ $l->nextSub }}</td>    
							<td>{{ $l->renewalCost }}</td>   
						  @if(Auth::user()->role>=3)
						   <td><a href="{{ route('renewals.edit', $l->id) }}"><button class="btn btn-sm btn-info">Edit</button></a></td>
							@else
							<td><a href="{{ route('renewals.show', $l->id) }}"><button class="btn btn-sm btn-info">View</button></a></td>	
							
							@endif
						  @if(Auth::user()->role>=4)
							<td>
							{!! Form::open(['action' => array('RenewalRecordController@destroy', $l->id),'method'=>'DELETE']) !!}
							<button class="btn btn-sm btn-danger" type="submit">Delete</button>
						   {!! Form::close() !!}
						  </td>       
						  @endif
						</tr>
						@endforeach

 
              </tbody>
            </table>
          </div>
        </div>
    <!--    <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div> -->
      </div>

@endsection