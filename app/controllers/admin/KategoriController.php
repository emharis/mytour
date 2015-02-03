<?php

namespace App\Controllers\Admin;

class KategoriController extends \BaseController {

    public function getIndex() {
        return \View::make('admin.kategori.index',array(
            'kategoris'=>  \App\Models\Kategori::all()
        ));
    }
    
    public function getNew(){
        return \View::make('admin.kategori.new');
    }
    
    public function postNew(){
        $kat = new \App\Models\Kategori();
        $kat->nama = \Input::get('nama');
        $kat->publish = \Input::get('publish');
        $kat->save();
        
        return \Redirect::to('admin/blogs/kategori/index');
    }
    
    public function getEdit($id){
        $kat = \App\Models\Kategori::find($id);
        return \View::make('admin.kategori.edit',array('kategori'=>$kat));
    }
    
     public function postEdit(){
        $kat = \App\Models\Kategori::find(\Input::get('kategoriId'));
        $kat->nama = \Input::get('nama');
        $kat->publish = \Input::get('publish');
        $kat->save();
        
        return \Redirect::to('admin/blogs/kategori/index');
    }
    
    public function getDelete($id){
        $kat = \App\Models\Kategori::find($id);
        $kat->delete();
        return \Redirect::to('admin/blogs/kategori/index');
    }
}
