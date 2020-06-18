<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\noCRUD;

class Feature extends Model {
    static $optionType = 'feature';
    private static $identifier = 'id';
    private static $children = ['feature_category'];
    use noCRUD;

    function feature_category() {
        return $this->belongsTo(FeatureCategory::class);
    }
}
