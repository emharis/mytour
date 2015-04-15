<?php

namespace App\Controllers\Admin;

class TravelController extends \BaseController {

    function getIndex() {
        $kategoris = \DB::table('travel_category')->get();
        $selectKategory = array();
        foreach ($kategoris as $kat) {
            $selectKategory[$kat->id] = $kat->name;
        }

        $travels = \DB::table('view_travels')->get();
        $kategoris = \DB::table('travel_category')->get();

        return \View::make('back.page.travel.travel', array(
                    'travels' => $travels,
                    'selectKategori' => $selectKategory,
                    'kategoris' => $kategoris
        ));
    }

    /**
     * Tambah travel baru
     */
    function postNewtravel() {
        \DB::transaction(function() {
            //upload image
            $savePath = \DB::table('constval')->where('name', '=', 'img_travel_path')->first();
            $path = $savePath->value;
            //upload image
            $image = \Input::file('img-upload');
            $name = 'img_travel_' . $image->getClientOriginalName();
            $name = str_replace(' ', '_', $name);
//            echo $name;
            $image->move($path, $name);
            //resize image            
            \ImagineResizer::crop($path . $name, $path . $name, new \Imagine\Image\Box(570, 222));

            //insert to database
            $id = \DB::table('travel')->insertGetId(array(
                'created_at' => date('Y-m-d H:i:s'),
                'title' => \Input::get('title'),
                'content' => \Input::get('content'),
                'tags' => \Input::get('tags'),
                'publish' => \Input::get('publish'),
                'author_id' => \Input::get('author_id'),
                'img_cover' => $name,
                'category_id' => \Input::get('kategori')
            ));
            
            echo json_encode(\DB::table('view_travels')->find($id));
        });
    }

    /**
     * Get travel by ID
     * @param integer $id
     * @return JSON 
     */
    function getViewtravel($id) {
        $travel = \DB::table('view_travels')->find($id);
        //add column filepath
        $savePath = \DB::table('constval')->where('name', '=', 'img_travel_path')->first();
        $path = $savePath->value;
        $travel->img = $path . $travel->img_cover;
        return json_encode($travel);
    }

    /**
     * Edit travel
     */
    function postUpdatetravel() {
        \DB::transaction(function() {
            //upload image
            $savePath = \DB::table('constval')->where('name', '=', 'img_travel_path')->first();
            $path = $savePath->value;
//            //upload image
            if (\Input::hasFile('img-upload')) {
                //hapus file sebelumnya
                //delete image
                $travel = \DB::table('travel')->find(\Input::get('travelId'));
                $dest = $path . $travel->img_cover;
                $pathToDel = str_replace(\URL::to('/'), '', $dest);
//                echo $pathToDel . '<br/>';
//                echo public_path() . '/' . $pathToDel . ' <br/>';
//                echo 'deleting....';
                \File::delete(public_path() . '/' . $pathToDel);

                //upload file baru
                $image = \Input::file('img-upload');
                $name = 'img_travel_' . $image->getClientOriginalName();
                $name = str_replace(' ', '_', $name);
                $image->move($path, $name);
                //resize image            
                \ImagineResizer::crop($path . $name, $path . $name, new \Imagine\Image\Box(570, 222));

                //update image ke database
                \DB::table('travel')->where('id', '=', \Input::get('travelId'))->update(array(
                    'img_cover' => $name
                ));
            }

            //update ke database
            \DB::table('travel')->where('id', '=', \Input::get('travelId'))->update(array(
                'created_at' => date('Y-m-d H:i:s'),
                'title' => \Input::get('title'),
                'content' => \Input::get('content'),
                'tags' => \Input::get('tags'),
                'publish' => \Input::get('publish'),
//                'author_id' => \Input::get('author_id'),
                'category_id' => \Input::get('kategori')
            ));
        });
    }

    /**
     * Tambah kategori travel baru
     */
    function postNewkategori() {
        return json_encode(array(
            'id' => \DB::table('travel_category')->insertGetId(array(
                'name' => \Input::get('nama_kategori')
            )),
            'name' => \Input::get('nama_kategori')
        ));
    }

    /**
     * Delete Travel
     * @param int $id
     */
    function getDeltravel($id) {
        $savePath = \DB::table('constval')->where('name', '=', 'img_travel_path')->first();
        $path = $savePath->value;
        //delete image file
        $travel = \DB::table('travel')->find($id);
        $dest = $path . $travel->img_cover;
        $pathToDel = str_replace(\URL::to('/'), '', $dest);
        echo $pathToDel . '<br/>';
        echo public_path() . '/' . $pathToDel . ' <br/>';
        echo 'deleting....';
        \File::delete(public_path() . '/' . $pathToDel);
        //delete from database
        \DB::table('travel')->where('id','=',$id)->delete();
    }

    /**
     * Update kategori
     */
    function postUpdatekategori() {
        return \DB::table('travel_category')->where('id', '=', \Input::get('kategori_id'))->update(array(
                    'name' => \Input::get('name')
        ));
    }

    /**
     * Delete Kategori
     * @param type $id
     * @return int
     */
    function getDelkategori($id) {
        return \DB::table('travel_category')->delete($id);
    }

}
