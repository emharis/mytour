<?php

namespace App\Controllers\Admin;

class CityController extends \BaseController {

    public function getIndex() {
        return \View::make('admin.city.index', array(
                    'citys' => \App\Models\City::with('province')->get()
        ));
    }

    public function getNew() {
        $selProv = array();
        $provs = \App\Models\Province::all();
        foreach ($provs as $prv) {
            $selProv[$prv->id] = $prv->nama;
        }

        return \View::make('admin.city.new', array(
                    'selProv' => $selProv
        ));
    }

    public function postNew() {
        $ct = new \App\Models\City();
        $ct->province_id = \Input::get('province');
        $ct->nama = \Input::get('nama');
        $ct->save();

        return \Redirect::to('admin/destination/city');
    }

    public function getEdit($id) {
        $selProv = array();
        $provs = \App\Models\Province::all();
        foreach ($provs as $prv) {
            $selProv[$prv->id] = $prv->nama;
        }

        return \View::make('admin.city.edit', array(
                    'city' => \App\Models\City::find($id),
                    'selProv' => $selProv
        ));
    }

    public function postEdit() {
        $ct = \App\Models\City::find(\Input::get('cityId'));
        $ct->nama = \Input::get('nama');
        $ct->province_id = \Input::get('province');
        $ct->save();

        return \Redirect::to('admin/destination/city');
    }

    public function getDelete($id) {
        $ct = \App\Models\City::find($id);
        $ct->delete();
        return \Redirect::to('admin/destination/city');
    }

}
