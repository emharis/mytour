<?php

namespace App\Models;

class Car extends \Eloquent {

	
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'car';
        
        function bestcars(){
            return $this->hasMany('App\Models\Car');
        }
        
    
}
