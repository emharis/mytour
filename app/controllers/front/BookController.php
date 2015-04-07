<?php

namespace App\ Controllers\ Front;

class BookController extends\ BaseController {

    function getIndex() {
        return \View::make('front/book',array());
    }

}
