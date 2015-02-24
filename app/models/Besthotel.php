<?php

namespace App\Models;

class Besthotel extends \Eloquent {

	
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'homepage_hotel';
        
        function hotel(){
            return $this->belongsTo('App\Models\Hotel');
        }
        
    
}
