<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Option;

class Room extends Model
{
    const PRIVATE_COLOR = '#4CAF50';
    const SHARED_COLOR = '#F8981D';
    const NONE_COLOR = '#DDDDDD';

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
    function getKitchenTypeText() {
        switch ($this->kitchen) {
            case 'kitchenette':
            case 'single':
                return 'своя';
            case 'shared':
                return 'совместная';
            default:
                return 'none';
        }
    }
    function getKitchenLabelColor() {
        $type = $this->kitchen;
        if ($type == 'kitchenette' || $type == 'single') {
            return self::PRIVATE_COLOR;
        } elseif ($type == 'shared') {
            return self::SHARED_COLOR;
        }
        return self::NONE_COLOR;
    }
    function getShowerTypeText() {
        switch ($this->shower) {
            case 'single':
                return 'свой';
            case 'shared':
                return 'совместный';
        }
        return 'none';
    }
    function getShowerLabelColor() {
        switch ($this->shower) {
            case 'single':
                return self::PRIVATE_COLOR;
            case 'shared':
                return self::SHARED_COLOR;
        }
        return self::NONE_COLOR;
    }
    function getBedroomTypeText() {
        switch ($this->bed) {
            case 'single':
                return 'одноместная';
            case 'double':
                return 'двухместная';
        }
        return 'неизвестно';
    }
    function getBedroomLabelColor() {
        switch ($this->bed) {
            case 'single':
                return self::PRIVATE_COLOR;
            case 'double':
                return self::SHARED_COLOR;
        }
        return self::NONE_COLOR;
    }

    function getPersonsText() {
        if ($this->person == 1) {
            return 'одноместная';
        } elseif ($this->person == 2) {
            return 'двухместная';
        }
        return 'на много мест';
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
