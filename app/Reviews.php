<?php

namespace App;

use App\Traits\noCRUD;
use Illuminate\Database\Eloquent\Model;

class Reviews extends Model
{
    public const STATUS_WAITING = 2;
    public const STATUS_PUBLISH = 1;

    use noCRUD;
    protected $table = 'reviews';
    protected $fillable = ['name', 'company', 'title', 'rating', 'description', 'status', 'property_id'];
    //
}
