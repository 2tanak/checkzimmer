<?php

namespace App;

use App\Option;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    const PRIVATE_COLOR = '#4CAF50';
    const SHARED_COLOR = '#F8981D';
    const NONE_COLOR = '#DDDDDD';

    protected $table = 'rooms';
    protected $fillable = ['property_id', 'room_type_id', 'number', 'person', 'price', 'bed', 'shower', 'kitchen', 'status', 'native_id'];
    protected $fillableRelations = ['options'];
    protected $with = ['options', 'roomType'];

    static function hasFeature($name, $room_facilities)
    {
        $facilities = array_column($room_facilities, 'name');

        return array_search($name, $facilities) !== false;
    }

    static function getKitchenType($room)
    {
        switch ($room['kitchen']) {
            case 'kitchenette':
                return __('kitchenette');
            case 'shared':
                return __('shared');
            case 'single':
                return __('single');
        }
        return __('none');
    }

    static function getShowerType($room_facilities)
    {
        if (self::hasFeature('Shared bathroom', $room_facilities)){
            return __('shared');
        }
        if (self::hasFeature('Shower', $room_facilities) || self::hasFeature('Private bathroom', $room_facilities)){
            return __('single');
        }
        return __('none');
    }

    static function getBedroomType($bedrooms)
    {
        if (count($bedrooms) == 0){
            return __('none');
        }
        foreach ($bedrooms as $bedroom){
            if (strpos($bedroom['description'], 'double') !== false){
                return __('double');
            }
        }
        return __('single');
    }

    public function roomType() {
        return $this->belongsTo(RoomType::class, 'room_type_id');
    }
    public function options()
    {
        return $this->hasMany(Option::class, 'parent')->where('type', 'room');
    }

    public static function getKitchenTypeText($room)
    {
        switch ($room['kitchen'])
        {
            case 'kitchenette':
            case 'single':
                return __('private');
            case 'shared':
                return __('shared');
            default:
                return __('none');
        }
    }

    public static function getKitchenLabelColor($room)
    {
        $type = $room['kitchen'];
        if ($type == 'kitchenette' || $type == 'single'){
            return self::PRIVATE_COLOR;
        } elseif ($type == 'shared') {
            return self::SHARED_COLOR;
        }
        return self::NONE_COLOR;
    }

    public static function getShowerTypeText($room)
    {
        switch ($room['shower'])
        {
            case 'single':
                return __('private');
            case 'shared':
                return __('shared');
        }
        return __('none');
    }

    public static function getShowerLabelColor($room)
    {
        switch ($room['shower'])
        {
            case 'single':
                return self::PRIVATE_COLOR;
            case 'shared':
                return self::SHARED_COLOR;
        }
        return self::NONE_COLOR;
    }

    public static function getBedroomTypeText($room)
    {
        switch ($room['bed'])
        {
            case 'single':
                return __('single');
            case 'double':
                return __('double');
        }
        return __('none');
    }

    static public function getBedroomLabelColor($item)
    {
        switch ($item['bed'])
        {
            case 'single':
                return self::PRIVATE_COLOR;
            case 'double':
                return self::SHARED_COLOR;
        }
        return self::NONE_COLOR;
    }

    public function getPersonsText()
    {
        if ($this->person == 1){
            return __('single');
        } elseif ($this->person == 2){
            return __('double');
        }
        return __('many places');
    }

    public function updateRelations(array $data)
    {
        //TODO вынести в трейт fillRelations
        $this->fill($data);

        foreach ($this->fillableRelations as $fillableRelationName)
        {
            if ($relationData = $data[$fillableRelationName]){
                $currentRelation = $this->$fillableRelationName;

                array_map(static function (array $data) use ($relationData, $currentRelation) {
                    $relationModel = $currentRelation->filter(function ($item) use ($data) {
                        return $item->id === $data['id'];
                    })->first();
                    if($relationModel){
                        $relationModel->fill($data);
                        if(method_exists($relationModel, 'updateRelations')){
                            $relationModel->updateRelations($data);
                        }
                    }

                }, $relationData);
            }
        }
    }
    public static function getName ($persons) {
        $roomNames = ['', 'Single room', 'Double room', 'Triple room', 'Quadruple', 'Quintuple', 'Six-seater', 'Seven-seater', 'Eight-seater', 'Nine-seater', 'Ten-seater' ];
        return $roomNames[$persons] ?? 0;
    }
}
