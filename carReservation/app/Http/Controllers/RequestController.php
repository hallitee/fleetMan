<?php

namespace App\Http\Controllers;

use App\req;
use App\User;
use Illuminate\Http\Request;
use App\Jobs\sendRequestorMailJob;
use App\Jobs\sendApproverEmail;
use App\Jobs\sendCreatorEmail;
use App\Jobs\sendGAEmail;
use Carbon\Carbon;
use Auth;
use App\Carmaster;
use App\Driver;

class RequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
	public function __construct(){
		 
		 $this->middleware("auth")->except(['store','tracking','tripstat','update']);
		 date_default_timezone_set('Africa/Lagos');
	 }
	public function random_code($length)
	{
	  return substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, $length);
	}
    public function index()
    {
        //
		$req = req::orderBy('created_at', 'desc')->get();
		foreach($req as $r){
		if(empty($r->retTime)){
		$start = Carbon::parse(date_create($r->reqDate.' '.$r->reqTime)->format('Y-m-d H:i:s'));
		$now  = Carbon::parse(date_create('now')->format('Y-m-d H:i:s'));	
				$diff = $now->diffInHours($start);
				if(($diff/24)>2){		
					
					$r->reqStatus=1;
					$r->save();					
					
				}
				
			}
		}
		return view('list')->with(['req'=>$req]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    public function gatepass(Request $req)
    {
		$r = req::find($req->id);
		$c = Carmaster::withoutGlobalScope('active')->find($r->car_id);
		$d = Driver::withoutGlobalScope('active')->find($r->driver_id);
		return view('printpage')->with(['req'=>$r,'car'=>$c,'drv'=>$d]);
	}
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        
		$r =  new req;
		date_default_timezone_set('Africa/Lagos');
		$code = strtoupper($this->random_code(10));
		$r->reqCode = $code;
		$r->reqName = $req->firstName.' '.$req->lastName;
		$r->reqComp = $req->company;
		$r->reqDept = $req->dept;
		$r->reqEmail = $req->email;
		$r->location = $req->location;
		$r->reqDest = $req->dest;
		if($req->has('otherDest')){ $r->reqDest = 'Others:'.$req->otherDest; }
		$r->reqDur = $req->tripDur;
		$r->reqDate = $req->tripDate;
		$r->hodName = $req->hodemail;
		$r->reqTime = $req->tripTime;
		$r->reqPass = intval($req->passenger);
		$r->passLoad =$req->load;
		$r->purpose = $req->notes;
		$r->save();
		dispatch((new sendRequestorMailJob($r, $req->email))->delay(Carbon::now()->addMinutes(1)));
		if(count(explode(';',$req->hodemail))>1){
				$email = explode(';',$req->hodemail);
				foreach($email as $key=>$b){
				dispatch((new sendApproverEmail($r, $key))->delay(Carbon::now()->addMinutes(1)));
				}
		}else{
			dispatch((new sendApproverEmail($r, 0))->delay(Carbon::now()->addMinutes(1)));
		}
		return redirect('/')->with(['status'=>'Car reservation made successfully, tracking code - '.$code,'alert'=>'success']);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\request  $request
     * @return \Illuminate\Http\Response
     */
    public function show(request $request)
    {
        //
		
    }

	public function tripstat(Request $req)
    {
		
		return view('triptracker');
	}
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\request  $request
     * @return \Illuminate\Http\Response
     */
	public function allocate(request $req)
    {
		
		date_default_timezone_set('Africa/Lagos');
		$r = req::with(['car', 'driver'])->find($req->id);
		$r->gaAppReq = date_create('now')->format('Y-m-d H:i:s');
		if($req->subBtn=='ALLOCATE'){

			


		
		if($req->has('changeDriver')){			
			$r->driver_id = $req->changeDriver;
		}else{			
			$c = Carmaster::find($req->availVeh);
			$d = Driver::where('drvName', 'LIKE', '%'.$c->DriverAsigned.'%')->first();
			$r->driver_id = $d->id;
		}
		$r->car_id = $req->availVeh;
		$base = Carbon::parse(date_create(($r->reqDate.' '.$r->reqTime))->format('Y-m-d H:i:s'));
		$r->retTime = $base->addMinutes(($r->reqDur+$req->rtnTime));
		$returnTime = explode(' ',$r->retTime)[1];
		$res = req::where('reqDate', $r->reqDate)->whereIn('reqStatus', [20,25])->whereBetween('reqTime',[$r->reqTime, $returnTime)->get();
		
		
		$r->reqStatus = 20;
		$r->gaName = Auth::user()->name;
		$r->save();
		$c = Carmaster::find($r->car_id);
		$c->status = 0;
		$c->save();
		
		$d = driver::find($r->driver_id);
		$d->status = 0;
		$d->save();
		
		$copy = explode(';', $r->hodName);
		$bcopy=[];
		$r = req::with(['car'=> function($q){ $q->withoutGlobalScope('active'); },'driver'=>function($s){ $s->withoutGlobalScope('active');}])->find($req->id);	
		if(!empty($r->reqEmail)){			
		$blist = User::where('role', 4)->get();
		foreach($blist as $m){
			array_push($bcopy, $m->email);			
		}
		dispatch((new sendCreatorEmail($r, $c, $d, $copy, $bcopy))->delay(Carbon::now()->addMinutes(1)));
		}
		
		
		
		
		return redirect('reserve')->with(['status'=>'Reservation booked successfully','alert'=>'success']);
		}
		else{
			$r->gaName = Auth::user()->name;
			$r->reqStatus = 15;
			$r->save();
		return redirect('reserve')->with(['status'=>'Reservation declined successfully','alert'=>'danger']);
		}
		
	}
    public function edit(request $req)
    {   
		$res = req::find($req->id);
		$cars = Carmaster::get();
		$car=[''=>''];
		foreach($cars as $c){
			$car[$c->id]=$c->Make.' '.$c->Model.' ('.$c->Fleet.' ) -'.$c->RegNo;
			}
		$drv = Carmaster::find($cars[0]->id);
		$drvs = Driver::get();
		$drvd = [''=>''];
		foreach($drvs as $d){
			$drvd[$d->id]=$d->drvName;
		}
		(empty($res->gaViewReq)) ? ((Auth::user()->role==3) ? ($res->gaViewReq=date_create('now')->format('Y-m-d H:i:s')) : ((Auth::user()->role==4)? ($res->hodViewReq=date_create('now')->format('Y-m-d H:i:s')) : '')) : '';		
		$res->save();
		
		
		
		
		return view('editpage')->with(['req'=>$res,'car'=>$car, 'drv'=>$drv,'drvd'=>$drvd]);
		
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\request  $request
     * @return \Illuminate\Http\Response
     */
	public function tracking(Request $req)
    {
		
		//return $req->tripDate;
		if($req->subBtn=='Cancel Trip'){
		
		$r = req::find($req->reqID);	
		if($r->car_id){
			$c = Carmaster::withoutGlobalScope('active')->find($r->car_id);
			$c->status = 1;
			$c->save();
		}
		if($r->driver_id){
			$d = Driver::withoutGlobalScope('active')->find($r->driver_id);
			$d->status =1;
			$d->save();			
		}
		$r->reqStatus = 5;
		$r->save();
		return view('tracking')->with(['req'=>$r, 'status'=>'Request cancelled successfully','alert'=>'warning']);				
			
		}else{
		if(empty($req->search))	{
		return redirect('/')->with(['status'=>'Please check request code again.','alert'=>'warning']);				
		}
		$req = req::where('reqCode','LIKE', '%'.$req->search.'%')->first();
		}
		return view('tracking')->with(['req'=>$req]);
	}
    public function update(Request $req)
    {
        //
		date_default_timezone_set('Africa/Lagos');
		$copy=[];
		$bcopy = [];
		$email = '';
		$r = req::find($req->id);
		$r->hod = Auth::user()->name;
		$r->hodAppr = date_create('now')->format('Y-m-d H:i:s');
		if($r->reqStatus==10 || $r->reqStatus==5){
		return redirect('/')->with(['status'=>'Already been '.($r->reqStatus==10 ? 'approved' : 'dismissed').' by '.$r->hod.' on '.$r->hodAppr.'.','alert'=>'warning']);				
		}else{	
		$list =  User::where('role', 3)->whereIn('company', [Auth::user()->company,'ALL'])->get();	
		($req->has('hodnotes')) ? ($r->hodRemark = $req->hodnotes) : '' ;
		if($req->subBtn=='APPROVE'){
		$r->reqStatus = 10; 	
		$r->save();	
		if(!empty($list)){		

		foreach($list as $l){
			array_push($copy, $l->email);			
		}
		$blist = User::where('role', 4)->get();
		foreach($blist as $m){
			array_push($bcopy, $m->email);			
		}
		$email = $copy[0];
		unset($copy[0]);
		$copy = array_values($copy);	
		dispatch((new sendGAEmail($r, $email, $copy, $bcopy))->delay(Carbon::now()->addMinutes(1)));
		}
			
		
		return redirect('/')->with(['status'=>'Approved successfully, GA  will be notified for further action.','alert'=>'success']); 
		}
		else{			
		$r->reqStatus=8;
		$r->save();	
		return redirect('/')->with(['status'=>'Dismissed successfully, User will be notified.','alert'=>'danger']);
		}		
		}

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(request $request)
    {
        //
    }
	}
