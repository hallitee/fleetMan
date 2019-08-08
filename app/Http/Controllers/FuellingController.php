<?php

namespace App\Http\Controllers;

use App\fuelling;
use Illuminate\Http\Request;
use App\department;
use App\fleet;
use App\Driver;
use App\company;
use Validator;

class FuellingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
		$f = fuelling::with('fleet.department.company')->get();
		return view('fuelling.list')->with(['app'=>$f]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$dr = Driver::get();
		$drv = [];
		foreach($dr as $m){
			$drv[$m->drvName] = $m->drvName;			
		}
        $d = department::with(['fleets','company'])->get();
		$a = json_encode($d);
		$arr = [];
		foreach($d as $a){
			$arr[$a->id] = $a->name.' '.$a->company->name.' '.$a->company->location;		
		}
		return view('fuelling.index')->with(['dept'=>$d, 'dep'=>$arr,'drv'=>$drv]);
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
					'dept' => 'required',
					'fleet' => 'required',
					'driver'=> 'required',
					'station' => 'required',
					'type'=>'required',
					'price' => 'required',
					'mtr'=>'required',
					'pumped'=>'required'
								],[
					'dept.required'=>'Select fleet department',
					'fleet.required'=>'Select vehicle',
					'driver.required'=>'Select driver',
					'station.required'=>'Select filling station',
					'type.required'=>'Select fuel type',
					'price.required' => 'Enter price per litre at station',
					'mtr.required'=> 'Enter vehicle meter reading',
					'pumped.required'=>'Enter litres filled'
								]);
//return $req;
					$p = fuelling::where('fleet_id', $req->fleet)->orderBy('created_at', 'DESC')->first();	
					$f = new fuelling;
					$f->fleet_id = $req->fleet;
					$f->remarks = $req->driver;
					$f->fillingStation = $req->station;
					$f->fuelType = $req->type;
					$f->pricePerLitre = $req->price;
					$f->meterReading = $req->mtr;
					$f->pumpedLitres = $req->pumped;
					if(!empty($p)){
					$f->lastMilage = $p->meterReading;
					}else{
						$f->lastMilage=0;
					}			
					$f->status = 1;
					$f->save();
		return redirect('topup')->with(["status"=>"Fuel record  created successfully","alert"=>"success"]);
					
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\fuelling  $fuelling
     * @return \Illuminate\Http\Response
     */
    public function show(fuelling $fuelling)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\fuelling  $fuelling
     * @return \Illuminate\Http\Response
     */
    public function edit(fuelling $fuelling)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\fuelling  $fuelling
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, fuelling $fuelling)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\fuelling  $fuelling
     * @return \Illuminate\Http\Response
     */
    public function destroy(fuelling $fuelling)
    {
        //
    }
}
