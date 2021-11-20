<?php namespace App\Http\Controllers\Api;

use App\Option;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * Class OptionsController
 * Handles options for different objects like website itself, properties, etc
 *
 * @package App\Http\Controllers\Api
 */

class OptionsController extends Controller
{
    /**
     * Show all saved options
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return response()->json( Option::all() );
    }

    /**
     * Gets the specific option data
     * @param $id
     * @return JsonResponse
     */
    public function show($id): JsonResponse
    {
        $option = Option::withParams($id, ['type' => Option::$optionType]);
        return response()->json( $option->pluck('value', 'key', 'id') );
    }

    /**
     * Get all options for the specified type
     * @param $type
     * @return JsonResponse
     */
    public function showByType($type): JsonResponse
    {
        $options = Option::params(['type' => $type]);
        return response()->json( $options->pluck('value', 'key') );
    }

    /**
     * Stores new option to the database
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        // No new option dynamics from this controller ATM
        return response()->json(['success' => true]);
    }

    /**
     * Update option
     * @param Request $request
     * @param $id
     * @return JsonResponse
     */
    public function update(Request $request, $id): JsonResponse
    {
        $fields = $request->all();
        foreach($fields as $key => $value) {
            Option::upd([ 'key' => $key, 'value' => $value, 'type' => $id, 'parent' => 0 ], ['key' => $key, 'type' => $id]);
        }
        return response()->json(['success' => true]);
    }

    /**
     * Delete the specified option
     * @param $id
     * @return JsonResponse
     */
    public function delete($id): JsonResponse
    {
        return response()->json(['code' => 'ok']);
    }
}
