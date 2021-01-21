<?php namespace App\Http\Controllers\Api;

use App\Feature;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FeaturesController extends Controller
{
    public function index()
    {
        return response()->json(Feature::ind());
    }

    public function show($id)
    {
        $feature = static::get($id);

        return response()->json($feature->pluck('value', 'key', 'id'));
    }

    public function store(Request $request)
    {
        return response()->json([]);
    }

    public function update(Request $request, $id)
    {
        $data = [
            'feature_category_id' => $request->category,
            'picture' => $request->image,
            'name' => $request->name,
            'ord' => 0
        ];
        $data['ord'] = 0;

        if (!empty(Feature::find($id))) {
            $feature = Feature::find($id)->update($data);
        } else {
            $feature = Feature::create($data);
        }

        return response()->json(['code' => 'ok', 'feature' => $feature]);
    }

    public function destroy($id)
    {
        Feature::find($id)->delete();

        return response()->json(['code' => 'ok']);
    }

}
