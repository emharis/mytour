<?php

namespace App\Controllers\Admin;

class HomepageController extends \BaseController {

    function getIndex() {
        $homepage = \DB::table('homepage')->get();
        $hmpage = array();
        foreach ($homepage as $hmp) {
            $hmpage[$hmp->name] = json_decode(json_encode($hmp), true);
        }

        $sliders = \DB::table('homepage_slider')->get();

        //travelpack favorit
        $travpackfav = \DB::table('VIEW_HOMEPAGE_TRAVEL')->get();
        $hotelfav = \DB::table('VIEW_HOMEPAGE_HOTEL')->get();
        $rentals = \DB::table('VIEW_HOMEPAGE_RENTAL')->get();

        return \View::make('back.page.homepage.homepage', array(
                    'homepage' => $hmpage,
                    'sliders' => $sliders,
                    'travpackfav' => $travpackfav,
                    'hotelfav' => $hotelfav,
                    'rentals' => $rentals
        ));
    }

    function postUpsetting() {
        //update homepage setting
        \DB::table('homepage')->where('name', '=', 'welcome_title')->update(array('big_value' => \Input::get('welcome_title')));
        \DB::table('homepage')->where('name', '=', 'welcome_subtitle')->update(array('big_value' => \Input::get('welcome_subtitle')));
        \DB::table('homepage')->where('name', '=', 'show_blog_slider')->update(array('value' => \Input::get('show_blog_slider')));
        \DB::table('homepage')->where('name', '=', 'blog_slider_count')->update(array('value' => \Input::get('blog_slider_count')));
        \DB::table('homepage')->where('name', '=', 'show_testimony')->update(array('value' => \Input::get('show_testimony')));
        \DB::table('homepage')->where('name', '=', 'testimony_count')->update(array('value' => \Input::get('testimony_count')));
    }

    function postSidenav() {
        \DB::table('homepage')->where('name', '=', 'show_sidenav')->update(array('value' => \Input::get('show_sidenav')));
        \DB::table('homepage')->where('name', '=', 'sidenav_find_destination')->update(array('value' => \Input::get('sidenav_find_destination')));
        \DB::table('homepage')->where('name', '=', 'sidenav_find_destination_subtitle')->update(array('value' => \Input::get('sidenav_find_destination_subtitle')));
        \DB::table('homepage')->where('name', '=', 'sidenav_read_news_subtitle')->update(array('value' => \Input::get('sidenav_read_news_subtitle')));
        \DB::table('homepage')->where('name', '=', 'sidenav_buy_travel')->update(array('value' => \Input::get('sidenav_buy_travel')));
        \DB::table('homepage')->where('name', '=', 'sidenav_buy_travel_subtitle')->update(array('value' => \Input::get('sidenav_buy_travel_subtitle')));
        \DB::table('homepage')->where('name', '=', 'sidenav_wts')->update(array('value' => \Input::get('sidenav_wts')));
        \DB::table('homepage')->where('name', '=', 'sidenav_wts_subtitle')->update(array('value' => \Input::get('sidenav_wts_subtitle')));
    }

    function getResize() {
        $img = new \Imagine\Gmagick\Imagine();
    }

    function postAddslider() {
        if (\Input::hasFile('upl-slider')) {
            //get image
//            echo 'move gambar';
            $savePath = \DB::table('constval')->where('name', '=', 'img_slider_path')->first();
            $counter = \DB::table('homepage_slider')->count();
            $name = 'img_slider_' . $counter . '_' . \Input::file('upl-slider')->getClientOriginalName();
            $name = str_replace(' ', '_', $name);

//            echo $savePath->value;
            //upload image
            \Input::file('upl-slider')->move($savePath->value, $name);
            //save image url to database
            $imgsliderId = \DB::table('homepage_slider')->insertGetId(array('filename' => $name));

//            //resize image
            $imgine = new \Imagine\Gd\Imagine();
            $box = new \Imagine\Image\Box(770, 354);
//            $img->open($savePath->value . '/' . $name)->resize($box)->save($savePath->value . '/' . $name);
            $image = $imgine->open($savePath->value . $name);

            $wFactor = (int) ($image->getSize()->getWidth() / $box->getWidth());
            $hFactor = (int) ($image->getSize()->getHeighr() / $box->getHeighr());

            if ($wFactor > $hFactor) {
                $box = new \Imagine\Image\Box($box->getWidth() * $hFactor, $box->getHeighr() * $hFactor);
            } else {
                $box = new \Imagine\Image\Box($box->getWidth() * $wFactor, $box->getHeighr() * $wFactor);
            }
            //cropping with aspect ratio
            $image->crop(new \Imagine\Image\Point(($image->getSize()->getWidth() - $box->getWidth()) / 2, ($image->getSize()->getHeighr() - $box->getHeighr()) / 2), $box);
            $image->save($savePath->value . $name);


//            return '{"path":"' . $savePath->value. '","filename":"' . $name . '"}';
            return json_encode(array('path' => $savePath->value, 'filename' => $name, 'id' => $imgsliderId));
//            return $savePath->value.$name;
        }
    }

    function getImagesliders() {
        $imgs = \DB::table('homepage_slider')->get();

        return json_encode($imgs);
    }

    function postDeleteslider() {
        $id = \Input::get('id');
        $slider = \DB::table('homepage_slider')->find($id);
        //hapus file
        $savePath = \DB::table('constval')->where('name', '=', 'img_slider_path')->first();
        $dest = $savePath->value . $slider->filename;
        //delete image
        $pathToDel = str_replace(\URL::to('/'), '', $dest);
        echo $pathToDel . '<br/>';
        echo public_path() . '/' . $pathToDel . ' <br/>';
        echo 'deleting....';
        \File::delete(public_path() . '/' . $pathToDel);
        echo '<br>';
        //hapus database
        \DB::table('homepage_slider')->where('id', '=', $id)->delete();
    }

    //============= TRAVEL FAVORIT ==================================
    //
    function getTravel() {
        $travelpacks = \DB::select('select * from travelpack as rt where rt.id not in (select hr.travelpack_id from homepage_travelpack as hr) and rt.publish="Y"');
        return json_encode($travelpacks);
    }

    /**
     * Tambahkan Travelpack
     */
    function postAddTravelpack() {
        \DB::table('homepage_travelpack')->insert(array(
            'travelpack_id' => \Input::get('travelpackid')
        ));
    }

    /**
     * Delete travelpack favorit
     * @param type $id
     */
    function getDeleteTravelpack($id) {
        \DB::table('homepage_travelpack')->where('travelpack_id', $id)->delete();
    }

    //
    //============= END OF TRAVEL FAVORIT ==================================
    //============= HOTEL FAVORIT ==================================
    //
    function getHotel() {
        $hotels = \DB::select('select * from hotel as rt where rt.id not in (select hr.hotel_id from homepage_hotel as hr)');
        return json_encode($hotels);
    }

    /**
     * Tambahkan Hotel
     */
    function postAddHotel() {
        \DB::table('homepage_hotel')->insert(array(
            'hotel_id' => \Input::get('hotelid')
        ));
    }

    /**
     * Delete hotel favorit
     * @param type $id
     */
    function getDeleteHotel($id) {
        \DB::table('homepage_hotel')->where('hotel_id', $id)->delete();
    }

    //
    //============= END OF HOTEL FAVORIT ==================================
    
    //=================RENTAL FAVORIT=======================================
    /**
     * Get data rentals
     */
    function getRentals(){
        return json_encode(\DB::select('select * from rental as rt where rt.id not in (select hr.rental_id from homepage_rental as hr) and rt.publish = "Y"'));
    }
    /**
     * Add new rental to homepage_rental
     */
    function postAddRental() {
        \DB::table('homepage_rental')->insert(array(
            'rental_id' => \Input::get('rentalid')
        ));
    }
    /**
     * Delete rental favorit
     * @param type $id
     */
    function getDeleteRental($id) {
        \DB::table('homepage_rental')->where('rental_id', $id)->delete();
    }
    //==================END OF RENTAL FAVORIT===============================
}
