<?php

namespace App\Controllers\Front;

class TestimoniController extends \BaseController {

    public function getIndex() {
        return \View::make('front.testimoni.index', array(
                    'testimonials' => \App\Models\Testimoni::where('publish', 'Y')->orderBy('created_at', 'desc')->get()
        ));
    }

    function getShow($id) {
        return \View::make('front.testimoni.show', array(
                    'testimoni' => \App\Models\Testimoni::find($id),
                    'othertesti' => \App\Models\Testimoni::orderByRaw('rand()')->where('id','!=',$id)->where('publish', 'Y')->limit(\App\Models\Konfig::where('nama', 'testimonial_list_count')->first()->value)->get()
        ));
    }

}
