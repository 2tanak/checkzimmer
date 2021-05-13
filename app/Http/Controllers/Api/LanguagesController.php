<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LanguagesController extends Controller
{
    //
    public function index() {
        $files = scandir(__DIR__.'/../../../../resources/lang');
        $files = array_filter($files, function($item) {
            $slugs = explode('.', $item);
            $slugs = end($slugs);
            return $slugs == 'json';
        });
        return response()->json(array_values($files));
    }
    public function get($id) {
        if (!file_exists(__DIR__."/../../../../resources/lang/$id.json")) {
            $id = 'en';
        }
        return response(file_get_contents(__DIR__."/../../../../resources/lang/$id.json"));
    }
    public function create() {

    }
    public function update(Request $request, $id) {
        $file = __DIR__."/../../../../resources/lang/$id.json";
        file_put_contents($file, json_encode($request->get('data', JSON_UNESCAPED_UNICODE)));
        return response('');
    }
}
