<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\noCRUD;

class BookingType extends Model {
    private static $identifier = 'id';
    use noCRUD;
}
