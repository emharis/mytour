<?php

namespace App\Models;

class Destkat extends \Eloquent {

	
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'destkat';
        
        public function destinations(){
            return $this->hasMany('App\Models\Destination');
        }
        
    
}
