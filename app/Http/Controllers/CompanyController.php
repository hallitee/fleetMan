<?php

namespace App\Http\Controllers;
use Validator; 

use App\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function __construct(){
		
		$this->middleware('auth');
	}
	
	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
		$r = Company::paginate(20);
		return view('company.list')->with(['app'=>$r]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
			
			return view('company.index');
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
					'compName' => 'required',
					'compLoc' => 'required',
					'gmName'=> ' required',
					'gmEmail' => 'required'
								],
					[
					'compName.required' => 'company name required',
					'compLoc.required' => 'Company location is required',
					'gmName.required'=> 'GM name is  required',
					'gmEmail.required' => 'GM email is required'
					]);
	  if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }
		$r = new Company;
		$r->name = $req->compName;
		$r->location = $req->compLoc;
		$r->gmName = $req->gmName;
		$r->gmEmail = $req->gmEmail;
		$r->lat = $req->lat;
		$r->long = $req->long;
		$r->address = $req->address;
		$r->status = 1;		
		$r->save();
		
		return redirect('company')->with(["status"=>"Company created successfully","alert"=>"success"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Request $req)
    {
        //
		$r = Company::find($req->id);
		return view('company.show')->with(['comp'=>$r]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $req)
    {
        //
		//return $req->id;
		$r = Company::find($req->id);
		return view('company.editt')->with(['app'=>$r]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req)
    {
        //
				   $validator = Validator::make($req->all(), [
					'compName' => 'required',
					'compLoc' => 'required',
					'gmName'=> ' required',
					'gmEmail' => 'required'
								],
					[
					'compName.required' => 'company name required',
					'compLoc.required' => 'Company location is required',
					'gmName.required'=> 'GM name is  required',
					'gmEmail.required' => 'GM email is required'
					]);
	  if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }
		$r = Company::find($req->id);
		$r->name = $req->compName;
		$r->location = $req->compLoc;
		$r->gmName = $req->gmName;
		$r->gmEmail = $req->gmEmail;
		$r->lat = $req->lat;
		$r->long = $req->long;
		$r->address = $req->address;
		///$r->status = 1;		
		$r->save();
		
		
		return redirect('company')->with(["status"=>"Company updated successfully","alert"=>"success"]);
		
		
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $req)
    {
        //
		$r = Company::find($req->id);
		$r->status = 0;
		$r->save();
		return redirect('company')->with(["status"=>"Company deleted successfully","alert"=>"success"]);		

    }
}
