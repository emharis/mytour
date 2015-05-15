<?php

namespace App\Controllers\Admin;

class TravelController extends \BaseController {

    private $travel_img_path;

    function __construct() {
        $aPath = \DB::table('constval')->where('name', '=', 'travelpack_img_path')->first();
        $this->travel_img_path = $aPath->value;
    }

    function getIndex() {
        $travels = \DB::table('travelpack')->get();
        return \View::make('back.paket.travel.travel', array(
                    'travels' => $travels
        ));
    }

    /**
     * New paket wisata
     */
    function getNew() {
        return \View::make('back.paket.travel.new');
    }

    /*     * *
     * Simpan new paket wisata
     */

    function postNew() {
        \DB::transaction(function() {
            //upload image
            if (\Input::hasFile('input-img-new-travel')) {
                //upload image
                $image = \Input::file('input-img-new-travel');
                $imgname = 'img_travelpack_' . $image->getClientOriginalName();
                $imgname = str_replace(' ', '_', $imgname);
                $image->move($this->travel_img_path, $imgname);
                //resize image            
                \ImagineResizer::crop($this->travel_img_path . $imgname, $this->travel_img_path . $imgname, new \Imagine\Image\Box(170, 139));

                //save ke database
                $id = \DB::table('travelpack')->insertGetId(array(
                    'nama' => \Input::get('nama'),
                    'harga' => str_replace('.00','',str_replace(',', '', \Input::get('harga'))),                    
//                    'harga' => str_replace(',', '', \Input::get('harga')),
                    'currency' => \Input::get('currency'),
                    'day' => \Input::get('day'),
                    'night' => \Input::get('night'),
                    'desc' => \Input::get('desc')
                ));

                //save image ke database
                \DB::table('travelpack_image')->insert(array(
                    'travelpack_id' => $id,
                    'filename' => $imgname,
                    'main_img' => 'Y'
                ));
            }
        });

        return \Redirect::to('admin/paket/travel');
    }

    /**
     * Edit travel
     * @param type $id
     * @return type
     */
    function getEdit($id) {
        $travel = \DB::table('view_travel')->find($id);
        $travel->imgpath = $this->travel_img_path;
        $hotels = \DB::table('view_travelpack_hotel')->where('travelpack_id', '=', $id)->get();
        $images = \DB::table('travelpack_image')->where('travelpack_id', '=', $id)->get();

        return \View::make('back.paket.travel.edit', array(
                    'travel' => $travel,
                    'hotels' => $hotels,
                    'images' => $images,
                    'img_path' => $this->travel_img_path
        ));
    }

    function postEdit() {
        $travel = \DB::table('travelpack')->find(\Input::get('travelId'));
        \DB::table('travelpack')->where('id', '=', $travel->id)->update(array(
            'nama' => \Input::get('nama'),
//            'harga' => str_replace(',', '', \Input::get('harga')),
            'harga' => str_replace('.00','',str_replace(',', '', \Input::get('harga'))),
            'currency' => \Input::get('currency'),
            'desc' => \Input::get('desc'),
            'include' => \Input::get('include'),
            'exclude' => \Input::get('exclude'),
            'itinerary' => \Input::get('itinerary'),
            'day' => \Input::get('day'),
            'night' => \Input::get('night')
        ));

        return \Redirect::back();
    }

    /**
     * Hapus travel
     * @param type $id
     */
    function getDelete($id) {
        $travelpack = \DB::table('travelpack')->find($id);
        //hapus hotel dulu
        \DB::table('travelpack_hotel')->where('travelpack_id', '=', $id)->delete();

        //hapus travelpack images
        //hapus file
        $images = \DB::table('travelpack_image')->where('travelpack_id', '=', $id)->get();
        foreach ($images as $img) {
            $dest = $this->travel_img_path . $img->filename;
            $pathToDel = str_replace(\URL::to('/'), '', $dest);
            \File::delete(public_path() . '/' . $pathToDel);
        }

        //hapus databbase image
        \DB::table('travelpack_image')->where('travelpack_id', '=', $id)->delete();

        //hapus travel
        \DB::table('travelpack')->where('id', '=', $id)->delete();
        return \Redirect::back();
    }

    /**
     * Get data hotels		* 
     * @return
     */
    function getHotels($travelpackId) {
        $hotels = \DB::table('view_hotel')->where('jumlah_room', '>', 0)->whereRaw('id not in (select hotel_id from travelpack_hotel where travelpack_id = ' . $travelpackId . ')')->get();
        return json_encode($hotels);
    }

    /**
     * Tambah data hotel
     * 
     * @return
     */
    function postAddHotel() {
        $id = \DB::table('travelpack_hotel')->insertGetId(array(
            'travelpack_id' => \Input::get('travelpackId'),
            'hotel_id' => \Input::get('hotelId')
        ));

        return json_encode(\DB::table('travelpack_hotel')->find($id));
    }

    function getDelHotel($travelid, $hotelid) {
        \DB::table('travelpack_hotel')->where('travelpack_id', '=', $travelid)->where('hotel_id', '=', $hotelid)->delete();
    }

    /**
     * Upload image travel
     */
    function postUploadImage() {
        $travelId = \Input::get('travelId');

        if (\Input::hasFile('new-img-upload')) {
            //upload image
            $image = \Input::file('new-img-upload');
            $imgname = 'img_travelpack_' . $image->getClientOriginalName();
            $imgname = str_replace(' ', '_', $imgname);
            $image->move($this->travel_img_path, $imgname);

            //resize image            
            \ImagineResizer::crop($this->travel_img_path . $imgname, $this->travel_img_path . $imgname, new \Imagine\Image\Box(170, 139));
//
            //save ke database
            $id = \DB::table('travelpack_image')->insertGetId(array(
                'travelpack_id' => $travelId,
                'filename' => $imgname
            ));

            $newimg = \DB::table('travelpack_image')->where('id', '=', $id)->first();
            $newimg->img_path = $this->travel_img_path;
            return json_encode($newimg);
        } else {
            return 'no image';
        }
    }

    /**
     * Delete travel image
     */
    function getDelTravelImage($imageid) {
        echo 'delete atravel image ...';
        \DB::table('travelpack_image')->where('id', '=', $imageid)->delete();
        echo 'deleted...';
    }

    /**
     * Set image cover
     */
    function getSetImageCover($imageid) {
        //get travel id
        $travel = \DB::table('travelpack_image')->where('id', '=', $imageid)->first();
        //jadikan semua menjadi not image cover
        \DB::table('travelpack_image')->where('travelpack_id', '=', $travel->travelpack_id)->update(array(
            'main_img' => 'N'
        ));
        //set image cover
        \DB::table('travelpack_image')->where('id', '=', $imageid)->update(array(
            'main_img' => 'Y'
        ));
    }

}
