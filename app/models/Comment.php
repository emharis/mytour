<?php

namespace App\Models;

class Comment extends \Eloquent {

	
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'comment';
        
        
        function artikel(){
            return $this->belongsTo('App\Models\Artikel');
        }
        
        function comment(){
            return $this->belongsTo('App\Models\Comment');
        }
        
        public function reply(){
            return $this->hasOne('App\Models\Comment');
        }
}
