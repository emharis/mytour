<?php

namespace App\Controllers\Admin;

class PlaceController extends \BaseController {

    public function getIndex() {
        return \View::make('admin.place.index', array(
                    'places' => \App\Models\Place::with('city')->get()
        ));
    }

    public function getSelectcity($provId) {
        $cities = \App\Models\City::where('province_id', $provId)->get();
        $selCity = array();
        foreach ($cities as $ct) {
            $selCity[$ct->id] = $ct->nama;
        }
        return \Form::select('city', $selCity, null, array('class' => 'col-sm-4', 'required'));
    }

    public function getNew() {
        $selProv = array();
        $provs = \App\Models\Province::all();
        foreach ($provs as $prv) {
            $selProv[$prv->id] = $prv->nama;
        }

        return \View::make('admin.place.new', array(
                    'selProv' => $selProv
        ));
    }

    public function postNew() {
        $plc = new \App\Models\Place();
        $plc->city_id = \Input::get('city');
        $plc->nama = \Input::get('nama');
        $plc->save();

        //buat directory untuk image gallery
        $img_folder = 'images/destinasi/place_' . $plc->id;
        \File::makeDirectory($img_folder, '0755');

        //update directory
        $plc->img_folder = $img_folder;
        $plc->save();

        return \Redirect::to('admin/destination/place');
    }

    public function getEdit($id) {
        $selProv = array();
        $provs = \App\Models\Province::all();
        foreach ($provs as $prv) {
            $selProv[$prv->id] = $prv->nama;
        }

        return \View::make('admin.place.edit', array(
                    'place' => \App\Models\Place::find($id),
                    'selProv' => $selProv
        ));
    }

    public function postEdit() {
        $ct = \App\Models\Place::find(\Input::get('placeId'));
        $ct->nama = \Input::get('nama');
        $ct->city_id = \Input::get('city');
        $ct->desc = \Input::get('desc');
        $ct->save();

        return \Redirect::to('admin/destination/place');
    }

    public function getDelete($id) {
        $plc = \App\Models\Place::find($id);
        $plc->delete();
        return \Redirect::to('admin/destination/place');
    }

    public function postUpload() {
        $file = \Input::file('file');
        $extension = \File::extension($file->getClientOriginalName());
        $directory = 'images/destinasi/place_' . \Input::get('placeid');
        $filename = 'place_' . \Input::get('placeid') . '_' . $this->generateRandomString(10).'.'.\Input::file('file')->getClientOriginalExtension();//\Input::file('file')->getClientOriginalName();
        //$upload_success = Input::file('file')->move($directory,$filename);

        \Input::file('file')->move($directory, $filename);

        //create thumbnail
        $img = new \Imagine\Gd\Imagine();
        $thumsize = new \Imagine\Image\Box(150, 150);
        $thumbcenter = new \Imagine\Image\Point\Center($thumsize);
        $img->open($directory . '/' . $filename)->crop(new \Imagine\Image\Point($thumbcenter->getX(), $thumbcenter->getY()), $thumsize)->save($directory . '/thumb_' . $filename);


        return $filename;
    }
    
    public function generateRandomString($length = 10) {
        return substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
    }

    public function postDeleteimage() {
        $img_path = \Input::get('path');
        $img_thumbpath = \Input::get('thumbpath');
        \File::delete($img_path);
        \File::delete($img_thumbpath);
        
        return $img_path;
    }

}
