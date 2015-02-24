<?php

namespace App\Models;

class Travpack extends \Eloquent {

	
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'travpack';
        
        function travpackcategory(){
            return $this->belongsTo('App\Models\Travpackcategory');
        }
        
        function favdests(){
            return $this->hasMany('App\Models\Favdest');
        }
    
}
