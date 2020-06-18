<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    //
    protected $table = 'features';
    protected $fillable = ['feature_category_id', 'ord', 'picture', 'name'];
}
