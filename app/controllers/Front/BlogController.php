<?php

namespace App\Controllers\Front;

class BlogController extends \BaseController {

    function getIndex() {
        $itemperpage = \DB::table('constval')->where('name', 'jml_blog_per_page')->first();
        $blogs = \DB::table('VIEW_BLOGS')->orderBy('created_at', 'desc')->paginate($itemperpage->value);
        $categories = \DB::table('blog_category')->orderBy('id', 'asc')->get();
        //get popular post
        $limitpopular = \DB::table('constval')->where('name', 'show_popular_post_number')->first()->value;
        $popularposts = \DB::table('VIEW_BLOGS')->orderBy('dilihat', 'desc')->limit($limitpopular)->get();
        return \View::make('front/blog/travinfo', array(
                    'blogs' => $blogs,
                    'categories' => $categories,
                    'popularposts' => $popularposts
        ));
    }

    function getByKategori($kategoriid) {
        $itemperpage = \DB::table('constval')->where('name', 'jml_blog_per_page')->first();
        $blogs = \DB::table('VIEW_BLOGS')->orderBy('created_at', 'desc')->where('category_id', $kategoriid)->paginate($itemperpage->value);
        $category = \DB::table('blog_category')->find($kategoriid);
        $categories = \DB::table('blog_category')->orderBy('id', 'asc')->get();
        //get popular post
        $limitpopular = \DB::table('constval')->where('name', 'show_popular_post_number')->first()->value;
        $popularposts = \DB::table('VIEW_BLOGS')->orderBy('dilihat', 'desc')->limit($limitpopular)->get();

        return \View::make('front/blog/bykategori', array(
                    'blogs' => $blogs,
                    'categories' => $categories,
                    'category' => $category,
                    'popularposts' => $popularposts
        ));
    }

    function getShow($id) {
        $blog = \DB::table('VIEW_BLOGS')->find($id);
        $categories = \DB::table('blog_category')->orderBy('id', 'asc')->get();
        $othersin = \DB::table('VIEW_BLOGS')->where('category_id', $blog->category_id)->where('id','!=',$id)->orderByRaw('rand()')->limit(5)->get();
        $limitpopular = \DB::table('constval')->where('name', 'show_popular_post_number')->first()->value;
        $popularposts = \DB::table('VIEW_BLOGS')->where('id','!=',$id)->orderBy('dilihat', 'desc')->limit($limitpopular)->get();
        $comments = \DB::table('comments')->where('blog_id',$id)->where('publish','Y')->orderBy('created_at','desc')->get();
        //update dilihat 
        $dilihat = $blog->dilihat;
        \DB::table('blog')->where('id', $id)->update(array(
            'dilihat' => $dilihat + 1
        ));
        return \View::make('front/blog/show', array(
                    'blog' => $blog,
                    'kategoris' => $categories,
                    'othersin' => $othersin,
                     'popularposts' => $popularposts,
                     'comments' => $comments,
        ));
    }

    //add new commant to the blog
    function postAddComment() {
        \DB::table('comments')->insert(array(
            'created_at' => date('Y-m-d H:i:s'),
            'content' => \Input::get('message'),
            'name' => \Input::get('name'),
            'email' => \Input::get('email'),
            'url' => \Input::get('url'),
            'blog_id' => \Input::get('blogid'),
        ));
        return \Redirect::to('front/blog/show/' . \Input::get('blogid') . '#comment-here');
    }

}
