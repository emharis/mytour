<?php

namespace App\Controllers\Front;

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
        return \View::make('front.home', array(
                    'sliders' => \App\Models\Slider::where('publish', 'Y')->get(),
                    'homepage' => \App\Models\Homepage::first(),
                    'sliders' => \App\Models\Homepageslider::get(),
                    'testimonis' => \App\Models\Testimoni::orderByRaw('rand()')->where('publish', 'Y')->limit(\App\Models\Konfig::where('nama', 'testimonial_list_count')->first()->value)->get(),
                    'contactpage' => \App\Models\Contactpage::first(),
                    'rentals' => \App\Models\Bestcar::all(),
                    'favdests' => \App\Models\Favdest::all(),
                    'hotels' => \App\Models\Besthotel::all()
        ));
    }

}
