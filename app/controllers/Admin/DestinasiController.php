<?php

namespace App\Controllers\Admin;

class DestinasiController extends \BaseController {

    public $IMG_PATH;

    function __construct() {
        $this->IMG_PATH = \DB::table('constval')->where('name', '=', 'destinasi_img_path')->first()->value;
    }

    function getIndex() {
        $destinasi = \DB::table('view_destinasi')->get();
        $kategori = \DB::table('VIEW_DESTINASI_KATEGORI')->get();
        $selectKategori = array();
        foreach ($kategori as $kat) {
            $selectKategori[$kat->id] = $kat->nama;
        }

        return \View::make('back.page.destinasi.destinasi', array(
                    'destinasi' => $destinasi,
                    'kategori' => $kategori,
                    'selectKategori' => $selectKategori,
                    'img_path' => $this->IMG_PATH
        ));
    }

    /**
     * Tambah destinasi
     */
    function getNew() {
        $kategori = \DB::table('destinasi_kategori')->get();
        $selectKategori = array();
        foreach ($kategori as $kat) {
            $selectKategori[$kat->id] = $kat->nama;
        }

        return \View::make('back.page.destinasi.new.new', array(
                    'selectKategori' => $selectKategori
        ));
    }

    /**
     * Submit/save new destinasi
     */
    function postNew() {
//        $destinasiId = null;
//
//        \DB::transaction(function($destinasiId)use($destinasiId) {
//            //input data destinasi ke database
//            $destinasiId = \DB::table('destinasi')->insertgetId(array(
//                'destinasi_kategori_id' => \Input::get('kategori'),
//                'nama' => \Input::get('nama'),
//                'desc' => \Input::get('desc'),
//                'publish' => 'Y'
//            ));
//
//            if (\Input::get('islocal') == 'Y') {
//                //cek image cover
//                $imgname = "";
//                if (\Input::hasFile('img-upload-image-destinasi')) {
//                    //upload image
//                    $image = \Input::file('img-upload-image-destinasi');
//                    $imgname = 'img_destinasi_' . \Incremental::getIncrementValue() . '_' . $image->getClientOriginalName();
//                    $imgname = str_replace(' ', '_', $imgname);
//                    $path = $this->IMG_PATH;
//                    $image->move($path, $imgname);
//                    //resize image            
//                    \ImagineResizer::crop($path . $imgname, $path . $imgname, new \Imagine\Image\Box(270, 220));
//                }
//            } else {
//                $imgname = \Input::get('image-url');
//            }
//
//            //input ke database destinasi_image
//            $imageId = \DB::table('destinasi_image')->insertGetId(array(
//                'filename' => $imgname,
//                'main_img' => 'Y',
//                'destinasi_id' => $destinasiId,
//                'islocal' => \Input::get('islocal')
//            ));
//
//            //update imagename
//            \DB::table('destinasi')->where('id', '=', $destinasiId)->update(array(
//                'main_img' => $imgname
//            ));
//
//            $dest = \DB::table('destinasi')->find($destinasiId);
//            $dest->img_path = $this->IMG_PATH;
//            echo json_encode($dest);
//        });
        
        return \Input::get('desc');
    }

    /**
     * New kategori
     */
    function postNewKategori() {
        //upload gambar
        $imgname = "";
        if (\Input::hasFile('img-upl-image-kategori')) {
            //upload image
            $image = \Input::file('img-upl-image-kategori');
            $imgname = 'img_kat_dest_'. \Incremental::getIncrementValue() . '_' . $image->getClientOriginalName();
            $imgname = str_replace(' ', '_', $imgname);
            $path = $this->IMG_PATH;
//            echo $imgname;
            $image->move($path, $imgname);
            //resize image            
            \ImagineResizer::crop($path . $imgname, $path . $imgname, new \Imagine\Image\Box(270, 220));
        }
        //simpan ke database
        $id = \DB::table('destinasi_kategori')->insertGetId(array(
            'nama' => \Input::get('nama'),
            'filename' => $imgname
        ));

        $res = \DB::table('destinasi_kategori')->find($id);
        $res->img_path = $this->IMG_PATH;
        return json_encode($res);
    }

    /**
     * Edit destinasi
     * @param type $id
     */
    function getEdit($id) {
        $dest = \DB::table('destinasi')->find($id);
        $kategori = \DB::table('destinasi_kategori')->find($dest->destinasi_kategori_id);
        $images = \DB::table('destinasi_image')->where('destinasi_id', '=', $id)->where('type', '=', 'I')->get();
        $videos = \DB::table('destinasi_image')->where('destinasi_id', '=', $id)->where('type', '=', 'V')->get();
        $cover = \DB::table('destinasi_image')->where('destinasi_id', '=', $id)->where('main_img', '=', 'Y')->first();

        $kats = \DB::table('destinasi_kategori')->get();
        $selectKategori = array();
        foreach ($kats as $kat) {
            $selectKategori[$kat->id] = $kat->nama;
        }

        return \View::make('back.page.destinasi.edit', array(
                    'destinasi' => $dest,
                    'kategori' => $kategori,
                    'images' => $images,
                    'youtubes' => $videos,
                    'selectKategori' => $selectKategori,
                    'img_path' => $this->IMG_PATH,
                    'cover' => $cover
        ));
//        echo json_encode($dest);
    }

    /**
     * Submit edit destinasi
     */
    function postEdit() {
        \DB::transaction(function() {
            //begin transaction
            $destinasiId = \Input::get('destinasiId');
            $destinasi = \DB::table('destinasi')->find($destinasiId);
            \DB::table('destinasi')->where('id', '=', $destinasiId)->update(array(
                'destinasi_kategori_id' => \Input::get('kategori'),
                'publish' => \Input::get('publish'),
                'nama' => \Input::get('nama'),
                'desc' => \Input::get('desc')
            ));

            //cek image cover jika ada simpan
            $imgname = "";
            if (\Input::hasFile('img-upload-image-destinasi')) {
                //hapus image yang lama
                $dest = $this->IMG_PATH . $destinasi->main_img;
                $pathToDel = str_replace(\URL::to('/'), '', $dest);
                \File::delete(public_path() . '/' . $pathToDel);
                //upload image
                $image = \Input::file('img-upload-image-destinasi');
                $imgname = 'img_destinasi_'. \Incremental::getIncrementValue() . '_' . $image->getClientOriginalName();
                $imgname = str_replace(' ', '_', $imgname);
                $path = $this->IMG_PATH;
                $image->move($path, $imgname);
                //resize image            
                \ImagineResizer::crop($path . $imgname, $path . $imgname, new \Imagine\Image\Box(270, 220));

                //delete dari databaase file yang lama
                \DB::table('destinasi_image')->where('destinasi_id', '=', $destinasiId)->where('main_img', '=', 'Y')->delete();
                //input ke database destinasi_image
                $imageId = \DB::table('destinasi_image')->insertGetId(array(
                    'filename' => $imgname,
                    'main_img' => 'Y',
                    'destinasi_id' => $destinasiId
                ));

                //update imagename
                \DB::table('destinasi')->where('id', '=', $destinasiId)->update(array(
                    'main_img' => $imgname
                ));
            }
        });

        //return
        return \Redirect::back();
    }

    /**
     * Tambah image destinasi
     */
    function postAddImage() {
        //cek image cover
        $imgname = "";
        if (\Input::hasFile('input-tambah-image')) {
            //upload image
            $image = \Input::file('input-tambah-image');
            $imgname = 'img_destinasi_'. \Incremental::getIncrementValue() . '_' . $image->getClientOriginalName();
            $imgname = str_replace(' ', '_', $imgname);
            $path = $this->IMG_PATH;
            $image->move($path, $imgname);
            //resize image            
            \ImagineResizer::crop($path . $imgname, $path . $imgname, new \Imagine\Image\Box(270, 220));
        } else {
            $imgname = \Input::get('filename');
        }


        //simpan ke database
        $id = \DB::table('destinasi_image')->insertGetId(array(
            'destinasi_id' => \Input::get('destinasiId'),
            'type' => 'I',
            'islocal' => \Input::get('islocal'),
            'filename' => $imgname,
            'main_img' => 'N',
        ));

        $newimg = \DB::table('destinasi_image')->find($id);
        $newimg->img_path = $this->IMG_PATH;
        echo json_encode($newimg);
    }

    /**
     * Set image cover
     * @param type $id
     */
    function getSetCover($imageid) {
        $img = \DB::table('destinasi_image')->find($imageid);
        //set image lain jadi not cover image
        \DB::table('destinasi_image')->where('destinasi_id', '=', $img->destinasi_id)->update(array(
            'main_img' => 'N'
        ));
        //set image cover
        \DB::table('destinasi_image')->where('id', '=', $img->id)->update(array(
            'main_img' => 'Y'
        ));
        //set ke databasee destinasi
        \DB::table('destinasi')->where('id', '=', $img->destinasi_id)->update(array(
            'main_img' => $img->filename
        ));

        $img->img_path = $this->IMG_PATH;
        return json_encode($img);
    }

    function getDeleteImage($imageid) {
        //get file image dulu
        $img = \DB::table('destinasi_image')->find($imageid);
        //cek apakah lokal. kalau ya hapus file dulu
        if ($img->islocal = 'Y') {
            //hapus file
            $dest = $this->IMG_PATH . $img->filename;
            $pathToDel = str_replace(\URL::to('/'), '', $dest);
            \File::delete(public_path() . '/' . $pathToDel);
        }
        //hapus dari database
        \DB::table('destinasi_image')->where('id', '=', $imageid)->delete();
        //cek apakah main image?
        if ($img->main_img == 'Y') {
            //jadikan image pertama dari database sebagai ganti main image
            \DB::table('destinasi_image')->where('destinasi_id', '=', $img->destinasi_id)->limit(1)->update(array(
                'main_img' => 'Y'
            ));
        }

        //kembalikan image cover pengganti
        $mainImg = \DB::table('destinasi_image')->where('destinasi_id', '=', $img->destinasi_id)->first();
        return json_encode($mainImg);
    }

    /**
     * Get youtube id from url
     * @return type
     */
    function postYoutubeId() {
        $url = \Input::get('url');
        return \Youtube::getYoutubeid($url);
    }

    /**
     * Generate Youtube ID from URL
     * @param type $url
     * @return boolean
     */
//    function youtubeid($url) {
//        $pattern = '%^# Match any youtube URL
//        (?:https?://)?  # Optional scheme. Either http or https
//        (?:www\.)?      # Optional www subdomain
//        (?:             # Group host alternatives
//          youtu\.be/    # Either youtu.be,
//        | youtube\.com  # or youtube.com
//          (?:           # Group path alternatives
//            /embed/     # Either /embed/
//          | /v/         # or /v/
//          | /watch\?v=  # or /watch\?v=
//          )             # End path alternatives.
//        )               # End host alternatives.
//        ([\w-]{10,12})  # Allow 10-12 for 11 char youtube id.
//        $%x'
//        ;
//        $result = preg_match($pattern, $url, $matches);
//        if (false !== $result) {
//            return $matches[1];
//        }
//        return false;
//    }

    /**
     * Tambah youtube destinasi
     */
    function postAddYoutube() {
        //simpan ke database
        $id = \DB::table('destinasi_image')->insertGetId(array(
            'destinasi_id' => \Input::get('destinasiId'),
            'type' => 'V',
            'islocal' => 'N',
            'filename' => \Youtube::getYoutubeid(\Input::get('youtubeid')),
            'main_img' => 'N',
            'vidthumb' => \Input::get('youtube_prev_option')
        ));

        $newyoutube = \DB::table('destinasi_image')->find($id);
        $newyoutube->youtube_path = $this->IMG_PATH;
        echo json_encode($newyoutube);
    }

    /**
     * Delete youtube from database
     * @param type $youtubeid
     */
    function getDeleteYoutube($youtubeid) {
        //hapus dari database
        \DB::table('destinasi_image')->where('id', '=', $youtubeid)->delete();
    }

    /**
     * Delete Destinasi
     * @param type $id
     */
    function getDeleteDestinasi($id) {
        $destinasi = \DB::table('destinasi')->find($id);
        \DB::transaction(function($destinasi)use($destinasi) {
            //delete images
            $images = \DB::table('destinasi_image')->where('destinasi_id', '=', $destinasi->id)->get();
            foreach ($images as $img) {
                if ($img->islocal == 'Y') {
                    //delete image file
                    $dest = $this->IMG_PATH . $img->filename;
                    $pathToDel = str_replace(\URL::to('/'), '', $dest);
                    \File::delete(public_path() . '/' . $pathToDel);
                }
                //delete dari database
                \DB::table('destinasi_image')->where('id', '=', $img->id)->delete();
            }

            //delete destinasi dari database
            \DB::table('destinasi')->where('id', '=', $destinasi->id)->delete();
        });
    }

    /**
     * Delete kategori by ID
     * @param type $id
     */
    function getDeleteKategori($id) {
        $kat = \DB::table('destinasi_kategori')->find($id);

        \DB::transaction(function($kat)use($kat) {
            //delete image file
            $dest = $this->IMG_PATH . $kat->filename;
            $pathToDel = str_replace(\URL::to('/'), '', $dest);
            \File::delete(public_path() . '/' . $pathToDel);
            //delete from database
            \DB::table('destinasi_kategori')->where('id','=',$kat->id)->delete();
        });
    }
    /**
     * Get kategori by ID
     * @param type $id
     */
    function getKategoriById($id){
        $kategori = \DB::table('destinasi_kategori')->find($id);
        $kategori->img_path = $this->IMG_PATH;
        return json_encode($kategori);
    }
    /**
     * Simpann edit kategori
     * @return type
     */
    function postEditKategori() {
        $kategori = \DB::table('destinasi_kategori')->find(\Input::get('kategoriid'));
        //upload gambar
        $imgname = $kategori->filename;
        if (\Input::hasFile('img-upl-image-kategori')) {
            //hapus image yang lama
            //delete image file
            $dest = $this->IMG_PATH . $kategori->filename;
            $pathToDel = str_replace(\URL::to('/'), '', $dest);
            \File::delete(public_path() . '/' . $pathToDel);
            //upload image
            $image = \Input::file('img-upl-image-kategori');
            $imgname = 'img_kat_dest_'. \Incremental::getIncrementValue() . '_' . $image->getClientOriginalName();
            $imgname = str_replace(' ', '_', $imgname);
            $path = $this->IMG_PATH;
//            echo $imgname;
            $image->move($path, $imgname);
            //resize image            
            \ImagineResizer::crop($path . $imgname, $path . $imgname, new \Imagine\Image\Box(270, 220));
        }
        //simpan ke database
        $id = \DB::table('destinasi_kategori')->where('id','=',$kategori->id)->update(array(
            'nama' => \Input::get('nama'),
            'filename' => $imgname
        ));

        $kategori = \DB::table('destinasi_kategori')->find(\Input::get('kategoriid'));
        $kategori->img_path = $this->IMG_PATH;
        return json_encode($kategori);
    }
    
    function getIncrement(){
        echo \Incremental::getIncrementValue() . '_';
    }

    //END OF FILE
}
