<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use Auth;
use Image;

/**
 * Class FilesController
 * Handles files uploads
 *
 * @package App\Http\Controllers\Api
 */

class FilesController extends Controller
{
    /**
     * Saves uploaded file
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function addNewFile(Request $request): JsonResponse
    {
        request()->validate([
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $user_id = Auth::user()->id;

        $uploadedFile = $request->file('file');

        $uploadedFile = Storage::putFile('public/uploads/' . $user_id . '/img', $request->file('file'));
        $uploadedFile = explode('/', $uploadedFile);
        $filename = end($uploadedFile);

        $url = asset(Storage::url('uploads/' . $user_id)) . '/img/' . $filename;

        return Response::json([
            'status' => 'success',
            'url'    => $url,
        ], 200);

    }

    /**
     * Deletes uploaded file
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function deleteFile(Request $request): JsonResponse
    {
        $user_id = Auth::user()->id;
        if (!$user_id) {
            abort(403);
        }
        $uploadedFile = $request->value;
        $uploadedFile = explode('/', $uploadedFile);
        $uploadedFile = end($uploadedFile);

        if (Storage::exists('public/uploads/' . $user_id . '/img/' . $uploadedFile)){
            Storage::delete('public/uploads/' . $user_id . '/img/' . $uploadedFile);
        }
        return Response::json([
            'status' => 'success',
            'url'    => '',
        ], 200);
    }

    /**
     * Gets all files for the authorized user
     * @return JsonResponse
     */
    public function getUserFiles(): JsonResponse
    {
        $a_files = null;
        $files = Storage::disk('local')->allFiles('public\\uploads\\' . Auth::id() . '\\img\\');
        foreach ($files as $file){
            $a_files[] = '/' . str_replace('public', 'storage', $file);
        }

        return response()->json($a_files);
    }

}
