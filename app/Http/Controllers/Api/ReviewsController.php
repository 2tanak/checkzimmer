<?php namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Option;
use App\Http\Requests\PropertyListRequest;
use Illuminate\Http\Request;
use App\Reviews;
use Auth;
use App\User;
use Illuminate\Support\Str;

class ReviewsController extends Controller
{
    function index(PropertyListRequest $request)
    {
        $objects = Reviews::indPaginated();
       
        return response()->json(['objects' => $objects]);
    }

    function destroy(Property $property) {

    }

    function create(Request $request) {
        request()->validate([
            'name'              => 'required',
            'company'           => 'required',
            'title'             => 'required',
            'description'       => 'required',
        ]);

        $data = [
            'name'          => $request->name,
            'company'       => $request->company,
            'title'         => $request->title,
            'description'   => $request->description,
            'property_id'   => $request->property_id,
        ];

        $item = new Reviews($data);
        $item->save();

        return redirect('/');
    }
}
