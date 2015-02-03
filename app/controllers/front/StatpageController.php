<?php

namespace App\Controllers\Front;

class StatpageController extends \BaseController {

    public function getIndex($id) {
        return \View::make('front.statpage', array(
                    'statpage' => \App\Models\Statpage::find($id)
        ));
    }

}
