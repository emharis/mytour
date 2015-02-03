<?php

namespace App\Controllers\Front;

class ContactController extends \BaseController {

    public function getIndex() {
        return \View::make('front.contact.index', array(
            'comp'=> \App\Models\Company::first(),
            'contactpage'=> \App\Models\Contactpage::first()
        ));
    }
    
    public function postSend(){
        //save message
        $msg = new \App\Models\Message();
        $msg->first_name = \Input::get('name');
        $msg->email = \Input::get('email');
        $msg->message = \Input::get('message');
        $msg->save();
        
        $contactpage = \App\Models\Contactpage::first();
        \Session::flash('sent_message', $contactpage->sent_message);
        
        //return \Redirect::back()->with('send_success', true);
        return \View::make('front.contact.index', array(
            'comp'=> \App\Models\Company::first(),
            'contactpage'=> $contactpage
        ));
    }
//
//    public function getShow($id) {
//        $contact = \App\Models\Artikel::find($id);
//        return \View::make('front.contact.show', array(
//                    'artikel' => $contact,
//                    'frompost' => \App\Models\Artikel::where('id','!=',$id)->orderByRaw('rand()')->limit(\App\Models\Konfig::where('nama', 'sidebar_contact_count')->first()->value)->get(),
//                    'kategoris' => \App\Models\Kategori::all()
//        ));
//    }
//
//    public function getBykategori($id) {
//        return \View::make('front.contact.index', array(
//                    'bykategori' => true,
//                    'kategori' => \App\Models\Kategori::find($id),
//                    'artikels' => \App\Models\Artikel::orderBy('created_at', 'desc')->where('publish', 'Y')->where('kategori_id', $id)->get(),
//                    //from post random /side bar post
//                    'frompost' => \App\Models\Artikel::orderByRaw('rand()')->limit(\App\Models\Konfig::where('nama', 'sidebar_contact_count')->first()->value)->get(),
//                    'kategoris' => \App\Models\Kategori::all()
//        ));
//    }

}
