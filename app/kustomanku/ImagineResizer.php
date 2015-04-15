<?php

use Symfony\Component\HttpFoundation\File\File;
use Imagine\Image\ImagineInterface;
use Imagine\Image\BoxInterface;
use Imagine\Image\Point;
use Imagine\Image\Box;

class ImagineResizer {

    protected $imagine;
    protected $mode;
    protected $box;

    /**
     * 
     * @param \Imagine\Gd\Imagine $imagine
     * @param BoxInterface $box
     * @param type $mode
     */
    public function __construct(\Imagine\Gd\Imagine $imagine, BoxInterface $box, $mode = ImageInterface::THUMBNAIL_OUTBOUND) {
        $this->imagine = $imagine;
        $this->mode = $mode;
        $this->box = $box;
    }

//    public function __construct(ImagineInterface $imagine, BoxInterface $box, $mode = ImageInterface::THUMBNAIL_OUTBOUND) {
//        $this->imagine = $imagine;
//        $this->mode = $mode;
//        $this->box = $box;
//    }

    /**
     * 
     * @param File $file
     * @param type $destination
     * @return type
     */
    public function resize(File $file, $destination) {
        $file->move($destination, $file->getClientOriginalName());
        $filename = $file->getClientOriginalName();
        $image = $this->imagine->open($destination . '/' . $filename);
        //original size
        $srcBox = $image->getSize();
        //we scale on the smaller dimension
        if ($srcBox->getWidth() > $srcBox->getHeight()) {
            $width = $srcBox->getWidth() * ($this->box->getHeight() / $srcBox->getHeight());
            $height = $this->box->getHeight();
            //we center the crop in relation to the width
            $cropPoint = new Point((max($width - $this->box->getWidth(), 0)) / 2, 0);
        } else {
            $width = $this->box->getWidth();
            $height = $srcBox->getHeight() * ($this->box->getWidth() / $srcBox->getWidth());
            //we center the crop in relation to the height
            $cropPoint = new Point(0, (max($height - $this->box->getHeight(), 0)) / 2);
        }

        $box = new Box($width, $height);
        //we scale the image to make the smaller dimension fit our resize box
        $image = $image->thumbnail($box, \Imagine\Image\ImageInterface::THUMBNAIL_OUTBOUND);

        //and crop exactly to the box
        $image->crop($cropPoint, $this->box)
                ->save($destination . '/' . $filename);

        return $file->getClientOriginalName();
    }

    public static function crop($openPath, $savePath, Box $box) {
        $imgine = new \Imagine\Gd\Imagine();
//            $img->open($savePath . '/' . $name)->resize($box)->save($savePath . '/' . $name);
        $image = $imgine->open($openPath);

        $wFactor = (int) ($image->getSize()->getWidth() / $box->getWidth());
        $hFactor = (int) ($image->getSize()->getHeight() / $box->getHeight());

        if ($wFactor > $hFactor) {
            $box = new \Imagine\Image\Box($box->getWidth() * $hFactor, $box->getHeight() * $hFactor);
        } else {
            $box = new \Imagine\Image\Box($box->getWidth() * $wFactor, $box->getHeight() * $wFactor);
        }
        //cropping with aspect ratio
        $image->crop(new \Imagine\Image\Point(($image->getSize()->getWidth() - $box->getWidth()) / 2, ($image->getSize()->getHeight() - $box->getHeight()) / 2), $box);
        $image->save($savePath );
    }

}
