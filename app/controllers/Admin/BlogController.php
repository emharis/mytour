<?php

namespace App\Controllers\Admin;

class BlogController extends \BaseController {

    public $IMG_PATH;

    function __construct() {
        $this->IMG_PATH = \DB::table('constval')->where('name', '=', 'img_blog_path')->first()->value;
    }

//    function getIndex() {
//        $kategoris = \DB::table('blog_category')->get();
//        $selectKategory = array();
//        foreach ($kategoris as $kat) {
//            $selectKategory[$kat->id] = $kat->name;
//        }
//
//        $blogs = \DB::table('VIEW_BLOGS')->get();
//        $kategoris = \DB::table('blog_category')->get();
//
//        return \View::make('back.page.blog.blog', array(
//                    'blogs' => $blogs,
//                    'selectKategori' => $selectKategory,
//                    'kategoris' => $kategoris
//        ));
//    }

    /**
     * Tambah blog baru
     */
//    function postNewblog() {
//        \DB::transaction(function() {
//            //upload image
//            $savePath = \DB::table('constval')->where('name', '=', 'img_blog_path')->first();
//            $path = $savePath->value;
//            //upload image
//            $image = \Input::file('img-upload');
//            $name = 'img_blog_' . $image->getClientOriginalName();
//            $name = str_replace(' ', '_', $name);
////            echo $name;
//            $image->move($path, $name);
//            //resize image            
////            \ImagineResizer::crop($path . $name, $path . $name, new \Imagine\Image\Box(570, 222));
//            //insert to database
//            $id = \DB::table('blog')->insertGetId(array(
//                'created_at' => date('Y-m-d H:i:s'),
//                'title' => \Input::get('title'),
//                'content' => \Input::get('content'),
//                'tags' => \Input::get('tags'),
//                'publish' => \Input::get('publish'),
//                'author_id' => \Input::get('author_id'),
//                'img_cover' => $name,
//                'category_id' => \Input::get('kategori')
//            ));
//
//            echo json_encode(\DB::table('VIEW_BLOGS')->find($id));
//        });
//    }
//
//    /**
//     * Get blog by ID
//     * @param integer $id
//     * @return JSON 
//     */
//    function getViewblog($id) {
//        $blog = \DB::table('VIEW_BLOGS')->find($id);
//        //add column filepath
//        $savePath = \DB::table('constval')->where('name', '=', 'img_blog_path')->first();
//        $path = $savePath->value;
//        $blog->img = $path . $blog->img_cover;
//        return json_encode($blog);
//    }
//
//    /**
//     * Edit blog
//     */
//    function postUpdateblog() {
//        \DB::transaction(function() {
//            //upload image
//            $savePath = \DB::table('constval')->where('name', '=', 'img_blog_path')->first();
//            $path = $savePath->value;
////            //upload image
//            if (\Input::hasFile('img-upload')) {
//                //hapus file sebelumnya
//                //delete image
//                $blog = \DB::table('blog')->find(\Input::get('blogId'));
//                $dest = $path . $blog->img_cover;
//                $pathToDel = str_replace(\URL::to('/'), '', $dest);
////                echo $pathToDel . '<br/>';
////                echo public_path() . '/' . $pathToDel . ' <br/>';
////                echo 'deleting....';
//                \File::delete(public_path() . '/' . $pathToDel);
//
//                //upload file baru
//                $image = \Input::file('img-upload');
//                $name = 'img_blog_' . $image->getClientOriginalName();
//                $name = str_replace(' ', '_', $name);
//                $image->move($path, $name);
//                //resize image            
////                \ImagineResizer::crop($path . $name, $path . $name, new \Imagine\Image\Box(570, 222));
//                //update image ke database
//                \DB::table('blog')->where('id', '=', \Input::get('blogId'))->update(array(
//                    'img_cover' => $name
//                ));
//            }
//
//            //update ke database
//            \DB::table('blog')->where('id', '=', \Input::get('blogId'))->update(array(
//                'created_at' => date('Y-m-d H:i:s'),
//                'title' => \Input::get('title'),
//                'content' => \Input::get('content'),
//                'tags' => \Input::get('tags'),
//                'publish' => \Input::get('publish'),
////                'author_id' => \Input::get('author_id'),
//                'category_id' => \Input::get('kategori')
//            ));
//        });
//    }
//
//    /**
//     * Tambah kategori blog baru
//     */
//    function postNewkategori() {
//        return json_encode(array(
//            'id' => \DB::table('blog_category')->insertGetId(array(
//                'name' => \Input::get('nama_kategori')
//            )),
//            'name' => \Input::get('nama_kategori')
//        ));
//    }
//
//    /**
//     * Delete Blog
//     * @param int $id
//     */
//    function getDelblog($id) {
//        $savePath = \DB::table('constval')->where('name', '=', 'img_blog_path')->first();
//        $path = $savePath->value;
//        //delete image file
//        $blog = \DB::table('blog')->find($id);
//        $dest = $path . $blog->img_cover;
//        $pathToDel = str_replace(\URL::to('/'), '', $dest);
//        echo $pathToDel . '<br/>';
//        echo public_path() . '/' . $pathToDel . ' <br/>';
//        echo 'deleting....';
//        \File::delete(public_path() . '/' . $pathToDel);
//        //delete from database
//        \DB::table('blog')->where('id', '=', $id)->delete();
//    }
//
//    /**
//     * Update kategori
//     */
//    function postUpdatekategori() {
//        \DB::table('blog_category')->where('id', '=', \Input::get('kategori_id'))->update(array(
//            'name' => \Input::get('name')
//        ));
//
//        return json_encode(\DB::table('blog_category')->find(\Input::get('kategori_id')));
//    }
//
//    /**
//     * Delete Kategori
//     * @param type $id
//     * @return int
//     */
//    function getDelkategori($id) {
//        return \DB::table('blog_category')->delete($id);
//    }
//
//    /**
//     * get kategori by id
//     * @param type $id
//     */
//    function getKategori($id) {
//        $kategori = \DB::table('blog_category')->find($id);
//        return json_encode($kategori);
//    }
    //================== NEW SECTION =====================================

    function getIndex() {
        $blogs = \DB::table('VIEW_BLOGS')->get();

        return \View::make('back.blog.blog.blog', array(
                    'blogs' => $blogs
        ));
    }

    function getNew() {
        $kategoris = \DB::table('blog_category')->get();
        $selectKategory = array();
        foreach ($kategoris as $kat) {
            $selectKategory[$kat->id] = $kat->name;
        }
        return \View::make('back.blog.blog.new', array(
                    'selectKategori' => $selectKategory
        ));
    }

    function postNew() {
        \DB::transaction(function() {
            $imgname = "";
            //upload image
            if (\Input::hasFile('imageUploader')) {
                $image = \Input::file('imageUploader');
                $imgname = 'img_blog_' . $image->getClientOriginalName();
                $imgname = str_replace(' ', '_', $imgname);
                $image->move($this->IMG_PATH, $imgname);
            } else {
                $imgname = \Input::get('imageUrl');
            }
            //resize image            
            //\ImagineResizer::crop($path . $name, $path . $name, new \Imagine\Image\Box(570, 222));
            //insert to database
            $id = \DB::table('blog')->insertGetId(array(
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

        return \Redirect::to('admin/admin/page/blog');
    }

    function getEdit($id) {
        $blog = \DB::table('blog')->find($id);
        $kategoris = \DB::table('blog_category')->get();
        $selectKategory = array();
        foreach ($kategoris as $kat) {
            $selectKategory[$kat->id] = $kat->name;
        }
        return \View::make('back.blog.blog.edit', array(
                    'selectKategori' => $selectKategory,
                    'blog' => $blog,
                    'imgpath' => $this->IMG_PATH
        ));
    }

    function postEdit() {
        \DB::transaction(function() {
            $blog = \DB::table('blog')->find(\Input::get('blogid'));
            $imgname = $blog->img_cover;
            //upload image
            if (\Input::hasFile('imageUploader')) {
                //delete file sebelumnya
                if ($blog->islocal == 'Y') {
                    $dest = $this->IMG_PATH . $blog->img_cover;
                    $pathToDel = str_replace(\URL::to('/'), '', $dest);
                    \File::delete(public_path() . '/' . $pathToDel);
                }

                //upload image baru
                $image = \Input::file('imageUploader');
                $imgname = 'img_blog_' . $image->getClientOriginalName();
                $imgname = str_replace(' ', '_', $imgname);
                $image->move($this->IMG_PATH, $imgname);

                //update is local
                \DB::table('blog')->where('id', $blog->id)->update(array(
                    'islocal' => \Input::get('islocal')
                ));
            } elseif (\Input::get('imageUrl') != "") {
                //delete file sebelumnya
                if ($blog->islocal == 'Y') {
                    $dest = $this->IMG_PATH . $blog->img_cover;
                    $pathToDel = str_replace(\URL::to('/'), '', $dest);
                    \File::delete(public_path() . '/' . $pathToDel);
                }

                $imgname = \Input::get('imageUrl');
                //update is local
                \DB::table('blog')->where('id', $blog->id)->update(array(
                    'islocal' => \Input::get('islocal')
                ));
            }
            //insert to database
            \DB::table('blog')->where('id', $blog->id)->update(array(
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

    function getDeleteBlog($id) {
        $blog = \DB::table('blog')->find($id);
        if ($blog->islocal == 'Y') {
            //delete image local
            $dest = $this->IMG_PATH . $blog->img_cover;
            $pathToDel = str_replace(\URL::to('/'), '', $dest);
            \File::delete(public_path() . '/' . $pathToDel);
        }
        //delete from database
        \DB::table('blog')->where('id',$id)->delete();
        
        return \Redirect::back();
    }

    //====================KATEGORI SECTION=======================
    function getKategori() {
        $kategoris = \DB::table('blog_category')->get();

        return \View::make('back.blog.kategori.blogkategori', array(
                    'kategoris' => $kategoris
        ));
    }

    function getNewKategori() {
        return \View::make('back.blog.kategori.new', array());
    }

    function postNewKategori() {
        \DB::table('blog_category')->insert(array(
            'name' => \Input::get('name')
        ));

        return \Redirect::to('admin/page/blog/kategori');
    }

    function getEditKategori($id) {
        $kategori = \DB::table('blog_category')->find($id);
        return \View::make('back.blog.kategori.edit', array(
                    'kategori' => $kategori
        ));
    }

    function postEditKategori() {
        \DB::table('blog_category')->where('id', \Input::get('kategoriid'))->update(array(
            'name' => \Input::get('name')
        ));

        return \Redirect::to('admin/page/blog/kategori');
    }

    function getDeleteKategori($id) {
        \DB::table('blog_category')->where('id', $id)->delete();
        return \Redirect::to('admin/page/blog/kategori');
    }

    //================END KATEGORI SECTION=======================
    
    // ================== COMMENTS SECTION ======================
    function getComment(){
        return \View::make('back.blog.comment.index',array(
            'comments' => \DB::table('VIEW_COMMENTS')->orderBy('created_at','desc')->get()
        ));
    }
    
    //reply comment
    function getReplyComment($id){
        $comment = \DB::table('VIEW_COMMENTS')->find($id);
        return \View::make('back.blog.comment.reply',array(
            'comment'=>$comment
        ));
    }
    
    function getCommentById($id){
        $comment = \DB::table('VIEW_COMMENTS')->find($id);
        return json_encode($comment);
    }
    // ================== END OF COMMENTS SECTION ======================
}
