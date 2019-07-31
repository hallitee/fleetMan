<?php

namespace App\Http\Controllers;

use App\fleet;
use App\department;
use App\Company;
use Validator;
use Illuminate\Http\Request;

class FleetController extends Controller
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
		$f = fleet::with(['department','compani'])->get();
		return view('fleet.list')->with(['app'=>$f]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       //$dept = department::with('company')->get();
		$comp  = Company::get();
		$arr = array();
		foreach($comp as $c){
			$arr[$c->id] = $c->name.' '.$c->location; 			
		}
		return view('fleet.index')->with(['comp'=>$arr]);
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
		//return $req;
					$validator = Validator::make($req->all(), [
					'make' => 'required',
					'model' => 'required',
					'style'=> 'required',
					'regDate' => 'required',
					'regNo'=>'required',
					'comp' => 'required',
					'dept'=>'required'
								],[
					'make.required'=>'Vehicle make required',
					'model.required'=>'Vehicle model required',
					'style.required'=>'Vehicle style required',
					'regDate.required'=>'Vehicle registration date required',
					'regNo.required'=>'Vehicle registration number required',
					'comp.required'=>'Company field required',
					'dept.required'=> 'Department field required'
								]);
					if ($validator->fails()) {
						return redirect()->back()
									->withErrors($validator)
									->withInput();
					}
					
					$f = new fleet;
					$f->make = $req->make;
					$f->model = $req->model;
					$f->type = $req->style;
					$f->chasis = $req->year;
					$f->regDate = $req->regDate;
					$f->regNo = $req->regNo;
					$f->vin =  $req->chasis;
					$f->cost = $req->curr.' '.$req->cost;
					$f->company_id = $req->comp;
					$f->dept = $req->dept;
					$f->pic = $req->pic;
					$f->status = 1;
					$f->save();
					return redirect('fleet')->with(["status"=>"New fleet created successfully","alert"=>"success"]);		
		
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\fleet  $fleet
     * @return \Illuminate\Http\Response
     */
    public function show(fleet $fleet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\fleet  $fleet
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $req)
    {
        //
		$comp  = Company::get();
		$arr = array();
		foreach($comp as $c){
			$arr[$c->id] = $c->name.' '.$c->location; 			
		}
		$f = fleet::with(['department','compani'])->find($req->id);
		$dept = department::with('company')->find($req->id);
		$d = department::where('comp_id', $f->company_id)->get();
		$darr = [];
		foreach($d as $c){
			$darr[$c->id] = $c->name; 			
		}		
		return view('fleet.editt')->with(['app'=>$f, 'comp'=>$arr, 'dept'=>$darr]);
		
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\fleet  $fleet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req)
    {
        //
							$validator = Validator::make($req->all(), [
					'make' => 'required',
					'model' => 'required',
					'style'=> 'required',
					'regDate' => 'required',
					'regNo'=>'required',
					'comp' => 'required',
					'dept'=>'required'
								],[
					'make.required'=>'Vehicle make required',
					'model.required'=>'Vehicle model required',
					'style.required'=>'Vehicle style required',
					'regDate.required'=>'Vehicle registration date required',
					'regNo.required'=>'Vehicle registration number required',
					'comp.required'=>'Company field required',
					'dept.required'=> 'Department field required'
								]);
					if ($validator->fails()) {
						return redirect()->back()
									->withErrors($validator)
									->withInput();
					}
					
					$f = fleet::find($req->id);
					$f->make = $req->make;
					$f->model = $req->model;
					$f->type = $req->style;
					$f->chasis = $req->year;
					$f->regDate = $req->regDate;
					$f->regNo = $req->regNo;
					$f->vin =  $req->chasis;
					$f->cost = $req->curr.' '.$req->cost;
					$f->company_id = $req->comp;
					$f->pic = $req->pic;
					$f->dept = $req->dept;
					$f->save();
					
					return redirect('fleet')->with(["status"=>" Fleet updated successfully","alert"=>"success"]);
					
					
					
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\fleet  $fleet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $req,fleet $fleet)
    {
        //
		$f = fleet::find($req->id);
		$f->status = 0;
		return redirect('fleet')->with(["status"=>" Fleet updated successfully","alert"=>"success"]);
    }
}
