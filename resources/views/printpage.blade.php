<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>{{ env('APP_NAME')  }}</title>
<link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="{{ asset('vendor/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.css') }}" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="{{ asset('css/sb-admin.css') }}" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
<style type="text/css" media="print">
    @page 
    {
        size: auto;   /* auto is the initial value */
        margin: 10mm;  /* this affects the margin in the printer settings */
		//border: 1px solid black;
    }

    body 
    {
        background-color:#FFFFFF; 
        border: none;
        margin: 5px;  /* this affects the margin on the content before sending to printer */
   }

  .table-bordered > tbody > tr > td, .table-bordered > tbody > tr > th, .table-bordered > tfoot > tr > td, .table-bordered > tfoot > tr > th, .table-bordered > thead > tr > td, .table-bordered > thead > tr > th {
	border: 1px solid #0c0b0b;
} 
</style>
</head>
<body>
<div class="row">
<div class="col-md-6">
<table class="table table-bordered table-sm table-center">
<thead>
<tr>
	<th colspan='4' class="text-center"><div class="h5">Vehicle Movement GatePass</div> </th>
</tr>
</thead>
<tfoot>

<tr>
	<th colspan='4' class="text-center"><div class="h5">Drivers Copy</div> </th>
</tr>
	<tr>
	<th>Vehicle:</th><td>{{$car->Make.' '.$car->Model}}</td>
	<th>Registration:</th><td>{{$car->RegNo}}</td>
	</tr>
		<tr>
	<th>Departure Date:</th><td>{{$req->reqDate}} <span><b> Time:</b>{{$req->reqTime}}</span></td>
	<th>Expected Return:</th><td>{{ explode(' ',$req->retTime)[0]}} <span><b> Time:</b>{{explode(' ',$req->retTime)[1]}}</span></td>
	</tr>
	<tr>
	<th>To:</th><td colspan="3">{{$req->reqDest}}</td>
	</tr>
	<tr><td colspan="2">Scan before journey start and on return from trip.</td>
	<td colspan="2"><img class="img-fluid" src="data:image/png;base64,{{DNS1D::getBarcodePNG($req->reqCode, 'C39+')}}" alt="barcode" />
	<br>
	<h5>{{$req->reqCode}}</h5>
	</td>
	</tr>
</tfoot>
<tbody>
	<tr>
	<th>Vehicle:</th><td>{{$car->Make.' '.$car->Model}}</td>
	<th>Registration:</th><td>{{$car->RegNo}}</td>
	</tr>	
		<tr>
	<th>Driver:</th><td>{{$drv->drvName}}</td>
	<th>Passenger:</th><td>{{$req->reqName}}</td>
	</tr>
	<tr>
	<th>Departure Date:</th><td>{{$req->reqDate}} <span><b> Time:</b>{{$req->reqTime}}</span></td>
	<th>Expected Return:</th><td>{{ explode(' ',$req->retTime)[0]}} <span><b> Time:</b>{{explode(' ',$req->retTime)[1]}}</span></td>
	</tr>
	<tr>
	<th>To:</th><td colspan="3">{{$req->reqDest}}</td>
	</tr>
	<tr>
	<th>Purpose:</th><td colspan="3">{{$req->purpose}}</td>
	</tr>
	<tr>
	<th>HOD Sign:</th><td>{{$req->hod.' '.$req->hodAppr	}}</td>
	<th>GA Sign:</th><td>{{ $req->gaName.' '.$req->gaAppReq }}</td>
	</tr>
		<tr>
	<th>Security Sign:</th><td colspan="3"></td>
	</tr>
</tbody>
</table>
</div>
 </div>
    <script src="{{ asset('vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- Core plugin JavaScript-->
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>
    <!-- Page level plugin JavaScript-->
    <script src="{{ asset('vendor/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.js') }}"></script>
    <!-- Custom scripts for all pages-->
    <script src="{{ asset('js/sb-admin.min.js') }}"></script>
    <!-- Custom scripts for this page-->
    <script src="{{ asset('js/sb-admin-datatables.min.js') }}"></script>
    <!-- Custom Theme JavaScript -->
</body>
 </html>