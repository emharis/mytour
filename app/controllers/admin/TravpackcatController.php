<?php

namespace App\Controllers\Admin;

class TravpackcatController extends \BaseController {

    public function getIndex() {
        return \View::make('admin.travpackcat.index',array(
            'travpackcats' => \App\Models\Travpackcategory::all()
        ));
    }
    
    function getNew(){
        $dests = \App\Models\Destination::all();
        $selectDest = array();
        foreach($dests as $dst){
            $selectDest[$dst->id] = $dst->nama;
        }
        
        return \View::make('admin.travpackcat.new',array(
            'selectDest'=>$selectDest
        ));
        
    }
    
    function postNew(){
        $travcat = new \App\Models\Travpackcategory();
        $travcat->nama = \Input::get('nama');
        $travcat->publish = \Input::get('publish');
        $travcat->save();
        
        return \Redirect::to('admin/paket/travpackcat');
    }
    
    function getEdit($id){
        return \View::make('admin.travpackcat.edit',array(
            'travpackcat'=>  \App\Models\Travpackcategory::find($id)
        ));
    }
    
    function postEdit(){
        $travcat =  \App\Models\Travpackcategory::find(\Input::get('travpackcatId'));
        $travcat->nama = \Input::get('nama');
        $travcat->publish = \Input::get('publish');
        $travcat->save();
        
        return \Redirect::to('admin/paket/travpackcat');
    }
    
    function getDelete($id){
        $travcat = \App\Models\Travpackcategory::find($id);
        $travcat->delete();
        
        return \Redirect::to('admin/paket/travpackcat');
    }
    
}
