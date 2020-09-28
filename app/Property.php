<?php

namespace App;

use App\Traits\noCRUD;
use Illuminate\Database\Eloquent\Model;
use DB;

class Property extends Model
{
    use noCRUD;
    protected $table = 'property';
    protected $fillable = ['user_id', 'type', 'status', 'views', 'lat', 'lng', 'name', 'city', 'zip', 'address' ];
    protected $with = ['options', 'user', 'rooms', 'questions', 'rating', 'questions'];
    private static $identifier = 'id';
    private static $children = ['options', 'user'];

    static function hasFeature($name, $features) {
        $features = array_column($features, 'name');
        return array_search($name, $features) !== false;
    }

    function options() {
        return $this->hasMany(Option::class, 'parent')->where('type', 'property');
    }
    function rooms() {
        return $this->hasMany(Room::class);
    }
    function user() {
        return $this->belongsTo(User::class);
    }
    function questions() {
        return $this->hasMany(Question::class);
    }
    function rating() {
        return $this->hasMany(Rating::class)->select(DB::raw('SUM(rating) as rate'))->groupBy('property_id');
    }
}
