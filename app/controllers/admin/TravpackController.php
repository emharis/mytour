<?php

namespace App\Controllers\Admin;

class TravpackController extends \BaseController {

    public function getIndex() {
        return \View::make('admin.travpack.index', array(
                    'travpacks' => \App\Models\Travpack::all()
        ));
    }

    function getNew() {
        $travcats = \App\Models\Travpackcategory::where('publish', 'Y')->get();
        $selectTravcat = array();
        foreach ($travcats as $dst) {
            $selectTravcat[$dst->id] = $dst->nama;
        }

        return \View::make('admin.travpack.new', array(
                    'selectTravcat' => $selectTravcat
        ));
    }

    function postNew() {
        \DB::transaction(function() {

            $travpack = new \App\Models\Travpack();
            $travpack->nama = \Input::get('nama');
            $travpack->travpackcategory_id = \Input::get('kategori');
            $travpack->desc = \Input::get('desc');
            $travpack->price = str_replace(' ', '', str_replace('.', '', str_replace('$', '', \Input::get('harga'))));
            $travpack->publish = \Input::get('publish');
            $travpack->fasilitas = \Input::get('fasilitas');
            $travpack->paket_include = \Input::get('include');
            $travpack->paket_exclude = \Input::get('exclude');
            $travpack->itinerary = \Input::get('itinerary');
            $travpack->save();

            //upload image
            if (\Input::hasFile('img_1')) {
                //get image
                //echo 'move gambar';
                $savePath = public_path() . '/images/paket';
                $name = 'paket_' . $travpack->id . '_img1_' . \Input::file('img_1')->getClientOriginalName();
                $name = str_replace(' ', '_', $name);
                //upload image
                \Input::file('img_1')->move($savePath, $name);
                //save image url to database
                $travpack->img_1 = $name;
                $travpack->save();
            }
            //img_2
            if (\Input::hasFile('img_2')) {
                //get image
                //echo 'move gambar';
                $savePath = public_path() . '/images/paket';
                $name = 'paket_' . $travpack->id . '_img2_' . \Input::file('img_2')->getClientOriginalName();
                $name = str_replace(' ', '_', $name);
                //upload image
                \Input::file('img_2')->move($savePath, $name);
                //save image url to database
                $travpack->img_2 = $name;
                $travpack->save();
            }
            //img_3
            if (\Input::hasFile('img_3')) {
                //get image
                //echo 'move gambar';
                $savePath = public_path() . '/images/paket';
                $name = 'paket_' . $travpack->id . '_img3_' . \Input::file('img_3')->getClientOriginalName();
                $name = str_replace(' ', '_', $name);
                //upload image
                \Input::file('img_3')->move($savePath, $name);
                //save image url to database
                $travpack->img_3 = $name;
                $travpack->save();
            }
            //img_4
            if (\Input::hasFile('img_4')) {
                //get image
                //echo 'move gambar';
                $savePath = public_path() . '/images/paket';
                $name = 'paket_' . $travpack->id . '_img4_' . \Input::file('img_4')->getClientOriginalName();
                $name = str_replace(' ', '_', $name);
                //upload image
                \Input::file('img_4')->move($savePath, $name);
                //save image url to database
                $travpack->img_4 = $name;
                $travpack->save();
            }
        });

        return \Redirect::to('admin/paket/travpack');
    }

    function getEdit($id) {
        $travcats = \App\Models\Travpackcategory::where('publish', 'Y')->get();
        $selectTravcat = array();

        foreach ($travcats as $dst) {
            $selectTravcat[$dst->id] = $dst->nama;
        }

        return \View::make('admin.travpack.edit', array(
                    'selectTravcat' => $selectTravcat,
                    'travpack' => \App\Models\Travpack::find($id)
        ));
    }

    function postEdit() {
        $travpack = \App\Models\Travpack::find(\Input::get('travpackId'));
        
        \DB::transaction(function()use($travpack) {            
            $travpack->nama = \Input::get('nama');
            $travpack->travpackcategory_id = \Input::get('kategori');
            $travpack->desc = \Input::get('desc');
            $travpack->price = str_replace(' ', '', str_replace('.', '', str_replace('$', '', \Input::get('harga'))));
            $travpack->publish = \Input::get('publish');
            $travpack->fasilitas = \Input::get('fasilitas');
            $travpack->paket_include = \Input::get('include');
            $travpack->paket_exclude = \Input::get('exclude');
            $travpack->itinerary = \Input::get('itinerary');
            $travpack->save();

            //upload image
            if (\Input::hasFile('img_1')) {
                //get image
                //echo 'move gambar';
                $savePath = public_path() . '/images/paket';
                $name = 'paket_' . $travpack->id . '_img1_' . \Input::file('img_1')->getClientOriginalName();
                $name = str_replace(' ', '_', $name);
                //upload image
                \Input::file('img_1')->move($savePath, $name);
                //save image url to database
                $travpack->img_1 = $name;
                $travpack->save();
            }
            //img_2
            if (\Input::hasFile('img_2')) {
                //get image
                //echo 'move gambar';
                $savePath = public_path() . '/images/paket';
                $name = 'paket_' . $travpack->id . '_img2_' . \Input::file('img_2')->getClientOriginalName();
                $name = str_replace(' ', '_', $name);
                //upload image
                \Input::file('img_2')->move($savePath, $name);
                //save image url to database
                $travpack->img_2 = $name;
                $travpack->save();
            }
            //img_3
            if (\Input::hasFile('img_3')) {
                //get image
                //echo 'move gambar';
                $savePath = public_path() . '/images/paket';
                $name = 'paket_' . $travpack->id . '_img3_' . \Input::file('img_3')->getClientOriginalName();
                $name = str_replace(' ', '_', $name);
                //upload image
                \Input::file('img_3')->move($savePath, $name);
                //save image url to database
                $travpack->img_3 = $name;
                $travpack->save();
            }
            //img_4
            if (\Input::hasFile('img_4')) {
                //get image
                //echo 'move gambar';
                $savePath = public_path() . '/images/paket';
                $name = 'paket_' . $travpack->id . '_img4_' . \Input::file('img_4')->getClientOriginalName();
                $name = str_replace(' ', '_', $name);
                //upload image
                \Input::file('img_4')->move($savePath, $name);
                //save image url to database
                $travpack->img_4 = $name;
                $travpack->save();
            }
        });

        return \Redirect::to('admin/paket/travpack/edit/'.$travpack->id);
    }

    function getDelete($id) {

        \DB::transaction(function()use($id) {
            $travpack = \App\Models\Travpack::find($id);

            if ($travpack) {
                //delete gambar dulu
                //delete image img_1
                $pathToDel = '/images/paket/' . $travpack->img_1;
                \File::delete(public_path() . $pathToDel);
                //delete image img_2
                $pathToDel = '/images/paket/' . $travpack->img_2;
                \File::delete(public_path() . $pathToDel);
                //delete image img_3
                $pathToDel = '/images/paket/' . $travpack->img_3;
                \File::delete(public_path() . $pathToDel);
                //delete image img_4
                $pathToDel = '/images/paket/' . $travpack->img_4;
                \File::delete(public_path() . $pathToDel);
                //delete data dari database
                $travpack->delete();
            }
        });
        
        return \Redirect::to('admin/paket/travpack');
    }

}
