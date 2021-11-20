<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Postcode
 * Model for storing postcodes
 *
 * @package App
 */

class Postcode extends Model
{
    /**
     * Model properties
     *
     * @property string $city postcode city
     * @property string $code postcode number
     * @property string $latitude postcode latitude
     * @property string $longitude postcode longitude
     */

    use HasFactory;
}
