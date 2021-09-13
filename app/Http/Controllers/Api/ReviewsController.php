<?php namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Option;
use App\Http\Requests\PropertyListRequest;
use App\Property;
use Illuminate\Http\Request;
use App\Reviews;
use Auth;
use App\User;
use Illuminate\Support\Str;

class ReviewsController extends Controller
{
    public function index()
    {
       return response()->json( Reviews::all() );
    }

    public function paginated()
    {
        return response()->json( Reviews::paginate(10) );
    }

    public function reviewsPublic($property) {
        $property = Property::where('slug', $property)->first();
        return response()->json( Reviews::where('status', '1')->where('property_id', $property->id)->paginate(10) );
    }
    public function destroy($id)
    {
        Reviews::find($id)->delete();

        return response()->json(['code' => 'ok']);
    }

    public function update(Request $request, $id)
    {
       Reviews::find($id)->update(['status' => $request->status]);

       return response()->json(['code' => 'ok']);
    }

    public function create(Request $request)
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

    public function checkRecaptha($response)
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
