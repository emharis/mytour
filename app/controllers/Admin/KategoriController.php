<?php

namespace App\Controllers\Admin;

class KategoriController extends \BaseController {

    //================== NEW SECTION =====================================

    function getIndex() {
        $kategoris = \DB::table('kategori')->get();

        return \View::make('back.blog.kategori.blogkategori', array(
                    'kategoris' => $kategoris
        ));
    }

    function getNew() {
        $kategoris = \DB::table('kategori_category')->get();
        $selectKategory = array();
        foreach ($kategoris as $kat) {
            $selectKategory[$kat->id] = $kat->name;
        }
        return \View::make('back.kategori.kategori.new', array(
                    'selectKategori' => $selectKategory
        ));
    }

    function postNew() {
        \DB::transaction(function() {
            $imgname = "";
            //upload image
            if (\Input::hasFile('imageUploader')) {
                $image = \Input::file('imageUploader');
                $imgname = 'img_kategori_' . $image->getClientOriginalName();
                $imgname = str_replace(' ', '_', $imgname);
                $image->move($this->IMG_PATH, $imgname);
            } else {
                $imgname = \Input::get('imageUrl');
            }
            //resize image            
            //\ImagineResizer::crop($path . $name, $path . $name, new \Imagine\Image\Box(570, 222));
            //insert to database
            $id = \DB::table('kategori')->insertGetId(array(
                'created_at' => date('Y-m-d H:i:s'),
                'title' => \Input::get('title'),
                'content' => \Input::get('content'),
                'min_content' => \Input::get('min_content'),
                'tags' => \Input::get('tags'),
                'publish' => \Input::get('publish'),
                'author_id' => \Input::get('author_id'),
                'islocal' => \Input::get('islocal'),
                'img_cover' => $imgname,
                'category_id' => \Input::get('kategori')
            ));
        });
        
        return \Redirect::to('admin/admin/page/kategori');
    }

    function getEdit($id) {
        $kategori = \DB::table('kategori')->find($id);
        $kategoris = \DB::table('kategori_category')->get();
        $selectKategory = array();
        foreach ($kategoris as $kat) {
            $selectKategory[$kat->id] = $kat->name;
        }
        return \View::make('back.kategori.kategori.edit', array(
                    'selectKategori' => $selectKategory,
                    'kategori' => $kategori,
                    'imgpath' => $this->IMG_PATH
        ));
    }

    function postEdit() {
        \DB::transaction(function() {
            $kategori = \DB::table('kategori')->find(\Input::get('kategoriid'));
            $imgname = $kategori->img_cover;
            //upload image
            if (\Input::hasFile('imageUploader')) {
                //delete file sebelumnya
                if ($kategori->islocal == 'Y') {
                    $dest = $this->IMG_PATH . $kategori->img_cover;
                    $pathToDel = str_replace(\URL::to('/'), '', $dest);
                    \File::delete(public_path() . '/' . $pathToDel);
                }

                //upload image baru
                $image = \Input::file('imageUploader');
                $imgname = 'img_kategori_' . $image->getClientOriginalName();
                $imgname = str_replace(' ', '_', $imgname);
                $image->move($this->IMG_PATH, $imgname);

                //update is local
                \DB::table('kategori')->where('id', $kategori->id)->update(array(
                    'islocal' => \Input::get('islocal')
                ));
            } elseif (\Input::get('imageUrl') != "") {
                //delete file sebelumnya
                if ($kategori->islocal == 'Y') {
                    $dest = $this->IMG_PATH . $kategori->img_cover;
                    $pathToDel = str_replace(\URL::to('/'), '', $dest);
                    \File::delete(public_path() . '/' . $pathToDel);
                }
                
                $imgname = \Input::get('imageUrl');
                //update is local
                \DB::table('kategori')->where('id', $kategori->id)->update(array(
                    'islocal' => \Input::get('islocal')
                ));
            }
            //insert to database
            \DB::table('kategori')->where('id', $kategori->id)->update(array(
                'title' => \Input::get('title'),
                'content' => \Input::get('content'),
                'min_content' => \Input::get('min_content'),
                'tags' => \Input::get('tags'),
                'publish' => \Input::get('publish'),
                'author_id' => \Input::get('author_id'),
                'img_cover' => $imgname,
                'category_id' => \Input::get('kategori')
            ));

            
        });
        
        return \Redirect::back();
    }

}
