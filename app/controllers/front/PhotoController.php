<?php

namespace App\Controllers\Front;

class PhotoController extends \BaseController {

    public function getIndex() {
        return \View::make('front.photo.index', array(
                    'photos'=>  \App\Models\Gallery::where('type','Y')->paginate(3)
        ));
    }
    
    public function getPager(){
        return \View::make('front.photo.pager', array(
                    'photos'=>  \App\Models\Gallery::where('type','Y')->paginate(3)
        ));
    }

}
