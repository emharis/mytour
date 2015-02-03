<?php

namespace App\Models;

class City extends \Eloquent {

	
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'city';
        
        public function province(){
            return $this->belongsTo('App\Models\Province');
        }
        
        public function places(){
            return $this->hasMany('App\Models\Place');
        }
        
        
        
    
}
