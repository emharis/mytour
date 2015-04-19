<?php

namespace App\Controllers\Admin;

class LoginController extends \BaseController {

    function getIndex() {
        return \View::make('back.login');
    }
    
    function getLogout(){
        return \View::make('back.login');
    }

}
