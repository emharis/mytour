<?php

namespace App\Models;

class Statpage extends \Eloquent {

	
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'statpages';
        
        public function menu(){
            return $this->hasOne('App\Models\Menu', 'statpage_id');
        }
                
    
}
