<?php

namespace App\Controllers\Admin;

class CarController extends \BaseController {

    public function getIndex() {
        return \View::make('admin.car.index', array(
                    'cars' => \App\Models\Car::all()
        ));
    }

    function getNew() {
        return \View::make('admin.car.new');
    }

    function postNew() {
        $car = new \App\Models\Car();
        $car->nama = \Input::get('nama');
        $car->price = \Input::get('price');
        $car->desc = \Input::get('desc');
        $car->publish = \Input::get('publish');
        $car->save();

        //upload image
        if (\Input::hasFile('foto_1')) {
            //get image
            //echo 'move gambar';
            $savePath = public_path() . '/images/car';
            $name = 'car_' . $car->id . '_img1_' . \Input::file('foto_1')->getClientOriginalName();
            $name = str_replace(' ', '_', $name);
            //upload image
            \Input::file('foto_1')->move($savePath, $name);
            //save image url to database
            $car->foto_1 = $name;
            $car->save();
        }
        //foto_2
        if (\Input::hasFile('foto_2')) {
            //get image
            //echo 'move gambar';
            $savePath = public_path() . '/images/car';
            $name = 'car_' . $car->id . '_img2_' . \Input::file('foto_2')->getClientOriginalName();
            $name = str_replace(' ', '_', $name);
            //upload image
            \Input::file('foto_2')->move($savePath, $name);
            //save image url to database
            $car->foto_2 = $name;
            $car->save();
        }
        //foto_3
        if (\Input::hasFile('foto_3')) {
            //get image
            //echo 'move gambar';
            $savePath = public_path() . '/images/car';
            $name = 'car_' . $car->id . '_img3_' . \Input::file('foto_3')->getClientOriginalName();
            $name = str_replace(' ', '_', $name);
            //upload image
            \Input::file('foto_3')->move($savePath, $name);
            //save image url to database
            $car->foto_3 = $name;
            $car->save();
        }
        //foto_4
        if (\Input::hasFile('foto_4')) {
            //get image
            //echo 'move gambar';
            $savePath = public_path() . '/images/car';
            $name = 'car_' . $car->id . '_img4_' . \Input::file('foto_4')->getClientOriginalName();
            $name = str_replace(' ', '_', $name);
            //upload image
            \Input::file('foto_4')->move($savePath, $name);
            //save image url to database
            $car->foto_4 = $name;
            $car->save();
        }

        return \Redirect::to('admin/paket/car');
    }

    function getEdit($id) {
        return \View::make('admin.car.edit', array(
                    'car' => \App\Models\Car::find($id)
        ));
    }

    function postEdit() {
        $car = \App\Models\Car::find(\Input::get('carId'));
        $car->nama = \Input::get('nama');
        $car->price = \Input::get('price');
        $car->desc = \Input::get('desc');
        $car->publish = \Input::get('publish');
        $car->save();

        //upload image
        if (\Input::hasFile('foto_1')) {
            //delete foto lama
            $this->deleteFoto($car->foto_1);
            //get image
            //echo 'move gambar';
            $savePath = public_path() . '/images/car';
            $name = 'car_' . $car->id . '_img1_' . \Input::file('foto_1')->getClientOriginalName();
            $name = str_replace(' ', '_', $name);
            //upload image
            \Input::file('foto_1')->move($savePath, $name);
            //save image url to database
            $car->foto_1 = $name;
            $car->save();
        }
        //foto_2
        if (\Input::hasFile('foto_2')) {
            //delete foto lama
            $this->deleteFoto($car->foto_2);
            //get image
            //echo 'move gambar';
            $savePath = public_path() . '/images/car';
            $name = 'car_' . $car->id . '_img2_' . \Input::file('foto_2')->getClientOriginalName();
            $name = str_replace(' ', '_', $name);
            //upload image
            \Input::file('foto_2')->move($savePath, $name);
            //save image url to database
            $car->foto_2 = $name;
            $car->save();
        }
        //foto_3
        if (\Input::hasFile('foto_3')) {
            //delete foto lama
            $this->deleteFoto($car->foto_3);
            //get image
            //echo 'move gambar';
            $savePath = public_path() . '/images/car';
            $name = 'car_' . $car->id . '_img3_' . \Input::file('foto_3')->getClientOriginalName();
            $name = str_replace(' ', '_', $name);
            //upload image
            \Input::file('foto_3')->move($savePath, $name);
            //save image url to database
            $car->foto_3 = $name;
            $car->save();
        }
        //foto_4
        if (\Input::hasFile('foto_4')) {
            //delete foto lama
            $this->deleteFoto($car->foto_4);
            //get image
            //echo 'move gambar';
            $savePath = public_path() . '/images/car';
            $name = 'car_' . $car->id . '_img4_' . \Input::file('foto_4')->getClientOriginalName();
            $name = str_replace(' ', '_', $name);
            //upload image
            \Input::file('foto_4')->move($savePath, $name);
            //save image url to database
            $car->foto_4 = $name;
            $car->save();
        }

        return \Redirect::back();
    }

    function deleteFoto($name) {
        //delete image
        $pathToDel = '/images/car/' . $name;
        \File::delete(public_path() . $pathToDel);
    }
    
    function getDeletefoto($num,$id){        
        $car = \App\Models\Car::find($id);
        if($num==1){
            $this->deleteFoto($car->foto_1);
            $car->foto_1  = "";
        }elseif($num==2){
            $this->deleteFoto($car->foto_2);
            $car->foto_2  = "";
        }elseif($num==3){
            $this->deleteFoto($car->foto_3);
            $car->foto_3  = "";
        }elseif($num==4){
            $this->deleteFoto($car->foto_4);
            $car->foto_4  = "";
        }
        //delete dari database
        $car->save();
        
        return $car->toJson();
    }
    
    function getDelete($id){
        $car = \App\Models\Car::find($id);
        //delete file gambar dulu
        if($car->foto_1 != ''){
            $this->deleteFoto($car->foto_1);
        }
        if($car->foto_2 != ''){
            $this->deleteFoto($car->foto_2);
        }
        if($car->foto_3 != ''){
            $this->deleteFoto($car->foto_3);
        }
        if($car->foto_4 != ''){
            $this->deleteFoto($car->foto_4);
        }
        
        $car->delete();
        
        return \Redirect::to('admin/paket/car');
    }

}
