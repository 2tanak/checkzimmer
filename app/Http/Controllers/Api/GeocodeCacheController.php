<?php namespace App\Http\Controllers\Api;

use App\GeocodeCache;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class GeocodeCacheController extends Controller
{
    public function index() {
        return response()->json( GeocodeCache::all() );
    }

    public function update(Request $request, $id) {
        $geocodeCache = GeocodeCache::find($id);

        $time = Carbon::now();

        $geocodeCache->timestamp = $time->timestamp;

        return $geocodeCache->update($request->input()) ? response()->json(['code' => 'ok']) : response()->json(['code' => 'error','message' => 'Ошибка сохранения']);
    }

    public function destroy($id) {
        GeocodeCache::find($id)->delete();

        return response()->json(['code' => 'ok']);
    }

    public function store() {
        GeocodeCache::truncate();

        return response()->json(['code' => 'ok']);
    }
}
