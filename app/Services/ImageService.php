<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
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

    public function preparePublicImageUrl(string $url)
    {
        return str_replace(base_path(), '', $url);
    }

}
