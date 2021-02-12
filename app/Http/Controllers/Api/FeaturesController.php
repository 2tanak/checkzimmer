<?php namespace App\Http\Controllers\Api;

use App\Feature;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Option;

class FeaturesController extends Controller
{
    public function index()
    {
        $features = Feature::ind();
        foreach ($features as $key => $item){
            $features[$key]->order = $item->getCurrentOption('order') == '' ? 0 : (int) $item->getCurrentOption('order');
            $features[$key]->listShow = $item->getCurrentOption('listShow') == '' ? false : (bool) $item->getCurrentOption('listShow');
        }
        return response()->json($features);
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

        $option = Option::where('key', 'features')->where('parent', $feature->id)->first();
        $optionsData = [
            'key' => 'features',
            'parent' => $feature->id,
            'type' => 'property',
            'value' => json_encode(['listShow'=>$request->listShow, 'order'=>$request->order]),
        ];
        if ($option!=null) {
            $option->update($optionsData);
        } else {
            $option->Option::create($optionsData);
        }
        $option->save();
        return response()->json(['code' => 'ok', 'feature' => $feature]);
    }

    public function destroy($id)
    {
        Feature::find($id)->delete();

        return response()->json(['code' => 'ok']);
    }

}
