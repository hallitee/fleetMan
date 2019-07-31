<?php

namespace App;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Carmaster extends Model
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
