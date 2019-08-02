<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class fleet extends Model
{
    //
	protected $table = 'fleet';
	
	
	
		public static function boot()
    {		
        parent::boot();		
		static::addGlobalScope('active', function (Builder $builder) {
        $builder->where('status', '=', 1);
										});
	}
	
	public function compani(){
			return $this->belongsTo('App\Company', 'company_id', 'id');		
	}
	public function department(){
		
		return $this->belongsTo('App\department', 'dept', 'id');
	}
	public function renewals(){
		return $this->hasMany('App\renewal_record', 'id', 'fleet_id');
	}
}
