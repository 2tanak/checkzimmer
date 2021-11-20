<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\noCRUD;

/**
 * Class BookingFeatures
 * Model for feature obtained from Booking API
 *
 * @package App
 */

class BookingFeatures extends Model
{
    /**
     * Model properties
     *
     * @property string $name feature name
     * @property int $parent feature parent
     * @property string $type feature type
     * @property string $native_id ID providedby booking API
     */

    protected $table = 'booking-features';
    protected $fillable = ['name', 'parent', 'type', 'native_id'];

    /**
     * @var string $identifier noCRUD-related property
     */
    private static $identifier = 'id';

    /**
     * @var array $children noCRUD-related property
     */
    private static $children = ['hotel_features', 'room_features'];
    use noCRUD;

    /**
     * Relation to child features of type hotel
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function hotel_features()
    {
        return $this->hasMany(BookingFeatures::class, 'parent', 'native_id')->where('type', 'hotel');
    }

    /**
     * Relation to child features of type room
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function room_features()
    {
        return $this->hasMany(BookingFeatures::class, 'parent', 'native_id')->where('type', 'room');
    }
}
