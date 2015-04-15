<?php

namespace App\Controllers\Admin;

class AboutpageController extends \BaseController {

    function getIndex() {
        $aboutpage = \DB::table('aboutpage')->get();
        $hmpage = array();
        foreach ($aboutpage as $hmp) {
            $hmpage[$hmp->name] = json_decode(json_encode($hmp), true);
        }

        return \View::make('back.page.aboutpage', array(
                    'aboutpage' => $hmpage
        ));
    }
    
    function postUpdate(){
         \DB::table('aboutpage')->where('name','=','content')->update(array(
            'big_value' => \Input::get('content')
        ));
        return \Redirect::to('admin/page/about');
    }
}
