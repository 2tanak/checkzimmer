<?php namespace App\Http\Controllers\Api;

use App\Guest;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Psy\Util\Json;

/**
 * Class GuestsController
 * Handles CRUD for website guests (users with no authorization but with special access)
 *
 * @package App\Http\Controllers\Api
 */

class GuestsController extends Controller
{
    /**
     * Get all guests
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $guests = Guest::all();
        return response()->json(
            [
                'status' => 'success',
                'guests' => $guests->toArray()
            ], 200);
    }

    /**
     * Returns the specific guest data
     * @param int $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        $guest = Guest::find($id);
        return response()->json(
            [
                'status' => 'success',
                'user' => $guest->toArray()
            ], 200);
    }

    /**
     * Stores new guest in the database
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $data = $request->input();
        request()->validate([
            'pin' => ['required'],
            'email' => ['required','email',Rule::unique('guests')->ignore($data['id'])],
        ]);
        if($data['id']){
            $item = Guest::find($data['id']);
            $item->fill($data);
        }else{
            $item = new Guest($data);
        }

        $item->save();
        return $item ? response()->json(['code' => 'ok', 'guest' => $item]) : response()->json(['code' => 'error', 'message' => 'Ошибка сохранения']);
    }

    /**
     * Updates the specific guest data
     *
     * @param Request $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(Request $request, int $id): JsonResponse
    {
        request()->validate([
            'pin'     => 'required',
            'email'    => 'required|email'
        ]);
        $guest = Guest::find($id);

        return $guest->update($request->input()) ? response()->json(['code' => 'ok']) : response()->json(['code' => 'error', 'message' => 'Ошибка сохранения']);
    }

    /**
     * Deletes the specific guest
     *
     * @param $id
     * @return JsonResponse
     */
    public function destroy($id): JsonResponse
    {
        Guest::find($id)->delete();
        return response()->json(['code' => 'ok']);
    }
}
