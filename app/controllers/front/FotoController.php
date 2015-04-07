<?php

namespace App\ Controllers\ Front;

class FotoController extends\ BaseController {

    function getIndex() {
        return \View::make('front/foto',array());
    }

}
