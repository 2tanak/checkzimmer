<?php

namespace App;

use App\Option;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Room
 * Model for storing rooms
 *
 * @package App
 */

class Room extends Model
{
    /**
     * @const PRIVATE_COLOR for private features
     */
    const PRIVATE_COLOR = '#4CAF50';

    /**
     * @const SHARED_COLOR for shared fatures
     */
    const SHARED_COLOR = '#F8981D';

    /**
     * @const NONE_COLOR for absent features
     */
    const NONE_COLOR = '#DDDDDD';

    protected $table = 'rooms';
    protected $fillable = ['property_id', 'room_type_id', 'number', 'person', 'price', 'bed', 'shower', 'kitchen', 'status', 'native_id'];
    protected $fillableRelations = ['options'];
    protected $with = ['options', 'roomType'];

    /**
     * Check if room has a feature
     *
     * @param $name
     * @param $room_facilities
     * @return bool
     */
    static function hasFeature($name, $room_facilities): bool
    {
        $facilities = array_column($room_facilities, 'name');

        return array_search($name, $facilities) !== false;
    }

    /**
     * Get kitchen type
     *
     * @param $room
     * @return string
     */
    static function getKitchenType($room): string
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

    /**
     * Get shower type
     *
     * @param $room_facilities
     * @return array|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Translation\Translator|string|null
     */
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

    /**
     * Get bedroom type
     *
     * @param $bedrooms
     * @return string
     */
    static function getBedroomType($bedrooms): string
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

    /**
     * Get related room type
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function roomType() {
        return $this->belongsTo(RoomType::class, 'room_type_id');
    }

    /**
     * Get related options
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function options()
    {
        return $this->hasMany(Option::class, 'parent')->where('type', 'room');
    }

    /**
     * Get related kitchen type title
     *
     * @param $room
     * @return string
     */
    public static function getKitchenTypeText($room): string
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

    /**
     * Get kitchen color
     *
     * @param $room
     * @return string
     */
    public static function getKitchenLabelColor($room): string
    {
        $type = $room['kitchen'];
        if ($type == 'kitchenette' || $type == 'single'){
            return self::PRIVATE_COLOR;
        } elseif ($type == 'shared') {
            return self::SHARED_COLOR;
        }
        return self::NONE_COLOR;
    }

    /**
     * Get shower title
     *
     * @param $room
     * @return string
     */
    public static function getShowerTypeText($room): string
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

    /**
     * Get shower label color
     *
     * @param $room
     * @return string
     */
    public static function getShowerLabelColor($room): string
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

    /**
     * Get bedroom type text
     *
     * @param $room
     * @return string
     */
    public static function getBedroomTypeText($room): string
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

    /**
     * Get bedroom type color
     *
     * @param $item
     * @return string
     */
    static public function getBedroomLabelColor($item): string
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

    /**
     * Get persons number text
     *
     * @return string
     */
    public function getPersonsText()
    {
        if ($this->person == 1){
            return __('single');
        } elseif ($this->person == 2){
            return __('double');
        }
        return __('many places');
    }

    /**
     * Update relations
     *
     * @param array $data
     */
    public function updateRelations(array $data)
    {
        //TODO вынести в трейт fillRelations
        $this->fill($data);

        foreach ($this->fillableRelations as $fillableRelationName)
        {
            if ($relationData = $data[$fillableRelationName]){
                $currentRelation = $this->$fillableRelationName;

                array_map(function (array $data) use ($relationData, $currentRelation) {
                    $relationModel = $currentRelation->filter(function ($item) use ($data) {
                        return $item->id === ($data['id'] ?? 0);
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

    /**
     * Get room name
     *
     * @param $persons
     * @return string
     */
    public static function getName ($persons): string
    {
        $roomNames = ['', 'Single room', 'Double room', 'Triple room', 'Quadruple', 'Quintuple', 'Six-seater', 'Seven-seater', 'Eight-seater', 'Nine-seater', 'Ten-seater' ];
        return $roomNames[$persons] ?? '';
    }
}
