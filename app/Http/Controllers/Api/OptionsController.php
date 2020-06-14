<?php namespace App\Http\Controllers\Api;

use App\Option;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OptionsController extends Controller
{
    function index() {
        return response()->json( Option::all() );
    }
    function show($id) {
        $option = Option::withParams($id, ['type' => Option::$optionType]);
        /*if (!$option) {
            return response()->json( [] );
        }*/
        return response()->json( $option->pluck('value', 'key', 'id') );
    }
    function showByType($type) {
        $options = Option::params(['type' => $type]);
        return response()->json( $options->pluck('value', 'key') );
    }
    function store(Request $request) {

        return response()->json(['111']);
    }
    function update(Request $request, $id) {
        $fields = $request->all();
        foreach($fields as $key => $value) {
            Option::upd([ 'key' => $key, 'value' => $value, 'type' => $id, 'parent' => 0 ], ['key' => $key, 'type' => $id]);
        }
        return response()->json(['222']);
    }
    function delete($id) {
        return response()->json(['code' => 'ok']);
    }
}
