<?php
use Carbon\Carbon;
use App\approver;
use App\req;
use App\User;
use App\Carmaster;
use App\Driver;
use App\department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Auth\LoginController;
use Maatwebsite\Excel\Facades\Excel;




Auth::routes();
Route::get('/load/dept', function (Request $req){
			$d = department::where('comp_id', $req->id)->get();
			return response()->json($d);		
});
Route::get('/driver/trip', function (Request $req){
	return view('triptracker');
});
Route::get('/loadtrip', function (Request $req){
	date_default_timezone_set('Africa/Lagos');
	$r = req::with('car', 'driver')->where('reqCode','LIKE', '%'.$req->code.'%')->first();	
	//$r = req::with(['car','driver'])->where('reqCode','LIKE', '%'.$req->code.'%')->first();	
	if($r->reqStatus>=20){
	if(empty($r->tripStart)){
//	date_default_timezone_set('Africa/Lagos');
		$start = Carbon::parse(date_create($r->reqDate.' '.$r->reqTime)->format('Y-m-d H:i:s'));
		$now  = Carbon::parse(date_create('now')->format('Y-m-d H:i:s'));
		$end = Carbon::parse(date_create($r->retTime)->format('Y-m-d H:i:s'));
		$endDiff  = explode(" ",$now->diffForHumans($end));
		$startDiff = $start->diffInMinutes($now);
	/*	if($startDiff>60){			
			return response()->json('');
		}
		else{ */
		if($endDiff[2]=='after'){
			if(in_array($endDiff[1],['hour', 'hours'])){
				
				if($endDiff[0]>2){
					$r->tripStart = date_create($r->reqDate.' '.$r->reqTime)->format('Y-m-d H:i:s'); // date_create('now')->format('Y-m-d H:i:s');
					$r->tripEnd = date_create('now')->format('Y-m-d H:i:s');	
					$r->retStatus = $r->reqStatus;
					$r->reqStatus = 28;
					$r->save();					
				}else{
					
							$r->tripStart = date_create('now')->format('Y-m-d H:i:s');		
							$r->reqStatus = 25;
							$r->save();
					
				
				}
			}
			else{
				if(in_array($endDiff[1],['day', 'days'])){
					$r->tripStart = date_create($r->reqDate.' '.$r->reqTime)->format('Y-m-d H:i:s'); // date_create('now')->format('Y-m-d H:i:s');
					$r->tripEnd = date_create('now')->format('Y-m-d H:i:s');	
					$r->retStatus = $r->reqStatus;
					$r->reqStatus = 28;
					$r->save();	
				}
				else{
							$r->tripStart = date_create('now')->format('Y-m-d H:i:s');		
							$r->reqStatus = 25;
							$r->save();					
					
				}
				
				}	
		}else{	
					$r->tripStart = date_create('now')->format('Y-m-d H:i:s');		
					$r->reqStatus = 25;
					$r->save();
	
			}
			
		//}
	}
	else{
		
		$start = Carbon::parse(date_create($r->tripStart)->format('Y-m-d H:i:s'));
		$end = Carbon::parse(date_create($r->retTime)->format('Y-m-d H:i:s'));
		$stop = Carbon::parse(date_create('now')->format('Y-m-d H:i:s'));
		$endDiff  = $end->diffInSeconds($start);
		$stopDiff = $stop->diffInSeconds($start);
		$diff  = ($stopDiff/$endDiff)*100;
		if(empty($r->tripEnd)){
		if($diff>20){			
			$r->tripEnd = date_create('now')->format('Y-m-d H:i:s');
			($diff>100) ? ($r->reqStatus = 28):($r->reqStatus=30);	
			$r->save();
			$c = Carmaster::withoutGlobalScope('active')->find($r->car_id);
			$c->status = 1;
			$c->save();
			$d = Driver::withoutGlobalScope('active')->find($r->driver_id);
			$d->status = 1;
			$d->save();
		}
		}
		
	}
	}else{

		return response()->json('');
		
		
	}
	
	return response()->json($r);
});
Route::get('/barcode', function (Request $req){
	return view('barcode');
});
Route::get('/location', function (Request $req){
	if($req->loc=='WITHIN LAGOS'){
		$data = config('app.within');
	}else{
		$data = config('app.outside');
	}
	return response()->json($data);
});
Route::get('/loaddrivers', function (Request $req){
	$data = Driver::find($req->driver);
	$r = req::find($req->id);
	//$res = req::where('reqDate', $r->reqDate)->where('reqStatus', '>=', 20)->
	
		$chkDate = Carbon::parse(date_create(($r->reqDate.' '.$r->reqTime))->format('Y-m-d H:i:s'));
		$chkDate = $chkDate->subMinutes(60); // Add 45 Minutes between 
		$res = req::whereIn('reqStatus', [20,25])->where('driver_id', $req->driver)->where('retTime', '>', $chkDate)->count();
		//return $res; where('reqDate', $r->reqDate)->
		if($res){  //return redirect with Car not Available error.
							
				return response()->json(["result"=>"failure"]);
		}else{
		
			return response()->json($data);
			
		}
});
Route::get('/loadcars', function (Request $req){
	$data = Carmaster::find($req->car);
	$r = req::find($req->id);
	//$res = req::where('reqDate', $r->reqDate)->where('reqStatus', '>=', 20)->
	
		$chkDate = Carbon::parse(date_create(($r->reqDate.' '.$r->reqTime))->format('Y-m-d H:i:s'));
		$chkDate = $chkDate->subMinutes(60); // Add 45 Minutes between 
		$res = req::whereIn('reqStatus', [20,25])->where('car_id', $req->car)->where('retTime', '>', $chkDate)->count();
		//return $res; //where('reqDate', $r->reqDate)->
		if($res){  //return redirect with Car not Available error.
							
				return response()->json(["result"=>"failure"]);
		}else{
		
			return response()->json($data);
			
		}
});
Route::get('/getapprover', function (Request $form){
	$data = approver::where('dept', $form->dept)->whereIn('company', [$form->comp, 'ALL'])->get();
	return response()->json($data);
});
Route::get('/req/approver', function (Request $req){
	date_default_timezone_set('Africa/Lagos');
	$req->ky = Crypt::decrypt($req->ky);
	$r = req::where('reqCode', 'LIKE', '%'.$req->id.'%')->first();
	$app = approver::where('email','LIKE','%'.$req->ky.'%')->first();
	
	if(!empty($app)){
	if(($app->dept==$r->reqDept) || (($app->company==$r->reqComp) || ($app->company=='ALL'))){
		$u = User::where('email', 'LIKE', '%'.$app->email.'%')->first();
		if(empty($u)){
			return redirect('/')->with(['status'=>'Not registered user!', 'alert'=>'danger']);	
		}else{
			if(empty($r->hodViewReq)){ 
			$r->hodViewReq = date_create('now')->format('Y-m-d H:i:s');
			$r->save();
			}
			
		Auth::loginUsingId($u->id);
		return view('approve')->with('req', $r);
		}
		if(empty($r->hodViewReq)){ 
			$r->hodViewReq = date_create('now')->format('Y-m-d H:i:s');
			$r->save();
			}
			return view('approve')->with('req', $r);
	}
	else{
		
		return redirect('/')->with(['status'=>'Not an authorized approver', 'alert'=>'danger']);
	}
	}
	else{
		return redirect('/')->with(['status'=>'Approver '.$req->ky.' record not found', 'alert'=>'danger']);
	}
	

});
Route::get('/start', 'RequestController@show');
Route::get('logout', function(){
		Auth::logout();
		return redirect('/');

});
Route::resource('reserve', 'RequestController', ['parameters'=>['reserve'=>'id']]);
Route::resource('company', 'CompanyController', ['parameters'=>['company'=>'id']]);
Route::resource('dept', 'DepartmentController', ['parameters'=>['dept'=>'id']]);
Route::resource('renewal', 'RenewalMasterController', ['parameters'=>['renewal'=>'id']]);
Route::resource('fleet', 'FleetController', ['parameters'=>['fleet'=>'id']]);
Route::get('/', function(){	
	return view('index');
})->name('home');
Route::post('allocate{id}', 'RequestController@allocate');
Route::get('/trackit', 'RequestController@tracking');
Route::get('/trip/stat', 'RequestController@tripstat');
Route::get('pushemail/{id}/gatepass/{code}', 'RequestController@pushemail')->name('reserve.push');
Route::get('reserve/{id}/gatepass/{code}', 'RequestController@gatepass')->name('reserve.gate');
Route::get('/loadChart', function(){	
	$data = [];
	$max = 0;
	for ($x=1; $x <= 12; $x++ ){
	 $r = req::whereMonth('created_at', $x)->count();
	 array_push($data, $r);
	 ($r>$max) ? $max=$r : ''; 
	}	
	$arr = array('res'=>$data, 'max'=>$max);
	$d = json_encode($arr);
	return response()->json($arr);
});
Route::get('dashboard', function(){	
	$drv = Driver::count();
	$drvOut = req::whereIn('reqStatus', [20,25])->count();
	$car = Carmaster::count();

	return view('adminpage')->with(['drv'=>$drv, 'drvOut'=>$drvOut, 'car'=>$car]);
})->middleware('auth')->name('dashboard');