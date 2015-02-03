<?php

namespace App\Controllers\Admin;

class SettingController extends \BaseController {

    public function getIndex() {
        return \View::make('admin.setting.index');
    }

    function getCompinfo() {
        return \View::make('admin.setting.compinfo', array(
                    'compinfo' => \App\Models\Company::first()
        ));
    }

    /**
     * Update data comp info
     */
    function postCompinfo() {
        $compinfo =  \App\Models\Company::first();
        $compinfo->comp_name = \Input::get('comp_name');
////        //logo
        //$compinfo->comp_name = \Input::get('comp_name');
        $compinfo->email = \Input::get('email');
        $compinfo->address = \Input::get('address');
        $compinfo->website = \Input::get('website');
        $compinfo->web_title = \Input::get('web_title');
        $compinfo->phone = \Input::get('phone');
        $compinfo->fax = \Input::get('fax');
        $compinfo->facebook = \Input::get('facebook');
        $compinfo->twitter = \Input::get('twitter');
        $compinfo->path = \Input::get('path');
        $compinfo->youtube = \Input::get('youtube');
        $compinfo->tumblr = \Input::get('tumblr');
        $compinfo->instagram = \Input::get('instagram');
        $compinfo->save();
//        
        return \Redirect::to('admin/setting');
        

    }

}
