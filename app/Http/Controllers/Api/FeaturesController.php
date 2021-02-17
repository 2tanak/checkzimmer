<?php namespace App\Http\Controllers\Api;

use App\Feature;
use App\Http\Controllers\Controller;
use App\Option;
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
            'ord' => $request->ord
        ];

        if (!empty(Feature::find($id))) {
            $feature = Feature::find($id);
        } else {
            $feature = new Feature;
        }
        $feature->fill($data);
        $feature->save();

        $option = Option::where('key', 'inlist')->where('type', 'feature')->where('parent', $feature->id)->first();
        if (!$option) {
            $option = new Option;
            $option->fill([
                'key' => 'inlist',
                'parent' => $feature->id,
                'type' => 'feature'
            ]);
        }
        $option->value = $request->inlist ?? '';
        $option->save();

        return response()->json(['code' => 'ok', 'feature' => $feature]);
    }

    public function destroy($id)
    {
        Feature::find($id)->delete();

        return response()->json(['code' => 'ok']);
    }

}
