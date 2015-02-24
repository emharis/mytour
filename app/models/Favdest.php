<?php

namespace App\Models;

class Favdest extends \Eloquent {

	
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'homepage_favdest';
        
        function travpack(){
            return $this->belongsTo('App\Models\Travpack');
        }
        
    
}
