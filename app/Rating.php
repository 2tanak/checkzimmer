<?php

namespace App;

use App\Traits\noCRUD;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Question
 * Model for storing rating
 *
 * @package App
 */

class Rating extends Model
{
    /**
     * Model properties
     *
     * @property int $property_id property relation
     * @property int $rating rating
     */

    use noCRUD;

    protected $table = 'ratings';
    protected $fillable = ['property_id', 'rating'];
}
