<?php

namespace App\Services;

use Exception;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Str;
use Intervention\Image\Constraint;

class ImageService
{
    public function __construct()
    {

    }

    public function upload($image, $extension = 'webp', $quality = 100, $width = null, $height = null, $constraint = true)
    {
        $imageManager = new ImageManager( new Driver() );
        $imageName = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
        $imageNewName = $this->vnToStr($imageName) . '_' . Str::random(5) . '.' . $extension;
        $image = $imageManager->read($image);
        if ($constraint) {
            $image->scale($width, $height, function ($constraint) {
                $constraint->aspectRatio();
            });
        } else {
            $image->resize($width, $height);
        }
        $image->encodeByMediaType('image/' . $extension, $quality);
        try{
            $image->save(public_path('uploads/' . $imageNewName));
        } catch(Exception $e) {
            throw new Exception($e->getMessage());
        }
        return '/uploads/' . $imageNewName;
    }

    private function vnToStr($str)
    {
        $unicode = array(

            'a' => 'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ',

            'd' => 'đ',

            'e' => 'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',

            'i' => 'í|ì|ỉ|ĩ|ị',

            'o' => 'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',

            'u' => 'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',

            'y' => 'ý|ỳ|ỷ|ỹ|ỵ',

            'A' => 'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',

            'D' => 'Đ',

            'E' => 'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',

            'I' => 'Í|Ì|Ỉ|Ĩ|Ị',

            'O' => 'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',

            'U' => 'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',

            'Y' => 'Ý|Ỳ|Ỷ|Ỹ|Ỵ',

        );
        foreach ($unicode as $nonUnicode => $uni) {

            $str = preg_replace("/($uni)/i", $nonUnicode, $str);
        }
        $str = str_replace(' ', '_', $str);
        return $str;
    }
}
