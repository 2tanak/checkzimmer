<?php

namespace App\Services;

use App\BookingCity;
use App\BookingFeatures;
use App\BookingType;
use App\Option;
use App\Property;
use App\Room;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\Eloquent\Collection;

class BookingDataService
{
    /**
     * @var BookingCity
     */
    private $bookingCity;
    /**
     * @var BookingType
     */
    private $bookingType;
    /**
     * @var BookingFeatures
     */
    private $bookingFeatures;
    /**
     * @var BookingApiService
     */
    private $bookingApiService;

    /**
     * BookingDataService constructor.
     * @param BookingCity $bookingCity
     * @param BookingType $bookingType
     * @param BookingFeatures $bookingFeatures
     * @param BookingApiService $bookingApiService
     */
    public function __construct
    (
        BookingCity $bookingCity,
        BookingType $bookingType,
        BookingFeatures $bookingFeatures,
        BookingApiService $bookingApiService
    )
    {
        $this->bookingCity = $bookingCity;
        $this->bookingType = $bookingType;
        $this->bookingFeatures = $bookingFeatures;
        $this->bookingApiService = $bookingApiService;
    }

    /**
     * @return int
     */
    public function getCitiesCount(): int
    {
        return $this->bookingCity->query()->count();
    }

    /**
     * @param string $type
     * @return mixed
     */
    public function getRoomTypes(string $type)
    {
        return $this->bookingType->params(['type' => $type]);
    }
    
    public function getBedTypes()
    {
        return [
            [
                'type' => 'single',
                'name' => 'односпальная',
            ],
            [
                'type' => 'double',
                'name' => 'двуспальная',
            ]    
        ];
    }
    
    public function getShowerTypes()
    {
        return [
            [
                'type' => 'all',
                'name' => 'все',
            ],
            [
                'type' => 'shared bathroom',
                'name' => 'свой',
            ],
            [
                'type' => 'shower',
                'name' => 'совместный',
            ],
            [
                'type' => 'none',
                'name' => 'без душа',
            ]  
        ];
    }

    public function getKitchenTypes()
    {
        return [
            [
                'type' => 'all',
                'name' => 'все',
            ],
            [
                'type' => 'kitchen',
                'name' => 'cвоя',
            ],
            [
                'type' => 'shared kitchen',
                'name' => 'совместная',
            ],
            [
                'type' => 'kitchenette',
                'name' => 'кухонька (Kitchenette)',
            ],
            [
                'type' => 'none',
                'name' => 'без кухни',
            ]  
        ];
    }
    
    public function getChildrenFeatures()
    {
        return $this->bookingFeatures->ind();
    }

    /**
     * Filter features by parent
     * @param $features
     * @param int $parent
     * @return array
     */
    public function filterFeatures(&$features, int $parent): array
    {
        $result = [];
        foreach ($features as $key => $feature) {
            if ($feature->parent == $parent) {
                $result[] = $feature;
                unset($features[$key]);
            }
        }
        return $result;
    }

    /**
     * @param array $rootFeatures
     * @param array $childrenFeatures
     * @return array
     */
    public function getRootedFeatures(array $rootFeatures, Collection $childrenFeatures): array
    {
        $rootedFeatures = [];
        foreach ($rootFeatures as $feature) {
            $rootedFeatures[$feature->id] = $this->filterFeatures($childrenFeatures, $feature->id);
        }

        return $rootedFeatures;
    }

    /**
     * @param string $city
     * @param int $type
     * @return array
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws ModelNotFoundException
     */
    public function getHotelsByCityAndTypeFromApi(string $city, int $type): array
    {
        $city = $this->getBookingCityByName($city);
        $json = $this->bookingApiService->getHotelsByCityAndType($city->native_id, $type);

        $ids = [];
        
        foreach ($json['result'] as $item) {
            $ids[] = $item['hotel_id'];
        }

        $natives = Option::where('type', 'property')
            ->where('key', 'native_id')
            ->whereIn('value', $ids)
            ->get()
            ->pluck('parent', 'value');

        foreach ($json['result'] as $i => $item) {
            $imported = $natives[$item['hotel_id']] ?? null;
            $json['result'][$i]['imported'] = $imported;
        }
        
        return $json['result'];
    }

    /**
     * @param string $city
     * @return BookingCity
     * @throws ModelNotFoundException
     */
    private function getBookingCityByName(string $city): BookingCity
    {
        return $this->bookingCity->where('name', $city)->firstOrFail();
    }

    public function storeHotels(array $hotels)
    {
        foreach($hotels as $hotel) {
            $hotel_data = [
                'user_id' => 1,
                'type' => 'affiliate',
                'status' => 'approved',
                'views' => 0,
                'lat' => $hotel['hotel_data']['location']['latitude'],
                'lng' =>  $hotel['hotel_data']['location']['longitude'],
                'name' => $hotel['hotel_data']['name'],
                'city' => $hotel['hotel_data']['city'],
                'zip' => $hotel['hotel_data']['zip'],
                'address' => $hotel['hotel_data']['address']
            ];

            $property = $this->storeProperty($hotel_data);

            $this->storeOption([
                'parent' => $property->id,
                'type' => 'property',
                'key' => 'hotel_type',
                'value' => $hotel['hotel_data']['hotel_type_id']
            ]);

            $this->storeOption([
                'parent' => $property->id,
                'type' => 'property',
                'key' => 'languages',
                'value' => implode(',', $hotel['hotel_data']['spoken_languages'])
            ]);

            $this->storeOption([
                'parent' => $property->id,
                'type' => 'property',
                'key' => 'photos',
                'value' => json_encode($hotel['hotel_data']['hotel_photos'])
            ]);

            $this->storeOption([
                'parent' => $property->id,
                'type' => 'property',
                'key' => 'policies',
                'value' => json_encode($hotel['hotel_data']['hotel_policies'])
            ]);

            $this->storeOption([
                'parent' => $property->id,
                'type' => 'property',
                'key' => 'features',
                'value' => json_encode($hotel['hotel_data']['hotel_facilities'])
            ]);

            $this->storeOption([
                'parent' => $property->id,
                'type' => 'property',
                'key' => 'native_id',
                'value' => $hotel['hotel_id']
            ]);

            foreach ($hotel['room_data'] as $key => $room) {

                $roomData = [
                    'property_id' => $property->id,
                    'room_type_id' => 0,
                    'number' => 1,
                    'person' => $room['room_info']['max_persons'],
                    'price' => $room['room_info']['min_price'],
                    'bed' => Room::getBedroomType($room['room_info']['bedrooms'] ?? []),
                    'shower' => Room::getShowerType($room['room_facilities']),
                    'kitchen' => Room::getKitchenType($room['room_facilities'], $hotel['hotel_data']['hotel_facilities']),
                    'status' => 'approved'
                ];

                $new_room = $this->storeRoom($roomData);

                $this->storeOption([
                    'parent' => $new_room->id,
                    'type' => 'room',
                    'key' => 'facilities',
                    'value' => json_encode($room['room_facilities'])
                ]);

                $this->storeOption([
                    'parent' => $new_room->id,
                    'type' => 'room',
                    'key' => 'native_id',
                    'value' => json_encode($room['room_id'])
                ]);

                $this->storeOption([
                    'parent' => $new_room->id,
                    'type' => 'room',
                    'key' => 'photos',
                    'value' => json_encode($room['room_photos'])
                ]);

                $this->storeOption([
                    'parent' => $new_room->id,
                    'type' => 'room',
                    'key' => 'name',
                    'value' => $room['room_name'] ?? ''
                ]);

                $this->storeOption([
                    'parent' => $new_room->id,
                    'type' => 'room',
                    'key' => 'description',
                    'value' => $room['room_description'] ?? ''
                ]);
            }
        }

    }

    /**
     * @param array $hotel_data
     * @return Property
     */
    private function storeProperty(array $hotel_data): Property
    {
        $property = new Property();
        $property->fill($hotel_data);
        $property->save();
        return $property;
    }

    /**
     * @param array $data
     * @return Option
     */
    private function storeOption(array $data): Option
    {
        $option = new Option();
        $option->fill($data);
        $option->save();
        return $option;
    }

    private function storeRoom(array $roomData)
    {
        $room = new Room();
        $room->fill($roomData);
        $room->save();
        return $room;
    }
}
