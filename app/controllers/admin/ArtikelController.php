<?php

namespace App\Controllers\Admin;

class ArtikelController extends \BaseController {

    public function getIndex() {
        return \View::make('admin.artikel.index', array(
                    'artikels' => \App\Models\Artikel::orderBy('created_at', 'desc')->get()
        ));
    }

    public function getNew() {
        $kats = \App\Models\Kategori::where('publish', 'Y')->get();
        $kategoris = array();
        foreach ($kats as $kat) {
            $kategoris[$kat->id] = $kat->nama;
        }
        return \View::make('admin.artikel.new', array('kategoris' => $kategoris));
    }

    public function postNew() {
        $art = new \App\Models\Artikel();
        $art->judul = \Input::get('judul');
        $art->kategori_id = \Input::get('kategori');
        $art->publish = \Input::get('publish');
        $art->konten = \Input::get('konten');
        $art->sub_konten = \Input::get('subkonten');

        if (\Input::get('imageurl') != '') {
            $art->imageurl = \Input::get('imageurl');
        } else {
            if (\Input::hasFile('image')) {
                //get image
                echo 'move gambar';
                $savePath = public_path() . '/images/blog';
                $name = 'blog_img_' . \Input::get('kategori') . \Input::get('judul') . '_' . \Input::file('image')->getClientOriginalName();
                $name = str_replace(' ', '_', $name);
                //upload image
                \Input::file('image')->move($savePath, $name);
                //save image url to database
                $art->imageurl = \URL::to('images/blog/' . $name);
            }
        };


        $art->save();
        return \Redirect::to('admin/blogs/artikel/index');
    }

    public function getEdit($id) {
        $art = \App\Models\Artikel::find($id);

        $kats = \App\Models\Kategori::where('publish', 'Y')->get();
        $kategoris = array();
        foreach ($kats as $kat) {
            $kategoris[$kat->id] = $kat->nama;
        }

        return \View::make('admin.artikel.edit', array('artikel' => $art, 'kategoris' => $kategoris));
    }

    public function postEdit() {
        $art = \App\Models\Artikel::find(\Input::get('artikelId'));
        $art->judul = \Input::get('judul');
        $art->kategori_id = \Input::get('kategori');
        $art->publish = \Input::get('publish');
        $art->konten = \Input::get('konten');
        $art->sub_konten = \Input::get('subkonten');

        if (\Input::hasFile('image')) {
            if (\Input::get('image_is_url') == 'true') {
                $art->imageurl = \Input::get('imageurl');
            } else {
                //get image
                $image = \Input::file('image');
                echo 'move gambar';
                $savePath = public_path() . '/images/blog';
                $name = 'blog_img_' . \Input::get('kategori') . '_' . $this->generateRandomString(10) . '.' . $image->getClientOriginalExtension(); //\Input::file('image')->getClientOriginalName();
                $name = str_replace(' ', '_', $name);
                //upload image
                //\Input::file('image')->move($savePath, $name);
                $image->move($savePath, $name);
                //resize image
                $img = new \Imagine\Gd\Imagine();
                $resize = new \Imagine\Image\Box(816,282);
                $img->open($savePath.'/'.$name)->resize($resize)->save($savePath.'/'.$name);
                
                //create thumb
                $img = new \Imagine\Gd\Imagine();
                $thumsize = new \Imagine\Image\Box(200,200);
                $thumbcenter = new \Imagine\Image\Point\Center($thumsize);
                $img->open($savePath.'/'.$name)->resize($thumsize)->save($savePath.'/thumb_'.$name);
                //create thumb55
                $img = new \Imagine\Gd\Imagine();
                $thumsize = new \Imagine\Image\Box(55,55);
                $thumbcenter = new \Imagine\Image\Point\Center($thumsize);
                $img->open($savePath.'/'.$name)->resize($thumsize)->save($savePath.'/thumb55_'.$name);
                                
                //save image url & thumb to database
                $art->imageurl = \URL::to('images/blog/' . $name);
                $art->thumbimg = \URL::to('images/blog/thumb_' . $name);
                $art->thumb55 = \URL::to('images/blog/thumb55_' . $name);
            };
        }

        $art->save();
     //   return \Redirect::to('admin/blogs/artikel/index');
        return \Redirect::back();
    }

    public function generateRandomString($length = 10) {
        return substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
    }

    public function getDeleteimage($artikelId) {
        $art = \App\Models\Artikel::find($artikelId);

        //delete image
        $pathToDel = str_replace(\URL::to('/'), '', $art->imageurl);
        echo $pathToDel . '<br/>';
        echo public_path() . $pathToDel . ' <br/>';
        echo 'deleting....';
        \File::delete(public_path() . $pathToDel);
        echo '<br>';
        //delete image thumb
        $pathToDel = str_replace(\URL::to('/'), '', $art->thumbimg);
        echo $pathToDel . '<br/>';
        echo public_path() . $pathToDel . ' <br/>';
        echo 'deleting....';
        \File::delete(public_path() . $pathToDel);
        echo '<br>';
        //delete image thumb55
        $pathToDel = str_replace(\URL::to('/'), '', $art->thumb55);
        echo $pathToDel . '<br/>';
        echo public_path() . $pathToDel . ' <br/>';
        echo 'deleting....';
        \File::delete(public_path() . $pathToDel);
        echo '<br>';

        //delete image url from database
        $art->imageurl = "";
        $art->thumbimg = "";
        $art->save();

        return $art->toJson();
    }

    public function getDelete($id) {
        $artikel = \App\Models\Artikel::find($id);
        if ($artikel->imageisurl == 'false' && $artikel->imageurl != '') {
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
        //delete artikel
        $artikel->delete();

        return \Redirect::to('admin/blogs/artikel/index');
    }

//    public function getEdit($id) {
//        $art = \App\Models\Artikel::find($id);
//        return \View::make('admin.artikel.edit', array('artikel' => $art));
//    }
//
//    public function postEdit() {
//        $kat = \App\Models\Artikel::find(\Input::get('artikelId'));
//        $art->nama = \Input::get('nama');
//        $art->publish = \Input::get('publish');
//        $art->save();
//
//        return \Redirect::to('admin/blogs/artikel/index');
//    }
//
//    public function getDelete($id) {
//        $kat = \App\Models\Artikel::find($id);
//        $art->delete();
//        return \Redirect::to('admin/blogs/artikel/index');
//    }
}
