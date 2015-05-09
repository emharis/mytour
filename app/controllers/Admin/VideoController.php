<?php

namespace App\Controllers\Admin;

class VideoController extends \BaseController {

    function getIndex() {
        $videos = \DB::table('gallery')->where('type', '=', 'V')->orderBy('created_at', 'desc')->get();
        return \View::make('back.page.video.video', array(
                    'videos' => $videos
        ));
    }

    function postUpload() {
        //insert to database
        \DB::transaction(function() {
            //get image path
            $savePath = \DB::table('constval')->where('name', '=', 'img_gallery_path')->first();
            $path = $savePath->value;

//            if (\Input::get('isexternal') == 'N') {
//                //upload image
//                $image = \Input::file('img-uploader');
//                $name = 'img_gallery_' . $image->getClientOriginalName();
//                $name = str_replace(' ', '_', $name);
//                //move image
//                $image->move($path, $name);
//            } else {
//                $name = \Input::get('img-link');
//            }
            
            $name = \Youtube::getYoutubeid(\Input::get('img-link'));

            //insert database
            $id = \DB::table('gallery')->insertGetId(array(
                'created_at' => date('Y-m-d H:i:s'),
                'type' => 'V',
                'isexternal' => \Input::get('isexternal'),
                'title' => \Input::get('keterangan'),
                'filename' => $name
            ));

            $imgfile = \DB::table('gallery')->find($id);
            if (\Input::get('isexternal') == 'N') {
                $imgfile->filename = $path . $imgfile->filename;
            }
            echo json_encode($imgfile);
        });
    }

    function getDelimage($id) {
        //get file from db
        $img = \DB::table('gallery')->find($id);
        //hapus dari file
        $savePath = \DB::table('constval')->where('name', '=', 'img_gallery_path')->first();
        $path = $savePath->value;        
        $dest = $path  . $img->filename;
        //delete image
        $pathToDel = str_replace(\URL::to('/'), '', $dest);
        echo $pathToDel . '<br/>';
        echo public_path() .'/'. $pathToDel . ' <br/>';
        echo 'deleting....';
        \File::delete(public_path() .'/' . $pathToDel);
        echo '<br>';
        //delete dari file
        return \DB::table('gallery')->delete($id);
    }

}
