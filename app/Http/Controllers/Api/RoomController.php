<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Option;
use App\Property;
use App\Room;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * Class RoomController
 * Handles CRUD for rooms
 *
 * @package App\Http\Controllers\Api
 */

class RoomController extends Controller
{
    /**
     * Creates a new room
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        request()->validate([
//            'bed'          => 'required',
//            'kitchen'      => 'required',
//            'person'       => 'required',
//            'price'        => 'required',
//            'property_id'  => 'required',
//            'room_type_id' => 'required',
//            'native_id'    => 'required',
//            'shower'       => 'required',
//            'status'       => 'required',
//            'number'       => 'required',
        ]);

        $data = [
            'bed'          => $request->bed,
            'kitchen'      => $request->kitchen,
            'person'       => $request->person,
            'price'        => $request->price,
            'property_id'  => $request->property_id,
            'room_type_id' => $request->room_type_id,
            'native_id'    => $request->native_id,
            'shower'       => $request->shower,
            'status'       => $request->status,
            'number'       => $request->number,
            'options'      => $request->options,
        ];

        $room = new Room();
        $room->fill($data);
        $room->push();

        foreach ($data['options'] as $optionData)
        {
            if (!$optionData['value'])
            {
                $optionData['value'] = '';
            }
            $room->options()->create($optionData);
        }

        return $room ? response()->json(['code' => 'ok', 'room' => $room]) : response()->json(['code' => 'error', 'message' => 'Ошибка сохранения']);
    }

    /**
     * Deletes a new room
     *
     * @param Room $room
     * @return JsonResponse
     * @throws \Exception
     */
    public function destroy(Room $room): JsonResponse
    {
        Option::where(['parent' => $room->id, 'type' => 'room'])->delete();
        $room->delete();

        return response()->json(['code' => 'ok']);
    }
}
