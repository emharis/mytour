<?php

namespace App\Controllers\Front;

class FotoController extends \BaseController {

    function getIndex() {
        return \View::make('front/foto/index', array(
        'fotos' => \DB::table('gallery')->where('type', 'I')->orderBy('created_at', 'desc')->get(),
        ));
    }

}
