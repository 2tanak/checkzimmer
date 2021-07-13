<?php

namespace App\Repositories;

use App\Feature;
use App\Property;
use App\Room;
use App\RoomType;
use App\Services\GeocoderService;
use Illuminate\Support\Str;
use App\GeocodeCache;
use Spatie\Geocoder\Geocoder;

class PropertyRepository {
    static function create($userId, $data, $status = null) {
        $geocode = app()->make(Geocoder::class);
        $service = new GeocoderService($geocode, new GeocodeCache);
        $address = $data['address']['street'] . ' ' . $data['address']['house'];
        $geo_data = $service->getCoords($data['address']['city'] . ' ' . $data['address']['postcode'] . ' ' . $address);

        $propertyData = [
            'name'      => $data['contact']['person']['name'],
            'slug'      => (string) Str::uuid(),
            'address'   => $address,
            'zip'       => $data['address']['postcode'],
            'city'      => $data['address']['city'],
            'user_id'   => $userId,
            'ord'       => 0,
            'views'     => 0,
            'type'      => Property::GENERAL,
            'status'    => $status ?: Property::PENDING,
            'lat'       => $geo_data['lat'],
            'lng'       => $geo_data['lng'],
        ];

        $item = new Property($propertyData);
        $item->save();

        self::vatAttach($item);

        $item->options()->delete();

        self::metaDataUpdate($item, $data['contact']);
        self::photoAttach($item, $data['media']['photos']);
        self::optionsAttach($item, $data['media'], ['photos']);
        self::featureAssign($item, $data['facilities']);

        $item->save();

        return $item ? response()->json(['code' => 'ok','property' => $item]) : response()->json(['code' => 'error','message' => 'Ошибка сохранения']);
    }
    static function featureAssign($property, $featureIds) {

        $property->features()->detach();

        $property->features()->attach($featureIds);
    }
    static function roomAttach($property, $data) {
        $propertyTypes = RoomType::all()->toArray();
        $propertyNames = array_column($propertyTypes, 'name');

        foreach ($data['propertyTypes'] as $propertyType) {
            $nameIndex = array_search($propertyType['name'], $propertyNames);
            if ($nameIndex === false) {
                continue;
            }

            $property->rooms()->delete();

            foreach ($propertyType['rooms'] as $room) {
                Room::create([
                    'property_id' => $property->id,
                    'room_type_id' => $propertyTypes[$nameIndex]->id,
                    'number' => $room['num'] ?? $room['number'],
                    'person' => $room['persons'] ?? $room['person'],
                    'native_id' => 0,
                    'price' => $room['price'],
                    'bed' => 'none',
                    'shower' => 'none',
                    'kitchen' => 'none',
                    'status' => Property::PENDING
                ]);
            }
        }
    }

    static function photoAttach($property, $photos) {
        $photosAttached = [];
        foreach ($photos as $photo) {
            $photosAttached[] = [
                'url_max300' => $photo,
                'url_original' => $photo,
            ];
        }
        $optionsData = [
            'key'    => 'photos',
            'parent' => $property->id,
            'type'   => 'property',
            'value'  => json_encode($photosAttached),
        ];
        $property->options()->create($optionsData);
    }

    static function vatAttach($property) {
        $optionsData = [
            'key'    => 'inclVat',
            'parent' => $property->id,
            'type'   => 'property',
            'value'  => '',
        ];
        $property->options()->create($optionsData);
    }

    static function metaDataUpdate($property, $data) {
        $metadata = [
            'free' => "",
            'hideAddress' => true,
            'hideZip' => "",
            'inclVAT' => "",
            'info' => "",
            'landlordClientEmail' => $data['email'],
            'landlordName' => $data['person']['name'],
            'landlordHideName' => true,
            'landlordLanguages'=> "de",
            'landlordPhoneNumber' => $data['phone'],
            'landlordHidePhone' => !$data['phone_display'],
            'landlordSpeaks' => "",
            'realprice' => false,
            'rentMin' => "1",
            'seo_description'=> "",
            'seo_title' => "%site-title% - Monteurzimmer in %city%<hide-all>,</hide-all><hide-zip> %postcode%</hide-zip><hide-address> %street%, %house-number%</hide-address>",
            'superhost'=> false,
        ];
        self::optionsAttach($property, $metadata);
    }

    static function optionsAttach($property, $media, $exclude = []) {
        foreach ($media as $key => $value) {
            if (in_array($key, $exclude)) {
                continue;
            }
            self::optionAdd($property, $key, $value);
        }
    }

    static function optionAdd($property, $key, $value) {
        $optionsData = [
            'key'    => $key,
            'parent' => $property->id,
            'type'   => 'property',
            'value'  => $value,
        ];
        $property->options()->create($optionsData);
    }

}
