<?php namespace App\Http\Controllers\Api;
use App\Domain;
use App\Feature;
use App\Http\Controllers\Controller;
use App\Option;
use App\Http\Requests\PropertyListRequest;
use App\Room;
use App\Services\GeocoderService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Property;
use Auth;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Ramsey\Collection\Collection;

/**
 * Class PropertyController
 * Handles property CRUD operations
 *
 * @package App\Http\Controllers\Api
 */
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

    /**
     * Get all properties allowed for current user
     * @param PropertyListRequest $request
     * @return JsonResponse
     */
    public function index(PropertyListRequest $request): JsonResponse
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

    /**
     * Get filtered properties
     * @param Request $request
     * @return JsonResponse
     */
    public function queryFilter(Request $request): JsonResponse
    {
        $data = $request->input();
        $user = Auth::user();
        $subdomain = Domain::getSubdomain();

        $paginate = $request->query('page');
        $noCity = $request->query('nocity');
        $noDist = $request->query('nodist') ?? false;

        $city = $subdomain ? $subdomain->city : 'Leipzig';
        $address = $data['address'] ? $city.' '.$data['address'] : $city;

        $km = $data['distance'] ? $data['distance']  : 30;
        $people = $data['people'];

        $geo_data = $this->service->getCoords($address);

        $latD = 'abs(' . $geo_data['lat'] . ' - lat) * 111';
        $lngD = 'abs(' . $geo_data['lng'] . ' - lng) * 111';

        if (!$noDist) {
            $objects = Property::where(Property::raw($latD), '<', $km)
                ->where(Property::raw($lngD), '<', $km);
        } else {
            $objects = Property::where(Property::raw($latD), '>', $km)
                ->where(Property::raw($lngD), '>', $km)
                ->where(Property::raw($latD), '<=', 60)
                ->where(Property::raw($lngD), '<=', 60);
        }


        // Set items order
        switch ($data['ord'] ?? '') {
            case 'min':
                $objects->orderBy('price');
                break;
            case 'max':
                $objects->orderByDesc('price');
                break;
            case 'rating':
                $objects->orderByDesc('hotel_rating');
                break;
            default:
                $objects->orderBy('ord');
        }

        if ($people) {
            $totalIds = Room::select(DB::raw('SUM(number * person) as people'), 'property_id')->groupBy('property_id')->having('people', '>=', $people)->pluck('property_id')->toArray();
        } else {
            $totalIds = [];
        }

        // Filter by selected properties: single rooms, double rooms, multiple beds
        if ($data['single'] || $data['double']) {
            $objectsPreliminary = $objects->get()->pluck('id');

            if ($data['single']) {
                $singleIds = Room::where('person', 1)->whereIn('property_id', $objectsPreliminary)->get()->pluck('property_id')->toArray();
            } else {
                $singleIds = [];
            }
            if ($data['double']) {
                $doubleIds = Room::where('person', 2)->whereIn('property_id', $objectsPreliminary)->get()->pluck('property_id')->toArray();
            } else {
                $doubleIds = [];
            }
            if ($data['multi']) {
                $multiIds = Room::where('person', '>', 2)->whereIn('property_id', $objectsPreliminary)->get()->pluck('property_id')->toArray();
            } else {
                $multiIds = [];
            }
            $totalIds = array_merge($totalIds, $singleIds, $doubleIds, $multiIds);
        }
        $objects->whereIn('id', $totalIds);

        $objects = $objects->where(function ($query) use ($user) {
            if (!$user || $user->role != 'admin' && $user->role != 'manager') {
                $query->whereNull('access')->orWhere('access', '');
            }
        });

        $relate = $noCity ? '!=' : '=';
        $objects->where('city', $relate, $subdomain ? $subdomain->city : 'Leipzig');

        $objects = $objects->paginate(20);

        foreach($objects as $key => $object) {
            $ratings = $object->rating->toArray();
            $count = count($object->rating) ?: 1;
            $objects[$key]->rate = array_reduce( $ratings, function($carry, $item) { return $carry + $item['rating']; } ) / $count;
            $objects[$key]->geo = $geo_data;
        }
        return response()->json(['objects' => $objects, 'coords' => $geo_data]);
    }

    /**
     * Get sorted properties
     * @param Request $request
     * @return JsonResponse
     */
    public function querySort (Request $request): JsonResponse
    {
        $data = $request->input();

        $objects = Property::orderBy($data['field'], $data['sort'])->paginate(20);

        return response()->json(['objects' => $objects, 'coords' => null]);
    }

    /**
     * Gets geo coordinates data for properties
     * @return JsonResponse
     */
    public function initMap(): JsonResponse
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

    /**
     * Returns the specific property data
     * @param $id
     * @return JsonResponse
     */
    public function show($id): JsonResponse
    {
        $specOptions = [
            'landlordSpeaks' => '',
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
            'rentMin' => '',
            'info' => ''
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

    /**
     * Get 10 first properties
     * @return JsonResponse
     */
    public function init(): JsonResponse
    {
        $property = Property::orderBy('created_at')->limit(10)->get();

        return response()->json($property);
    }

    /**
     * Get data for the specified property ids
     * @param Request $request
     * @return JsonResponse
     */
    public function queryProperty(Request $request): JsonResponse
    {
        $fields = $request->all();
        $property = Property::whereIn('id', $fields['id'])->get();

        return response()->json($property);
    }

    /**
     * Remove the specific data from the storage
     * @param Property $property
     * @return JsonResponse
     * @throws \Exception
     */
    public function destroy(Property $property): JsonResponse
    {
        foreach ($property->rooms as $room) {
            Option::where(['parent' => $room->id, 'type' => 'room'])->delete();
        }
        $property->rooms()->delete();
        $property->delete();

        return response()->json(['code' => 'ok']);
    }

    /**
     * Creates new property
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
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

    /**
     * Update property data
     *
     * @param Property $property
     * @param Request $request
     * @return JsonResponse
     */
    public function update(Property $property, Request $request): JsonResponse
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

    /**
     * Bulk property update
     * @param Request $request
     */
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
