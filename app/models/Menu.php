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
        
        function childmenus(){
            return $this->hasMany('App\Models\Menu','parent_id');
        }
        
        function parentmenu(){
            return $this->belongsTo('App\Models\Menu','parent_id');
        }
        
        function type(){
            return $this->belongsTo('App\Models\Menutype','menutype_id');
        }
        
    
}
