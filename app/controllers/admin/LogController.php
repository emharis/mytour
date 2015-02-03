<?php

namespace App\Controllers\Admin;

class LogController extends \BaseController {

    function getIndex() {
        return \View::make('admin.log.login');
    }

    function postLogin() {


        $creds = array(
            'username' => \Input::get('username'),
            'password' => \Input::get('password')
        );

        try {
            \Illuminate\Support\Facades\Auth::attempt($creds);

            //set user log session
            $user = \Toddish\Verify\Models\User::where('username', \Input::get('username'))->first();
            //set user to session
            \Session::put('loguser', $user);
            \Session::put('onuser_id', $user->id);
            \Session::put('onusername', $user->username);
            \Session::put('islogin', true);

            return \Redirect::to('admin/home');

//            if ($user->can('psb_access')) {
//                \Session::put('onuser_id', $user->id);
//                \Session::put('onusername', $user->username);
//                \Session::put('islogin', true);
//
//                return \Redirect::to('home');
//            } else {
//                return \Redirect::to('login\logout');
//            }
        } catch (\Exception $e) {

            if (\Request::ajax()) {
                return 'loginerror';
            } else {
                Return \Redirect::to('admin/log')->withErrors('loginerror');  //->with('login_errors',true);
            }
            //return Response::error('404');
        }
    }

    function getLogout() {
        \Illuminate\Support\Facades\Auth::logout();
        \Session::flush();
        return \Redirect::to('admin/login');
    }

}
