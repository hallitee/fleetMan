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
<style>
.table1 {
	border-collapse: collapse;
	}
.table1 th{

	border: 1px solid black
	}
.table1 td{

	border: 1px solid black
	}
</style>
</head>
<body>
Dear {{ucfirst(explode(".", explode("@",$form->reqEmail)[0])[0]) }},
<br>
<br>
Your car request has been allocated, please find your trip information below.
Inform your driver to retrieve the gate pass from <strong>{{ ucfirst(explode(' ', $form->gaName)[0]) }}</strong>, then clock at GA desk to start trip and repeat same on return to end trip.

<br>
<br>
<table class="table1">
<thead>
<tr>
	<th colspan='4' class="text-center"><div class="h5">Trip Information</div> </th>
</tr>
</thead>

<tbody>
	<tr>
	<th>Vehicle:</th><td>{{ ($car->Make.' '.$car->Model) }}</td>
	<th>Registration:</th><td>{{$car->RegNo}}</td>
	</tr>	
		<tr>
	<th>Driver:</th><td>{{$drv->drvName}}</td>
	<th>Passenger:</th><td>{{$form->reqName}}</td>
	</tr>
	<tr>
	<th>Date:</th><td>{{$form->reqDate.' '.$form->reqTime}}</td>
	<td><b>Return Time:</b> {{$form->reqTime.' HR'}}</td>
    <td><b>Duration: </b>{{$form->reqDur.' '.' min'}}</td> 

	</tr>
	<tr>
	<th>To:</th><td colspan="3">{{$form->reqDest}}</td>
	</tr>
	<tr>
	<th>Purpose:</th><td colspan="3">{{$form->purpose}}</td>
	</tr>
</tbody>
</table>
<br>
<br>
Please always ensure driver returns within the allocated return time.
<br>
<p>
To print your gatepass please click the link <a href="{{ route('reserve.gate', [$form->id,$form->reqCode]) }}">Print Gatepass</a>
</p>
Have a safe trip, 
<br>
<br>
IT Department
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