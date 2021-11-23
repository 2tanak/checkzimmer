<?php

namespace App\Services;

use App\BookingCity;
use App\BookingFeatures;
use App\BookingType;
use GuzzleHttp\Exception\GuzzleException;

/**
 * Class BookingDataImportService
 * Import data from booking API
 *
 * @package App\Http\Services
 */

class BookingDataImportService
{
    /**
     * @var BookingCity
     */
    private $bookingCity;
    /**
     * @var BookingFeatures
     */
    private $bookingFeatures;
    /**
     * @var BookingType
     */
    private $bookingType;
    /**
     * @var BookingApiService
     */
    private $bookingApiService;

    /**
     * BookingDataService constructor.
     * @param BookingCity $bookingCity
     * @param BookingFeatures $bookingFeatures
     * @param BookingType $bookingType
     * @param BookingApiService $bookingApiService
     */
    public function __construct
    (
        BookingCity $bookingCity,
        BookingFeatures $bookingFeatures,
        BookingType $bookingType,
        BookingApiService $bookingApiService
    )
    {
        $this->bookingCity = $bookingCity;
        $this->bookingFeatures = $bookingFeatures;
        $this->bookingType = $bookingType;
        $this->bookingApiService = $bookingApiService;
    }

    /**
     * Get cities from booking API
     * @return int
     * @throws GuzzleException
     */
    public function importCitiesFromBookingApi(): int
    {
        $this->bookingCity->truncate();
        set_time_limit(0);

        $i = 0;
        do
        {
            $citiesUpdate = [];
            $json = $this->bookingApiService->getCities($i, 1000);

            foreach ($json['result'] as $item){
                $citiesUpdate[] = [
                    'name'          => $item['name'],
                    'native_id'     => $item['city_id'],
                    'hotels_number' => $item['nr_hotels']
                ];
            }

            $i += 1000;
            $this->bookingCity->insert($citiesUpdate);
        }
        while (count($json['result']) == 1000);

        return (count($json['result']) != 1000) ? $i - 1000 + count($json['result']) : $i - 1000;
    }

    /**
     * Get all types facilities from booking API
     * @return array
     * @throws GuzzleException
     */
    public function importFacilitiesFromBookingApi(): array
    {
        $this->bookingFeatures->truncate();

        $facilities = $this->getFacilitiesFromApi();
        $hotelFacilities = $this->getHotelFacilitiesFromApi();
        $roomFacilities = $this->getRoomFacilitiesFromApi();

        $featuresUpdate = array_merge($facilities, $hotelFacilities, $roomFacilities);
        BookingFeatures::insert($featuresUpdate);

        return $featuresUpdate;
    }

    /**
     * Get facilities from booking API
     * @return array
     * @throws GuzzleException
     */
    private function getFacilitiesFromApi(): array
    {
        $json = $this->bookingApiService->getFacilities();
        return $this->generateFacilitiesArrayFromJson($json, 'general');
    }

    /**
     * Get hotel facilities from booking API
     * @return array
     * @throws GuzzleException
     */
    public function getHotelFacilitiesFromApi(): array
    {
        $json = $this->bookingApiService->getHotelFacilities();
        return $this->generateFacilitiesArrayFromJson($json, 'hotel');
    }

    /**
     * Get room facilities from booking API
     * @return array
     * @throws GuzzleException
     */
    public function getRoomFacilitiesFromApi(): array
    {
        $json = $this->bookingApiService->getRoomFacilities();
        return $this->generateFacilitiesArrayFromJson($json, 'room');
    }

    /**
     * Generate data from facilities JSON
     * @param $json
     * @param string $type
     * @return array
     */
    public function generateFacilitiesArrayFromJson($json, string $type = 'general'): array
    {
        $featuresUpdate = [];

        foreach ($json['result'] as $item) {
            $featuresUpdate[] = [
                'name'      => $item['name'],
                'parent'    => ($type == 'general') ? 0 : $item['facility_type_id'],
                'type'      => $type,
                'native_id' => $item['facility_type_id'],
            ];
        }

        return $featuresUpdate;
    }

    /**
     * Import room types from booking API
     * @throws GuzzleException
     */
    public function importRoomTypesFromBookingApi(): int
    {
        $this->bookingType->truncate();

        $roomTypes = $this->getRoomTypesFromApi();
        $hotelTypes = $this->getHotelTypesFromApi();

        $typesUpdate = array_merge($roomTypes, $hotelTypes);

        $this->bookingType->insert($typesUpdate);

        return count($typesUpdate);
    }

    /**
     * Get room types from booking API
     * @return array
     * @throws GuzzleException
     */
    private function getRoomTypesFromApi(): array
    {
        $json = $this->bookingApiService->getRoomTypes();
        return $this->generateTypesArrayFromJson($json, 'room');
    }

    /**
     * Get hotel types from booking API
     * @return array
     * @throws GuzzleException
     */
    private function getHotelTypesFromApi(): array
    {
        $json = $this->bookingApiService->getHotelTypes();
        return $this->generateTypesArrayFromJson($json, 'hotel');
    }

    /**
     * Generate data from types JSON
     * @param $json
     * @param string $type
     * @return array
     */
    private function generateTypesArrayFromJson($json, string $type): array
    {
        $typesUpdate = [];

        foreach ($json['result'] as $item) {
            $typesUpdate[] = [
                'name'      => $item['name'],
                'type'      => $type,
                'native_id' => $item[$type . '_type_id'],
            ];
        }
        return $typesUpdate;
    }
}
