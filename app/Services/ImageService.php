<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;
use Imagick;
use Spatie\ImageOptimizer\OptimizerChainFactory;
use Symfony\Component\HttpFoundation\File\File;

/**
 * Class ImageService
 * Provides images upload features
 *
 * @package App\Http\Services
 */

class ImageService
{
    const ALLOWED_TYPES = [
        'image/png', 'image/jpeg'
    ];
    const SIZES = [
        'small500' => 500,
        'thumbs300' => 300,
        'thumbs170' => 170
    ];

    /**
     * Save the uploaded image
     *
     * @param UploadedFile $uploadedFile
     * @return array|false|string|string[]
     */
    public function storeImage(UploadedFile $uploadedFile)
    {
        $imageName = time().'-'.Str::random(5).'.'.$uploadedFile->extension();

        if (!$this->fileVerify($uploadedFile->getPathname())) {
            return false;
        }
        $file = $uploadedFile->move(public_path('images/uploaded/'.date('Y/m/d')), $imageName);

        $this->thumbsUp($file->getRealPath());
        $this->optimize($file->getRealPath());
        $this->thumbsOptimize($file->getRealPath());
        $this->webpAll($file->getRealPath());

        return str_replace('\\', '/', str_replace('/public', '', $this->preparePublicImageUrl($file->getRealPath())));
    }

    /**
     * Save the provided image encoded in base64
     * @param string $base64
     * @return false|string
     */
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

        $file = Storage::disk('local')->path($imageName);
        $this->thumbsUp($file);
        $this->optimize($file);
        $this->thumbsOptimize($file);
        $this->webpAll($file);

        return URL::asset('storage/' . $imageName);
    }

    /**
     * Get public URL for the stored image
     *
     * @param string $url
     * @return array|string|string[]
     */
    public function preparePublicImageUrl(string $url)
    {
        return str_replace(base_path(), '', $url);
    }

    /**
     * Verify the file is valid
     *
     * @param $file
     * @return bool
     */
    function fileVerify($file): bool
    {
        $verifyImg = getimagesize($file);
        return array_search($verifyImg['mime'], self::ALLOWED_TYPES) !== false;
    }

    /**
     * Optimize the uploaded image
     *
     * @param $image
     */
    public function optimize($image)
    {
        try {
            $optimizer = OptimizerChainFactory::create();
            $optimizer->optimize($image);
        } catch (\Exception $e) {
            echo 'Exception caught: ',  $e->getMessage(), "\r\n";
        }

    }

    /**
     * Resize the provided image
     *
     * @param $image
     * @param $k
     * @param $output
     * @return bool|void
     */
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

    /**
     * Create a webp image from the provided one
     * @param $image
     * @param $output
     * @return bool|void
     */
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

    /**
     * Create a set of smaller images for the provided one
     *
     * @param $image
     */
    function thumbsUp($image) {
        foreach (self::SIZES as $key => $size) {
            list($width, $height) = getimagesize($image);
            $destFile = str_replace('/images/uploaded', '/images/'.$key, $image);
            $this->checkDirectory($destFile);
            $k = $size / $width;
            $this->imageResize($image, $k, $destFile);
        }
    }

    /**
     * Optimize smaller images of the provided one
     * @param $image
     */
    function thumbsOptimize($image) {
        foreach (self::SIZES as $key => $size) {
            $destFile = str_replace('/images/uploaded', '/images/'.$key, $image);
            $this->optimize($destFile);
        }
    }

    /**
     * Create webP images for the provided image and it's smaller versions
     * @param $image
     */
    function webpAll($image) {
        $destFile = str_replace('/images/uploaded', '/images/webp/uploaded', $image);
        $this->checkDirectory($destFile);
        $this->imageWebP($image, $destFile);

        foreach (self::SIZES as $key => $size) {
            $srcFile = str_replace('/images/uploaded', '/images/'.$key, $image);
            $destFile = str_replace('/images/uploaded', '/images/webp/'.$key, $image);
            $this->checkDirectory($destFile);
            $this->imageWebP($srcFile, $destFile);
        }
    }

    /**
     * Check if a directory exists and reate one if it's not
     * @param $destFile
     * @param false $isDir
     */
    function checkDirectory($destFile, $isDir = false) {
        if (!$isDir) {
            $destSlugs = explode('/', $destFile);
            array_pop($destSlugs);
            $destDir = implode('/', $destSlugs);
        } else {
            $destDir = $destFile;
        }
        if (!file_exists($destDir)) {
            mkdir($destDir);
        }
    }
}
