<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\noCRUD;

class BookingFeatures extends Model {
    protected $table = 'booking-features';
    protected $fillable = [ 'name', 'parent', 'type', 'native_id' ];
    private static $identifier = 'id';
    private static $children = [ 'hotel_features', 'room_features' ];
    use noCRUD;

    function hotel_features()
    {
        return $this->hasMany(BookingFeatures::class, 'parent', 'native_id')->where('type', 'hotel');
    }
    function room_features() {
        return $this->hasMany(BookingFeatures::class, 'parent', 'native_id')->where('type', 'room');
    }
}
