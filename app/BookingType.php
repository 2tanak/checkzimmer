<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\noCRUD;

class BookingType extends Model
{
    private static $identifier = 'id';
    protected $table = 'booking-types';
    protected $fillable = ['name', 'type', 'native_id'];
    static private $children = [];
    use noCRUD;
}
