<?php

namespace App\Controllers\Admin;

class ProvinceController extends \BaseController {

    public function getIndex() {
        return \View::make('admin.province.index', array(
                    'provinces' => \App\Models\Province::all()
        ));
    }

    public function getNew() {
        return \View::make('admin.province.new');
    }

    public function postNew() {
        $prv = new \App\Models\Province();
        $prv->nama = \Input::get('nama');
        $prv->save();
        return \Redirect::to('admin/destination/province');
    }

    public function getEdit($id) {
        return \View::make('admin.province.edit', array(
                    'province' => \App\Models\Province::find($id)
        ));
    }

    public function postEdit() {
        $prv = \App\Models\Province::find(\Input::get('provinceId'));
        $prv->nama = \Input::get('nama');
        $prv->save();

        return \Redirect::to('admin/destination/province');
    }

    public function getDelete($id) {
        $prv = \App\Models\Province::find($id);
        $prv->delete();
        return \Redirect::to('admin/destination/province');
    }

}
