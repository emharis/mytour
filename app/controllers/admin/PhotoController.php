<?php

namespace App\Controllers\Admin;

class PhotoController extends \BaseController {

    public function getIndex() {
        return \View::make('admin.photo.index', array(
                    'photos' => \App\Models\Gallery::where('type', 'Y')->orderBy('created_at', 'desc')->get()
        ));
    }

    function getNew() {
        return \View::make('admin.photo.new');
    }

    function postNew() {
        $photo = new \App\Models\Gallery();
        $photo->type = 'Y';
        $photo->desc = \Input::get('desc');

        if (\Input::get('isurl') != '') {
            //image is url
            $photo->img_isurl = 'Y';
            $photo->img_path = \Input::get('imageurl');
        } else {
            if (\Input::hasFile('img_upl')) {
                //get image
                echo 'move gambar';
                $savePath = public_path() . '/gallery/photo';
                $name = $photo->nama . '_' . \Input::file('img_upl')->getClientOriginalName();
                $name = str_replace(' ', '_', $name);
                //upload image
                \Input::file('img_upl')->move($savePath, $name);
                //save image url to database
                $photo->img_path = \URL::to('gallery/photo/' . $name);
            }
        }

        $photo->save();

        return \Redirect::to('admin/gallery/photo');
    }

    function getEdit($id) {
        return \View::make('admin.photo.edit', array(
                    'photo' => \App\Models\Gallery::find($id)
        ));
    }
    
    function postEdit(){
        $photo = \App\Models\Gallery::find(\Input::get('photoId'));
        $photo->type = 'Y';
        $photo->desc = \Input::get('desc');

        if (\Input::get('isurl') != '') {
            //image is url
            $photo->img_isurl = 'Y';
            $photo->img_path = \Input::get('imageurl');
        } else {
            if (\Input::hasFile('img_upl')) {
                //get image
                echo 'move gambar';
                $savePath = public_path() . '/gallery/photo';
                $name = $photo->nama . '_' . \Input::file('img_upl')->getClientOriginalName();
                $name = str_replace(' ', '_', $name);
                //upload image
                \Input::file('img_upl')->move($savePath, $name);
                //save image url to database
                $photo->img_path = \URL::to('gallery/photo/' . $name);
            }
        }

        $photo->save();

        return \Redirect::back();
    }

    function getDeleteimage($id) {
        $photo = \App\Models\Gallery::find($id);
        if ($photo->img_isurl =='N') {
            //delete image file
            $pathToDel = str_replace(\URL::to('/'), '', $photo->img_path);
            echo $pathToDel . '<br/>';
            echo public_path() . $pathToDel . ' <br/>';
            echo 'deleting....';
            \File::delete(public_path() . $pathToDel);
        }

        $photo->img_path = '';
        $photo->save();

        return \Redirect::back();
    }
    
    /**
     * Delete photo data from database
     */
    function getDelete($id){
        $photo = \App\Models\Gallery::find($id);
        if($photo->img_isurl =='N'){
            //delete file nya dulu
            //delete image file
            $pathToDel = str_replace(\URL::to('/'), '', $photo->img_path);
            echo $pathToDel . '<br/>';
            echo public_path() . $pathToDel . ' <br/>';
            echo 'deleting....';
            \File::delete(public_path() . $pathToDel);
        }
        
        $photo->delete();
        
        return \Redirect::to('admin/gallery/photo');
    }

}
