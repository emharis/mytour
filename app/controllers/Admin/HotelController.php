<?php

namespace App\Controllers\Admin;

class HotelController extends \BaseController {

    private $hotel_img_path, $room_img_path;

    function __construct() {
        $aPath = \DB::table('constval')->where('name', '=', 'hotel_img_path')->first();
        $this->hotel_img_path = $aPath->value;
        $rPath = \DB::table('constval')->where('name', '=', 'hotel_room_img_path')->first();
        $this->room_img_path = $rPath->value;
    }

    function getIndex() {
        $hotels = \DB::table('view_hotel')->get();

        return \View::make('back.paket.hotel.hotel', array(
                    'hotels' => $hotels
        ));
    }

    /**
     * new hotel
     */
    function getNew() {
        return \View::make('back.paket.hotel.new');
    }

    /**
     * Simpan hotel baru
     */
    function postNew() {
        \DB::transaction(function() {
            //upload image
//            $savePath = \DB::table('constval')->where('name', '=', 'hotel_img_path')->first();
            $path = $this->hotel_img_path;
            $imgname = \Input::get('img-cover-url');

            if (\Input::hasFile('img-cover-new-hotel')) {
                //upload image
                $image = \Input::file('img-cover-new-hotel');
                $imgname = 'img_hotel_' . $image->getClientOriginalName();
                $imgname = str_replace(' ', '_', $imgname);
//            echo $imgname;
                $image->move($path, $imgname);
                //resize image            
                \ImagineResizer::crop($path . $imgname, $path . $imgname, new \Imagine\Image\Box(170, 139));
            }
//
            //insert to database
            $id = \DB::table('hotel')->insertGetId(array(
                'nama' => \Input::get('nama'),
                'alamat' => \Input::get('alamat'),
                'desc' => \Input::get('desc'),
                'img_cover' => $imgname
            ));

            //insert to hotel_image
            \DB::table('hotel_image')->insert(array(
                'hotel_id' => $id,
                'filename' => $imgname,
                'main_img' => 'Y',
                'islocal' => \Input::get('islocal')
            ));
//      
//            echo json_encode(\DB::table('hotel')->find($id));
        });

        return \Redirect::to('admin/paket/hotel');
    }

    /**
     * Edit hotel
     * @param int $hotelid
     */
    function getEdit($hotelid) {
        $hotel = \DB::table('view_hotel')->find($hotelid);
        $rooms = \DB::table('hotel_room')->where('hotel_id', '=', $hotelid)->get();
        $images = \DB::table('hotel_image')->where('hotel_id', '=', $hotelid)->get();
        $cover = \DB::table('hotel_image')->where('hotel_id', '=', $hotelid)->where('main_img', '=', 'Y')->first();

        return \View::make('back.paket.hotel.edit', array(
                    'hotel' => $hotel
                    , 'rooms' => $rooms
                    , 'img_path' => $this->hotel_img_path
                    , 'images' => $images
                    , 'cover' => $cover
        ));
    }

    /**
     * Save edit hotel
     */
    function postEdit() {
        \DB::transaction(function() {
            //upload image
//            $savePath = \DB::table('constval')->where('name', '=', 'hotel_img_path')->first();
            $path = $this->hotel_img_path; //$savePath->value;
            $hotel = \DB::table('hotel')->find(\Input::get('hotelId'));
            $filename = $hotel->img_cover;

            //ganti image cover
            if (\Input::hasFile('img-cover-edit-hotel')) {
                //delete file yang lama dulu
                $dest = $path . $hotel->img_cover;
                $pathToDel = str_replace(\URL::to('/'), '', $dest);
                \File::delete(public_path() . '/' . $pathToDel);

                //upload image
                $image = \Input::file('img-cover-edit-hotel');
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
                'desc' => \Input::get('desc'),
                'img_cover' => $filename
            ));
//            
//            echo json_encode(\DB::table('hotel')->find(\Input::get('hotelId')));
        });
        return \Redirect::back();
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
        echo 'delete hotel with id : ' . $id . '....<br/>';
        $hotel = \DB::table('hotel')->find($id);
        echo $hotel->nama . '<br/>';
        //hapus room dulu
        echo 'deleting rooms.....<br/>';
        $rooms = \DB::table('hotel_room')->where('hotel_id', '=', $hotel->id)->get();
        foreach ($rooms as $rm) {
            $this->deleteRoom($rm->id);
            echo 'room ' . $rm->nama . ' deleted...<br/>';
        }
//        hapus file img_cover
//        $savePath = \DB::table('constval')->where('name', '=', 'hotel_img_path')->first();
        $path = $this->hotel_img_path; //$savePath->value;
        $dest = $path . $hotel->img_cover;
        $pathToDel = str_replace(\URL::to('/'), '', $dest);
        \File::delete(public_path() . '/' . $pathToDel);
        //hapus dari daratabse
        \DB::table('hotel')->where('id', '=', $id)->delete();
    }

    /**
     * Simpan room baru untuk hotel
     */
    function postNewroom() {
        $hotel = \DB::table('hotel')->find(\Input::get('hotelId'));

//        save image
//        $savePath = \DB::table('constval')->where('name', '=', 'hotel_room_img_path')->first();
        $path = $this->room_img_path; //$savePath->value;
        $filename = "";
//        if (\Input::hasFile('img_cover_new_room')) {
//            //upload image
//            $image = \Input::file('img_cover_new_room');
//            $name = 'img_hotel_room_' . $image->getClientOriginalName();
//            $name = str_replace(' ', '_', $name);
////            echo $name;
//            $image->move($path, $name);
//            //resize image            
//            \ImagineResizer::crop($path . $name, $path . $name, new \Imagine\Image\Box(170, 139));
//            //update database
//            $filename = $name;
//        }

        $id = \DB::table('hotel_room')->insertGetId(array(
            'hotel_id' => $hotel->id,
            'nama' => \Input::get('nama'),
            'harga' => str_replace(',', '', \Input::get('harga')),
            'currency' => \Input::get('currency'),
            'publish' => \Input::get('publish'),
//            'img_cover' => $filename,
            'desc' => \Input::get('desc'),
            'hotel_image_id' => \Input::get('imageid')
        ));

        //get hotel from view_hotel table
        $ahotel = \DB::table('hotel_room')->find($id);
        echo json_encode($ahotel);
    }

    /**
     * Simpan edit room
     */
    function postEditroom() {
        $room = \DB::table('hotel_room')->find(\Input::get('roomId'));
        //jika image di rubah
//        $savePath = \DB::table('constval')->where('name', '=', 'hotel_room_img_path')->first();
        $path = $this->room_img_path; //$savePath->value;
        $filename = $room->img_cover;
        if (\Input::hasFile('img_cover_edit_room')) {
            //delete file lama
            $dest = $path . $room->img_cover;
            $pathToDel = str_replace(\URL::to('/'), '', $dest);
            \File::delete(public_path() . '/' . $pathToDel);
            //upload image
            $image = \Input::file('img_cover_edit_room');
            $imgname = 'img_hotel_room' . $image->getClientOriginalName();
            $imgname = str_replace(' ', '_', $imgname);
//            echo $imgname;
            $image->move($path, $imgname);
            //resize image            
            \ImagineResizer::crop($path . $imgname, $path . $imgname, new \Imagine\Image\Box(170, 139));
            $filename = $imgname;
        }

        \DB::table('hotel_room')->where('id', '=', \Input::get('roomId'))->update(array(
            'nama' => \Input::get('nama'),
            'publish' => \Input::get('publish'),
            'harga' => str_replace(',', '', \Input::get('harga')),
            'currency' => \Input::get('currency'),
            'desc' => \Input::get('desc'),
            'img_cover' => $filename,
        ));

        echo json_encode(\DB::table('hotel_room')->find(\Input::get('roomId')));
        //jika image di rubah);
    }

    /**
     * Get hotel roooms
     * @param type $hotelid
     */
    function getRooms($hotelid) {
        $rooms = \DB::table('hotel_room')->where('hotel_id', '=', $hotelid)->get();
        echo json_encode($rooms);
    }

    /**
     * get room by id
     * @param type $roomid
     */
    function getRoomById($roomid) {
        $room = \DB::table('hotel_room')->find($roomid);
        //get image room
        $image = \DB::table('hotel_image')->find($room->hotel_image_id);
        //set image full with path
        if($image->islocal == 'Y'){
            $room->imagefull = $this->room_img_path . $image->filename;
        }else{
            $room->imagefull = $image->filename;
        }
        //room img path
//        $savePath = \DB::table('constval')->where('name', '=', 'hotel_room_img_path')->first();
        $path = $this->room_img_path; //$savePath->value;
        $room->imgpath = $path;
        
        echo json_encode($room);
    }

    function getDelroom($id) {
        $this->deleteRoom($id);
    }

    function deleteRoom($id) {
        //delete file images
        $room = \DB::table('hotel_room')->find($id);
//        $savePath = \DB::table('constval')->where('name', '=', 'hotel_room_img_path')->first();
        $path = $this->room_img_path; //$savePath->value;
        //delete file lama
        $dest = $path . $room->img_cover;
        $pathToDel = str_replace(\URL::to('/'), '', $dest);
        \File::delete(public_path() . '/' . $pathToDel);
        //delete dari database
        \DB::table('hotel_room')->where('id', '=', $id)->delete();
    }

    /**
     * Tambha image hotel
     */
    function postAddImage() {
        $hotelId = \Input::get('hotelId');
        $filename = "";

        if(\Input::get('islocal'=='Y')){
        
        if (\Input::hasFile('input-file-tambah-image')) {
            //upload image
            $path = $this->hotel_img_path;
            $image = \Input::file('input-file-tambah-image');
            $imgname = 'img_hotel_' . $image->getClientOriginalName();
            $imgname = str_replace(' ', '_', $imgname);
            $filename = $imgname;
            $image->move($path, $imgname);

            //resize image            
            \ImagineResizer::crop($path . $imgname, $path . $imgname, new \Imagine\Image\Box(170, 139));
        }
        }else{
            $filename = \Input::get('img-cover-url');
        }
        //input ke database
        $id = \DB::table('hotel_image')->insertGetId(array(
            'hotel_id' => $hotelId
            ,'filename' => $filename
            ,'islocal' => \Input::get('islocal')
        ));

        $res = \DB::table('hotel_image')->find($id);
        $res->img_path = $this->hotel_img_path;
        return json_encode($res);
    }
    
    /**
     * Get hotel images
     * @param type $hotelid
     */
    function getHotelImages($hotelid){
        $images = \DB::table('hotel_image')->where('hotel_id','=',$hotelid)->get();
        $images[0]->img_path = $this->hotel_img_path;
        return json_encode($images);
    }

    function getDelImage($imageid) {
        return \DB::table('hotel_image')->where('id', '=', $imageid)->delete();
    }

    function getSetImageCover($imageid) {
        $image = \DB::table('hotel_image')->find($imageid);
        $hotel = \DB::table('hotel')->find($image->hotel_id);
        //set image cover
        ///clear image cover
        \DB::table('hotel_image')->where('hotel_id', '=', $image->hotel_id)->update(array(
            'main_img' => 'N'
        ));
        //set image cover ke table 
        \DB::table('hotel_image')->where('id', '=', $imageid)->update(array(
            'main_img' => 'Y'
        ));
        //set image filename ke table hotel
        \DB::table('hotel')->where('id', '=', $hotel->id)->update(array(
            'img_cover' => $image->filename
        ));
        
        $image->img_path = $this->hotel_img_path;
        return json_encode($image);
    }

}