<?php

namespace App\Http\Controllers;

use App\renewal_record;
use App\fleet;
use App\renewalMaster;
use Validator;
use Illuminate\Http\Request;

class RenewalRecordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
	public function __construct(){
		  return $this->middleware('auth');
	 }
	public function create(){
		$f = fleet::get();
		$arr =[];
		$brr=[];
		foreach($f as $a){
			$arr[$a->id]=$a->make.' '.$a->model.' '.$a->regNo;
		}
		$g = renewalMaster::get();
		
		foreach($g as $b){
			$brr[$b->id] = $b->name;
		}
		
		return view('renewalrecords.index')->with(['fleet'=>$arr,'renew'=>$brr]);		
	}
	public function index()
    {
        //
		$r = renewal_record::with(['fleet', 'renewmaster'])->orderBy('nextSub', 'desc')->get();
		return view('renewalrecords.list')->with(['app'=>$r]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response

    {
    public function create()
    {
        //
		$f = fleet::get();
		$r = renewalMaster::get();
		$arr = [];
		$brr = [];
		foreach($f as $a){
			$arr[$a->id] = $a->make.' '.$a->model.' '.$a->regNo;
		}
		foreach($r as $b){			
			$brr[$b->id] = $b->name. ' '.$b->issuer;
		}
			
		return view('renewalrecords.index')->with(['fleet'=>$arr, 'renew'=>$brr]);
		
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        //
		
				$validator = Validator::make($req->all(), [
					'fleetid' => 'required',
					'renewal' => 'required',
					'payDate'=> 'required',
					'nextDateH' => 'required'
								],[
					'fleet.required'=>'Please select fleet, can not be empty',
					'renewal.required'=>'Please enter fleet type, can not be empty',
					'payDate.required'=>'Enter last renewal date',
					'nextDateH.required'=>'Next renewal date'
								]);
					if ($validator->fails()) {
						return redirect()->back()
									->withErrors($validator)
									->withInput();
					}
					
		
		$ren =  new renewal_record;
		$ren->lastSub = $req->payDate;
		$ren->nextSub = $req->nextDateH;
		$ren->renewalCost = $req->renCost;
		$ren->notType = $req->notify;
		$ren->notFreq = $req->notUom;
		if($req->has('notify')){
			if($req->has('notUom')){
				switch($req->notUom){
					case "Hour":
					case "Hours" :
					break;
					case "Day":
					case "Days":{
					$req->notify *= 24;
					break;
					}
					case "Week":
					case "Weeks":{
						$req->notify*= (7*24);
						break;						
					}
					case "Month":
					case "Months":{
						$req->notify*=(7*24*30);
						break;						
					}
					case "Year":
					case "Years" :{
						$req->notify*= (24*7*52);
						break;						
					}

			}
				
			}
			else{
				return redirect('renewals')->with(["status"=>"Error in form","alert"=>"danger"]);
				
			}
			
		}
		$ren->notDate = $req->notify;
		$ren->paidBy = $req->payee;
		$ren->fleet_id = $req->fleetid;
		$ren->renewal_id = $req->renewal;
		$ren->status = 1;
		$ren->save();
		return redirect('renewals')->with(["status"=>"Renewals created successfully","alert"=>"success"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\renewal_record  $renewal_record
     * @return \Illuminate\Http\Response
     */
    public function show(Request $req)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\renewal_record  $renewal_record
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $req)
    {
        //
		$ren = renewal_record::with(['fleet', 'renewmaster'])->find($req->id);
		$f = fleet::get();
		$r = renewalMaster::get();
		$arr = [];
		$brr = [];
		foreach($f as $a){
			$arr[$a->id] = $a->make.' '.$a->model.' '.$a->regNo;
		}
		foreach($r as $b){			
			$brr[$b->id] = $b->name. ' '.$b->issuer;
		}
			
		return view('renewalrecords.editt')->with(['fleet'=>$arr, 'renew'=>$brr,'app'=>$ren]);
    }
   
   public function activate(Request $req){
			 
		$ren = renewal_record::with(['fleet', 'renewmaster'])->find($req->id);
		$f = fleet::get();
		$r = renewalMaster::get();
		$arr = [];
		$brr = [];
		foreach($f as $a){
			$arr[$a->id] = $a->make.' '.$a->model.' '.$a->regNo;
		}
		foreach($r as $b){			
			$brr[$b->id] = $b->name. ' '.$b->issuer;
		}
			
		return view('renewalrecords.edit')->with(['fleet'=>$arr, 'renew'=>$brr,'app'=>$ren]);
		 }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\renewal_record  $renewal_record
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req)
    {
        //
			$validator = Validator::make($req->all(), [
			'fleetid' => 'required',
			'renewal' => 'required',
			'payDate'=> 'required',
			'nextDateH' => 'required'
						],[
			'fleet.required'=>'Please select fleet, can not be empty',
			'renewal.required'=>'Please enter fleet type, can not be empty',
			'payDate.required'=>'Enter last renewal date',
			'nextDateH.required'=>'Next renewal date'
						]);
			if ($validator->fails()) {
				return redirect()->back()
							->withErrors($validator)
							->withInput();
			}
			if($req->has('action')){
			$r =  renewal_record::find($req->id);
			$r->notSent = 10;
			$r->save();			
			$ren =  new renewal_record;
		$ren->lastSub = $req->payDate;
		$ren->nextSub = $req->nextDateH;
		$ren->renewalCost = $req->renCost;
		$ren->notType = $req->notify;
		$ren->notFreq = $req->notUom;
		if($req->has('notify')){
			if($req->has('notUom')){
				switch($req->notUom){
					case "Hour":
					case "Hours" :
					break;
					case "Day":
					case "Days":{
					$req->notify *= 24;
					break;
					}
					case "Week":
					case "Weeks":{
						$req->notify*= (7*24);
						break;						
					}
					case "Month":
					case "Months":{
						$req->notify*=(7*24*30);
						break;						
					}
					case "Year":
					case "Years" :{
						$req->notify*= (24*7*52);
						break;						
					}

			}
				
			}
			else{
				return redirect('renewals')->with(["status"=>"Error in form","alert"=>"danger"]);
				
			}
			
		}
		$ren->notDate = $req->notify;
		$ren->paidBy = $req->payee;
		$ren->fleet_id = $req->fleetid;
		$ren->renewal_id = $req->renewal;
		$ren->notSent = 0;
		$ren->status = 1;
		$ren->save();
			
		return redirect('renewals')->with(["status"=>"Renewals created successfully","alert"=>"success"]);
			
		}
						
		
		$ren =  renewal_record::find($req->id);
		$ren->lastSub = $req->payDate;
		$ren->nextSub = $req->nextDateH;
		$ren->renewalCost = $req->renCost;
		$ren->paidBy = $req->payee;
		$ren->fleet_id = $req->fleetid;
		$ren->notType = $req->notify;
		$ren->notFreq = $req->notUom;		
		$ren->renewal_id = $req->renewal;		
		$ren->save();

		return redirect('renewals')->with(["status"=>"Renewals updated successfully","alert"=>"success"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\renewal_record  $renewal_record
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $req)
    {
        //
		
		$r = renewal_record::find($req->id);
		$r->status = 0;
		$r->save();
		return redirect('renewals')->with(["status"=>"Renewals deleted successfully","alert"=>"success"]);
		
    }
}
