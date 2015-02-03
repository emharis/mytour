<?php

namespace App\Models;

class Place extends \Eloquent {

	
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'place';
        
        public function city(){
            return $this->belongsTo('App\Models\City');
        }
        
    
}
