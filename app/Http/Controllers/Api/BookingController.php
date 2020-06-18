<?php

namespace App\Http\Controllers\Api;

use App\BookingFeatures;
use App\BookingType;
use App\Option;
use App\BookingCity;
use App\RoomType;
use GuzzleHttp;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BookingController extends Controller {
    private function getCredentials() {
        $options = Option::params(['type'=> 'system'])->pluck('value', 'key');
        if (!($options['booking_login'] ?? '') || !($options['booking_password'] ?? '') || !($options['booking_url'] ?? '')) {
            abort('404');
        }
        return $options;
    }
    private function getApiData($url) {
        $options = $this->getCredentials();

        $client = new GuzzleHttp\Client(['base_uri' => $options['booking_url']]);
        $response = $client->request('GET', $url, [ 'auth' => [ $options['booking_login'], $options['booking_password'] ] ]);
        return json_decode($response->getBody(), true);
    }
    function test(Request $request) {
        $fields = $request->all();
        $client = new GuzzleHttp\Client(['base_uri' => $fields['booking_url']]);
        $response = $client->request('GET', 'hotels?hotel_ids=10004',
            [ 'auth' => [ $fields['booking_login'], $fields['booking_password'] ] ] );
        return response($response->getBody());
    }
    function importCities(Request $request) {
        BookingCity::truncate();

        set_time_limit(0);

        $options = $this->getCredentials();

        $client = new GuzzleHttp\Client(['base_uri' => $options['booking_url']]);
        $i = 0;
        do {
            $citiesUpdate = [];
            $response = $client->request('GET', 'cities?countries=de&offset='.$i.'&rows=1000',
                [ 'auth' => [ $options['booking_login'], $options['booking_password'] ] ] );
            $json = json_decode($response->getBody(), true);
            foreach ($json['result'] as $item) {
                $citiesUpdate[] = [
                    'name' => $item['name'],
                    'native_id' => $item['city_id'],
                    'hotels_number' => $item['nr_hotels']
                ];
            }
            $i+=1000;
            BookingCity::insert($citiesUpdate);
        } while(count($json['result']) == 1000);

        //Storage::put('cities.json', json_encode($citiesUpdate));

        return response()->json([]);
    }
    function importFacilities() {
        BookingFeatures::truncate();

        $options = $this->getCredentials();
        $json = $this->getApiData('facilityTypes');

        $featuresUpdate = [];

        foreach ($json['result'] as $item) {
            $featuresUpdate[] = [
                'name' => $item['name'],
                'parent' => 0,
                'type' => 'general',
                'native_id' => $item['facility_type_id'],
            ];
        }

        $json = $this->getApiData('hotelFacilityTypes');
        foreach ($json['result'] as $item) {
            $featuresUpdate[] = [
                'name' => $item['name'],
                'parent' => $item['facility_type_id'],
                'type' => 'hotel',
                'native_id' => $item['hotel_facility_type_id'],
            ];
        }

        $json = $this->getApiData('roomFacilityTypes');
        foreach ($json['result'] as $item) {
            $featuresUpdate[] = [
                'name' => $item['name'],
                'parent' => $item['facility_type_id'],
                'type' => 'room',
                'native_id' => $item['room_facility_type_id'],
            ];
        }
        BookingFeatures::insert($featuresUpdate);

        return response()->json($featuresUpdate);
    }
    function importRoomTypes() {
        BookingType::truncate();

        $json = $this->getApiData('roomTypes');
        $typesUpdate = [];

        foreach ($json['result'] as $item) {
            $typesUpdate[] = [
                'name' => $item['name'],
                'type' => 'room',
                'native_id' => $item['room_type_id'],
            ];
        }
        BookingType::insert($typesUpdate);

        $json = $this->getApiData('hotelTypes');
        $typesUpdate = [];

        foreach ($json['result'] as $item) {
            $typesUpdate[] = [
                'name' => $item['name'],
                'type' => 'hotel',
                'native_id' => $item['hotel_type_id'],
            ];
        }
        BookingType::insert($typesUpdate);
    }
    function getFeatures() {
        $features = BookingFeatures::params(['parent' => 0]);
        return response()->json($features);
    }
    function getRoomTypes() {
        $types = BookingType::params(['type' => 'hotel']);
        return response()->json($types);
    }
    function getCities() {
        $cities = BookingCity::query()->count();
        return response()->json(['count' => $cities]);
    }
    function getHotels(Request $request) {
        $fields = $request->all();
        $city = BookingCity::where('name', $fields['city'])->first();
        $type = $fields['type']; //BookingType::where('native_id', $fields['type'])->first();
        $json = $this->getApiData('hotels?city_ids='.$city->native_id.'&hotel_type_ids='.$type.'&rows=100'.
            '&extras=payment_details,key_collection_info,room_info,room_photos,hotel_description_formatted,room_facilities,hotel_photos,room_description,hotel_policies,hotel_info,hotel_facilities,hotel_description');
        return response()->json($json['result']);
    }
}
