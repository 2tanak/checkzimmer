<?php namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Option;
use App\Http\Requests\PropertyListRequest;
use App\Services\GeocoderService;
use Illuminate\Http\Request;
use App\Property;
use Spatie\Geocoder\Geocoder;


class PropertyController extends Controller
{
    /**
     * @var GeocoderService
     */
    private $service;


    /**
     * PropertyController constructor.
     * @param GeocoderService $service
     */
    public function __construct(GeocoderService $service)
    {
        return response()->json(Property::ind());
        $this->service = $service;
    }

    function index(PropertyListRequest $request)
    {
        return response()->json(Property::indPaginated());
    }

    function queryFilter(Request $request){
        $data = $request->input();
        $address = $data['address'];
        $km = $data['km'] ? $data['km']  : 10;
        $people = $data['people'];

//        $geo_data = $geocoder->getCoordinatesForAddress($address);
        $geo_data = $this->service->getCoords($address);

        $objects = Property::where(Property::raw('abs('.$geo_data['lat'].' - lat) * 111'), '<', $km)
            ->where(Property::raw('abs('.$geo_data['lng'].' - lng) * 111'), '<', $km)->paginate(20);

        return response()->json($objects);

    }

    function show($id) {
        return response()->json(Property::findOrFail($id));
    }
    function init() {
        $property = Property::orderBy('created_at')->limit(10)->get();
        return response()->json($property);
    }
    function queryProperty(Request $request) {
        $fields = $request->all();
        $property = Property::whereIn('id', $fields['id'])->get();

        return response()->json($property);
    }
    function destroy(Property $property) {

        foreach ($property->rooms as $room) {
            Option::where(['parent' => $room->id, 'type' => 'room'])->delete();
        }
        $property->rooms()->delete();
        $property->delete();

        return response()->json(['code' => 'ok']);
    }
}
