<?php namespace App\Http\Controllers\Api;

use App\Guest;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GuestsController extends Controller
{
    public function index()
    {
        $guests = Guest::all();
        return response()->json(
            [
                'status' => 'success',
                'guests' => $guests->toArray()
            ], 200);
    }

    public function show($id)
    {
        $guest = Guest::find($id);
        return response()->json(
            [
                'status' => 'success',
                'user' => $guest->toArray()
            ], 200);
    }

    public function store(Request $request)
    {
        request()->validate([
            'pin' => 'required',
            'email' => 'required|email|unique:guests'
        ]);

        $data = $request->input();
        $item = new Guest($data);
        $item->save();
        return $item ? response()->json(['code' => 'ok', 'guest' => $item]) : response()->json(['code' => 'error', 'message' => 'Ошибка сохранения']);
    }

    public function update(Request $request, $id)
    {
        request()->validate([
            'pin'     => 'required',
            'email'    => 'required|email'
        ]);
        $guest = Guest::find($id);

        return $guest->update($request->input()) ? response()->json(['code' => 'ok']) : response()->json(['code' => 'error', 'message' => 'Ошибка сохранения']);
    }

    public function destroy($id)
    {
        Guest::find($id)->delete();
        return response()->json(['code' => 'ok']);
    }
}