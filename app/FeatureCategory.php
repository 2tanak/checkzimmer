<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FeatureCategory extends Model
{
    protected $table = 'features_categories';
    protected $fillable = ['name', 'ord', 'lang'];
    //
}
