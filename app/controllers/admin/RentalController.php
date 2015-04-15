<?php

namespace App\Controllers\Admin;

class RentalController extends \BaseController {

    function getIndex() {
        $kategoris = \DB::table('rental_category')->get();
        $selectKategory = array();
        foreach ($kategoris as $kat) {
            $selectKategory[$kat->id] = $kat->name;
        }

        $rentals = \DB::table('view_rentals')->get();
        $kategoris = \DB::table('rental_category')->get();

        return \View::make('back.page.rental.rental', array(
                    'rentals' => $rentals,
                    'selectKategori' => $selectKategory,
                    'kategoris' => $kategoris
        ));
    }

    /**
     * Tambah rental baru
     */
    function postNewrental() {
        \DB::transaction(function() {
            //upload image
            $savePath = \DB::table('constval')->where('name', '=', 'img_rental_path')->first();
            $path = $savePath->value;
            //upload image
            $image = \Input::file('img-upload');
            $name = 'img_rental_' . $image->getClientOriginalName();
            $name = str_replace(' ', '_', $name);
//            echo $name;
            $image->move($path, $name);
            //resize image            
            \ImagineResizer::crop($path . $name, $path . $name, new \Imagine\Image\Box(570, 222));

            //insert to database
            $id = \DB::table('rental')->insertGetId(array(
                'created_at' => date('Y-m-d H:i:s'),
                'title' => \Input::get('title'),
                'content' => \Input::get('content'),
                'tags' => \Input::get('tags'),
                'publish' => \Input::get('publish'),
                'author_id' => \Input::get('author_id'),
                'img_cover' => $name,
                'category_id' => \Input::get('kategori')
            ));
            
            echo json_encode(\DB::table('view_rentals')->find($id));
        });
    }

    /**
     * Get rental by ID
     * @param integer $id
     * @return JSON 
     */
    function getViewrental($id) {
        $rental = \DB::table('view_rentals')->find($id);
        //add column filepath
        $savePath = \DB::table('constval')->where('name', '=', 'img_rental_path')->first();
        $path = $savePath->value;
        $rental->img = $path . $rental->img_cover;
        return json_encode($rental);
    }

    /**
     * Edit rental
     */
    function postUpdaterental() {
        \DB::transaction(function() {
            //upload image
            $savePath = \DB::table('constval')->where('name', '=', 'img_rental_path')->first();
            $path = $savePath->value;
//            //upload image
            if (\Input::hasFile('img-upload')) {
                //hapus file sebelumnya
                //delete image
                $rental = \DB::table('rental')->find(\Input::get('rentalId'));
                $dest = $path . $rental->img_cover;
                $pathToDel = str_replace(\URL::to('/'), '', $dest);
//                echo $pathToDel . '<br/>';
//                echo public_path() . '/' . $pathToDel . ' <br/>';
//                echo 'deleting....';
                \File::delete(public_path() . '/' . $pathToDel);

                //upload file baru
                $image = \Input::file('img-upload');
                $name = 'img_rental_' . $image->getClientOriginalName();
                $name = str_replace(' ', '_', $name);
                $image->move($path, $name);
                //resize image            
                \ImagineResizer::crop($path . $name, $path . $name, new \Imagine\Image\Box(570, 222));

                //update image ke database
                \DB::table('rental')->where('id', '=', \Input::get('rentalId'))->update(array(
                    'img_cover' => $name
                ));
            }

            //update ke database
            \DB::table('rental')->where('id', '=', \Input::get('rentalId'))->update(array(
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
     * Tambah kategori rental baru
     */
    function postNewkategori() {
        return json_encode(array(
            'id' => \DB::table('rental_category')->insertGetId(array(
                'name' => \Input::get('nama_kategori')
            )),
            'name' => \Input::get('nama_kategori')
        ));
    }

    /**
     * Delete Rental
     * @param int $id
     */
    function getDelrental($id) {
        $savePath = \DB::table('constval')->where('name', '=', 'img_rental_path')->first();
        $path = $savePath->value;
        //delete image file
        $rental = \DB::table('rental')->find($id);
        $dest = $path . $rental->img_cover;
        $pathToDel = str_replace(\URL::to('/'), '', $dest);
        echo $pathToDel . '<br/>';
        echo public_path() . '/' . $pathToDel . ' <br/>';
        echo 'deleting....';
        \File::delete(public_path() . '/' . $pathToDel);
        //delete from database
        \DB::table('rental')->where('id','=',$id)->delete();
    }

    /**
     * Update kategori
     */
    function postUpdatekategori() {
        return \DB::table('rental_category')->where('id', '=', \Input::get('kategori_id'))->update(array(
                    'name' => \Input::get('name')
        ));
    }

    /**
     * Delete Kategori
     * @param type $id
     * @return int
     */
    function getDelkategori($id) {
        return \DB::table('rental_category')->delete($id);
    }

}
