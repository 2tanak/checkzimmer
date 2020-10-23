<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\ImageUploadRequest;
use App\Services\ImageService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ImageUploadController
{
    /**
     * @var ImageService
     */
    private $imageService;

    /**
     * ImageUploadController constructor.
     * @param ImageService $imageService
     */
    public function __construct(ImageService $imageService)
    {
        $this->imageService = $imageService;
    }

    /**
     * Display a listing of the resource.
     *
     * @param ImageUploadRequest $request
     * @return JsonResponse
     */
    public function imageUploadPost(Request $request): JsonResponse
    {

        $image = $this->imageService->storeImage($request->image);

        return response()->json(['image' => str_replace("/public", "", $image)]);

    }
}
