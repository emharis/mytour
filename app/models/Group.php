<?php

namespace App\Models;

class Group extends \Eloquent {

	
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'roles';
        
        function users(){
            return $this->belongsToMany('App\Models\User','role_user', 'role_id', 'user_id');
        }
        
    
}
