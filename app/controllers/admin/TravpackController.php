<?php

namespace App\Controllers\Admin;

class TravpackController extends \BaseController {

    public function getIndex() {
        return \View::make('admin.travpack.index',array(
            'travpacks' => \App\Models\Travpack::all()
        ));
    }
    
    function getNew(){
        $dests = \App\Models\Destination::all();
        $selectDest = array();
        foreach($dests as $dst){
            $selectDest[$dst->id] = $dst->nama;
        }
        
        return \View::make('admin.travpack.new',array(
            'selectDest'=>$selectDest
        ));
    }
    
}
