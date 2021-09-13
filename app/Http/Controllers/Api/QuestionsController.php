<?php namespace App\Http\Controllers\Api;

use App\Property;
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

    public function indexPublic($property) {
        $property = Property::where('slug', $property)->first();
        return response()->json( Question::where('response', '!=','')->where('property_id', $property->id)->paginate(10) );
    }
    public function destroy($id)
    {
        Question::find($id)->delete();

        return response()->json(['code' => 'ok']);
    }

    public function update(Request $request, $id)
    {
        Question::find($id)->update(['response' => $request->answer]);

        return response()->json(['code' => 'ok']);
    }

    public function create(Request $request)
    {
        $data = $request->all();
        $data['response'] = '';
        $item = new Question($data);
        $item->save();

        return response()->json(['code' => 'ok','question' => $item]);
    }

    public function paginated()
    {
        return response()->json( Question::with('property')->paginate(50) );
    }
}
