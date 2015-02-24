<?php

namespace App\Models;

class Travpackcategory extends \Eloquent {

	
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'travpack_category';
        
        function travpacks(){
            return $this->hasMany('App\Models\Travpack');
        }
    
}
