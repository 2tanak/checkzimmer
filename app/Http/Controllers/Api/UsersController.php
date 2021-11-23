<?php namespace App\Http\Controllers\Api;

use App\User;
use Auth;
use Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * Class UsersController
 * Handles CRUD for users
 *
 * @package App\Http\Controllers\Api
 */

class UsersController extends Controller
{
    /**
     * Show all users
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $users = User::all();
        return response()->json(
            [
                'status' => 'success',
                'users' => $users->toArray()
            ], 200);
    }

    /**
     * Return the specific user data
     * @param $id
     * @return JsonResponse
     */
    public function show($id): JsonResponse
    {
        $user = User::find($id);
        return response()->json(
            [
                'status' => 'success',
                'user' => $user->toArray()
            ], 200);
    }

    /**
     * Creates new user
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
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

    /**
     * Updates user data
     *
     * @param Request $request
     * @param $id
     * @return JsonResponse
     */
    public function update(Request $request, $id): JsonResponse
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

    /**
     * Delete the specific user
     * @param $id
     * @return JsonResponse
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return response()->json(['code' => 'ok']);
    }
}
