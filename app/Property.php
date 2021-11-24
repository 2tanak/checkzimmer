<?php

namespace App;

use App\Services\BookingDataService;
use App\Traits\noCRUD;
use App\Traits\optionsLink;
use App\Traits\propertyFeatures;
use Illuminate\Database\Eloquent\Model;
use DB;
use Carbon\Carbon;

/**
 * Class Property
 * Model for storing property
 *
 * @package App
 */

class Property extends Model
{
    /**
     * Model properties
     *
     * @property int $user_id property owner
     * @property string $type property type (ie affiliate, general)
     * @property string $status property status (ie published, in in review, etc)
     * @property int $ord property order
     * @property int $views property views
     * @property string $access special access conditions
     * @property float $lat property latitude
     * @property float $lon property longitude
     * @property string $name property name
     * @property string $city property city
     * @property string $zip property zip
     * @property string $address property address
     * @property string $slug slug for property URL
     * @property string $description property description
     * @property string $price min room price
     */

    use noCRUD;
    use propertyFeatures;
    use optionsLink;

    protected $table = 'property';
    protected $fillable = ['user_id', 'type', 'status', 'ord', 'views', 'access', 'lat', 'lng', 'name', 'city', 'zip', 'address', 'slug', 'description', 'price'];
    protected $with = ['options', 'user', 'rooms', 'questions', 'rating', 'questions', 'features'];
    protected $fillableRelations = ['options', 'rooms', 'features'];


    /**
     * @var array $children noCRUD-related property
     */
    private static $children = ['options', 'user'];

    /**
     * @var string $identifier noCRUD-related property
     */
    private static $identifier = 'id';

    protected $data = [];

    /**
     * @var array $_options
     */
    protected $_options = null;

    /**
     * @var array $_photos property photos
     */
    protected $_photos = null;

    /**
     * @var array $_photoMain the main photo of the property
     */
    protected $_photoMain = null;

    /**
     * @const PENDING property is on review
     */
    public const PENDING = 'pending';

    /**
     * @const APPROVED property is approved for publication
     */
    public const APPROVED = 'approved';

    /**
     * @const DECLINED the property is declined
     */
    public const DECLINED = 'declined';

    /**
     * @const GENERAL the property is registered on current website
     */
    public const GENERAL = 'general';

    /**
     * @const AFFILIATE the property is an affiliate object
     */
    public const AFFILIATE = 'affiliate';

    /**
     * @var float $price_min min price for a room
     */
    protected $price_min = null;

    /**
     * Check if property has a feature
     *
     * @param $name
     * @param $features
     * @return bool
     */
    static function hasFeature($name, $features)
    {
        $features = array_column($features, 'name');
        return array_search($name, $features) !== false;
    }

    /**
     * Get options for the property
     */
    private function getOptions()
    {
        if ($this->_options == null)
        {
            $this->_options = $this->options->toArray();
        }
    }

    /**
     * Get an option by its name
     *
     * @param $key
     * @return mixed|string
     */
    function getCurrentOption($key) {
        if($this->_options == null) {
            $this->getOptions();
        }
        if (($this->data[$key] ?? null) === null) {
            $index = array_search($key,array_column($this->_options,'key'));
            if($index === false) {
                return '';
            }

            $this->data[$key] = $this->_options[$index];
        }
        return ($this->data[$key]['value'] ?? '');
    }

    /**
     * Get photos for the property
     * @return array|null
     */
    private function getPhotos()
    {
        $this->getOptions();

        if ($this->_photos == null)
        {
            $photos = json_decode(self::optionFind($this->_options, 'photos'), true) ?: [];
            $this->_photoMain = array_reduce($photos, function ($current, $item) {
                return ($item['main_photo'] ?? false) ? $item : $current;
            });
            $this->_photos = array_values(array_filter($photos, function ($item) {
                return isset($item['main_photo']) ? false : true;
            }));
            if (!$this->_photoMain) {
                $this->_photoMain = $this->_photos[0] ?? '';
                unset($this->_photos[0]);
            }
        }
        return array_values($this->_photos);
    }

    /**
     * Get property photos
     *
     * @return array|null
     */
    public function photos()
    {
        return $this->getPhotos();
    }

    /**
     * Get main property photo
     *
     * @return array|null
     */
    public function photoMain()
    {
        $this->getPhotos();
        return $this->_photoMain;
    }

    /**
     * Get spoken languages for the property
     *
     * @return false|string[]
     */
    public function languages()
    {
        $this->getOptions();
        $langs = self::optionFind($this->_options, 'languages');
        return  $langs ? explode(',', $langs): ['ru', 'en', 'de'];
    }

    /**
     * Get related features
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function features()
    {
        return $this->belongsToMany(Feature::class, 'property_features',
            'property_id', 'feature_id');
    }

    /**
     * Get related options
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function options()
    {
        return $this->hasMany(Option::class, 'parent')->where('type', 'property');
    }

    /**
     * Get related rooms
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function rooms()
    {
        return $this->hasMany(Room::class);
    }

    /**
     * Get property owner
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get related questions
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function questions()
    {
        return $this->hasMany(Question::class)->where('response', '!=', '');
    }

    /**
     * Get related reviews
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reviews()
    {
        return $this->hasMany(Reviews::class)->where('status', 1);
    }

    /**
     * Get property rating
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function rating()
    {
        return $this->hasMany(Rating::class, 'property_id', 'id');
    }

    /**
     * Map features from booking to internal scheme
     * @return array
     */
    public function featuresMap()
    {
        $features = Option::where('type', 'property')->where('parent', $this->id)->where('key', 'features')->first();
        if (!$features){
            return [];
        }
        $mappedFeatures = [];
        $map = BookingDataService::getFeaturesMap();
        foreach ($features as $item){
            if (!isset($map[$item['native_id']])){
                continue;
            }
            $mappedFeatures[] = $map[$item['native_id']];
        }
        return $mappedFeatures;
    }

    /**
     * Get feature categories
     *
     * @return array
     */
    public function featureCategories() {
        $cats = [];
        foreach($this->features->toArray() as $feature) {
            $exists = array_search($feature['feature_category']['id'], array_column($cats, 'id'));
            if ($exists === false) {
                $cats[] = $feature['feature_category'];
            }
        }
        return $cats;
    }

    /**
     * Get features by category
     *
     * @param $featureCategoryId
     * @return array
     */
    public function featuresByCat($featureCategoryId) {
        return array_filter($this->features->all(), function($item) use ($featureCategoryId) {
            return $item->feature_category['id'] == $featureCategoryId;
        });
    }

    /**
     * Map hotel types from booking to internal system
     *
     * @return array|false|mixed
     */
    public function hotelTypesMap()
    {
        $types = Option::where('type', 'property')->where('parent', $this->id)->where('key', 'hotel_type')->first();
        if (!$types){
            return [];
        }
        $map = BookingDataService::getHouseMap();

        return $map[$types['native_id']] ?? false;
    }

    /**
     * Get rooms number
     *
     * @param null $typeId
     * @return int
     */
    public function getTotalRooms($typeId = null): int
    {
        return array_reduce($this->rooms->toArray(), function ($carry, $item) use ($typeId) {
            return $carry + ($typeId == null || $typeId == $item['room_type_id'] ? $item['number'] : 0);
        }, 0);
    }

    /**
     * Get min persons by room
     *
     * @return int
     */
    public function getRoomPersonsMin(): int
    {
        if (!$this->rooms->toArray()) {
            return 0;
        }
        return array_reduce($this->rooms->toArray(), function ($carry, $item) {
            return $item['person'] < $carry ? $item['person'] : $carry;
        }, 999);
    }

    /**
     * Get room types
     *
     * @return mixed
     */
    public function getRoomTypes() {
        if ($this->roomTypes == null) {
            $roomTypes = array_column($this->rooms->toArray(), 'room_type_id');
            $this->roomTypes = RoomType::whereIn('id', $roomTypes)->get();
        }
        return $this->roomTypes;
    }

    /**
     * Get rooms by type
     *
     * @param $typeId
     * @return array
     */
    public function getRoomsByType($typeId): array
    {
        return array_filter($this->rooms->toArray(), function($item) use ($typeId) {
            return $item['room_type_id'] == $typeId;
        });
    }

    /**
     * Get max number of persons by room
     *
     * @param null $typeId
     * @return int
     */
    public function getRoomPersonsMax($typeId = null): int
    {
        return array_reduce($this->rooms->toArray(), function ($carry, $item) use ($typeId) {
            return $carry + (($typeId == null || $typeId == $item['room_type_id']) && $item['price'] > 0 ? $item['number'] * $item['person'] : 0);
        }, 0);
    }

    /**
     * Check if address should be hidden
     *
     * @return bool|void
     */
    public function checkHideAdress()
    {
        $hideAdress = Option::where('type', 'property')->where('parent', $this->id)->where('key', 'hide_address')->first();
        if (!$hideAdress){
            return true;
        }
    }

    /**
     * Get minimum room price
     *
     * @param null $typeId
     * @return float|int|null
     */
    public function getRoomPriceMin($typeId = null)
    {
        if ($this->price_min) {
            return $this->price_min;
        }
        $price = array_reduce($this->rooms->toArray(), function ($carry, $item) use ($typeId) {
            return ($typeId == null || $typeId == $item['room_type_id'] )&& $item['price'] < $carry && $item['price'] > 0 ? ceil($item['price']) : $carry;
        }, 9999);
        if ($price == 9999) {
            $price = 0;
        }
        return $price;
    }

    /**
     * Get total property number
     * @param $type
     * @return mixed
     */
    public static function getTotalNumberObjects($type)
    {
        if ($type) {
            return self::count();
        } else {
            return self::where('type', '=', 'affiliate')->count();
        }
    }

    /**
     * Get number of views for the last month
     * @return mixed
     */
    public static function getNumberObjectViewsLastMonth()
    {
        return self::where('created_at', '>=', Carbon::now()->subMonth())->sum('views');
    }

    /**
     * Get most viewed objects
     * @return mixed
     */
    public static function getTopObjectsReferrals()
    {
        return self::orderBy('views', 'desc')->take(20)->get()->toArray();
    }

    /**
     * Update relations
     *
     * @param array $data
     */
    public function updateRelations(array $data)
    {
        // ToDo: move to trait fillRelations
        $this->fill($data);

        foreach ($this->fillableRelations as $fillableRelationName)
        {
            if ($relationData = $data[$fillableRelationName]){
                $currentRelation = $this->$fillableRelationName;
                array_map(function ($data) use ($relationData, $currentRelation) {
                    if ($data == null) {
                        $data = '';
                    }
                    $relationModel = $currentRelation->filter(function ($item) use ($data, $relationData) {
                        return $item->id === $data['id'];
                    })->first();
                    if($relationModel){
                        $relationModel->fill($data);
                        if(method_exists($relationModel, 'updateRelations')){
                            $relationModel->updateRelations($data);
                        }
                    }

                }, $relationData);
            }
        }
    }

    /**
     * Additional template handling
     * @param $str
     * @return array|string|string[]|null
     */
    public function handleTemplate($str) {
        $address = explode(' ', $this->address);
        $house = array_pop($address);
        $address = implode(' ', $address);

        $template = [
            'city' => $this->city,
            'site-title' => env('APP_NAME', 'CheckZimmer.de'),
            'postcode' => $this->zip,
            'street' => $address,
            'house-number' => $house,
        ];
        foreach ($template as $key => $item) {
            $str = str_replace("%$key%", $item, $str);
        }
        $hideZip = $this->getCurrentOption('hideZip');
        $hideAddress = $this->getCurrentOption('hideAddress');
        if ($hideZip) {
            $str = preg_replace('/<hide-zip>.*?<\/hide-zip>/', '', $str);
        } else {
            $str = preg_replace('/<hide-zip>(.*?)<\/hide-zip>/', '$1', $str);
        }

        if ($hideAddress) {
            $str = preg_replace('/<hide-address>.*?<\/hide-address>/', '', $str);
        } else {
            $str = preg_replace('/<hide-address>(.*?)<\/hide-address>/', '$1', $str);
        }

        if ($hideZip && $hideAddress) {
            $str = preg_replace('/<hide-all>.*?<\/hide-all>/', '', $str);
        } else {
            $str = preg_replace('/<hide-all>.*?<\/hide-all>/', '', $str);
        }
        return $str;
    }

    /**
     * Get SEO Title
     * @return array|string|string[]|null
     */
    public function getSEOTitle()
    {
        $title = $this->getCurrentOption('seo_title');
        return $this->handleTemplate($title ?? '');
    }

    /**
     * Get SEO Description
     * @return array|string|string[]|null
     */
    public function getSEODescription() {
        $description = $this->getCurrentOption('seo_description');
        return $this->handleTemplate($description ?? '');
    }

    /**
     * Format phone
     * @param $phone
     * @return string
     */
    static function phoneFormat($phone): string {
        if (!$phone) {
            return '';
        }
        $phone = preg_replace('/[^0-9]/', '', $phone);
        $phone = '+'.$phone;
        return $phone;
    }

    /**
     * Localize date
     * @param null $date
     * @return array|mixed|string|string[]
     */
    function locDate($date = null) {
        $date = $date ?: date('j. {} Y', strtotime($this->created_at));
        $mon = __(date('F', strtotime($this->created_at)));
        return str_replace('{}', $mon, $date);
    }
}
