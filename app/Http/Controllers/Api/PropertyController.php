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
        $km = $data['km'] ? $data['km']  : 10;
        $people = $data['people'];

        $client = new \GuzzleHttp\Client();
        $geocoder = new Geocoder($client);
        $geocoder->setApiKey(config('geocoder.key'));
        $geocoder->setCountry(config('geocoder.country', 'US'));
        $geo_data = $geocoder->getCoordinatesForAddress($address);

        $objects = Property::where(Property::raw('abs('.$geo_data['lat'].' - lat) * 111'), '<', $km)->where(Property::raw('abs('.$geo_data['lng'].' - lng) * 111'), '<', $km)->paginate(5);

        return response()->json($objects);

    }

    function show($id) {
        return response()->json(Property::findOrFail($id));
    }
    function init() {
        $property = Property::orderBy('created_at')->limit(10)->get();
        return response()->json($property);
    }
}
