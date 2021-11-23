<?php namespace App\Http\Controllers\Api;

use App\Property;
use App\RoomType;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Question;

/**
 * Class QuestionsController
 * Handles CRUD for questions asked about property
 *
 * @package App\Http\Controllers\Api
 */
class QuestionsController extends Controller
{
    /**
     * Returns all questions
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return response()->json( Question::all() );
    }

    /**
     * Returns all published questions
     * @param $property
     * @return JsonResponse
     */
    public function indexPublic($property): JsonResponse
    {
        $property = Property::where('slug', $property)->first();
        return response()->json( Question::where('response', '!=','')->where('property_id', $property->id)->paginate(10) );
    }

    /**
     * Remove the specific question
     * @param $id
     * @return JsonResponse
     */
    public function destroy($id): JsonResponse
    {
        Question::find($id)->delete();
        return response()->json(['code' => 'ok']);
    }

    /**
     * Update question data
     *
     * @param Request $request
     * @param $id
     * @return JsonResponse
     */
    public function update(Request $request, $id): JsonResponse
    {
        Question::find($id)->update(['response' => $request->answer]);

        return response()->json(['code' => 'ok']);
    }

    /**
     * Create new question
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function create(Request $request): JsonResponse
    {
        $data = $request->all();
        $data['response'] = '';
        $item = new Question($data);
        $item->save();

        return response()->json(['code' => 'ok','question' => $item]);
    }

    /**
     * Return paginated list of questions
     * @return JsonResponse
     */
    public function paginated(): JsonResponse
    {
        return response()->json( Question::with('property')->paginate(50) );
    }
}
