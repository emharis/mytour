<?php

namespace App\Controllers\Admin;

class HotelController extends \BaseController {

    function getIndex() {
        $hotels = \DB::table('view_hotel')->get();

        return \View::make('back.paket.hotel.hotel', array(
                    'hotels' => $hotels
        ));
    }

    /**
     * Simpan hotel baru
     */
    function postNew() {
        \DB::transaction(function() {
            //upload image
            $savePath = \DB::table('constval')->where('name', '=', 'hotel_img_path')->first();
            $path = $savePath->value;
            $name = "";

            if (\Input::hasFile('img-cover')) {
                //upload image
                $image = \Input::file('img-cover');
                $name = 'img_hotel_' . $image->getClientOriginalName();
                $name = str_replace(' ', '_', $name);
//            echo $name;
                $image->move($path, $name);
                //resize image            
                \ImagineResizer::crop($path . $name, $path . $name, new \Imagine\Image\Box(170, 139));
            }
//
            //insert to database
            $id = \DB::table('hotel')->insertGetId(array(
                'nama' => \Input::get('nama'),
                'alamat' => \Input::get('alamat'),
                'img_cover' => $name
            ));
//            
            echo json_encode(\DB::table('hotel')->find($id));
        });
    }

    /**
     * Save edit hotel
     */
    function postEdit() {
        \DB::transaction(function() {
            //upload image
            $savePath = \DB::table('constval')->where('name', '=', 'hotel_img_path')->first();
            $path = $savePath->value;
            $hotel = \DB::table('hotel')->find(\Input::get('hotelId'));
            $filename = $hotel->img_cover;

            //ganti image cover
            if (\Input::hasFile('img-cover')) {
                //delete file yang lama dulu
                $dest = $path . $hotel->img_cover;
                $pathToDel = str_replace(\URL::to('/'), '', $dest);
                \File::delete(public_path() . '/' . $pathToDel);

                //upload image
                $image = \Input::file('img-cover');
                $name = 'img_hotel_' . $image->getClientOriginalName();
                $name = str_replace(' ', '_', $name);
//            echo $name;
                $image->move($path, $name);
                //resize image            
                \ImagineResizer::crop($path . $name, $path . $name, new \Imagine\Image\Box(170, 139));
                //update database
                $filename = $name;
            }
//
            //insert to database
            \DB::table('hotel')->where('id', '=', \Input::get('hotelId'))->update(array(
                'nama' => \Input::get('nama'),
                'alamat' => \Input::get('alamat'),
                'img_cover' => $filename
            ));
//            
            echo json_encode(\DB::table('hotel')->find(\Input::get('hotelId')));
        });
    }

    /**
     * get hotel by id
     * @param int $id
     */
    function getHotelById($id) {
        $hotel = \DB::table('view_hotel')->find($id);
        return json_encode($hotel);
    }

    /**
     * Delete hotel
     * @param int $id
     */
    function getDelHotel($id) {
        $hotel = \DB::table('hotel')->find($id);
        //hapus file img_cover
        $savePath = \DB::table('constval')->where('name', '=', 'hotel_img_path')->first();
        $path = $savePath->value;
        $dest = $path . $hotel->img_cover;
        $pathToDel = str_replace(\URL::to('/'), '', $dest);
        \File::delete(public_path() . '/' . $pathToDel);
        //hapus dari daratabse
        \DB::table('hotel')->where('id','=',$id)->delete();
    }
    
    /**
     * Simpan room baru untuk hotel
     */
    function postNewroom(){
        $hotel = \DB::table('hotel')->find(\Input::get('hotelId'));
        echo json_encode($hotel);
    }

}
