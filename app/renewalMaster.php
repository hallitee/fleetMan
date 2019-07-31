<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class renewalMaster extends Model
{
    //
	protected $table = "renewalMaster";
	


	public static function boot()
    {		
        parent::boot();		
		static::addGlobalScope('active', function (Builder $builder) {
        $builder->where('status', '=', 1);
										});
	}
	
	
}
