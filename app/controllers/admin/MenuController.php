<?php

namespace App\Controllers\Admin;

class MenuController extends \BaseController {

    public function getIndex() {
        return \View::make('admin.menu.index', array(
                    'menus' => \App\Models\Menu::orderBy('position_order')->get()
        ));
    }

    public function getTypeSelect($selected = null) {
        $option = [1 => "Home Page", 2 => "Static Page", 3 => "Blog List", 4 => "Contact Page",5=>'Gallery Page',6=>'Destination Page',7=>'Booking System',8=>'Testimony Page'];
        return \Form::select('menutype', $option, $selected, array('class' => 'col-sm-4'));
    }

    public function getPositionSelect($selected = null) {
        $option = [1 => "Top", 2 => "Bottom", 3 => "Both"];
        return \Form::select('position', $option, $selected, array('class' => 'col-sm-4'));
    }

    public function getNew() {
        $kats = \App\Models\Kategori::where('publish', 'Y')->get();
        $kategoris = array();
        foreach ($kats as $kat) {
            $kategoris[$kat->id] = $kat->nama;
        }
        return \View::make('admin.menu.new', array(
                    'kategoris' => $kategoris,
                    'menutype' => $this->getTypeSelect(),
                    'position' => $this->getPositionSelect()
        ));
    }

    public function postNew() {
        $mn = new \App\Models\Menu();
        $mn->nama = \Input::get('nama');
        $mn->type = \Input::get('menutype');
        $mn->position = \Input::get('position');
        //get last order
        $lastOrder = \App\Models\Menu::max('position_order');
        $mn->position_order = $lastOrder + 1;
        $mn->publish = \Input::get('publish');
        $mn->save();

        return \Redirect::to('admin/menu');
    }
    
    public function getEdit($id){
        $mn = \App\Models\Menu::find($id);
        
        $kats = \App\Models\Kategori::where('publish', 'Y')->get();
        $kategoris = array();
        foreach ($kats as $kat) {
            $kategoris[$kat->id] = $kat->nama;
        }
        return \View::make('admin.menu.edit', array(
                    'kategoris' => $kategoris,
                    'menutype' => $this->getTypeSelect($mn->type),
                    'position' => $this->getPositionSelect($mn->position),
                    'menu'=>$mn
        ));
    }
    
    public function postEdit(){
        $mn = \App\Models\Menu::find(\Input::get('menuId'));
        $mn->nama = \Input::get('nama');
        $mn->type = \Input::get('menutype');
        $mn->position = \Input::get('position');
        //get last order
        $lastOrder = \App\Models\Menu::max('position_order');
        $mn->publish = \Input::get('publish');
        $mn->save();

        return \Redirect::to('admin/menu');
    }
    
    public function getDelete($id){
        $mn = \App\Models\Menu::find($id);
        $mn->delete();
        return \Redirect::to('admin/menu');
    }
    
    public function getUp($id){
        $mn = \App\Models\Menu::find($id);
        if($mn->position_order > 1){
            $upper = \App\Models\Menu::where('position_order',$mn->position_order - 1)->first();
            $upper->position_order = $mn->position_order;
            $upper->save();
            $mn->position_order = $mn->position_order -1;
            $mn->save();
        }
        return \Redirect::to('admin/menu');
    }
    
    public function getDown($id){
        $mn = \App\Models\Menu::find($id);
        if($mn->position_order < \App\Models\Menu::max('position_order')){
            $lower = \App\Models\Menu::where('position_order',$mn->position_order + 1)->first();
            $lower->position_order = $mn->position_order;
            $lower->save();
            $mn->position_order = $mn->position_order +1;
            $mn->save();
        }
        return \Redirect::to('admin/menu');
    }

}
