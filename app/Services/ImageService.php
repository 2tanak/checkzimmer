<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;
use Imagick;
use Spatie\ImageOptimizer\OptimizerChainFactory;
use Symfony\Component\HttpFoundation\File\File;

class ImageService
{
    const ALLOWED_TYPES = [
        'image/png', 'image/jpeg'
    ];

    public function storeImage(UploadedFile $uploadedFile)
    {
        $imageName = time().'-'.Str::random(5).'.'.$uploadedFile->extension();

        if (!$this->fileVerify($uploadedFile->getPathname())) {
            return false;
        }
        $file = $uploadedFile->move(public_path('images/uploaded/'.date('Y/m/d')), $imageName);

        $this->optimize($file->getRealPath());

        return str_replace('\\', '/', str_replace('/public', '', $this->preparePublicImageUrl($file->getRealPath())));
    }

    public function storeImageBase64(string $base64)
    {
        $data = substr($base64, strpos($base64, ',') + 1);

        $data = base64_decode($data);

        $extension = explode('/', mime_content_type($base64))[1];
        $imageName = time().'-'.Str::random(5).'.' . $extension;
        $imageName = 'public/images/uploaded/'.date('Y/m/d') . $imageName;
        Storage::disk('local')->put($imageName, $data);

        if (!$this->fileVerify(Storage::disk('local')->path($imageName))) {
            Storage::disk('local')->delete($imageName);
            return false;
        }

        $this->noExif(Storage::disk('local')->path($imageName));

        return URL::asset('storage/' . $imageName);
    }

    public function preparePublicImageUrl(string $url)
    {
        return str_replace(base_path(), '', $url);
    }

    function fileVerify($file): bool {
        $verifyImg = getimagesize($file);
        return array_search($verifyImg['mime'], self::ALLOWED_TYPES) !== false;
    }

    public function optimize($image) {
        try {
            $optimizer = OptimizerChainFactory::create();
            $optimizer->optimize($image);
        } catch (\Exception $e) {
            echo 'Exception caught: ',  $e->getMessage(), "\r\n";
        }

    }
    public function imageResize($image, $k, $output) {
        try {
            list($width, $height) = getimagesize($image);
            $slugs = explode('.', $image);
            $extension = strtolower(end($slugs));
            if ($extension === 'png') {
                $image = imagecreatefrompng($image);
                $imgResized = imagescale($image, round($width*$k), round($height*$k));
                imagepng($imgResized, $output);
            } elseif ($extension === 'jpg'  || $extension === 'jpeg') {
                $image = imagecreatefromjpeg($image);
                $imgResized = imagescale($image, round($width*$k), round($height*$k));
                imagejpeg($imgResized, $output);
            } elseif ($extension === 'webp') {
                $image = imagecreatefromwbmp($image);
                $imgResized = imagescale($image, round($width*$k), round($height*$k));
                imagewebp($imgResized, $output);
            } else {
                return false;
            }
            imagedestroy($imgResized);
            return true;
        } catch (\Exception $e) {
            echo 'Exception caught: ',  $e->getMessage(), "\r\n";
        }
    }
    public function imageWebP($image, $output) {
        try {
            $slugs = explode('.', $image);
            $extension = strtolower(end($slugs));
            if ($extension === 'png') {
                $image = imagecreatefrompng($image);
            } elseif ($extension === 'jpg'  || $extension === 'jpeg') {
                $image = imagecreatefromjpeg($image);
            } else {
                return false;
            }
            imagepalettetotruecolor($image);
            imagewebp($image, $output, 80);
            imagedestroy($image);
            return true;
        } catch (\Exception $e) {
            echo 'Exception caught: ',  $e->getMessage(), "\r\n";
        }
    }

}
