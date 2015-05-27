<?php

namespace App\Controllers\Admin;

class TestimoniController extends \BaseController {

    function getIndex() {
//        $testimonis = \DB::table('testimoni')->limit(\DB::table('homepage')->where('name','testimony_count')->first()->value)->get();
        $testimonis = \DB::table('VIEW_TESTIMONI')->get();
        return \View::make('back.testimoni.index', array(
                    'testimonis' => $testimonis
        ));
    }

    function getNew() {
        $countries = \DB::table('countries')->orderBy('country_name', 'asc')->get();
        $selectCountry;
        foreach ($countries as $cnt) {
            $selectCountry[$cnt->id] = $cnt->country_name;
        }
        return \View::make('back.testimoni.new', array(
                    'countries' => $selectCountry
        ));
    }

    function postNew() {
        \DB::table('testimoni')->insert(array(
            'created_at' => date('Y-m-d H:i:s'),
            'nama' => \Input::get('nama'),
            'country_id' => \Input::get('country'),
            'message' => \Input::get('message'),
            'publish' => \Input::get('publish')
        ));

        return \Redirect::to('admin/testimoni');
    }

    function getEdit($id) {
        $countries = \DB::table('countries')->orderBy('country_name', 'asc')->get();
        $selectCountry;
        foreach ($countries as $cnt) {
            $selectCountry[$cnt->id] = $cnt->country_name;
        }
        $testimoni = \DB::table('testimoni')->find($id);
        return \View::make('back.testimoni.edit', array(
                    'testimoni' => $testimoni,
                    'countries' => $selectCountry
        ));
    }
    
    function getDelete($id){
        \DB::table('testimoni')->where('id',$id)->delete();
        return \Redirect::back();
    }

}
