<?php
namespace App\Console\Commands;

use App\Option;
use App\Room;
use App\Services\BookingDataService;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Console\Command;

/**
 * Class updateBookingProperties
 * Updates properties for existing objects via Booking API
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
     * @var BookingDataService
     */
    private $bookingDataService;

    /**
     * BookingController constructor.
     * @param BookingDataService $bookingDataService
     */
    public function __construct(
        BookingDataService $bookingDataService
    )
    {
        parent::__construct();
        $this->bookingDataService = $bookingDataService;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle() {
        try {
            $hotels = Option::where('type', 'property')
                ->where('key', 'native_id')
                ->get()
                ->pluck('parent', 'value');

            foreach ($hotels as $key => $hotel) {
                $hotelsArray = $this->bookingDataService->getHotelsInfoFromApi($key);

                foreach ($hotelsArray as $key => $room) {
                    $room = Room::where('property_id', '=', $hotel)
                        ->where('native_id', $room['room_id'])
                        ->first();

                    if (!empty($room)) {
                        $room->update([
                            'person'    =>  $room['room_data'][$key]['room_info']['max_persons'],
                            'price'     =>  $room['room_data'][$key]['room_info']['min_price'],
                            'bed'       =>  Room::getBedroomType($room['room_info']['bedrooms'] ?? []),
                            'shower'    =>  Room::getShowerType($room['room_data'][$key]['room_facilities']),
                            'kitchen'   =>  Room::getKitchenType($room['room_data'][$key]['room_facilities'], $room['hotel_data']['hotel_facilities']),
                        ]);
                    }
                }
            }
        } catch (ModelNotFoundException $e) {
            return $e->getMessage();
        }
    }
}
