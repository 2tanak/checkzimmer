<?php namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Option;
use App\Http\Requests\PropertyListRequest;
use App\Property;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Reviews;
use Auth;
use App\User;
use Illuminate\Support\Str;

/**
 * Class ReviewsController
 * Handles property rating
 *
 * @package App\Http\Controllers\Api
 */

class ReviewsController extends Controller
{
    /**
     * Returns all reviews
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
       return response()->json( Reviews::all() );
    }

    /**
     * Returns paginated list of reviews
     * @return JsonResponse
     */
    public function paginated()
    {
        return response()->json( Reviews::paginate(10) );
    }

    /**
     * Returns published reviews
     * @param $property
     * @return JsonResponse
     */
    public function reviewsPublic($property): JsonResponse
    {
        $property = Property::where('slug', $property)->first();
        return response()->json( Reviews::where('status', '1')->where('property_id', $property->id)->paginate(10) );
    }

    /**
     * Remove the specific review
     * @param $id
     * @return JsonResponse
     */
    public function destroy($id): JsonResponse
    {
        Reviews::find($id)->delete();
        return response()->json(['code' => 'ok']);
    }

    /**
     * Update the specific review
     *
     * @param Request $request
     * @param $id
     * @return JsonResponse
     */
    public function update(Request $request, $id): JsonResponse
    {
       Reviews::find($id)->update(['status' => $request->status]);
       return response()->json(['code' => 'ok']);
    }

    /**
     * Creates new review
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function create(Request $request): JsonResponse
    {
        $data = $request->all();
        request()->validate([
            'name' => 'required',
            'company' => 'required',
            'title' => 'required',
            'description' => 'required',
            'rating' => 'required',
        ]);
        if ($this->checkRecaptha($data['grecaptcha'])) {
            $item = new Reviews($data);
            $item->save();

            return response()->json(['code' => 'ok','review' => $item]);
        } else {
            return response()->json(['code' => 'error']);
        }
    }

    /**
     * Checks Google Recaptcha data to filter spam
     * @param $response
     * @return bool
     */
    public function checkRecaptha($response): bool
    {
        if (isset($response)) {
            $recaptcha_url = 'https://www.google.com/recaptcha/api/siteverify';
            $recaptcha_secret = env('GOOGLE_RECAPTHCA3_SECRET');
            $recaptcha = file_get_contents($recaptcha_url . '?secret=' . $recaptcha_secret . '&response=' . $response);
            $recaptcha = json_decode($recaptcha);

            if (!isset($recaptcha->score) || $recaptcha->score < 0.5) {
                return false;
            }
            return true;
        }
        return false;
    }
}
