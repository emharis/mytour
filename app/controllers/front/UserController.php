<?php

namespace App\Controllers\Front;

class UserController extends \BaseController {
    
    function getIndex(){
        return \View::make('front.user.index');
    }
    
    function getLogin(){
        return \View::make('front.user.login');
    }

}
