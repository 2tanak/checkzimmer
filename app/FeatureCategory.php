<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class FeatureCategory
 * Model for property feature categories
 *
 * @package App
 */
class FeatureCategory extends Model
{
    /**
     * Model properties
     *
     * @property string $name feature name
     * @property int $ord feature order
     * @property string $lang feature category language
     */

    protected $table = 'features_categories';
    protected $fillable = ['name', 'ord', 'lang'];
}
