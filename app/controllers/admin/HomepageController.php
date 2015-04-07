<?php

namespace App\Controllers\Admin;

class HomepageController extends \BaseController {

    function getIndex() {
        $homepage = \DB::table('homepage')->get();
        $hmpage=array();
        foreach($homepage as $hmp){
            $hmpage[$hmp->name] = json_decode(json_encode($hmp),true);
        }
        
        return \View::make('back.page.homepage',array(
            'homepage'=>$hmpage
        ));
    }


}
