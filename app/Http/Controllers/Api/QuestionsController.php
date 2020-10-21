<?php namespace App\Http\Controllers\Api;

use App\RoomType;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Question;

class QuestionsController extends Controller
{
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
