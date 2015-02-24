<?php

namespace App\Controllers\Admin;

class HomeController extends \BaseController {
    /*
      |--------------------------------------------------------------------------
      | Default Home Controller
      |--------------------------------------------------------------------------
      |
      | You may wish to use controllers instead of, or in addition to, Closure
      | based routes. That's great! Here is an example controller method to
      | get you started. To route to this controller, just add the route:
      |
      |	Route::get('/', 'HomeController@showWelcome');
      |
     */

    public function getIndex() {
        //set setting ke session jika belum ada
        if(!\Session::has('konifg')){
            $config = \App\Models\Konfig::all();
            $cfarr = array();
            foreach ($config as $cf) {
                $cfarr[$cf->nama] = $cf->value;
            }
            \Session::put('konfig', $cfarr);
        }
        if(!\Session::has('compinfo')){
            \Session::put('compinfo',\App\Models\Company::first()->toArray());
        }
        
        return \View::make('admin.home');
    }

    
}
