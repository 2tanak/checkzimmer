<?php

namespace App;

use App\Traits\noCRUD;
use Illuminate\Database\Eloquent\Model;

class Reviews extends Model
{
    use noCRUD;
    protected $table = 'reviews';
    protected $fillable = ['name', 'company', 'title', 'raiting', 'description', 'status', 'property_id'];
    //
}