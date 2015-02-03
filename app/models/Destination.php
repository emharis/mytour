<?php

namespace App\Models;

class Destination extends \Eloquent {

	
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'destination';
        
        public function destkat(){
            return $this->belongsTo('App\Models\Destkat');
        }
        
        public function kategori(){
            return $this->belongsTo('App\Models\Kategori');
        }
    
}
