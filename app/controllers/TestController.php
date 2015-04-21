<?php

namespace App\Controllers;

class TestController extends \BaseController {

    public function getIndex() {
        echo '================================================================================<br/>';
        echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
        echo 'H A L A M A N&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;T E S T I N G<br/>';
        echo '================================================================================<br/>';
        echo '<br/><br/><br/><br/>';
        
        $config = \App\Models\Company::first();
        $cfg = $config->toArray();
        echo $cfg['created_at'];
    }
}
