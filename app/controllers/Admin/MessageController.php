<?php

namespace App\Controllers\Admin;

class MessageController extends \BaseController {

    function getIndex(){
        $messages = \DB::table('message')->orderBy('created_at','desc')->orderBy('isread','asc')->get();
        return \View::make('back.message.inbox',array(
            'messages' => $messages
        ));
    }
    
    function getRead($messageid){
        $message = \DB::table('message')->find($messageid);
        $messages = \DB::table('message')->orderBy('created_at','desc')->orderBy('isread','asc')->get();
        //set status message to read
        \DB::table('message')->where('id',$messageid)->update(array('isread'=>'Y'));
        return \View::make('back.message.read',array(
            'messages' => $messages,
            'message' => $message
        ));
    }
    
    function getReply($id){
        $message = \DB::table('message')->find($id);
        $messages = \DB::table('message')->orderBy('created_at','desc')->orderBy('isread','asc')->get();
        return \View::make('back.message.reply',array(
            'message' => $message,
            'messages' => $messages
        ));
    }
    
    function postReply(){
        echo 'Reply message.....<br/>';
        echo '----------------------------------------------------<br/>';
        echo 'to : ' . \Input::get('email') . '<br/>';
        echo 'subject : ' . \Input::get('subject') . '<br/>';
        echo 'message : ' . \Input::get('message') . '<br/>';
        echo '----------------------------------------------------<br/>';
    }
}
