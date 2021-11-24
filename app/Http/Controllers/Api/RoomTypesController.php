<?php namespace App\Http\Controllers\Api;

use App\RoomType;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * Class RoomTypesController
 * Handles CRUD for room types
 *
 * @package App\Http\Controllers\Api
 */

class RoomTypesController extends Controller
{
    /**
     * Returns all room types
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return response()->json( RoomType::all() );
    }

    /**
     * Returns the specific room type data
     * @param $id
     * @return JsonResponse
     */
    public function show($id): JsonResponse
    {
        $option = RoomType::withParams($id, ['type' => Option::$optionType]);

        return response()->json( $option->pluck('value', 'key', 'id') );
    }

    /**
     * Creates a new room type
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        request()->validate([
            'name' => 'required'
        ]);

        $data = $request->all();
        $data['picture'] = $data['picture'] ?? '';

        $item = new RoomType($data);
        $item->save();

        return $item ? response()->json(['code' => 'ok','roomType' => $item]) : response()->json(['code' => 'error','message' => 'Ошибка сохранения']);
    }

    /**
     * Updates room type data
     *
     * @param Request $request
     * @param $id
     * @return JsonResponse
     */
    public function update(Request $request, $id): JsonResponse
    {
        request()->validate([
            'name' => 'required',
        ]);

        $roomType = RoomType::find($id);
        return $roomType->update($request->input()) ? response()->json(['code' => 'ok']) : response()->json(['code' => 'error','message' => 'Ошибка сохранения']);
    }

    /**
     * Removes the specific room type
     * @param $id
     * @return JsonResponse
     */
    public function destroy($id): JsonResponse
    {
        RoomType::find($id)->delete();
        return response()->json(['code' => 'ok']);
    }
}
