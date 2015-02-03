<?php

namespace App\Controllers\Admin;

class ContactpageController extends \BaseController {

    public function getIndex() {
        return \View::make('admin.contactpage.index', array(
                    'contactpage' => \App\Models\Contactpage::first()
        ));
    }

    public function postUpdate() {
        $contactpage = \App\Models\Contactpage::first();
        $contactpage->customer_support_desc = \Input::get('customer_support_desc');
        $contactpage->message_sent_desc = \Input::get('message_sent_desc');
        $contactpage->message_reply_content = \Input::get('message_reply_content');
        $contactpage->ym = \Input::get('ym');
        $contactpage->ym_visible = (\Input::get('ym_visible') ? 'Y' : 'N');
        $contactpage->skype = \Input::get('skype');
        $contactpage->skype_visible = (\Input::get('skype_visible')?'Y':'N');
        $contactpage->whatsapp = \Input::get('whatsapp');
        $contactpage->whatsapp_visible = (\Input::get('whatsapp_visible')?'Y':'N');
        $contactpage->gtalk = \Input::get('gtalk');
        $contactpage->gtalk_visible = (\Input::get('gtalk_visible')?'Y':'N');
        $contactpage->line = \Input::get('line');
        $contactpage->line_visible = (\Input::get('line_visible')?'Y':'N');
        $contactpage->kakao = \Input::get('kakao');
        $contactpage->kakao_visible = (\Input::get('kakao_visible')?'Y':'N');
        $contactpage->save();
                      
        return \Redirect::back();
    }
    
    function getDeleteslider($id){
        $slider = \App\Models\Contactpageslider::find($id);
        //delete image file
        \File::delete(public_path() . '/images/slider/'.$slider->img_name);
        
        //delete from database
        $slider->delete();
        return \Redirect::back();
    }

    function postAddslider() {
        $slider = new \App\Models\Contactpageslider();
        $slider->title = \Input::get('new_title');
        $slider->subtitle = \Input::get('new_subtitle');
        $slider->link = \Input::get('new_link');
        $slider->save();

        //upload image
        echo '...check image file';
        if (\Input::hasFile('image_slider_upl')) {
            echo '...upload image file';
            //get image
//            $img = new \Symfony\Component\HttpFoundation\File\UploadedFile(null,null);
            $img = \Input::file('image_slider_upl');
            echo '..';
            echo 'move gambar';
            $savePath = public_path() . '/images/slider';
            $name = 'slider_' . $slider->id . '_' . $img->getClientOriginalName();
            $name = str_replace(' ', '_', $name);
            //upload image
            $img->move($savePath, $name);
            //save image url to database
            $slider->img_name = $name;
            $slider->save();
            echo '..complete upload';
            //resize image
//            $img = new \Imagine\Gd\Imagine();
//            $resize = new \Imagine\Image\Box(1920, 400);
//            $img->open($savePath . '/' . $name)->resize($resize)->save($savePath . '/' . $name);
        }

        return \Redirect::back();
    }

}
