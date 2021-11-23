<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\noCRUD;

/**
 * Class BookingType
 * Model for types obtained from Booking API
 *
 * @package App
 */

class BookingType extends Model
{
    /**
     * Model properties
     *
     * @property string $name type name
     * @property string $type type
     * @property string $native_id ID providedby booking API
     */

    protected $table = 'booking-types';
    protected $fillable = ['name', 'type', 'native_id'];

    /**
     * @var string $identifier noCRUD-related property
     */
    private static $identifier = 'id';

    /**
     * @var array $children noCRUD-related property
     */
    private static $children = [];

    use noCRUD;
}
