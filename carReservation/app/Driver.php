<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
class Driver extends Model
{
    //

	public static function boot()
    {		
        parent::boot();		
		static::addGlobalScope('active', function (Builder $builder) {
        $builder->where('status', '=', 1);
										});
	}
	
	
		public function request(){		
		return $this->belongsTo(req::class);
	}
	
}
