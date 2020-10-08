<?php

namespace App\Console\Commands;
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
use Illuminate\Console\Command;

/**
 * Class updateBookingProperties
 *
 * @package App\Console\Commands
 */
class updateBookingProperties extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'run:update-booking-properties';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'update booking properties';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle() {
        $fields = $request->all();
        $client = new GuzzleHttp\Client(['base_uri' => $fields['booking_url']]);
        $response = $client->request('GET', 'hotels?hotel_ids=10004',
            [ 'auth' => [ $fields['booking_login'], $fields['booking_password'] ] ] );
        
        var_dump($response);
        exit;
    }

}
