<?php

namespace App\Controllers\Admin;

class LoginController extends \BaseController {

    function getIndex() {
        return \Redirect::to('admin/home');
    }

    function getLogout() {
        echo 'Logout';
    }

}
