<?php

namespace App\Controllers\Admin;

class HotelController extends \BaseController {

    public function getIndex() {
        return \View::make('admin.hotel.index', array(
                    'hotels' => \App\Models\Hotel::all()
        ));
    }

    function getNew() {
        return \View::make('admin.hotel.new');
    }

    function postNew() {
        $hotel = new \App\Models\Hotel();
        $hotel->nama = \Input::get('nama');
        $hotel->alamat = \Input::get('alamat');
        $hotel->price = \Input::get('price');
        $hotel->desc = \Input::get('desc');
        $hotel->fasilitas = \Input::get('fasilitas');
        $hotel->publish = \Input::get('publish');
        $hotel->save();

        //upload image
        if (\Input::hasFile('foto_1')) {
            //get image
            //echo 'move gambar';
            $savePath = public_path() . '/images/hotel';
            $name = 'hotel_' . $hotel->id . '_img1_' . \Input::file('foto_1')->getClientOriginalName();
            $name = str_replace(' ', '_', $name);
            //upload image
            \Input::file('foto_1')->move($savePath, $name);
            //save image url to database
            $hotel->foto_1 = $name;
            $hotel->save();
        }
        //foto_2
        if (\Input::hasFile('foto_2')) {
            //get image
            //echo 'move gambar';
            $savePath = public_path() . '/images/hotel';
            $name = 'hotel_' . $hotel->id . '_img2_' . \Input::file('foto_2')->getClientOriginalName();
            $name = str_replace(' ', '_', $name);
            //upload image
            \Input::file('foto_2')->move($savePath, $name);
            //save image url to database
            $hotel->foto_2 = $name;
            $hotel->save();
        }
        //foto_3
        if (\Input::hasFile('foto_3')) {
            //get image
            //echo 'move gambar';
            $savePath = public_path() . '/images/hotel';
            $name = 'hotel_' . $hotel->id . '_img3_' . \Input::file('foto_3')->getClientOriginalName();
            $name = str_replace(' ', '_', $name);
            //upload image
            \Input::file('foto_3')->move($savePath, $name);
            //save image url to database
            $hotel->foto_3 = $name;
            $hotel->save();
        }
        //foto_4
        if (\Input::hasFile('foto_4')) {
            //get image
            //echo 'move gambar';
            $savePath = public_path() . '/images/hotel';
            $name = 'hotel_' . $hotel->id . '_img4_' . \Input::file('foto_4')->getClientOriginalName();
            $name = str_replace(' ', '_', $name);
            //upload image
            \Input::file('foto_4')->move($savePath, $name);
            //save image url to database
            $hotel->foto_4 = $name;
            $hotel->save();
        }

        return \Redirect::to('admin/paket/hotel');
    }

    function getEdit($id) {
        return \View::make('admin.hotel.edit', array(
                    'hotel' => \App\Models\Hotel::find($id)
        ));
    }

    function postEdit() {
        $hotel = \App\Models\Hotel::find(\Input::get('hotelId'));
        $hotel->nama = \Input::get('nama');
        $hotel->alamat = \Input::get('alamat');
        $hotel->price = \Input::get('price');
        $hotel->desc = \Input::get('desc');
        $hotel->fasilitas = \Input::get('fasilitas');
        $hotel->publish = \Input::get('publish');
        $hotel->save();

        //upload image
        if (\Input::hasFile('foto_1')) {
            //delete foto lama
            $this->deleteFoto($hotel->foto_1);
            //get image
            //echo 'move gambar';
            $savePath = public_path() . '/images/hotel';
            $name = 'hotel_' . $hotel->id . '_img1_' . \Input::file('foto_1')->getClientOriginalName();
            $name = str_replace(' ', '_', $name);
            //upload image
            \Input::file('foto_1')->move($savePath, $name);
            //save image url to database
            $hotel->foto_1 = $name;
            $hotel->save();
        }
        //foto_2
        if (\Input::hasFile('foto_2')) {
            //delete foto lama
            $this->deleteFoto($hotel->foto_2);
            //get image
            //echo 'move gambar';
            $savePath = public_path() . '/images/hotel';
            $name = 'hotel_' . $hotel->id . '_img2_' . \Input::file('foto_2')->getClientOriginalName();
            $name = str_replace(' ', '_', $name);
            //upload image
            \Input::file('foto_2')->move($savePath, $name);
            //save image url to database
            $hotel->foto_2 = $name;
            $hotel->save();
        }
        //foto_3
        if (\Input::hasFile('foto_3')) {
            //delete foto lama
            $this->deleteFoto($hotel->foto_3);
            //get image
            //echo 'move gambar';
            $savePath = public_path() . '/images/hotel';
            $name = 'hotel_' . $hotel->id . '_img3_' . \Input::file('foto_3')->getClientOriginalName();
            $name = str_replace(' ', '_', $name);
            //upload image
            \Input::file('foto_3')->move($savePath, $name);
            //save image url to database
            $hotel->foto_3 = $name;
            $hotel->save();
        }
        //foto_4
        if (\Input::hasFile('foto_4')) {
            //delete foto lama
            $this->deleteFoto($hotel->foto_4);
            //get image
            //echo 'move gambar';
            $savePath = public_path() . '/images/hotel';
            $name = 'hotel_' . $hotel->id . '_img4_' . \Input::file('foto_4')->getClientOriginalName();
            $name = str_replace(' ', '_', $name);
            //upload image
            \Input::file('foto_4')->move($savePath, $name);
            //save image url to database
            $hotel->foto_4 = $name;
            $hotel->save();
        }

        return \Redirect::back();
    }

    function deleteFoto($name) {
        //delete image
        $pathToDel = '/images/hotel/' . $name;
        \File::delete(public_path() . $pathToDel);
    }
    
    function getDeletefoto($num,$id){        
        $hotel = \App\Models\Hotel::find($id);
        if($num==1){
            $this->deleteFoto($hotel->foto_1);
            $hotel->foto_1  = "";
        }elseif($num==2){
            $this->deleteFoto($hotel->foto_2);
            $hotel->foto_2  = "";
        }elseif($num==3){
            $this->deleteFoto($hotel->foto_3);
            $hotel->foto_3  = "";
        }elseif($num==4){
            $this->deleteFoto($hotel->foto_4);
            $hotel->foto_4  = "";
        }
        //delete dari database
        $hotel->save();
        
        return $hotel->toJson();
    }
    
    function getDelete($id){
        $hotel = \App\Models\Hotel::find($id);
        //delete file gambar dulu
        if($hotel->foto_1 != ''){
            $this->deleteFoto($hotel->foto_1);
        }
        if($hotel->foto_2 != ''){
            $this->deleteFoto($hotel->foto_2);
        }
        if($hotel->foto_3 != ''){
            $this->deleteFoto($hotel->foto_3);
        }
        if($hotel->foto_4 != ''){
            $this->deleteFoto($hotel->foto_4);
        }
        
        $hotel->delete();
        
        return \Redirect::to('admin/paket/hotel');
    }

}
