<?php

namespace App\Controllers\Front;

class VideoController extends \BaseController {

    public function getIndex() {
        return \View::make('front.video.index', array(
                    'videos'=>  \App\Models\Gallery::where('type','N')->paginate(3)
        ));
    }
    
    public function getPager(){
        return \View::make('front.video.pager', array(
                    'videos'=>  \App\Models\Gallery::where('type','N')->paginate(3)
        ));
    }

}
