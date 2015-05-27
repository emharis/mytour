<?php

namespace App\Controllers\Front;

class VideoController extends \BaseController {

    function getIndex() {
        return \View::make('front/video/index', array(
        'videos' => \DB::table('gallery')->where('type', 'V')->orderBy('created_at', 'desc')->get(),
        ));
    }

}
