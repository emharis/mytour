<?php

namespace App\Models;

class Hotel extends \Eloquent {

	
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'hotel';
        
    function besthotels(){
            return $this->hasMany('App\Models\Besthotel');
        }
}
