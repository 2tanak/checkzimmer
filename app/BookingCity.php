<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\noCRUD;

class BookingCity extends Model {
    protected $table = 'booking-cities';
    protected $fillable = ['name', 'native_id', 'hotels_number'];
    private static $children = [];
    private static $identifier = 'id';
    use noCRUD;

}
