<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class fuelling extends Model
{    
	protected $table = 'fuelRecord';
	
	
		public function fleet(){
			return $this->belongsTo('App\fleet', 'fleet_id', 'id');		
	}
}
