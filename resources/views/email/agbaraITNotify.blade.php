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
Good Day, 
<br>
<br>
This is to notify you of a possible trip to Agbara according to the below request, please contact requestor to get further trip details. 
<br>
			
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

</tr>

</table>
<br>
<br>

<br>
<br>
<br>
IT Department
</body>
</html>