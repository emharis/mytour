<?php

namespace App\Controllers\Admin;

class ContactController extends \BaseController {

    function getIndex() {
        $contactpage = \DB::table('contactpage')->get();
        $ctpage = array();
        foreach ($contactpage as $hmp) {
            $ctpage[$hmp->name] = json_decode(json_encode($hmp), true);
        }
        return \View::make('back.page.contactpage',array(
            'contactpage'=>$ctpage
        ));
    }
    
    function postUpdate(){
        \DB::table('contactpage')->where('name','contact_text')->update(array('big_value'=>\Input::get('contact_text')));
        \DB::table('contactpage')->where('name','success_message')->update(array('value'=>\Input::get('success_message')));
        \DB::table('contactpage')->where('name','error_message')->update(array('value'=>\Input::get('error_message')));
        \DB::table('contactpage')->where('name','show_location')->update(array('value'=>\Input::get('show_location')));
        \DB::table('contactpage')->where('name','show_map')->update(array('value'=>\Input::get('show_map')));
        
        return \Redirect::to('admin/page/contact');
    }


}
