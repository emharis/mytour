<?php

namespace App\Controllers\Admin;

class DestinationController extends \BaseController {

    public function getIndex() {
        return \View::make('admin.destination.index', array(
                    'destinations' => \App\Models\Destination::all()
        ));
    }

    public function getNew() {
        $destkats = \App\Models\Destkat::all();
        $seldest = array();
        foreach ($destkats as $dst) {
            $seldest[$dst->id] = $dst->nama;
        }
        $kategoris = \App\Models\Kategori::all();
        $selkat = array();
        foreach ($kategoris as $kat) {
            $selkat[$kat->id] = $kat->nama;
        }
        return \View::make('admin.destination.new', array(
                    'seldest' => $seldest,
                    'selkat' => $selkat
        ));
    }

    public function postNew() {

        $dest = new \App\Models\Destination();
        $dest->nama = \Input::get('nama');
        $dest->subtitle = \Input::get('subtitle');
        $dest->destkat_id = \Input::get('destkat');
        $dest->kategori_id = \Input::get('kategori');
        $dest->desc = \Input::get('desc');

        if (\Input::hasFile('img_path')) {
            //get image
            echo 'move gambar';
            $savePath = public_path() . '/images/destinasi/dest';
            $name = $dest->nama . '_' . \Input::file('img_path')->getClientOriginalName();
            $name = str_replace(' ', '_', $name);
            //upload image
            \Input::file('img_path')->move($savePath, $name);
            //save image url to database
            $dest->img_path = \URL::to('images/destinasi/dest/' . $name);

            //resize image
            $img = new \Imagine\Gd\Imagine();
            $resize = new \Imagine\Image\Box(300, 194);
            $img->open($savePath . '/' . $name)->resize($resize)->save($savePath . '/' . $name);
        }

        $dest->save();

        return \Redirect::to('admin/destination');
    }

    public function getEdit($id) {
        $destkats = \App\Models\Destkat::all();
        $seldest = array();
        foreach ($destkats as $dst) {
            $seldest[$dst->id] = $dst->nama;
        }
        $kategoris = \App\Models\Kategori::all();
        $selkat = array();
        foreach ($kategoris as $kat) {
            $selkat[$kat->id] = $kat->nama;
        }

        return \View::make('admin.destination.edit', array(
                    'dest' => \App\Models\Destination::find($id),
                    'selkat' => $selkat,
                    'seldest' => $seldest
        ));
    }

    public function postEdit() {
        $dest = \App\Models\Destination::find(\Input::get('destId'));
        $dest->nama = \Input::get('nama');
        $dest->subtitle = \Input::get('subtitle');
        $dest->destkat_id = \Input::get('destkat');
        $dest->kategori_id = \Input::get('kategori');
        $dest->desc = \Input::get('desc');

        if (\Input::hasFile('img_path')) {
            //get image
            echo 'move gambar';
            $savePath = public_path() . '/images/destinasi/dest';
            $name = $dest->nama . '_' . \Input::file('img_path')->getClientOriginalName();
            $name = str_replace(' ', '_', $name);
            //upload image
            \Input::file('img_path')->move($savePath, $name);
            //save image url to database
            $dest->img_path = \URL::to('images/destinasi/dest/' . $name);
            
            //resize image
            $img = new \Imagine\Gd\Imagine();
            $resize = new \Imagine\Image\Box(300, 194);
            $img->open($savePath . '/' . $name)->resize($resize)->save($savePath . '/' . $name);
        }

        $dest->save();

        return \Redirect::back();
    }

    public function getDeleteimage($destId) {
        $dest = \App\Models\Destination::find($destId);
        //delete image
        $pathToDel = str_replace(\URL::to('/'), '', $dest->img_path);
        echo $pathToDel . '<br/>';
        echo public_path() . $pathToDel . ' <br/>';
        echo 'deleting....';
        \File::delete(public_path() . $pathToDel);
        echo '<br>';

        $dest->img_path = "";
        $dest->save();

        return $dest->toJson();
    }

}
