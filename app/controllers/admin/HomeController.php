<?php

namespace App\Controllers\Admin;

class HomeController extends \BaseController {

    function getIndex() {
        return \View::make('back.home');
    }


}
