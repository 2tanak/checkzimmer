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
    function index()
    {
       return response()->json( Reviews::all() );
    }

    function destroy($id) {
        Reviews::find($id)->delete();
        
        return response()->json(['code' => 'ok']);
    }
    
    function update(Request $request, $id) {
       Reviews::find($id)->update(['status' => $request->status]);
       
       return response()->json(['code' => 'ok']);
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
