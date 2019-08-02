<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
class renewal_record extends Model
{
    //
	protected $table = "renewal";
	
	
		public static function boot()
    {		
        parent::boot();		
		static::addGlobalScope('active', function (Builder $builder) {
        $builder->where('status', '=', 1);
										});
	}
	
	public function renewmaster(){		
		return $this->belongsTo('App\renewalMaster', 'renewal_id', 'id');
		
	}
	public function fleet(){		
		return $this->belongsTo('App\fleet', 'fleet_id', 'id');
		
	}
}
