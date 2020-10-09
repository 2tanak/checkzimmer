<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Option;

class Room extends Model
{
    //
    protected $table = 'rooms';
    protected $fillable = ['property_id', 'room_type_id', 'number', 'person', 'price', 'bed', 'shower', 'kitchen', 'status', 'native_id'];
    protected $with = ['options'];

    static function hasFeature($name, $room_facilities) {
        $facilities = array_column($room_facilities, 'name');
        return array_search($name, $facilities) !== false;

    }
    static function getKitchenType($room_facilities, $hotel_facilities) {
        if (self::hasFeature('Kitchenette', $room_facilities)) {
            return 'kitchenette';
        }
        if (Property::hasFeature('Shared kitchen', $hotel_facilities)) {
            return 'shared';
        }
        if (self::hasFeature('Kitchen', $room_facilities)) {
            return 'single';
        }
        return 'none';
    }
    static function getShowerType($room_facilities) {
        if (self::hasFeature('Shared bathroom', $room_facilities)) {
            return 'shared';
        }
        if (self::hasFeature('Shower', $room_facilities) || self::hasFeature('Private bathroom', $room_facilities)) {
            return 'single';
        }
        return 'none';
    }
    static function getBedroomType($bedrooms) {
        if (count($bedrooms) == 0) {
            return 'none';
        }
        foreach ($bedrooms as $bedroom) {
            if (strpos($bedroom['description'], 'double') !== false) {
                return 'double';
            }
        }
        return 'single';
    }
    function options() {
        return $this->hasMany(Option::class, 'parent')->where('type', 'room');
    }
}
