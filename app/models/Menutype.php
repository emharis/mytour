<?php

namespace App\Models;

class Menu extends \Eloquent {

	
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'menus';
        
        public function statpage(){
            return $this->belongsTo('App\Models\Statpage','statpage_id');
        }
        
    
}
