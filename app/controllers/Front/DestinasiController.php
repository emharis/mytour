<?php

namespace App\Controllers\Front;

class DestinasiController extends \BaseController {
    
    public $IMG_PATH;
    
    function __construct() {
        parent::__construct();
        $this->IMG_PATH = \DB::table('constval')->where('name', '=', 'destinasi_img_path')->first()->value;
    }

    function getIndex(){
        $kategoris = \DB::table('destinasi_kategori')->get();
        
        //tampilkan page kategori destinasi
        return \View::make('front.dest.index',array(
            'kategoris' => $kategoris,
            'imgpath' =>$this->IMG_PATH
        ));
    }
    
    function getShow($destinasiid){
        $destinasi = \DB::table('VIEW_DESTINASI')->find($destinasiid);
        $destinasiIn = \DB::table('VIEW_DESTINASI')->where('destinasi_kategori_id',$destinasi->destinasi_kategori_id)->orderByRaw('rand()')->limit(5)->get();
        return \View::make('front.dest.show',array(
            'destinasi'=>$destinasi,
            'destinasiIn'=>$destinasiIn,
            'kategoris' => \DB::table('destinasi_kategori')->get()
        ));
    }
    
    function getKategori($kategoriid){
        $destinasi = \DB::table('VIEW_DESTINASI')->where('destinasi_kategori_id',$kategoriid)->where('publish','Y')->get();
        return \View::make('front.dest.destinasi',array(
            'destinasi' => $destinasi,
            'kategori' => \DB::table('destinasi_kategori')->find($kategoriid),
            'kategoris'=>\DB::table('destinasi_kategori')->get()
        ));
    }

}
