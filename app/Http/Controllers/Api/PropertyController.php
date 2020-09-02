<?php namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Property;
use Spatie\Geocoder\Geocoder;


class PropertyController extends Controller
{
    function index()
    {

        return response()->json(Property::ind());
    }

    function query(Request $request){
        $data = $request->input();
        $address = $data['address'];
        $km = $data['km'];
        $people = $data['people'];

        $client = new \GuzzleHttp\Client();
        $geocoder = new Geocoder($client);
        $geocoder->setApiKey(config('geocoder.key'));
        $geocoder->setCountry(config('geocoder.country', 'US'));
        print_r($geocoder->getCoordinatesForAddress($address));
        //Sql....

    }

    function show($id) {
        return response()->json(Property::findOrFail($id));
    }
    function init() {
        $property = Property::orderBy('created_at')->limit(10)->get();
        return response()->json($property);
    }
}
