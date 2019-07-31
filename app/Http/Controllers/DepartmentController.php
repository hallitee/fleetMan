<?php

namespace App\Http\Controllers;

use App\department;
use App\Company;
use Illuminate\Http\Request;
use Validator;


class DepartmentController extends Controller
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
		$d = department::with('company')->get();
		return view('department.list')->with(['app'=>$d]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
		$comp  = Company::get();
		$arr = array();
		foreach($comp as $c){
			$arr[$c->id] = $c->name.' '.$c->location; 			
		}
		return view('department.index')->with('comp', $arr);
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
					'deptName' => 'required',
					'compName' => 'required',
					'hodName'=> 'nullable',
					'hodEmail' => 'email|nullable',
					'size'=>'numeric|nullable'
								]);
				  if ($validator->fails()) {
						return redirect()->back()
									->withErrors($validator)
									->withInput();
					}
					
				$d = new department;
				$d->name = $req->deptName;
				$d->hodName = $req->hodName;
				$d->hodEmail = $req->hodEmail;
				$d->deptSize = $req->size;
				$d->comp_id = $req->compName;
				$d->status =1;
				$d->save();
				
				return redirect('dept')->with(["status"=>"Department created successfully","alert"=>"success"]);
				
		
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\department  $department
     * @return \Illuminate\Http\Response
     */
    public function show(Request $req)
    {
        //
		$r = department::find($req->id);
		return view('department.show')->with(['comp'=>$r]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\department  $department
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $req)
    {
		$comp  = Company::get();
		$arr = array();
		foreach($comp as $c){
			$arr[$c->id] = $c->name.' '.$c->location; 			
		}
	
		
		return view('department.editt')->with(['comp'=>$dept, 'arr'=>$arr]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\department  $department
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req)
    {
        //]
					$validator = Validator::make($req->all(), [
					'deptName' => 'required',
					'compName' => 'required',
					'hodName'=> 'nullable',
					'hodEmail' => 'email|nullable',
					'size'=>'numeric|nullable'
								]);
				  if ($validator->fails()) {
						return redirect()->back()
									->withErrors($validator)
									->withInput();
					}
					
				$d = department::find($req->id);
				$d->name = $req->deptName;
				$d->hodName = $req->hodName;
				$d->hodEmail = $req->hodEmail;
				$d->deptSize = $req->size;
				$d->comp_id = $req->compName;
				//$d->status =1;
				$d->save();
				
				return redirect('dept')->with(["status"=>"Department updated successfully","alert"=>"success"]);
			
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\department  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $req)
    {
        //
		$r = department::find($req->id);
		$r->status = 0;
		$r->save();
		return redirect('dept')->with(["status"=>"Department deleted successfully", "alert"=>"success"]);	
    }
}
