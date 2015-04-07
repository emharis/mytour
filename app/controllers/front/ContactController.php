<?php

namespace App\ Controllers\ Front;

class ContactController extends\ BaseController {

    function getIndex() {
        return \View::make('front/contact',array());
    }

}
