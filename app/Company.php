<?php

namespace App;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    //
	protected $table = 'company';
	
	public static function boot()
    {		
        parent::boot();		
		static::addGlobalScope('active', function (Builder $builder) {
        $builder->where('status', '=', 1);
										});
	}
	
	public function depts(){
		
		return $this->hasMany('App\department', 'comp_id', 'id');
		
	}
}
