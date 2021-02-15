<?php namespace App\Http\Controllers\Api;

use App\User;
use Auth;
use Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::all();
        return response()->json(
            [
                'status' => 'success',
                'users' => $users->toArray()
            ], 200);
    }

    public function show($id)
    {
        $user = User::find($id);
        return response()->json(
            [
                'status' => 'success',
                'user' => $user->toArray()
            ], 200);
    }

    public function store(Request $request)
    {
        request()->validate([
            'name'     => 'required',
            'password' => 'required|confirmed|min:5',
            'role'     => 'required',
            'email'    => 'required|email|unique:users'
        ]);

        $data = $request->input();
        $data['password'] = Hash::make($data['password']);
        $item = new User($data);
        $item->save();
        return $item ? response()->json(['code' => 'ok', 'user' => $item]) : response()->json(['code' => 'error', 'message' => __('Saving error')]);
    }

    public function update(Request $request, $id)
    {
        request()->validate([
            'name'     => 'required',
            'email'    => 'required|email'
        ]);
        $data = $request->all();
        $user = User::find($id);

        if ($data['password'] ?? false) {
            $data['password'] = Hash::make($data['password']);
        } else {
            $data['password'] = $user->password;
        }

        return $user->update($data) ? response()->json(['code' => 'ok']) : response()->json(['code' => 'error', 'message' => __('Saving error')]);
    }

    public function destroy($id)
    {
        User::find($id)->delete();
        return response()->json(['code' => 'ok']);
    }
}
