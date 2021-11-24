<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\noCRUD;

/**
 * Class BookingCity
 * Model for city obtained from Booking API
 *
 * @package App
 */

class BookingCity extends Model
{
    /**
     * Model properties
     *
     * @property string $name city name
     * @property string $native_id ID providedby booking API
     * @property int $hotels_number hotels number
     */

    protected $table = 'booking-cities';
    protected $fillable = ['name', 'native_id', 'hotels_number'];

    /**
     * @var array $children noCRUD-related property
     */
    private static $children = [];

    /**
     * @var string $identifier noCRUD-related property
     */
    private static $identifier = 'id';
    use noCRUD;
}
