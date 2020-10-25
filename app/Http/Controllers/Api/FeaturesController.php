<?php namespace App\Http\Controllers\Api;

use App\Feature;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FeaturesController extends Controller
{
    function index() {
        return response()->json( Feature::ind() );
    }
    
    function show($id) {
        $feature = static::get($id);
        
        return response()->json( $feature->pluck('value', 'key', 'id') );
    }
    
    function store(Request $request) {
        return response()->json([]);
    }
    
    function update(Request $request, $id) {
        $data = [
            'feature_category_id'   => $request->category,
            'picture'               => $request->image,
            'name'                  => $request->name
        ];
        
        if (!empty(Feature::find($id)->first())) {
            Feature::find($id)->update($data);
        } else {
            Feature::create($data);
        }
      
        return response()->json(['code' => 'ok']);
    }
    
    function destroy($id) {
        Feature::find($id)->delete();
        
        return response()->json(['code' => 'ok']);
    }

}
