<?php namespace App\Http\Controllers\Api;
use App\Domain;
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
        $user = Auth::user();
        $subdomain = Domain::getSubdomain();

        $paginate = $request->query('page');
        $noCity = $request->query('nocity');

        $objects = Property::orderBy('ord')->where(function ($query) use ($user) {
            if (!$user || $user->role != 'admin' && $user->role != 'manager') {
                $query->whereNull('access')->orWhere('access', '');
            }
        });

        if ($subdomain) {
            $relate = $noCity ? '!=' : '=';
            $geo_data = $subdomain->geo();
            $objects->where('city', $relate, $subdomain->city);
            if ($noCity) {
                $objects->where(Property::raw('abs('.$geo_data['lat'].' - lat) * 111'), '<', 60)
                    ->where(Property::raw('abs('.$geo_data['lng'].' - lng) * 111'), '<', 60);
            }
        }

        if (!$paginate) {
            $objects = $objects->get();
        } else {
            $objects = $objects->paginate(30);
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
        $subdomain = Domain::getSubdomain();

        $paginate = $request->query('page');
        $noCity = $request->query('nocity');

        $address = $data['address'];
        $km = $data['km'] ? $data['km']  : 10;
        $people = $data['people'];

        $geo_data = $this->service->getCoords($address);

        $objects = Property::where(Property::raw('abs('.$geo_data['lat'].' - lat) * 111'), '<', $km)
            ->where(Property::raw('abs('.$geo_data['lng'].' - lng) * 111'), '<', $km);

        if ($subdomain) {
            $relate = $noCity ? '!=' : '=';
            $objects->where('city', $relate, $subdomain->city);
        }

        $objects = $objects->paginate(20);

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
        $specOptions = [
            'landlordName' => '',
            'landlordHideName' => false,
            'landlordHidePhone' => false,
            'landlordPhoneNumber' => '',
            'landlordClientEmail' => '',
            'landlordLanguages' => 'de',
            'hideAddress' => false,
            'seo_title' => '',
            'seo_description' => '',
            'superhost' => '',
            'free' => '',
            'realprice' => '',
            'inclVAT' => '',
            'hideZip' => '',
            'rentMin' => ''
        ];

        $property = Property::findOrFail($id);
        $options = [];
        $opts = $property->options->toArray();
        foreach ($specOptions as $key => $value) {
            $options[$key] = Property::optionFind($opts, $key, $value);
        }
        $property->opts = $options;
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
        $geo_data = $this->service->getCoords($request->city . ' ' . $request->address);

        $data = [
            'name'      => $request->name,
            'slug'      => (string) Str::uuid(),
            'address'   => $request->address,
            'zip'       => $request->zip,
            'city'      => $request->city,
            'user_id'   => Auth::id(),
            'ord'       => 0,
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

        $optionsData = [
            'key'    => 'inclVat',
            'parent' => $item->id,
            'type'   => 'property',
            'value'  => '',
        ];
        $item->options()->create($optionsData);

        $item->save();
        $item = Property::find($item->id);
        return $item ? response()->json(['code' => 'ok','property' => $item]) : response()->json(['code' => 'error','message' => 'Ошибка сохранения']);
    }

    public function update(Property $property, Request $request)
    {
        $fields = $request->all();

        $geo_data = $this->service->getCoords($fields['city'] . ' ' . $fields['address']);

        $fields['lat'] = $geo_data['lat'];
        $fields['lng'] = $geo_data['lng'];

        foreach ($fields['rooms'] as $roomKey => $room){
            foreach ($room['options'] as $optionKey => $option){
                $fields['rooms'][$roomKey]['options'][$optionKey]['value'] = $option['value'] ?? '';
            }
        }
        foreach($fields['options'] as $key => $item) {
            if (!$item['id'] && $item['value'] != '') {
                $option = Option::updateOrCreate($item);
                $result[$key] = $option;
            } elseif ($item['id'] && $item['value'] == '') {
                $option = Option::find($item['id']);
                $option->delete();
            }
        }
        $property->updateRelations($fields);

        $property->features()->detach();

        $property->features()->attach(array_map(function ($feature) {
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
    }
}
