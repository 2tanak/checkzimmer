<?php namespace App\Http\Controllers\Api;
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
        $this->service = $service;
    }

    public function index(PropertyListRequest $request)
    {
        if (!$request->query('page')) {
            $objects = Property::ind();
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

    public function queryFilter(Request $request){
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

    public function querySort (Request $request){
        $data = $request->input();

        $objects = Property::orderBy($data['field'], $data['sort'])->paginate(20);

        return response()->json(['objects' => $objects, 'coords' => null]);
    }

    public function initMap(){
        $coords = [];

        foreach (Property::paginate(100) as $object) {
            $coords[] = [
                'lat' => $object->lat,
                'lng' => $object->lng,
            ];
        }

        return response()->json(['coords' => $coords]);
    }

    public function show($id) {
        return response()->json(Property::findOrFail($id));
    }

    public function init() {
        $property = Property::orderBy('created_at')->limit(10)->get();
        return response()->json($property);
    }

    public function queryProperty(Request $request) {
        $fields = $request->all();
        $property = Property::whereIn('id', $fields['id'])->get();

        return response()->json($property);
    }

    public function destroy(Property $property) {

        foreach ($property->rooms as $room) {
            Option::where(['parent' => $room->id, 'type' => 'room'])->delete();
        }
        $property->rooms()->delete();
        $property->delete();

        return response()->json(['code' => 'ok']);
    }

    public function store(Request $request) {
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
            'type'      => Property::AFFILIATE,
            'status'    => Property::APPROVED,
            'lat'       => $geo_data['lat'],
            'lng'       => $geo_data['lng'],
        ];

        $item = new Property($data);
        $item->save();

        return $item ? response()->json(['code' => 'ok','user' => $item]) : response()->json(['code' => 'error','message' => 'Ошибка сохранения']);
    }

    public function update(Property $property, Request $request)
    {
        $fields = $request->all();
        $property->fill($fields);
        $options = $property->options()->get();
        $updateOptionProperty = static function(array $property) use ($options){
            $optionModel = $options->filter(function ($item) use ($property){
                return $item->id === $property['id'];
            })->first();

            $optionModel->fill($property);

            $optionModel->push();
        };

        array_map($updateOptionProperty, $fields['options']);

        $rooms = $property->rooms()->get();
        //TODO Вынести логику с контроллера
        $updateRooms = static function(array $room) use ($rooms){
            $roomModel = $rooms->filter(function ($item) use ($room){
                return $item->id === $room['id'];
            })->first();

            $roomModel->fill($room);

            $options = $roomModel->options()->get();

            $updateOptionRooms = static function(array $option) use ($options){

                $optionModel = $options->filter(function ($item) use ($option){
                    return $item->id === $option['id'];
                })->first();

                $optionModel->fill($option);

                if($option['value']){
                    $optionModel->push();
                }
            };

            array_map($updateOptionRooms, $room['options']);

            $roomModel->push();
        };

        array_map($updateRooms, $fields['rooms']);

        $property->push();

        return $property ? response()->json(['code' => 'ok']) : response()->json(['code' => 'error','message' => 'Ошибка сохранения']);
    }
}
