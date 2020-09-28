<?php

namespace App;

use App\Traits\noCRUD;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use noCRUD;

    protected $table = 'ratings';
    protected $fillable = ['property_id', 'rating'];
}
