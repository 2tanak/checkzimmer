<?php

namespace App\Http\Controllers\Api;

use App\Services\BookingDataImportService;
use App\Services\BookingDataService;
use GuzzleHttp;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

/**
 * Class BookingController
 * Works with website authentication
 *
 * @package App\Http\Controllers\Api
 */

class BookingController extends Controller
{
    /**
     * @var BookingDataImportService
     */
    private $bookingDataImportService;
    /**
     * @var BookingDataService
     */
    private $bookingDataService;

    /**
     * BookingController constructor.
     * @param BookingDataImportService $bookingDataImportService
     * @param BookingDataService $bookingDataService
     */
    public function __construct(
        BookingDataImportService $bookingDataImportService,
        BookingDataService $bookingDataService
    )
    {
        $this->bookingDataImportService = $bookingDataImportService;
        $this->bookingDataService = $bookingDataService;
    }

    /**
     * Test connection
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     * @throws GuzzleHttp\Exception\GuzzleException
     */
    function test(Request $request): Response
    {
        $fields = $request->all();
        $client = new GuzzleHttp\Client(['base_uri' => $fields['booking_url']]);
        $response = $client->request('GET', 'hotels?hotel_ids=10004',
            ['auth' => [$fields['booking_login'], $fields['booking_password']]]);
        return response($response->getBody());
    }

    /**
     * Import cities from Booking API
     * @return JsonResponse
     */
    public function importCities(): JsonResponse
    {
        try
        {
            $count = $this->bookingDataImportService->importCitiesFromBookingApi();
        }
        catch (GuzzleHttp\Exception\GuzzleException $e)
        {
            return response()->json(['error' => 'Something went wrong'], 500);
        }
        return response()->json(['message' => $count . ' objects imported']);
    }

    /**
     * Import property facilities from booking API
     *
     * @return JsonResponse
     * @TODO fix response
     */
    public function importFacilities(): JsonResponse
    {
        try
        {
            $featuresUpdate = $this->bookingDataImportService->importFacilitiesFromBookingApi();
        }
        catch (GuzzleHttp\Exception\GuzzleException $e)
        {
            return response()->json(['error' => 'Something went wrong'], 500);
        }
        return response()->json($featuresUpdate);
    }

    /**
     * Import room types from Booking API
     *
     * @return JsonResponse
     */
    function importRoomTypes(): JsonResponse
    {
        try
        {
            $count = $this->bookingDataImportService->importRoomTypesFromBookingApi();
        }
        catch (GuzzleHttp\Exception\GuzzleException $e)
        {
            return response()->json(['error' => 'Something went wrong'], 500);
        }
        return response()->json(['message' => $count . ' objects imported']);
    }

    /**
     * Gets and sorts booking facilities from Booking API
     *
     * @return JsonResponse
     */
    function getFeatures(): JsonResponse
    {
        $childrenFeatures = $this->bookingDataService->getChildrenFeatures();
        $rootFeatures = $this->bookingDataService->filterFeatures($childrenFeatures, 0);
        $rootedFeatures = $this->bookingDataService->getRootedFeatures($rootFeatures, $childrenFeatures);
        return response()->json(['root' => $rootFeatures, 'rooted' => $rootedFeatures, 'children' => $childrenFeatures]);
    }

    /**
     * Gets room types
     *
     * @return JsonResponse
     */
    public function getRoomTypes(): JsonResponse
    {
        $types = $this->bookingDataService->getRoomTypes('hotel');
        return response()->json($types);
    }

    /**
     * Gets bed types from
     * @return JsonResponse
     */
    public function getBedTypes(): JsonResponse
    {
        $bed = $this->bookingDataService->getBedTypes();

        return response()->json($bed);
    }

    /**
     * Gets shower types
     * @return JsonResponse
     */
    public function getShowerTypes(): JsonResponse
    {
        $shower = $this->bookingDataService->getShowerTypes();

        return response()->json($shower);
    }

    public function getKitchenTypes(): JsonResponse
    {
        $shower = $this->bookingDataService->getKitchenTypes();

        return response()->json($shower);
    }

    public function getCities(): JsonResponse
    {
        $citiesCount = $this->bookingDataService->getCitiesCount();
        return response()->json(['count' => $citiesCount]);
    }

    /**
     * Gets hotels from Booking API
     *
     * @param Request $request
     * @return JsonResponse
     */
    function getHotels(Request $request): JsonResponse
    {
        try
        {
            $hotelsArray = $this->bookingDataService->getHotelsByCityAndTypeFromApi($request->city, $request->type);
        }
        catch (GuzzleHttp\Exception\GuzzleException $e)
        {
            return response()->json(['error' => 'Something went wrong', 'message' => $e->getMessage()], 500);
        }
        catch (ModelNotFoundException $e)
        {
            return response()->json(['error' => 'City not found'], 500);
        }
        return response()->json($hotelsArray);
    }

    /**
     * Saves hotels that are got via Booking API
     * @param Request $request
     * @return JsonResponse
     */
    public function saveHotels(Request $request): JsonResponse
    {
        $hotels = $request->all();
        $this->bookingDataService->storeHotels($hotels);
        return response()->json(['message' => 'Hotels successful stored']);
    }
}
