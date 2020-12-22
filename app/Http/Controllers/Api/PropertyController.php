<?php namespace App\Http\Controllers\Api;
use App\Feature;
use App\Http\Controllers\Controller;
use App\Option;
use App\Http\Requests\PropertyListRequest;
use App\Room;
use App\Services\GeocoderService;
use Illuminate\Http\Request;
use App\Property;
use Auth;
use App\User;
use Illuminate\Support\Str;
use Ramsey\Collection\Collection;

class PropertyController extends Controller
{
    /**
     * @var GeocoderService
     */
    private $service;

    public function __construct(GeocoderService $service)
    {
        $this->service = $service;
    }

    public function index(PropertyListRequest $request)
    {
        if (!$request->query('page')) {
            $objects = Property::orderBy('ord')->get();
        } else {
            $objects = Property::indPaginated();
        }

        foreach($objects as $key => $object) {
            $ratings = $object->rating->toArray();
            $count = count($object->rating) ?: 1;
            $objects[$key]->rate = array_reduce( $ratings, function($carry, $item) { return $carry + $item['rating']; } ) / $count;
            $objects[$key]->geo = [];
        }
        return response()->json(['objects' => $objects, 'coords' => null]);
    }

    public function queryFilter(Request $request)
    {
        $data = $request->input();
        $address = $data['address'];
        $km = $data['km'] ? $data['km']  : 10;
        $people = $data['people'];

        $geo_data = $this->service->getCoords($address);

        $objects = Property::where(Property::raw('abs('.$geo_data['lat'].' - lat) * 111'), '<', $km)
            ->where(Property::raw('abs('.$geo_data['lng'].' - lng) * 111'), '<', $km)->paginate(20);

        foreach($objects as $key => $object) {
            $ratings = $object->rating->toArray();
            $count = count($object->rating) ?: 1;
            $objects[$key]->rate = array_reduce( $ratings, function($carry, $item) { return $carry + $item['rating']; } ) / $count;
            $objects[$key]->geo = $geo_data;
        }

        return response()->json(['objects' => $objects, 'coords' => $geo_data]);
    }

    public function querySort (Request $request)
    {
        $data = $request->input();

        $objects = Property::orderBy($data['field'], $data['sort'])->paginate(20);

        return response()->json(['objects' => $objects, 'coords' => null]);
    }

    public function initMap()
    {
        $coords = [];

        foreach (Property::paginate(100) as $object) {
            $coords[] = [
                'lat' => $object->lat,
                'lng' => $object->lng,
            ];
        }

        return response()->json(['coords' => $coords]);
    }

    public function show($id)
    {
        $property = Property::findOrFail($id);

        return response()->json($property);
    }

    public function init()
    {
        $property = Property::orderBy('created_at')->limit(10)->get();

        return response()->json($property);
    }

    public function queryProperty(Request $request)
    {
        $fields = $request->all();
        $property = Property::whereIn('id', $fields['id'])->get();

        return response()->json($property);
    }

    public function destroy(Property $property)
    {
        foreach ($property->rooms as $room) {
            Option::where(['parent' => $room->id, 'type' => 'room'])->delete();
        }
        $property->rooms()->delete();
        $property->delete();

        return response()->json(['code' => 'ok']);
    }

    public function store(Request $request)
    {
        request()->validate([
            'name'      => 'required',
            'address'   => 'required',
            'zip'       => 'required',
        ]);

        $geo_data = $this->service->getCoords($request->address);

        $data = [
            'name'      => $request->name,
            'slug'      => (string) Str::uuid(),
            'address'   => $request->address,
            'zip'       => $request->zip,
            'city'      => $request->city,
            'user_id'   => User::ADMIN,
            'views'     => 0,
            'type'      => Property::GENERAL,
            'status'    => Property::APPROVED,
            'lat'       => $geo_data['lat'],
            'lng'       => $geo_data['lng'],
        ];

        $item = new Property($data);
        $item->save();

        $optionsData = [
            'key'    => 'photos',
            'parent' => $item->id,
            'type'   => 'property',
            'value'  => '[]',
        ];
        $item->options()->create($optionsData);

        $item->save();

        return $item ? response()->json(['code' => 'ok','user' => $item]) : response()->json(['code' => 'error','message' => 'Ошибка сохранения']);
    }

    public function update(Property $property, Request $request)
    {
//        request()->validate([
//            'rooms.*.options.*.value'      => 'required',
//        ]);
        $fields = $request->all();

        foreach ($fields['rooms'] as $roomKey => $room){
            foreach ($room['options'] as $optionKey => $option){
                $fields['rooms'][$roomKey]['options'][$optionKey]['value'] = $option['value'] ?? '';
            }
        }
        $property->updateRelations($fields);

        $property->features()->detach();

        $property->features()->attach(array_map(function ($feature){
            return $feature['id'];
        }, $fields['features']));

        $property->push();

        return $property ? response()->json(['code' => 'ok']) : response()->json(['code' => 'error','message' => 'Ошибка сохранения']);
    }
    function listUpdate(Request $request) {
        $data = $request->all();
        foreach ($data as $item) {
            $prop = Property::find($item['id']);
            if (!$prop) {
                continue;
            }
            $prop->fill($item);
            $prop->save();
        }
        dd($data);
    }
}
