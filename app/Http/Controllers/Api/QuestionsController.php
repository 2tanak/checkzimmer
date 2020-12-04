<?php namespace App\Http\Controllers\Api;

use App\RoomType;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Question;

class QuestionsController extends Controller
{
    public function index()
    {
        return response()->json( Question::all() );
    }

    public function destroy($id) {
        Question::find($id)->delete();

        return response()->json(['code' => 'ok']);
    }

    public function update(Request $request, $id) {
        Question::find($id)->update(['response' => $request->answer]);

        return response()->json(['code' => 'ok']);
    }

    public function create(Request $request) {
        $data = [
            'question' => $request->question,
            'property_id' => (int) $request->property_id,
            'response' => '',
        ];

        $item = new Question($data);
        $item->save();

        return redirect('/');
    }

    public function paginated() {
        return response()->json( Question::where('response', '!=', '')->paginate(50) );
    }
}
