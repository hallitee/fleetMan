<?php

namespace App\Providers;
use  View;
use Carbon\Carbon;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\renewal_record;
use App\renewalMaster;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
	//public $arr = [];
    public function boot()
    {
        //
		$arr = [];
    Schema::defaultStringLength(191);
	
	date_default_timezone_set('Africa/Lagos');
	$ren = renewal_record::with('fleet', 'renewmaster')->whereIn('notSent',[0, 5])->get();
	foreach($ren as $r){
		$now = Carbon::now();
		$next = Carbon::parse($r->nextSub)->subHours($r->notDate);
		$diff = $now->diffForHumans($next);
		$res = in_array("after", explode(" ", $diff));
		if($res){
			array_push($arr, $r);
		}
		
	}
	$arr = json_encode($arr);
   view()->share(['data'=>$arr]);

	}

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
