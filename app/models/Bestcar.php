<?php

namespace App\Models;

class Bestcar extends \Eloquent {

	
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'homepage_car';
        
        function car(){
            return $this->belongsTo('App\Models\Car');
        }
        
    
}
