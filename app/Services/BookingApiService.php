<?php

namespace App\Services;

use App\Option;
use Exception;
use GuzzleHttp\Client as HttpClient;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Support\Facades\Schema;

/**
 * Class BookingApiService
 * Access for Booking API
 *
 * @package App\Http\Services
 */

class BookingApiService
{
    private $options;
    /**
     * @var HttpClient
     */
    private $client;

    /**
     * BookingApiService constructor.
     * @throws Exception
     */
    public function __construct()
    {
        $this->getCredentials();
        if (isset($this->options['booking_url'])) {
            $this->client = new HttpClient(['base_uri' => $this->options['booking_url']]);
        } else {
            $this->client = null;
        }
    }

    /**
     * Retrieve credentials data from DB
     *
     * @return void
     * @throws Exception
     */
    private function getCredentials(): void
    {
        if (!Schema::hasTable(app(Option::class)->getTable())) {
            return;
        }
        $options = Option::params(['type'=> 'system'])->pluck('value', 'key');
        if (!($options['booking_login'] ?? '') || !($options['booking_password'] ?? '') || !($options['booking_url'] ?? '')) {
            return;
            //throw new Exception('Booking auth data not found');
        }
        $this->options = $options;
    }

    /**
     * Read data from API
     *
     * @param string $method
     * @param string $url
     * @return mixed
     * @throws GuzzleException
     */
    private function getApiData(string $method, string $url)
    {
        $response = $this->client->request($method, $url, [ 'auth' => [ $this->options['booking_login'], $this->options['booking_password'] ] ]);

        return json_decode($response->getBody(), true);
    }

    /**
     * Get cities from API
     *
     * @param int $offset
     * @param int $count
     * @return mixed
     * @throws GuzzleException
     */
    public function getCities(int $offset, int $count = 1000)
    {
        return $this->getApiData('GET', 'cities?countries=de&offset='.$offset.'&rows='.$count);
    }

    /**
     * Get facilities from API
     *
     * @return mixed
     * @throws GuzzleException
     */
    public function getFacilities()
    {
        return $this->getApiData('GET', 'facilityTypes');
    }

    /**
     * Get hotel facilities from API
     * @return mixed
     * @throws GuzzleException
     */
    public function getHotelFacilities()
    {
        return $this->getApiData('GET', 'hotelFacilityTypes');
    }

    /**
     * Get room facilities from API
     * @return mixed
     * @throws GuzzleException
     */
    public function getRoomFacilities()
    {
        return $this->getApiData('GET', 'roomFacilityTypes');
    }

    /**
     * Get room types from API
     *
     * @return mixed
     * @throws GuzzleException
     */
    public function getRoomTypes()
    {
        return $this->getApiData('GET', 'roomTypes');
    }

    /**
     * Get hotel type from API
     *
     * @return mixed
     * @throws GuzzleException
     */
    public function getHotelTypes()
    {
        return $this->getApiData('GET', 'hotelTypes');
    }

    /**
     * Get hotels list by city and hotel type
     *
     * @param int $city_id
     * @param int $type
     * @return mixed
     * @throws GuzzleException
     */
    public function getHotelsByCityAndType(int $city_id, int $type)
    {
        return $this->getApiData('GET','hotels?city_ids='.$city_id.'&hotel_type_ids='.$type.'&rows=100'.
        '&extras=payment_details,key_collection_info,room_info,room_photos,hotel_description_formatted,room_facilities,hotel_photos,room_description,hotel_policies,hotel_info,hotel_facilities,hotel_description');
    }

    /**
     * Get hotel info
     *
     * @param int $hotel_id
     * @return mixed
     * @throws GuzzleException
     */
    public function getHotelsInfo(int $hotel_id)
    {
        return $this->getApiData('GET','hotels?hotel_ids='.$hotel_id.'&rows=1'.
            '&extras=room_info,room_photos,room_description,room_facilities,hotel_facilities,');
    }

}
