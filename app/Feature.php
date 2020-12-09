<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\noCRUD;

class Feature extends Model
{
    static $optionType = 'feature';
    private static $identifier = 'id';
    private static $children = ['feature_category'];
    protected $fillable = ['feature_category_id', 'picture', 'name'];

    use noCRUD;

    public function feature_category()
    {
        return $this->belongsTo(FeatureCategory::class);
    }

    public function properties()
    {
        return $this->belongsToMany(Feature::class, 'property',
            'feature_id', 'property_id');
    }
}
