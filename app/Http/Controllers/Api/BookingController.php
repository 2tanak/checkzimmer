<?php

namespace App\Http\Controllers\Api;

use App\BookingFeatures;
use App\BookingType;
use App\Option;
use App\BookingCity;
use App\Property;
use App\Room;
use App\Services\BookingDataImportService;
use App\Services\BookingDataService;
use GuzzleHttp;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

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

    function test(Request $request) {
        $fields = $request->all();
        $client = new GuzzleHttp\Client(['base_uri' => $fields['booking_url']]);
        $response = $client->request('GET', 'hotels?hotel_ids=10004',
            [ 'auth' => [ $fields['booking_login'], $fields['booking_password'] ] ] );
        return response($response->getBody());
    }

    /**
     * @return JsonResponse
     */
    public function importCities(): JsonResponse
    {
        try {
            $count = $this->bookingDataImportService->importCitiesFromBookingApi();
        } catch (GuzzleHttp\Exception\GuzzleException $e) {
            return response()->json(['error' => 'Something went wrong'], 500);
        }
        return response()->json(['message' => $count.' objects imported']);
    }

    /**
     * @return JsonResponse
     * @TODO fix response
     */
    public function importFacilities(): JsonResponse
    {
        try {
            $featuresUpdate = $this->bookingDataImportService->importFacilitiesFromBookingApi();
        } catch (GuzzleHttp\Exception\GuzzleException $e) {
            return response()->json(['error' => 'Something went wrong'], 500);
        }
        return response()->json($featuresUpdate);
    }

    function importRoomTypes() {
        try {
            $count = $this->bookingDataImportService->importRoomTypesFromBookingApi();
        } catch (GuzzleHttp\Exception\GuzzleException $e) {
            return response()->json(['error' => 'Something went wrong'], 500);
        }
        return response()->json(['message' => $count.' objects imported']);
    }

    function getFeatures() {
        $childrenFeatures = $this->bookingDataService->getChildrenFeatures();
        $rootFeatures = $this->bookingDataService->filterFeatures($childrenFeatures, 0);
        $rootedFeatures = $this->bookingDataService->getRootedFeatures($rootFeatures, $childrenFeatures);
        return response()->json(['root' => $rootFeatures, 'rooted' => $rootedFeatures, 'children' => $childrenFeatures]);
    }

    public function getRoomTypes()
    {
        $types = $this->bookingDataService->getRoomTypes('hotel');
        return response()->json($types);
    }
    
    public function getBedTypes()
    {
        $bed = $this->bookingDataService->getBedTypes(); 
        
        return response()->json($bed);
    }
    
    public function getShowerTypes()
    {
        $shower = $this->bookingDataService->getShowerTypes(); 
        
        return response()->json($shower);
    }

    public function getKitchenTypes()
    {
        $shower = $this->bookingDataService->getKitchenTypes(); 
        
        return response()->json($shower);
    }
    
    public function getCities() {
        $citiesCount = $this->bookingDataService->getCitiesCount();
        return response()->json(['count' => $citiesCount]);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    function getHotels(Request $request) {
        try {            
            $hotelsArray = $this->bookingDataService->getHotelsByCityAndTypeFromApi($request->city, $request->type);
        } catch (GuzzleHttp\Exception\GuzzleException $e) {
            return response()->json(['error' => 'Something went wrong'], 500);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'City not found'], 500);
        }
        return response()->json($hotelsArray);
    }

    public function saveHotels(Request $request, $data)
    {
        var_dump($data);
        exit;
        $hotels = $request->all();
        $this->bookingDataService->storeHotels($hotels);
        return response()->json(['message' => 'Hotels successful stored']);
    }
}
