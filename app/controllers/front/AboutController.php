<?php

namespace App\ Controllers\ Front;

class AboutController extends\ BaseController {

    function getIndex() {
        //about value
        $about = \DB::table('page_about')->get();
        $aboutarr=array();
        foreach($about as $hmp){
            $aboutarr[$hmp->name] = json_decode(json_encode($hmp),true);
        }
        return \View::make('front/about',array(
            'about'=>$aboutarr
        ));
    }

}
