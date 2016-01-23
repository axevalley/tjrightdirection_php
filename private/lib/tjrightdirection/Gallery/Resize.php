<?php
namespace tjrightdirection\Gallery;

class Resize
{
    private $image;
    private $width;
    private $height;
    public $imageResized;

    public function __construct($fileName)
    {
        $this->image = $this->openImage($fileName);
        $this->width = imagesx($this->image);
        $this->height = imagesy($this->image);

    }

    private function openImage($file)
    {
        $img = @imagecreatefromjpeg($file);
        return $img;
    }

    public function resizeImage($newSize)
    {
        if ($this->width == $this->height) {
            $optimalHeight = $newSize;
            $optimalWidth = $newSize;
        } else {
            $ratio = $this->width / $this->height;
            $optimalHeight = $newSize;
            $optimalWidth = $newSize * $ratio;
        }

        $this->imageResized = imagecreatetruecolor($optimalWidth, $optimalHeight);
        imagecopyresampled(
            $this->imageResized,
            $this->image,
            0,
            0,
            0,
            0,
            $optimalWidth,
            $optimalHeight,
            $this->width,
            $this->height
        );
    }

    public function saveImage($savePath, $imageQuality = "100")
    {
        $extension = strrchr($savePath, '.');
        $extension = strtolower($extension);

        switch ($extension) {
            case '.jpg':
            case '.jpeg':
                if (imagetypes() & IMG_JPG) {
                    imagejpeg($this->imageResized, $savePath, $imageQuality);
                }
                break;

            case '.gif':
                if (imagetypes() & IMG_GIF) {
                    imagegif($this->imageResized, $savePath);
                }
                break;

            case '.png':
                $scaleQuality = round(($imageQuality/100) * 9);
                $invertScaleQuality = 9 - $scaleQuality;

                if (imagetypes() & IMG_PNG) {
                    imagepng($this->imageResized, $savePath, $invertScaleQuality);
                }
                break;

            default:
                break;
        }

        imagedestroy($this->imageResized);
    }

    public function getBinaryImage()
    {
        ob_start();
        imagejpeg($this->imageResized);
        $image_string = ob_get_contents();
        ob_end_clean();
        return $image_string;
    }
}
