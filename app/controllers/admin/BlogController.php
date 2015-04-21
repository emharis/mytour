<?php

namespace App\Controllers\Admin;

class BlogController extends \BaseController {

    function getIndex() {
        $kategoris = \DB::table('blog_category')->get();
        $selectKategory = array();
        foreach ($kategoris as $kat) {
            $selectKategory[$kat->id] = $kat->name;
        }

        $blogs = \DB::table('view_blogs')->get();
        $kategoris = \DB::table('blog_category')->get();

        return \View::make('back.page.blog.blog', array(
                    'blogs' => $blogs,
                    'selectKategori' => $selectKategory,
                    'kategoris' => $kategoris
        ));
    }

    /**
     * Tambah blog baru
     */
    function postNewblog() {
        \DB::transaction(function() {
            //upload image
            $savePath = \DB::table('constval')->where('name', '=', 'img_blog_path')->first();
            $path = $savePath->value;
            //upload image
            $image = \Input::file('img-upload');
            $name = 'img_blog_' . $image->getClientOriginalName();
            $name = str_replace(' ', '_', $name);
//            echo $name;
            $image->move($path, $name);
            //resize image            
            \ImagineResizer::crop($path . $name, $path . $name, new \Imagine\Image\Box(570, 222));

            //insert to database
            $id = \DB::table('blog')->insertGetId(array(
                'created_at' => date('Y-m-d H:i:s'),
                'title' => \Input::get('title'),
                'content' => \Input::get('content'),
                'tags' => \Input::get('tags'),
                'publish' => \Input::get('publish'),
                'author_id' => \Input::get('author_id'),
                'img_cover' => $name,
                'category_id' => \Input::get('kategori')
            ));
            
            echo json_encode(\DB::table('view_blogs')->find($id));
        });
    }

    /**
     * Get blog by ID
     * @param integer $id
     * @return JSON 
     */
    function getViewblog($id) {
        $blog = \DB::table('view_blogs')->find($id);
        //add column filepath
        $savePath = \DB::table('constval')->where('name', '=', 'img_blog_path')->first();
        $path = $savePath->value;
        $blog->img = $path . $blog->img_cover;
        return json_encode($blog);
    }

    /**
     * Edit blog
     */
    function postUpdateblog() {
        \DB::transaction(function() {
            //upload image
            $savePath = \DB::table('constval')->where('name', '=', 'img_blog_path')->first();
            $path = $savePath->value;
//            //upload image
            if (\Input::hasFile('img-upload')) {
                //hapus file sebelumnya
                //delete image
                $blog = \DB::table('blog')->find(\Input::get('blogId'));
                $dest = $path . $blog->img_cover;
                $pathToDel = str_replace(\URL::to('/'), '', $dest);
//                echo $pathToDel . '<br/>';
//                echo public_path() . '/' . $pathToDel . ' <br/>';
//                echo 'deleting....';
                \File::delete(public_path() . '/' . $pathToDel);

                //upload file baru
                $image = \Input::file('img-upload');
                $name = 'img_blog_' . $image->getClientOriginalName();
                $name = str_replace(' ', '_', $name);
                $image->move($path, $name);
                //resize image            
                \ImagineResizer::crop($path . $name, $path . $name, new \Imagine\Image\Box(570, 222));

                //update image ke database
                \DB::table('blog')->where('id', '=', \Input::get('blogId'))->update(array(
                    'img_cover' => $name
                ));
            }

            //update ke database
            \DB::table('blog')->where('id', '=', \Input::get('blogId'))->update(array(
                'created_at' => date('Y-m-d H:i:s'),
                'title' => \Input::get('title'),
                'content' => \Input::get('content'),
                'tags' => \Input::get('tags'),
                'publish' => \Input::get('publish'),
//                'author_id' => \Input::get('author_id'),
                'category_id' => \Input::get('kategori')
            ));
        });
    }

    /**
     * Tambah kategori blog baru
     */
    function postNewkategori() {
        return json_encode(array(
            'id' => \DB::table('blog_category')->insertGetId(array(
                'name' => \Input::get('nama_kategori')
            )),
            'name' => \Input::get('nama_kategori')
        ));
    }

    /**
     * Delete Blog
     * @param int $id
     */
    function getDelblog($id) {
        $savePath = \DB::table('constval')->where('name', '=', 'img_blog_path')->first();
        $path = $savePath->value;
        //delete image file
        $blog = \DB::table('blog')->find($id);
        $dest = $path . $blog->img_cover;
        $pathToDel = str_replace(\URL::to('/'), '', $dest);
        echo $pathToDel . '<br/>';
        echo public_path() . '/' . $pathToDel . ' <br/>';
        echo 'deleting....';
        \File::delete(public_path() . '/' . $pathToDel);
        //delete from database
        \DB::table('blog')->where('id','=',$id)->delete();
    }

    /**
     * Update kategori
     */
    function postUpdatekategori() {
        return \DB::table('blog_category')->where('id', '=', \Input::get('kategori_id'))->update(array(
                    'name' => \Input::get('name')
        ));
    }

    /**
     * Delete Kategori
     * @param type $id
     * @return int
     */
    function getDelkategori($id) {
        return \DB::table('blog_category')->delete($id);
    }

}
