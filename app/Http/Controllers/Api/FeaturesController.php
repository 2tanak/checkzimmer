<?php namespace App\Http\Controllers\Api;

use App\Feature;
use App\Http\Controllers\Controller;
use App\Option;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * Class FeaturesController
 * Handles property features
 *
 * @package App\Http\Controllers\Api
 */

class FeaturesController extends Controller
{
    /**
     * Shows all stored features
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $features = Feature::ind();
        foreach ($features as $key => $item) {
            $features[$key]->order = $item->getCurrentOption('order') == '' ? 0 : (int) $item->getCurrentOption('order');
            $features[$key]->listShow = $item->getCurrentOption('listShow') == '' ? false : (bool) $item->getCurrentOption('listShow');
        }
        return response()->json($features);
    }

    /**
     * Returns data for the specified feature
     *
     * @param int $id - feature ID
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        $feature = static::get($id);

        return response()->json($feature->pluck('value', 'key', 'id'));
    }

    /**
     * Stores new feature in the database
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        return response()->json([]);
    }

    /**
     * Updates data for the specified feature
     *
     * @param Request $request
     * @param $id
     * @return JsonResponse
     */
    public function update(Request $request, $id): JsonResponse
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

    /**
     * Removes the specified feature from the database
     * @param $id
     * @return JsonResponse
     */
    public function destroy($id)
    {
        Feature::find($id)->delete();

        return response()->json(['code' => 'ok']);
    }

    /**
     * Saves language data for features
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function language(Request $request): JsonResponse {
        $data = $request->all();
        if (!$data['id']) {
            $option = Option::create($data);
        } else {
            $option = Option::findOrFail($data['id']);
            $option->fill($data);
            $option->save();
        }
        return response()->json($option);
    }
}
