<?php namespace App\Http\Controllers\Api;

use App\User;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    function index() {
        dd(Auth::user());
        exit;
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
        request()->validate([
            'name' => 'required',
            'password' => 'required|confirmed|min:5',
            'role' => 'required',
            'email' => 'required|email|unique:users'
        ]);
        $data = $request->input();
        $item = new User($data);
        $item->save();
        return $item ? response()->json(['code' => 'ok','user' => $item]) : response()->json(['code' => 'error','message' => 'Ошибка сохранения']);
    }


    function update(Request $request, $id) {

        request()->validate([
            'name' => 'required',
            'password' => 'confirmed|min:5',
            'email' => 'required|email'
        ]);
        $user = User::find($id);
        return $user->update($request->input()) ? response()->json(['code' => 'ok']) : response()->json(['code' => 'error','message' => 'Ошибка сохранения']);

    }
    function delete($id) {
        return response()->json(['code' => 'ok']);
    }
}
