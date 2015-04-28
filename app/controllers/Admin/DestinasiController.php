<?php

namespace App\Controllers\Admin;

class DestinasiController extends \BaseController {

    public $DESTINASI_IMG_PATH;

    function __construct() {
        $this->DESTINASI_IMG_PATH = \DB::table('constval')->where('name', '=', 'destinasi_img_path')->first()->value;
    }

    function getIndex() {
        $destinasi = \DB::table('destinasi')->get();
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
