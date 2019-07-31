<html>
<head>
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
Dear {{ucfirst(explode(".", explode("@",$email)[0])[0]) }},
<br>
<br>
Your car reservation request has been received and being processed, to track progress of your request please find code below:
<br>
			<h2>{{ $form->reqCode }}</h2>
<br>
<table class="table1">
<tr><td colspan='4' style="text-align:center">Request Information</td>  </tr>
<tr><th>First Name:</th><td>{{ explode(' ',$form->reqName)[0]}}</td>
<th>Last Name:</th><td>{{ explode(' ',$form->reqName)[1]}}</td></tr>
<tr><th>Email Address:</th><td colspan="3">{{ $form->reqEmail }}</td></tr>
<tr><th>Company:</th><td>{{ $form->reqComp}}</td>
<th>Department:</th><td>{{ $form->reqDept }}</td></tr>
<tr><th>Location:</th><td>{{ $form->location}}</td>
<th>Destination:</th><td>{{ $form->reqDest }}</td></tr>
<tr><th>Date:</th><td>{{ $form->reqDate}}</td>
                  	<td><b>Time:</b> {{$form->reqTime.' HR'}}</td>
    <td><b>Duration: </b>{{$form->reqDur.' '.' min'}}</td>   </tr>
<tr>
<th>Passenger:</th><td>{{ $form->reqPass}}</td>
<th>Load:</th>
<td>
@if($form->passLoad)
	YES
@else
	NO
@endif
</td>
</tr>
<tr><th>HOD Email:</th><td colspan="3">{{ $form->hodName }}</td></tr>
<tr><th>Purpose:</th><td colspan='3' style="text-align:left">{{ $form->purpose }}</td>
</tr>

</table>
<br>
<br>
To track click below portal link.
<br>
<a href="{{ url('/') }}"> Car Reservation Portal </a>
<br>
<br>
<br>
IT Department
</body>
</html>