<?php

namespace App\Controllers\Admin;

class TestimoniController extends \BaseController {

    public function getIndex() {
        return \View::make('admin.testimoni.index', array(
                    'testimonis' => \App\Models\Testimoni::orderBy('created_at', 'desc')->get()
        ));
    }

    public function getNew() {
        return \View::make('admin.testimoni.new');
    }

    public function postNew() {
        $tst = new \App\Models\Testimoni();
        $tst->nama = \Input::get('nama');
        $tst->company = \Input::get('company');
        $tst->website = \Input::get('website');
        $tst->message = \Input::get('message');
        $tst->publish = \Input::get('publish');
        //upload photo

        if (\Input::hasFile('img_upl')) {
            //get image
            $img = \Input::file('img_upl');
            $savePath = public_path() . '/images/testimoni';
            $name = 'testimoni_' . \Input::get('nama').'_'. $img->getClientOriginalName();
            $name = str_replace(' ', '_', $name);
            //upload image
            $img->move($savePath, $name);
            //resize image
            $img = new \Imagine\Gd\Imagine();
            $resize = new \Imagine\Image\Box(816, 282);
            $img->open($savePath . '/' . $name)->resize($resize)->save($savePath . '/' . $name);
            //save image url to database
            $tst->img = \URL::to('images/testimoni/' . $name);
        }

        $tst->save();
        return \Redirect::to('admin/testimoni');
    }

    public function getEdit($id) {
        $tst = \App\Models\Testimoni::find($id);

        return \View::make('admin.testimoni.edit', array('testimoni' => $tst));
    }

    public function postEdit() {
        $tst = \App\Models\Testimoni::find(\Input::get('testimoniId'));
        $tst->nama = \Input::get('nama');
        $tst->company = \Input::get('company');
        $tst->website = \Input::get('website');
        $tst->message = \Input::get('message');
        $tst->publish = \Input::get('publish');
        //upload image
        if (\Input::hasFile('img_upl')) {
            //get image
            $img = \Input::file('img_upl');
            $savePath = public_path() . '/images/testimoni';
            $name = 'testimoni_' . \Input::get('nama').'_'. $img->getClientOriginalName();
            $name = str_replace(' ', '_', $name);
            //upload image
            $img->move($savePath, $name);
            //resize image
            $img = new \Imagine\Gd\Imagine();
            $resize = new \Imagine\Image\Box(116, 116);
            $img->open($savePath . '/' . $name)->resize($resize)->save($savePath . '/' . $name);
            //save image url to database
            $tst->img = \URL::to('images/testimoni/' . $name);
        }

        $tst->save();

        return \Redirect::back();
    }

    
    public function getDeleteimage($testimoniId) {
        $tst = \App\Models\Testimoni::find($testimoniId);

        //delete image
        $pathToDel = str_replace(\URL::to('/'), '', $tst->img);
        echo $pathToDel . '<br/>';
        echo public_path() . $pathToDel . ' <br/>';
        echo 'deleting....';
        \File::delete(public_path() . $pathToDel);
        echo '<br>';
        
        //delete image url from database
        $tst->img = "";
        $tst->save();

        return $tst->toJson();
    }

    public function getDelete($id) {
        $testimoni = \App\Models\Testimoni::find($id);
        if ($testimoni->imageisurl == 'false' && $testimoni->imageurl != '') {
            //delete image file
            $pathToDel = str_replace(\URL::to('/'), '', $tst->imageurl);
            echo $pathToDel . '<br/>';
            echo public_path() . $pathToDel . ' <br/>';
            echo 'deleting....';
            \File::delete(public_path() . $pathToDel);
            echo '<br>';
        }
        //delete komentar
        //
        //delete testimoni
        $testimoni->delete();

        return \Redirect::to('admin/testimoni/index');
    }

//    public function getEdit($id) {
//        $tst = \App\Models\Testimoni::find($id);
//        return \View::make('admin.testimoni.edit', array('testimoni' => $tst));
//    }
//
//    public function postEdit() {
//        $kat = \App\Models\Testimoni::find(\Input::get('testimoniId'));
//        $tst->nama = \Input::get('nama');
//        $tst->publish = \Input::get('publish');
//        $tst->save();
//
//        return \Redirect::to('admin/testimoni/index');
//    }
//
//    public function getDelete($id) {
//        $kat = \App\Models\Testimoni::find($id);
//        $tst->delete();
//        return \Redirect::to('admin/testimoni/index');
//    }
}
