<?php namespace App\Http\Controllers\Api;

use App\RoomType;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Question;

class QuestionsController extends Controller
{
    function index()
    {      
        return response()->json( Question::all() );
    }
     
    function destroy($id) {
        Question::find($id)->delete();
        
        return response()->json(['code' => 'ok']);
    }
   
    function update(Request $request, $id) {
        Question::find($id)->update(['response' => $request->answer]);
       
        return response()->json(['code' => 'ok']);
    }

    function create(Request $request) {
        $data = [
            'question'    => $request->question,
            'property_id'       => (int) $request->property_id,
            'response'       => '',
        ];

        $item = new Question($data);
        $item->save();
        
        return redirect('/');
    } 
}
