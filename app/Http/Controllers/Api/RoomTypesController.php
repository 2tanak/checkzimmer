<?php namespace App\Http\Controllers\Api;

use App\RoomType;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RoomTypesController extends Controller
{
    public function index() {
        return response()->json( RoomType::all() );
    }

    public function show($id) {
        $option = RoomType::withParams($id, ['type' => Option::$optionType]);

        return response()->json( $option->pluck('value', 'key', 'id') );
    }

    public function store(Request $request) {
        request()->validate([
            'name'      => 'required'
        ]);

        $data = $request->input();

        $item = new RoomType($data);
        $item->save();

        return $item ? response()->json(['code' => 'ok','user' => $item]) : response()->json(['code' => 'error','message' => 'Ошибка сохранения']);
    }

    public function update(Request $request, $id) {
        request()->validate([
            'name' => 'required',
        ]);

        $roomType = RoomType::find($id);

        return $roomType->update($request->input()) ? response()->json(['code' => 'ok']) : response()->json(['code' => 'error','message' => 'Ошибка сохранения']);
    }

    public function destroy($id) {
        RoomType::find($id)->delete();

        return response()->json(['code' => 'ok']);
    }
}
