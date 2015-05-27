<?php

namespace App\Controllers\Admin;

class RentalController extends \BaseController {

    private $rental_img_path;

    function __construct() {
        $aPath = \DB::table('constval')->where('name', '=', 'rental_img_path')->first();
        $this->rental_img_path = $aPath->value;
    }

    function getIndex() {
        return \View::make('back.paket.rental.rental', array(
                    'rentals' => \DB::table('rental')->get()
        ));
    }

    /**
     * New Rental
     */
    function getNew() {
        return \View::make('back.paket.rental.new', array());
    }

    /**
     * Simpan rental
     */
    function postNew() {
        $id = \DB::table('rental')->insertGetId(array(
            'nama' => \Input::get('nama'),
            'desc' => \Input::get('desc'),
            'harga' => str_replace('.00', '', str_replace(',', '', \Input::get('harga'))),
            'currency' => \Input::get('currency'),
        ));

        $imgname = "";
        if (\Input::get('islocal') == 'Y') {
            if (\Input::hasFile('imageUploader')) {
                //upload image
                $image = \Input::file('imageUploader');
                $imgname = 'img_rental_' . $image->getClientOriginalName();
                $imgname = str_replace(' ', '_', $imgname);
                $image->move($this->rental_img_path, $imgname);
                //resize image            
                \ImagineResizer::crop($this->rental_img_path . $imgname, $this->rental_img_path . $imgname, new \Imagine\Image\Box(170, 139));
            }
        } else {
            $imgname = \Input::get('imageUrl');            
        }
        
        //save ke database image
        \DB::table('rental_image')->insert(array(
            'rental_id' => $id,
            'filename' => $imgname,
            'main_img' => 'Y',
            'islocal' => \Input::get('islocal'),
        ));
        
        return \Redirect::to('admin/paket/rental');
    }

    /**
     * edit data rental
     */
    function getEdit($id) {
        $rental = \DB::table('VIEW_RENTAL')->find($id);
        $images = \DB::table('rental_image')->where('rental_id', $id)->get();
        $cover = \DB::table('rental_image')->where('rental_id', $id)->where('main_img', '=', 'Y')->first();

        return \View::make('back.paket.rental.edit', array(
                    'rental' => $rental,
                    'images' => $images,
                    'img_path' => $this->rental_img_path,
                    'cover' => $cover
        ));
    }

    /**
     * Save edit rental
     */
    function postEdit() {
        $rental = \DB::table('rental')->find(\Input::get('rentalId'));
        //update
        \DB::table('rental')->where('id', '=', $rental->id)->update(array(
            'nama' => \Input::get('nama'),
            'desc' => \Input::get('desc'),
            'harga' => str_replace('.00', '', str_replace(',', '', \Input::get('harga'))),
            'currency' => \Input::get('currency')
        ));
        return \Redirect::back();
    }

    /**
     * Upload new image rental
     */
    function postUpload() {
        $path = $this->rental_img_path;
        $imgname = "";
        $id = 0;

        if (\Input::get('islocal') == 'Y') {

            if (\Input::hasFile('img-upload')) {
                //upload image
                $image = \Input::file('img-upload');
                $imgname = 'img_rental_' . $image->getClientOriginalName();
                $imgname = str_replace(' ', '_', $imgname);
////            echo $imgname;

                $image->move($path, $imgname);
                //resize image            
                \ImagineResizer::crop($path . $imgname, $path . $imgname, new \Imagine\Image\Box(170, 139));
            }
        } else {
            $imgname = \Input::get('imgUrl');
        }

        //simpan ke database
        $id = \DB::table('rental_image')->insertGetId(array(
            'filename' => $imgname,
            'main_img' => 'N',
            'rental_id' => \Input::get('rentalId'),
            'islocal' => \Input::get('islocal')
        ));

        $rntl = \DB::table('rental_image')->where('id', '=', $id)->first();

        echo json_encode($rntl);
    }

    /**
     * Hapus image rental
     * @param type $imageid
     * @return type
     */
    function getDelImage($imageid) {
        return \DB::table('rental_image')->where('id', '=', $imageid)->delete();
    }

    function getSetImageCover($imageid) {
        //get image
        $img = \db::table('rental_image')->where('id', '=', $imageid)->first();
        //set no image cover 
        \db::table('rental_image')->where('rental_id', '=', $img->rental_id)->update(array(
            'main_img' => 'N'
        ));
        //set main image cover
        \db::table('rental_image')->where('id', '=', $imageid)->update(array(
            'main_img' => 'Y'
        ));

        $img = \db::table('rental_image')->where('id', '=', $imageid)->first();
        $img->img_path = $this->rental_img_path;
        return json_encode($img);
    }

}
