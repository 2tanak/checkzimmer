<?php

namespace App\Services;

use App\GeocodeCache;
use Spatie\Geocoder\Geocoder;

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
     * @param string $address
     * @return array
     */
    public function getCoords(string $address): array
    {
        $cache_data = $this->getFromCache($address);
        return $cache_data?($cache_data->toArray()):$this->getDataFromGeocoder($address);
    }

    /**
     * Store retrieved data
     * @param string $address
     * @param array $data
     */
    private function storeToCache(string $address, array $data): void
    {
        $old_data = $this->cacheModel->whereAddress($address)->firstOrNew();

        $old_data->fill([
            'address' => $address,
            'lat' => $data['lat'],
            'lng' => $data['lng'],
            'timestamp' => time()
        ]);

        $old_data->save();
    }

    /**
     * Get data from db
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
