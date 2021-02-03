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
    protected $with = ['options'];

    static function hasFeature($name, $room_facilities)
    {
        $facilities = array_column($room_facilities, 'name');

        return array_search($name, $facilities) !== false;
    }

    static function getKitchenType($room_facilities, $hotel_facilities)
    {
        if (self::hasFeature('Kitchenette', $room_facilities)){
            return 'kitchenette';
        }
        if (Property::hasFeature('Shared kitchen', $hotel_facilities)){
            return 'shared';
        }
        if (self::hasFeature('Kitchen', $room_facilities)){
            return 'single';
        }
        return 'none';
    }

    static function getShowerType($room_facilities)
    {
        if (self::hasFeature('Shared bathroom', $room_facilities)){
            return 'shared';
        }
        if (self::hasFeature('Shower', $room_facilities) || self::hasFeature('Private bathroom', $room_facilities)){
            return 'single';
        }
        return 'none';
    }

    static function getBedroomType($bedrooms)
    {
        if (count($bedrooms) == 0){
            return 'none';
        }
        foreach ($bedrooms as $bedroom){
            if (strpos($bedroom['description'], 'double') !== false){
                return 'double';
            }
        }
        return 'single';
    }

    public function options()
    {
        return $this->hasMany(Option::class, 'parent')->where('type', 'room');
    }

    public function getKitchenTypeText()
    {
        switch ($this->kitchen)
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

    public function getKitchenLabelColor()
    {
        $type = $this->kitchen;
        if ($type == 'kitchenette' || $type == 'single'){
            return self::PRIVATE_COLOR;
        } elseif ($type == 'shared') {
            return self::SHARED_COLOR;
        }
        return self::NONE_COLOR;
    }

    public function getShowerTypeText()
    {
        switch ($this->shower)
        {
            case 'single':
                return __('private');
            case 'shared':
                return __('shared');
        }
        return __('none');
    }

    public function getShowerLabelColor()
    {
        switch ($this->shower)
        {
            case 'single':
                return self::PRIVATE_COLOR;
            case 'shared':
                return self::SHARED_COLOR;
        }
        return self::NONE_COLOR;
    }

    public function getBedroomTypeText()
    {
        switch ($this->bed)
        {
            case 'single':
                return __('single');
            case 'double':
                return __('double');
        }
        return __('unknown');
    }

    public function getBedroomLabelColor()
    {
        switch ($this->bed)
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

    public function getName () {
        return array_reduce($this->options->toArray(), function($carry, $item) {
            return $item['key'] == 'name' ? $item['value'] : $carry;
        }, '');
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
}
