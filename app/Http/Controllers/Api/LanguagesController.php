<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

/**
 * Class ImageUploadController
 * Handles website languages
 *
 * @package App\Http\Controllers\Api
 */
class LanguagesController extends Controller
{
    /**
     * Returns all existing languages
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $files = scandir(__DIR__.'/../../../../resources/lang');
        $files = array_filter($files, function($item) {
            $slugs = explode('.', $item);
            $slugs = end($slugs);
            return $slugs == 'json';
        });
        return response()->json(array_values($files));
    }

    /**
     * Returns the specific language data
     * @param $id
     * @return Response
     */
    public function get($id): Response
    {
        if (!file_exists(__DIR__."/../../../../resources/lang/$id.json")) {
            $id = 'en';
        }
        return response(file_get_contents(__DIR__."/../../../../resources/lang/$id.json"));
    }

    /**
     * Create a new language
     */
    public function create() {
        // No new languages mechanics for now
    }

    /**
     * Update the specific language data
     *
     * @param Request $request
     * @param $id
     * @return JsonResponse
     */
    public function update(Request $request, $id): JsonResponse
    {
        $file = __DIR__."/../../../../resources/lang/$id.json";
        file_put_contents($file, json_encode($request->get('data', JSON_UNESCAPED_UNICODE)));
        return response()->json([ 'success' => true ]);
    }
}
