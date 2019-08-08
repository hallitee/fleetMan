<?php

namespace App;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class department extends Model
{
    //
	
	
	public static function boot()
    {		
        parent::boot();		
		static::addGlobalScope('active', function (Builder $builder) {
        $builder->where('status', '=', 1);
										});
	}
	
	public function company(){
		
		return $this->belongsTo('App\Company','comp_id');
	}
		public function fleets(){
		
		return $this->hasMany('App\fleet', 'dept', 'id');
		
	}
}
