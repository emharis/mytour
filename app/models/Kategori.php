<?php

namespace App\Models;

class Kategori extends \Eloquent {

	
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'kategori';
        
        public function artikels(){
            return $this->hasMany('App\Models\Artikel');
        }
        
        public function destinations(){
            return $this->hasMany('App\Models\Destination');
        }
    
}
