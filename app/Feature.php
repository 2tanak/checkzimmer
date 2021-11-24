<?php namespace App;

use App\Traits\optionsLink;
use Illuminate\Database\Eloquent\Model;
use App\Traits\noCRUD;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Feature
 * Model for property feature (TV, WiFi, Bathroom, etc)
 *
 * @package App
 */
class Feature extends Model
{
    /**
     * Model properties
     *
     * @property string $feature_category_id feature category ID
     * @property string $picture feature pic url
     * @property string $name feature name
     * @property int $ord feature order
     */

    /**
     * @var string $optionType what type of options to use
     */
    static $optionType = 'feature';

    protected $fillable = ['feature_category_id', 'picture', 'name', 'ord'];
    protected $with = ['feature_category', 'options'];

    /**
     * @var string $identifier noCRUD-related property
     */
    private static $identifier = 'id';
    /**
     * @var array $children noCRUD-related property
     */
    private static $children = ['feature_category'];
    use noCRUD;
    use optionsLink;

    /**
     * Return current feature category data
     * @return BelongsTo
     */
    public function feature_category(): BelongsTo
    {
        return $this->belongsTo(FeatureCategory::class);
    }

    /**
     * Return related options
     * @return HasMany
     */
    public function options(): HasMany {
        return $this->hasMany(Option::class, 'parent')->where('type', 'feature');
    }

    /**
     * Get properties related to feature
     * @return BelongsToMany
     */
    public function properties(): BelongsToMany
    {
        return $this->belongsToMany(Feature::class, 'property',
            'feature_id', 'property_id');
    }

    /**
     * Return localized name for feature
     * @return mixed
     */
    public function tName() {
        $lang = app('locale')->getDefaultLocale();
        $langKey = 'lang-' . $lang;
        $translation = array_reduce($this->options->all(), function($carry, $item) use ($langKey) {
            return $item->key == $langKey ? $item->value : $carry;
        }, $this->name);
        return $translation;
    }
}
