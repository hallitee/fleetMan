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
			
				  <div class="container">
	<div class="card mx-auto">
  
        <div class="card-header text-center"><div class="h4"> <h1 class="text-primary" style="text-align: center;">Laravel 5 Barcode Generator Using milon/barcode</h1></div></div>
  
  
<div class="container text-center" style="border: 1px solid #a1a1a1;padding: 15px;width: 70%;">

	<img src="data:image/png;base64,{{DNS1D::getBarcodePNG('11', 'C39')}}" alt="barcode" />
	<br/>
	<br/>
	<img src="data:image/png;base64,{{DNS1D::getBarcodePNG('12', 'C39+')}}" alt="barcode" />
	<br/>
	<br/>
	<img src="data:image/png;base64,{{DNS1D::getBarcodePNG('13', 'C39E')}}" alt="barcode" />
	<br/>
	<br/>
	<img src="data:image/png;base64,{{DNS1D::getBarcodePNG('14', 'C39E+')}}" alt="barcode" />
	<br/>
	<br/>
	<img src="data:image/png;base64,{{DNS1D::getBarcodePNG('15', 'C93')}}" alt="barcode" />
	<br/>
	<br/>
	<img src="data:image/png;base64,{{DNS1D::getBarcodePNG('19', 'S25')}}" alt="barcode" />
	<br/>
	<br/>
	<img src="data:image/png;base64,{{DNS1D::getBarcodePNG('20', 'S25+')}}" alt="barcode" />
	<br/>
	<br/>
	<img src="data:image/png;base64,{{DNS1D::getBarcodePNG('21', 'I25')}}" alt="barcode" />
	<br/>
	<br/>
	<img src="data:image/png;base64,{{DNS1D::getBarcodePNG('22', 'MSI+')}}" alt="barcode" />
	<br>
	<br/>
	<img src="data:image/png;base64,{{DNS1D::getBarcodePNG('23', 'POSTNET')}}" alt="barcode" />
	<br/>
	<br/>
	<img src="data:image/png;base64,{{DNS2D::getBarcodePNG('16', 'QRCODE')}}" alt="barcode" />
	<br/>
	<br/>
	<img src="data:image/png;base64,{{DNS2D::getBarcodePNG('17', 'PDF417')}}" alt="barcode" />
	<br/>
	<br/>
	<img src="data:image/png;base64,{{DNS2D::getBarcodePNG('18', 'DATAMATRIX')}}" alt="barcode" />

</div>


	<br>
	<br>
	<br>
	
	<br>
  
	</div>

   @endsection