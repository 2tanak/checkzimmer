<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class RoomType
 * Model for storing room types
 *
 * @package App
 */

class RoomType extends Model
{
    /**
     * Model properties
     *
     * @property int $property_id related property id
     * @property int $room_type_id related room type ID
     * @property string $picture room type picture URL
     * @property string $name room type name
     * @property int $persons persons number
     */

    protected $table = 'room_types';
    protected $fillable = ['property_id', 'room_type_id', 'picture', 'name', 'persons'];
}
