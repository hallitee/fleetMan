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
	  	<br>
		<br>
		<div class="col-md-6 offset-md-3">
		<div class="table-responsive">
            <table class="table table-bordered" id="datatable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th colspan="2" class="text-center h4">Trip Status</th> 
                </tr>
              </thead>        
				<tbody id="tbody1">
				<tr>
				<td colspan="2"><input name="trip" id="mytrip" value="" class="form-control" /></td>
				
				</tr>
				</tbody>
				<tfoot id="tripFoot">
		
				</tfoot>
			</table>
			
		 </div>
		 <button class="btn btn-primary btn-block" id="tripStat">Update Trip</button>
		</div>

		
	</div>
</div>
	

   @endsection
