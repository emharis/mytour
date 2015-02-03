<?php

namespace App\Models;

class Province extends \Eloquent {

	
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'province';
        
        public function cities(){
            return $this->hasMany('App\Models\City');
        }
        
    
}
