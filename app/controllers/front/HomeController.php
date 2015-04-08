<?php

namespace App\ Controllers\ Front;

class HomeController extends\ BaseController {

    function getIndex() {
        //homepage value
        $homepage = \DB::table('homepage')->get();
        $hmpage=array();
        foreach($homepage as $hmp){
            $hmpage[$hmp->name] = json_decode(json_encode($hmp),true);
        }
        //imagesg slider
        $sliders = \DB::table('homepage_slider')->get();
        //favorit travel pack
        $favtrav = \DB::table('homepage_travelpack')
                    ->select('travelpack.id','travelpack.judul','travelpack.harga','travelpack.currency','travelpack.desc','travelpack_image.filename')
                    ->join('travelpack', 'homepage_travelpack.travelpack_id', '=', 'travelpack.id')
                    ->join('travelpack_image','travelpack.id','=','travelpack_image.travelpack_id')
                    ->where('travelpack_image.main_img','=','Y')
                    ->get();
        //best deal hotel
        $hotels = \DB::table('view_homepage_hotel')
                ->get();
        //best deal rental
        $rentals = \DB::table('homepage_rental')
                ->join('rental','homepage_rental.rental_id','=','rental.id')
                ->join('rental_image','rental.id','=','rental_image.rental_id')
                ->where('rental_image.main_img','=','Y')
                ->get();
        //blog rotator
        $blogs = \DB::table('view_blogs')
                ->get();
        //blog rotator
        $testimoni = \DB::table('testimony')
                ->get();
        
        return \View::make('front/home',array(
            'homepage'=>$hmpage,
            'sliders'=>$sliders,
            'favtrav'=>$favtrav,
            'hotels'=>$hotels,
            'rentals'=>$rentals,
            'blogs'=>$blogs,
            'testimoni'=>$testimoni
                ));
    }

}
