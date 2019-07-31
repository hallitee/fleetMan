<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class req extends Model
{
    //
	protected $table = 'req';
	
	public function car(){		
		return $this->hasOne(Carmaster::class,'id','car_id')->withoutGlobalScope('active');
	}
	public function driver(){		
		return $this->hasOne(Driver::class,'id','driver_id')->withoutGlobalScope('active');
	}
}
