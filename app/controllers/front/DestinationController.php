<?php

namespace App\Controllers\Front;

class DestinationController extends \BaseController {

    public function getIndex() {
        return \View::make('front.destination.index', array(
                    'destkats' => \App\Models\Destkat::paginate(3)
        ));
    }
    
    function getPager(){
        return \View::make('front.destination.pager', array(
                    'destkats' => \App\Models\Destkat::paginate(3)
        ));
    }

//    public function getShow($id) {
//        $destination = \App\Models\Artikel::find($id);
//        return \View::make('front.destination.show', array(
//                    'artikel' => $destination,
//                    'frompost' => \App\Models\Artikel::where('id','!=',$id)->orderByRaw('rand()')->limit(\App\Models\Konfig::where('nama', 'sidebar_destination_count')->first()->value)->get(),
//                    'kategoris' => \App\Models\Kategori::all()
//        ));
//    }

    public function getBykategori($id) {
        return \View::make('front.destination.index', array(
                    'bykategori' => true,
                    'kategori' => \App\Models\Kategori::find($id),
                    'artikels' => \App\Models\Artikel::orderBy('created_at', 'desc')->where('publish', 'Y')->where('kategori_id', $id)->get(),
                    //from post random /side bar post
                    'frompost' => \App\Models\Artikel::orderByRaw('rand()')->limit(\App\Models\Konfig::where('nama', 'sidebar_destination_count')->first()->value)->get(),
                    'kategoris' => \App\Models\Kategori::all()
        ));
    }

    /**
     * Tampilkan daftar destinasi per lokasi
     */
    function getKategori($destkatid) {
        return \View::make('front.destination.perkat', array(
                    'destkat' => \App\Models\Destkat::find($destkatid),
                    'dests' => \App\Models\Destination::where('destkat_id', $destkatid)->paginate(3)
        ));
    }
    
    function getKategoripager($destkatid){
        return \View::make('front.destination.perkatpager', array(
                    'destkat' => \App\Models\Destkat::find($destkatid),
                    'dests' => \App\Models\Destination::where('destkat_id', $destkatid)->paginate(3)
        ));
    }

    /**
     * Tampilkan single destination
     */
    function getShow($destid) {
        $dest = \App\Models\Destination::find($destid);
        return \View::make('front.destination.show', array(
                    'dest' => $dest,
                    'dests' => \App\Models\Destination::orderByRaw('rand()')->where('destkat_id', $dest->destkat_id)->where('id','!=',$destid)->limit(5)->get(),
                    'destsbykat' => \App\Models\Destination::orderByRaw('rand()')->where('kategori_id', $dest->kategori_id)->where('id','!=',$destid)->limit(5)->get()
        ));
    }

}
