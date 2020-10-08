<?php namespace App\Http\Controllers\Api;

use App\Statistic;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StatisticController extends Controller
{
    function index() {
        return response()->json( Statistic::all() );
    }
    
    function show($id) {
        $option = Statistic::find($id);
        
        return response()->json( $option->pluck('value', 'key', 'id') );
    }
    
    function store(Request $request) {
        $data = $request->input();

        $item = new Statistic($data);
        $item->save();
        
        return $item ? response()->json(['code' => 'ok','user' => $item]) : response()->json(['code' => 'error','message' => 'Ошибка сохранения']);
    }
    
    function update(Request $request, $id) {
        $roomType = Statistic::find($id);
        
        return $roomType->update($request->input()) ? response()->json(['code' => 'ok']) : response()->json(['code' => 'error','message' => 'Ошибка сохранения']);
    }
    
    function destroy($id) {
        Statistic::find($id)->delete();
        
        return response()->json(['code' => 'ok']);
    }
}
