<?php

namespace App\Controllers\Admin;

class VideoController extends \BaseController {

    public function getIndex() {
        return \View::make('admin.video.index', array(
                    'videos' => \App\Models\Gallery::where('type', 'N')->orderBy('created_at', 'desc')->get()
        ));
    }

    function getNew() {
        return \View::make('admin.video.new');
    }

    function postNew() {
        $video = new \App\Models\Gallery();
        $video->type = 'N';
        $video->desc = \Input::get('desc');
        $video->img_isurl = 'N';
        $video->img_path = \Input::get('videourl');
        $video->save();

        return \Redirect::to('admin/gallery/video');
    }

    function getEdit($id) {
        return \View::make('admin.video.edit', array(
                    'video' => \App\Models\Gallery::find($id)
        ));
    }

    function postEdit() {
        $video = \App\Models\Gallery::find(\Input::get('videoId'));
        $video->type = 'N';
        $video->desc = \Input::get('desc');
        $video->img_isurl = 'N';
        $video->img_path = \Input::get('videourl');
        $video->save();

        $video->save();

        return \Redirect::back();
    }

    function getDeletevideo($id) {
        $video = \App\Models\Gallery::find($id);
        if ($video->img_isurl == 'N') {
            //delete video file
            $pathToDel = str_replace(\URL::to('/'), '', $video->img_path);
            echo $pathToDel . '<br/>';
            echo public_path() . $pathToDel . ' <br/>';
            echo 'deleting....';
            \File::delete(public_path() . $pathToDel);
        }
        $video->img_path = '';
        $video->save();

        return \Redirect::back();
    }

    /**
     * Delete video data from database
     */
    function getDelete($id) {
        $video = \App\Models\Gallery::find($id);
        if ($video->img_isurl == 'N') {
            //delete file nya dulu
            //delete video file
            $pathToDel = str_replace(\URL::to('/'), '', $video->img_path);
            echo $pathToDel . '<br/>';
            echo public_path() . $pathToDel . ' <br/>';
            echo 'deleting....';
            \File::delete(public_path() . $pathToDel);
        }

        $video->delete();

        return \Redirect::to('admin/gallery/video');
    }

}
