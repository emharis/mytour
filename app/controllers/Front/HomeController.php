<?php

namespace App\Controllers\Front;

class HomeController extends \BaseController {

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
        $favtrav = \DB::table('VIEW_HOMEPAGE_TRAVEL')->get();
//        $favtrav = \DB::table('homepage_travelpack')
//                    ->select('travelpack.id','travelpack.nama','travelpack.harga','travelpack.currency','travelpack.desc','travelpack_image.filename')
//                    ->join('travelpack', 'homepage_travelpack.travelpack_id', '=', 'travelpack.id')
//                    ->join('travelpack_image','travelpack.id','=','travelpack_image.travelpack_id')
//                    ->where('travelpack_image.main_img','=','Y')
//                    ->get();
        //best deal hotel
        $hotels = \DB::table('VIEW_HOMEPAGE_HOTEL')
                ->get();
        //best deal rental
        $rentals = \DB::table('VIEW_HOMEPAGE_RENTAL')
                ->get();
        //blog rotator
        $limitBlogRotator = \DB::table('homepage')->where('name','blog_slider_count')->first()->value;
        $blogs = \DB::table('VIEW_BLOGS')
                ->limit($limitBlogRotator)
                ->get();
        //blog rotator
        $testimoni = \DB::table('VIEW_TESTIMONI')
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
