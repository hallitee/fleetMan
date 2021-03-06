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
          <i class="fa fa-industry"></i> Manage Renewals </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
				  <th>#</th>
                  <th>Name</th>
                  <th>Issuer</th>
                  <th>Contact</th>
                  <th>Contact Number</th>
				  <th>Validity Period</th>
				  <th>{{ ((Auth::user()->role>=3)? "Edit" : "View" )}}</th>
				  @if(Auth::user()->role>=4)
                  <th>Delete</th>			
				  @endif			  
                </tr>
              </thead>
              <tfoot>
                <tr>
				  <th>#</th>
                  <th>Name</th>
                  <th>Issuer</th>
                  <th>Contact</th>
                  <th>Contact Number</th>
				  <th>Validity Period</th>
                  <th>{{ ((Auth::user()->role>=3)? "Edit" : "View" )}}</th>
				  @if(Auth::user()->role>=4)				  
                  <th>Delete</th>	
				  @endif
                </tr>
              </tfoot>
              <tbody>
			  
					 @foreach($app as $num=>$l)
						<tr>
						  <th scope="row">{{ $loop->iteration}}</th>
						  <td>{{ $l->name }}</td>
						  <td>{{ $l->issuer }}</td>					
						  <td>{{$l->contactName}}</td>     
						  <td>{{$l->contactNum}}</td>
						  <td>@if($l->validity) {{$l->validity.' '.$l->valid_uom}} @endif</td>     
						  @if(Auth::user()->role>=3)
						   <td><a href="{{ route('renewal.edit', $l->id) }}"><button class="btn btn-sm btn-info">Edit</button></a></td>
							@else
							<td><a href="{{ route('renewal.show', $l->id) }}"><button class="btn btn-sm btn-info">View</button></a></td>	
							
							@endif
						  @if(Auth::user()->role>=4)
							<td>
							{!! Form::open(['action' => array('RenewalMasterController@destroy', $l->id),'method'=>'DELETE']) !!}
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