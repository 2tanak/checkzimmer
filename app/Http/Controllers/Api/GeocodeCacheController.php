<?php namespace App\Http\Controllers\Api;

use App\GeocodeCache;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

/**
 * Class GeocodeCacheController
 * Handles geocoder cache objects
 *
 * @package App\Http\Controllers\Api
 */

class GeocodeCacheController extends Controller
{
    /**
     * Get all objects
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return response()->json( GeocodeCache::all() );
    }

    /**
     * Update cache object
     *
     * @param Request $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(Request $request, int $id): JsonResponse
    {
        $geocodeCache = GeocodeCache::find($id);

        $time = Carbon::now();

        $geocodeCache->timestamp = $time->timestamp;

        return $geocodeCache->update($request->input()) ? response()->json(['code' => 'ok']) : response()->json(['code' => 'error','message' => 'Ошибка сохранения']);
    }

    /**
     * Remove cache object
     *
     * @param $id
     * @return JsonResponse
     */
    public function destroy($id): JsonResponse
    {
        GeocodeCache::find($id)->delete();

        return response()->json(['code' => 'ok']);
    }

    /**
     * Truncates data in cache
     *
     * @return JsonResponse
     */
    public function store(): JsonResponse
    {
        GeocodeCache::truncate();

        return response()->json(['code' => 'ok']);
    }
}
