<?php

namespace App\Http\Controllers;
use Validator;
use App\renewalMaster;
use Illuminate\Http\Request;

class RenewalMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
	 public function __construct(){
		 
		 $this->middleware('auth');
		 
	 }
    public function index()
    {
        //
		
		$r = renewalMaster::get();
		
		return view('renewalMaster.list')->with(['app'=>$r]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('renewalMaster.index');
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
					'name' => 'required'
								],[
					'name.required'=>'Enter renewal name'
								]);
					if ($validator->fails()) {
						return redirect()->back()
									->withErrors($validator)
									->withInput();
					}
					
					$r = new renewalMaster;
					$r->name = $req->name;
					$r->desc = $req->desc;
					$r->issuer = $req->issuer;
					$r->issuerAddress = $req->issuerAdd;
					$r->contactName =   $req->contact;
					$r->contactNum = $req->contact ;
					$r->frequency = $req->freq;
					$r->validity =  $req->validity;
					$r->valid_uom =   $req->uom;
					$r->status = 1;
					$r->save();
					
		return redirect('renewal ')->with(["status"=>"Renewal created successfully","alert"=>"success"]);
					
					
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\renewal  $renewal
     * @return \Illuminate\Http\Response
     */
    public function show(renewal $renewal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\renewal  $renewal
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $req)
    {
        //
		$r = renewalMaster::find($req->id);
		return view('renewalMaster.editt')->with(['app'=>$r]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\renewal  $renewal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req)
    {
        //
		$validator = Validator::make($req->all(), [
					'name' => 'required'
								],[
					'name.required'=>'Enter renewal name'
								]);
					if ($validator->fails()) {
						return redirect()->back()
									->withErrors($validator)
									->withInput();
					}
					
					$r = renewalMaster::find($req->id);
					$r->name = $req->name;
					$r->desc = $req->desc;
					$r->issuer = $req->issuer;
					$r->issuerAddress = $req->issuerAdd;
					$r->contactName =   $req->contact;
					$r->contactNum = $req->contact ;
					$r->frequency = $req->freq;
					$r->validity =  $req->validity;
					$r->save();
					
		return redirect('renewal ')->with(["status"=>"Renewal Updated successfully","alert"=>"success"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\renewal  $renewal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $req)
    {
        //
			$r = renewalMaster::find($req->id);
			$r->status = 0;
			$r->save();
			return redirect('renewal')->with(["status"=>"Renewal Deleted successfully","alert"=>"success"]);
    }
}
