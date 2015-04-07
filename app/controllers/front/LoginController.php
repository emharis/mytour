<?php

namespace App\Controllers\Front;

class BlogController extends \BaseController {

    public function getIndex() {
        return \View::make('front.blog.index', array(
                    'artikels' => \App\Models\Artikel::with('comments')->orderBy('created_at', 'desc')->where('publish', 'Y')->paginate(2),
                    //from post random /side bar post
                    'frompost' => \App\Models\Artikel::orderByRaw('rand()')->limit(\App\Models\Konfig::where('nama', 'sidebar_blog_count')->first()->value)->get(),
                    'kategoris' => \App\Models\Kategori::all()
        ));
    }
    
    public function getPager(){
        $artikel = \App\Models\Artikel::with('comments')->orderBy('created_at', 'desc')->where('publish', 'Y')->paginate(2);
        return \View::make('front.blog.pager',array('artikels'=>$artikel));
    }
    public function getNextpager(){
        return \View::make('front.blog.pager2');
    }

    public function getShow($id) {
        $blog = \App\Models\Artikel::find($id);
        $comments = \App\Models\Comment::where('artikel_id', $id)->where('confirmed', 'Y')->get();
        return \View::make('front.blog.show', array(
                    'artikel' => $blog,
                    'frompost' => \App\Models\Artikel::where('id', '!=', $id)->orderByRaw('rand()')->limit(\App\Models\Konfig::where('nama', 'sidebar_blog_count')->first()->value)->get(),
                    'kategoris' => \App\Models\Kategori::all(),
                    'comments' => $comments
        ));
    }

    public function getBykategori($id) {
        return \View::make('front.blog.index', array(
                    'bykategori' => true,
                    'kategori' => \App\Models\Kategori::find($id),
                    'artikels' => \App\Models\Artikel::orderBy('created_at', 'desc')->where('publish', 'Y')->where('kategori_id', $id)->get(),
                    //from post random /side bar post
                    'frompost' => \App\Models\Artikel::orderByRaw('rand()')->limit(\App\Models\Konfig::where('nama', 'sidebar_blog_count')->first()->value)->get(),
                    'kategoris' => \App\Models\Kategori::all()
        ));
    }
    
    function postComment(){
        $comment = new \App\Models\Comment();
        $comment->name = \Input::get('author');
        $comment->email = \Input::get('email');
        $comment->website = \Input::get('url');
        $comment->message = \Input::get('comment');
        $comment->artikel_id = \Input::get('artikelId');
        $comment->save();
        
        \Session::flash('reply_success', \App\Models\Konfig::where('nama','guest_comment_sent_info')->first()->value);
        
        return \Redirect::to('front/blog/show/'.$comment->artikel_id.'#comments');
    }
    
    function getPage(){
        $blog = \App\Models\Artikel::paginate(3);
        
        foreach($blog as $blg){
            echo $blg->judul . '<br/>';
        }
        
        echo $blog->links();
    }

}
