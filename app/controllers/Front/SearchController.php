<?php

namespace App\Controllers\Front;

class SearchController extends \BaseController {

    function postBy() {
        $key = \Input::get('key');
        $blogs = \DB::table('VIEW_BLOGS')->where('title','like','%'.$key.'%')->orderBy('created_at','desc')->where('publish','Y')->get();
        $destinasi = \DB::table('VIEW_DESTINASI')->where('nama','like','%'.$key.'%')->where('publish','Y')->get();
        $hotel = \DB::table('VIEW_HOTEL')->where('nama','like','%'.$key.'%')->get();
        $rental = \DB::table('VIEW_RENTAL')->where('nama','like','%'.$key.'%')->get();
        $travel = \DB::table('VIEW_TRAVEL')->where('nama','like','%'.$key.'%')->where('publish','Y')->get();
        
        return \View::make('front/searchres',array(
            'key'=>$key,
            'blogs'=> $blogs,
            'destinasi' => $destinasi,
            'hotel' => $hotel,
            'rental' => $rental,
            'travel' => $travel,
            'result'=>count($blogs)+count($destinasi)+count($hotel)+count($rental)+count($travel)
        ));
    }

}
