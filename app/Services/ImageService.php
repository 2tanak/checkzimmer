<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\File\File;

class ImageService
{
    public function storeImage(UploadedFile $uploadedFile)
    {
        $imageName = time().'-'.Str::random(5).'.'.$uploadedFile->extension();
        $file = $uploadedFile->move(public_path('images/uploaded/'.date('Y/m/d')), $imageName);
        return $this->preparePublicImageUrl($file->getRealPath());
    }

    public function storeImageBase64(string $base64)
    {
        if (preg_match('/^data:image\/(\w+);base64,/', $base64)) {
            $data = substr($base64, strpos($base64, ',') + 1);

            $data = base64_decode($base64);
            $extension = explode('/', mime_content_type($base64))[1];
            $imageName = time().'-'.Str::random(5).'.' . $extension;
            Storage::disk('local')->put($imageName, $data);
        }
        return '123';
    }

    public function preparePublicImageUrl(string $url)
    {
        return str_replace(base_path(), '', $url);
    }

}
