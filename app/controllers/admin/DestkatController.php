<?php

namespace App\Controllers\Admin;

class DestkatController extends \BaseController {

    public function getIndex() {
        return \View::make('admin.destkat.index', array(
                    'destkats' => \App\Models\Destkat::orderBy('created_at', 'desc')->get()
        ));
    }

    public function getNew() {
        return \View::make('admin.destkat.new');
    }

    public function postNew() {
        $destkat = new \App\Models\Destkat();
        $destkat->nama = \Input::get('nama');
        $destkat->subtitle = \Input::get('subtitle');

        if (\Input::hasFile('img_path')) {
            //get image
            echo 'move gambar';
            $savePath = public_path() . '/images/destinasi/kategori';
            $name = $destkat->nama . '_' . \Input::file('img_path')->getClientOriginalName();
            $name = str_replace(' ', '_', $name);
            //upload image
            \Input::file('img_path')->move($savePath, $name);
            //save image url to database
            $destkat->img_path = \URL::to('images/destinasi/kategori/' . $name);

            //resize image
            $img = new \Imagine\Gd\Imagine();
            $resize = new \Imagine\Image\Box(300, 194);
            $img->open($savePath . '/' . $name)->resize($resize)->save($savePath . '/' . $name);
        }

        $destkat->save();

        return \Redirect::to('admin/destkat');
    }

    public function getEdit($id) {
        $destkat = \App\Models\Destkat::find($id);

        return \View::make('admin.destkat.edit', array('destkat' => $destkat));
    }

    public function postEdit() {
        $destkat = \App\Models\Destkat::find(\Input::get('destkatId'));
        $destkat->nama = \Input::get('nama');
        $destkat->subtitle = \Input::get('subtitle');

        if (\Input::hasFile('img_path')) {
            //get image
            echo 'move gambar';
            $savePath = public_path() . '/images/destinasi/kategori';
            $name = $destkat->nama . '_' . \Input::file('img_path')->getClientOriginalName();
            $name = str_replace(' ', '_', $name);
            //upload image
            \Input::file('img_path')->move($savePath, $name);
            //save image url to database
            $destkat->img_path = \URL::to('images/destinasi/kategori/' . $name);
            
            //resize image
            $img = new \Imagine\Gd\Imagine();
            $resize = new \Imagine\Image\Box(300, 194);
            $img->open($savePath . '/' . $name)->resize($resize)->save($savePath . '/' . $name);
        }

        $destkat->save();

        return \Redirect::back();
    }

    public function generateRandomString($length = 10) {
        return substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
    }

    public function getDeleteimage($destkatId) {
        $destkat = \App\Models\Destkat::find($destkatId);

        //delete image
        $pathToDel = str_replace(\URL::to('/'), '', $destkat->img_path);
        echo $pathToDel . '<br/>';
        echo public_path() . $pathToDel . ' <br/>';
        echo 'deleting....';
        \File::delete(public_path() . $pathToDel);
        echo '<br>';
//        //delete image thumb
//        $pathToDel = str_replace(\URL::to('/'), '', $art->thumbimg);
//        echo $pathToDel . '<br/>';
//        echo public_path() . $pathToDel . ' <br/>';
//        echo 'deleting....';
//        \File::delete(public_path() . $pathToDel);
//        echo '<br>';
//        //delete image thumb55
//        $pathToDel = str_replace(\URL::to('/'), '', $art->thumb55);
//        echo $pathToDel . '<br/>';
//        echo public_path() . $pathToDel . ' <br/>';
//        echo 'deleting....';
//        \File::delete(public_path() . $pathToDel);
//        echo '<br>';
        //delete image url from database
        $destkat->img_path = "";
        $destkat->save();

        return $destkat->toJson();
    }

    public function getDelete($id) {
        $destkat = \App\Models\Destkat::find($id);
        if ($destkat->imageisurl == 'false' && $destkat->imageurl != '') {
            //delete image file
            $pathToDel = str_replace(\URL::to('/'), '', $art->imageurl);
            echo $pathToDel . '<br/>';
            echo public_path() . $pathToDel . ' <br/>';
            echo 'deleting....';
            \File::delete(public_path() . $pathToDel);
            echo '<br>';
        }
        //delete komentar
        //
        //delete destkat
        $destkat->delete();

        return \Redirect::to('admin/blogs/destkat/index');
    }

//    public function getEdit($id) {
//        $art = \App\Models\Destkat::find($id);
//        return \View::make('admin.destkat.edit', array('destkat' => $art));
//    }
//
//    public function postEdit() {
//        $kat = \App\Models\Destkat::find(\Input::get('destkatId'));
//        $art->nama = \Input::get('nama');
//        $art->publish = \Input::get('publish');
//        $art->save();
//
//        return \Redirect::to('admin/blogs/destkat/index');
//    }
//
//    public function getDelete($id) {
//        $kat = \App\Models\Destkat::find($id);
//        $art->delete();
//        return \Redirect::to('admin/blogs/destkat/index');
//    }
}
