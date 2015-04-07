<?php

namespace App\ Controllers\ Front;

class TravinfoController extends\ BaseController {

    function getIndex() {
        return \View::make('front/travinfo',array());
    }

}
