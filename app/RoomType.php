<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoomType extends Model
{
    //
    protected $table = 'room_types';
    protected $fillable = ['room_type_id', 'picture', 'name', 'persons'];
}
