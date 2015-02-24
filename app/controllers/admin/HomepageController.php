<?php

namespace App\Controllers\Admin;

class HomepageController extends \BaseController {

    public function getIndex() {
        //create select paket wisata
        $packs = \App\Models\Travpack::wherePublish('Y')->get();
        $travpackArr = array();
        foreach ($packs as $pck) {
            $travpackArr[$pck->id] = $pck->nama;
        }

        return \View::make('admin.homepage.index', array(
                    'homepage' => \App\Models\Homepage::first(),
                    'sliders' => \App\Models\Homepageslider::where('publish', 'Y')->get(),
                    'travpacks' => $travpackArr,
                    'favdests' => \App\Models\Favdest::all(),
                    'bestcars' => \App\Models\Bestcar::all(),
                    'besthotels' => \App\Models\Besthotel::all()
        ));
    }

    public function postUpdate() {
        $homepage = \App\Models\Homepage::first();
        $homepage->welcome_say = \Input::get('welcom_say');
        $homepage->tagline = \Input::get('tagline');
        $homepage->show_customer_say = \Input::get('show_customer_say');
        $homepage->find_a_dest_show = \Input::get('find_a_dest_show') ? 'Y' : 'N';
        $homepage->find_a_dest_head = \Input::get('find_a_dest_head');
        $homepage->find_a_dest_desc = \Input::get('find_a_dest_desc');
        $homepage->read_news_show = (\Input::get('read_news_show') ? 'Y' : 'N');
        $homepage->read_news_head = \Input::get('read_news_head');
        $homepage->read_news_desc = \Input::get('read_news_desc');
        $homepage->buy_travel_guide_show = \Input::get('buy_travel_guide_show') ? 'Y' : 'N';
        $homepage->buy_travel_guide_head = \Input::get('buy_travel_guide_head');
        $homepage->buy_travel_guide_desc = \Input::get('buy_travel_guide_desc');
        $homepage->what_they_say_show = \Input::get('what_they_say_show') ? 'Y' : 'N';
        $homepage->what_they_say_head = \Input::get('what_they_say_head');
        $homepage->what_they_say_desc = \Input::get('what_they_say_desc');
        $homepage->save();

        return \Redirect::back();
    }

    function getDeleteslider($id) {
        $slider = \App\Models\Homepageslider::find($id);
        //delete image file
        \File::delete(public_path() . '/images/slider/' . $slider->img_name);

        //delete from database
        $slider->delete();
        return \Redirect::back();
    }

    function postAddslider() {
        $slider = new \App\Models\Homepageslider();
        $slider->title = \Input::get('new_title');
        $slider->subtitle = \Input::get('new_subtitle');
        $slider->link = \Input::get('new_link');
        $slider->save();

        //upload image
        echo '...check image file';
        if (\Input::hasFile('image_slider_upl')) {
            echo '...upload image file';
            //get image
//            $img = new \Symfony\Component\HttpFoundation\File\UploadedFile(null,null);
            $img = \Input::file('image_slider_upl');
            echo '..';
            echo 'move gambar';
            $savePath = public_path() . '/images/slider';
            $name = 'slider_' . $slider->id . '_' . $img->getClientOriginalName();
            $name = str_replace(' ', '_', $name);
            //upload image
            $img->move($savePath, $name);
            //save image url to database
            $slider->img_name = $name;
            $slider->save();
            echo '..complete upload';
            //resize image
//            $img = new \Imagine\Gd\Imagine();
//            $resize = new \Imagine\Image\Box(1920, 400);
//            $img->open($savePath . '/' . $name)->resize($resize)->save($savePath . '/' . $name);
        }

        return \Redirect::back();
    }
    
    function getPaketwisata(){
        
        return \View::make('admin.homepage.paketwisata', array(
                    'travpacks' => \App\Models\Travpack::whereRaw('travpack.id not in (select ifnull(travpack_id,0) from homepage_favdest)')->wherePublish('Y')->get()
        ));
    }
    
    function postAddfavdest(){
        $favdest = new \App\Models\Favdest();
        $favdest->travpack_id = \Input::get('travpack_id');
        $favdest->save();
        
        return $favdest;
    }
    
    function getDeletefavdest($paketid){
        $favdest = \App\Models\Favdest::whereTravpackId($paketid)->first();
        $favdest->delete();
        
        return true;
    }
    
    function postVisiblefavdest(){
        $homepage = \App\Models\Homepage::first();
        $homepage->best_deal_wisata_show = \Input::get('isvisible');
        $homepage->save();
        
        return $homepage->toJson();
        
    }
    
    function getRentalmobil(){
        
        return \View::make('admin.homepage.rentalmobil', array(
                    'bestcars' => \App\Models\Car::whereRaw('car.id not in (select ifnull(car_id,0) from homepage_car)')->wherePublish('Y')->get()
        ));
    }
    
    function postAddbestcar(){
        $bestcar = new \App\Models\Bestcar();
        $bestcar->car_id = \Input::get('car_id');
        $bestcar->save();
        
        return $bestcar;
    }
    
    function getDeletebestcar($carid){
        $bestcar = \App\Models\Bestcar::whereCarId($carid)->first();
        $bestcar->delete();
        
        return true;
    }
    
    function postVisiblerental(){
        $homepage = \App\Models\Homepage::first();
        $homepage->best_deal_rental_show = \Input::get('isvisible');
        $homepage->save();
        
        return $homepage->toJson();
        
    }
    
    function getHotel(){
        
        return \View::make('admin.homepage.hotel', array(
                    'besthotels' => \App\Models\Hotel::whereRaw('hotel.id not in (select ifnull(hotel_id,0) from homepage_hotel)')->wherePublish('Y')->get()
        ));
    }
    
    function postAddhotel(){
        $besthotel = new \App\Models\Besthotel();
        $besthotel->hotel_id = \Input::get('hotel_id');
        $besthotel->save();
        
        return $besthotel;
    }
    
    function getDeletehotel($hotelid){
        $besthotel = \App\Models\Besthotel::whereHotelId($hotelid)->first();
        $besthotel->delete();
        
        return true;
    }
    
    function postVisiblehotel(){
        $homepage = \App\Models\Homepage::first();
        $homepage->best_deal_hotel_show = \Input::get('isvisible');
        $homepage->save();
        
        return $homepage->toJson();
        
    }

}
