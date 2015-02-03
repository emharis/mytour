<?php

namespace App\Controllers\Admin;

class CommentController extends \BaseController {

    public function getIndex() {
        return \View::make('admin.comment.index', array(
                    'comments' => \App\Models\Comment::where('isreply', 'N')->orderBy('created_at', 'desc')->get()
        ));
    }

    function getEdit($id) {
        //set comment to readed
        $comment = \App\Models\Comment::find($id);
        $comment->status = 'Y';
        $comment->save();

        return \View::make('admin.comment.show', array(
                    'comment' => $comment
        ));
    }

    public function postReply() {
        $comment = \App\Models\Comment::find(\Input::get('commentId'));
        $compinfo = \App\Models\Company::first();

        $reply = new \App\Models\Comment();
        $reply->artikel_id = $comment->artikel_id;
        $reply->name = 'admin@' . $compinfo->website;
        $reply->message = '@' . $comment->name . ', ' . str_replace('</p>','',str_replace('<p>', '', \Input::get('reply_msg')));
        $reply->status = 'Y';
        $reply->isreply = 'Y';
        $reply->confirmed = 'Y';
        $reply->comment_id = $comment->id;
        $reply->save();

        return \Redirect::back();
    }
    
    public function getConfirm($id){
        $comment = \App\Models\Comment::find($id);
        $comment->confirmed = 'Y';
        $comment->save();
        
        return \Redirect::back();
    }
    public function getUnconfirm($id){
        $comment = \App\Models\Comment::find($id);
        $comment->confirmed = 'N';
        $comment->save();
        
        return \Redirect::back();
    }

    function getDelete($id) {
        $comment = \App\Models\Comment::find($id);
        //delete reply dulu jika telah di reply
        if ($comment->reply != null) {
            \DB::table('comment')->where('id', $comment->reply->id)->delete();
        }
        $comment->delete();
        
        return \Redirect::to('admin/comment');
    }

    function getDeletereply($commentId) {
        $reply = \App\Models\Comment::where('comment_id',$commentId)->first();
        $reply->delete();
        
        return \Redirect::back();
    }

}
