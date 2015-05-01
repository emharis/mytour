<?php

namespace App\Controllers\Admin;

class DestinasiController extends \BaseController {

    public $DESTINASI_IMG_PATH;

    function __construct() {
        $this->DESTINASI_IMG_PATH = \DB::table('constval')->where('name', '=', 'destinasi_img_path')->first()->value;
    }

    function getIndex() {
        $destinasi = \DB::table('view_destinasi')->get();
        $kategori = \DB::table('destinasi_kategori')->get();
        $selectKategori = array();
        foreach ($kategori as $kat) {
            $selectKategori[$kat->id] = $kat->nama;
        }

        return \View::make('back.page.destinasi.destinasi', array(
                    'destinasi' => $destinasi,
                    'kategori' => $kategori,
                    'selectKategori' => $selectKategori
        ));
    }

    /**
     * Submit/save new destinasi
     */
    function postNew() {
        $destinasiId = null;

        \DB::transaction(function($destinasiId)use($destinasiId) {
            //        input data destinasi ke database
            $destinasiId = \DB::table('destinasi')->insertgetId(array(
                'destinasi_kategori_id' => \Input::get('kategori'),
                'nama' => \Input::get('nama'),
                'desc' => \Input::get('desc'),
                'publish' => 'Y'
            ));

//        cek image cover
            $imgname = "";
            if (\Input::hasFile('img-upload-image-destinasi')) {
                //upload image
                $image = \Input::file('img-upload-image-destinasi');
                $imgname = 'img_destinasi_' . $image->getClientOriginalName();
                $imgname = str_replace(' ', '_', $imgname);
                $path = $this->DESTINASI_IMG_PATH;
//            echo $imgname;
                $image->move($path, $imgname);
                //resize image            
                \ImagineResizer::crop($path . $imgname, $path . $imgname, new \Imagine\Image\Box(270, 220));
            }

            //input ke database destinasi_image
            $imageId = \DB::table('destinasi_image')->insertGetId(array(
                'filename' => $imgname,
                'main_img' => 'Y',
                'destinasi_id' => $destinasiId
            ));

            //update imagename
            \DB::table('destinasi')->where('id', '=', $destinasiId)->update(array(
                'main_img' => $imgname
            ));

            $dest = \DB::table('destinasi')->find($destinasiId);
            $dest->img_path = $this->DESTINASI_IMG_PATH;
            echo json_encode($dest);
        });
    }

    /**
     * New kategori
     */
    function postNewKategori() {
        //upload gambar
        $imgname = "";
        if (\Input::hasFile('img-upl-image-kategori')) {
            //upload image
            $image = \Input::file('img-upl-image-kategori');
            $imgname = 'img_kat_dest_' . $image->getClientOriginalName();
            $imgname = str_replace(' ', '_', $imgname);
            $path = $this->DESTINASI_IMG_PATH;
//            echo $imgname;
            $image->move($path, $imgname);
            //resize image            
            \ImagineResizer::crop($path . $imgname, $path . $imgname, new \Imagine\Image\Box(270, 220));
        }
        //simpan ke database
        $id = \DB::table('destinasi_kategori')->insertGetId(array(
            'nama' => \Input::get('nama'),
            'filename' => $imgname
        ));

        $res = \DB::table('destinasi_kategori')->find($id);
        $res->img_path = $this->DESTINASI_IMG_PATH;
        return json_encode($res);
    }

}
