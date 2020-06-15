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
        $cities = BookingCity::truncate();

        $options = $this->getCredentials();

        $client = new GuzzleHttp\Client(['base_uri' => $options['booking_url']]);
        $offset = 0;
        $citiesUpdate = [];
        do {
            $response = $client->request('GET', 'cities?countries=de&offset='.$offset.'&rows=100',
                [ 'auth' => [ $options['booking_login'], $options['booking_password'] ] ] );
            $json = json_decode($response->getBody(), true);
            foreach ($json['result'] as $item) {
                $citiesUpdate[] = [
                    'name' => $item['name'],
                    'native_id' => $item['city_id'],
                    'hotels_number' => $item['nr_hotels']
                ];
            }
            $offset++;

        } while(count($json['result']) == 100);

        Storage::put('cities.json', json_encode($citiesUpdate));
        BookingCity::insert($citiesUpdate);

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
}
