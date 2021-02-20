<?php namespace App;

use App\Traits\optionsLink;
use Illuminate\Database\Eloquent\Model;
use App\Traits\noCRUD;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Feature extends Model
{
    static $optionType = 'feature';
    private static $identifier = 'id';
    private static $children = ['feature_category'];
    protected $fillable = ['feature_category_id', 'picture', 'name', 'ord'];
    protected $with = ['feature_category', 'options'];

    use noCRUD;
    use optionsLink;

    public function feature_category(): BelongsTo
    {
        return $this->belongsTo(FeatureCategory::class);
    }

    public function options(): HasMany {
        return $this->hasMany(Option::class, 'parent')->where('type', 'feature');
    }
    public function properties(): BelongsToMany
    {
        return $this->belongsToMany(Feature::class, 'property',
            'feature_id', 'property_id');
    }
    public function tName() {
        $lang = app('locale')->getCurrentLocale();
        $langKey = 'lang-' . $lang;
        $translation = array_reduce($this->options->all(), function($carry, $item) use ($langKey) {
            return $item->key == $langKey ? $item->value : $carry;
        }, $this->name);
        return $translation;
    }
}
