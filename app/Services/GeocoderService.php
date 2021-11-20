<?php

namespace App\Services;

use App\GeocodeCache;
use Spatie\Geocoder\Geocoder;

/**
 * Class GeocoderService
 * Provides geocoding functions
 *
 * @package App\Http\Services
 */

class GeocoderService
{
    /**
     * @var Geocoder
     */
    private $geocoder;

    /**
     * @var GeocodeCache
     */
    private $cacheModel;

    /**
     * GeocoderService constructor.
     * @param Geocoder $geocoder
     * @param GeocodeCache $cacheModel
     */
    public function __construct(Geocoder $geocoder, GeocodeCache $cacheModel)
    {
        $this->geocoder = $geocoder;
        $this->cacheModel = $cacheModel;
    }

    /**
     * Get geo coordinates by the provided address
     * @param string $address
     * @return array
     */
    public function getCoords(string $address): array
    {
        $cache_data = $this->getFromCache($address);
        return $cache_data?($cache_data->toArray()):$this->getDataFromGeocoder($address);
    }

     /**
      * Provides geocoordinates by the provided city and zip code
      *
      * @param string $city
      * @param string $zip
      * @return array
      */
    public function getCoordsFromZipAndCity(string $city, string $zip): array
    {
        $address = $city . ' ' . $zip;
        $cache_data = $this->getFromCache($address);

        return $cache_data?($cache_data->toArray()):$this->getDataFromGeocoder($address);
    }

    /**
     * Store the retrieved data in cache
     * @param string $address
     * @param array $data
     */
    private function storeToCache(string $address, array $data): void
    {
        $this->cacheModel->upd([
            'address'   => $address,
            'lat'       => $data['lat'],
            'lng'       => $data['lng'],
            'timestamp' => time()
        ], ['address' => $address]);
    }

    /**
     * Get cached data from the DB
     * @param string $address
     * @return GeocodeCache|null
     */
    private function getFromCache(string $address): ?GeocodeCache
    {
        return $this->cacheModel->whereAddress($address)->onlyActual()->first();
    }

    /**
     * Retrieve data from geocoder
     * @param string $address
     * @return array
     */
    private function getDataFromGeocoder(string $address): array
    {
        $data = $this->geocoder->getCoordinatesForAddress($address);

        $this->storeToCache($address, $data);

        return $data;
    }
}
