<?php

namespace App\Models;

class Artikel extends \Eloquent {

	
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'artikel';
        
        public function kategori(){
            return $this->belongsTo('App\Models\Kategori');
        }
        
        function comments(){
            return $this->hasMany('App\Models\Comment');
        }
    
}
