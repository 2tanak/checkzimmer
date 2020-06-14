<?php namespace App\Http\Controllers\Api;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    function index() {
        return response()->json( User::all() );
    }
    function show($id) {
        $option = Option::withParams($id, ['type' => Option::$optionType]);
        /*if (!$option) {
            return response()->json( [] );
        }*/
        return response()->json( $option->pluck('value', 'key', 'id') );
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
