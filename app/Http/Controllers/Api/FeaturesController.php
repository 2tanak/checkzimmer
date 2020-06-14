<?php namespace App\Http\Controllers\Api;

use App\Feature;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FeaturesController extends Controller
{
    function index() {
        return response()->json( Feature::ind() );
    }
    function show($id) {
        $feature = static::get($id);
        return response()->json( $feature->pluck('value', 'key', 'id') );
    }
    function store(Request $request) {
        return response()->json([]);
    }
    function update(Request $request, $id) {

        return response()->json([]);
    }
    function delete($id) {
        return response()->json(['code' => 'ok']);
    }
}
