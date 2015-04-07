<?php

namespace App\ Controllers\ Front;

class VideoController extends\ BaseController {

    function getIndex() {
        return \View::make('front/video',array());
    }

}
