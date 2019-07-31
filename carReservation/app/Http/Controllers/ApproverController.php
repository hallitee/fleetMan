<?php

namespace App\Http\Controllers;

use App\approver;
use Illuminate\Http\Request;

class ApproverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
		$app = approver::paginate(10);
		return view('approver.list')->with('app', $app);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
		return view('approver.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
		$app = new approver;
		$app->name = $request->hName;
		$app->email = $request->hEmail;
		$app->dept = $request->hDept;
		$app->company = $request->company;
		$app->location = $request->location;
		$app->save();
		return redirect('approver')->with('status', 'HOD information saved successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\approver  $approver
     * @return \Illuminate\Http\Response
     */
    public function show(approver $approver)
    {
        //
		
		
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\approver  $approver
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $req)
    {
        //
		$app = approver::find($req->id);
		return view('approver.edit')->with('app', $app);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\approver  $approver
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, approver $approver)
    {
        //
		$app = approver::find($request->id);
		$app->name = $request->hName;
		$app->email = $request->hEmail;
		$app->dept = $request->hDept;
		$app->company = $request->company;
		$app->location = $request->location;
		$app->save();		
		return redirect('approver')->with('status', 'HOD information updated successfully');		
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\approver  $approver
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $req)
    {
        //
		$app = approver::find($req->id);
		$m = $app;
		$app->delete();
		return redirect('approver')->with('status', $m->name.' deleted successfully. ');
		
    }
}
