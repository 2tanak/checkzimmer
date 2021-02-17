<?php

namespace App;

use App\Services\BookingDataService;
use App\Traits\noCRUD;
use App\Traits\propertyFeatures;
use Illuminate\Database\Eloquent\Model;
use DB;
use Carbon\Carbon;

class Property extends Model
{
    use noCRUD;
    use propertyFeatures;

    protected $table = 'property';
    protected $fillable = ['user_id', 'type', 'status', 'ord', 'views', 'access', 'lat', 'lng', 'name', 'city', 'zip', 'address', 'slug', 'description'];
    protected $with = ['options', 'user', 'rooms', 'questions', 'rating', 'questions', 'features'];
    protected $fillableRelations = ['options', 'rooms', 'features'];
    private static $identifier = 'id';
    private static $children = ['options', 'user'];
    protected $data = [];
    protected $_options = null;
    protected $_photos = null;
    protected $_photoMain = null;

    public const PENDING = 'pending';
    public const APPROVED = 'approved';
    public const DESCLINED = 'declined';

    public const GENERAL = 'general';
    public const AFFILIATE = 'affiliate';

    protected $price_min = null;

    static function hasFeature($name, $features)
    {
        $features = array_column($features, 'name');
        return array_search($name, $features) !== false;
    }

    private function getOptions()
    {
        if ($this->_options == null)
        {
            $this->_options = $this->options->toArray();
        }
    }

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

    public function photos()
    {
        return $this->getPhotos();
    }

    public function photoMain()
    {
        $this->getPhotos();
        return $this->_photoMain;
    }

    public function languages()
    {
        $this->getOptions();
        $langs = self::optionFind($this->_options, 'languages');
        return  $langs ? explode(',', $langs): ['ru', 'en', 'de'];
    }

//    public function features() {
//        $this->getOptions();
//        return json_decode(self::optionFind($this->_options, 'features'), true) ?: [];
//    }

    public function features()
    {
        return $this->belongsToMany(Feature::class, 'property_features',
            'property_id', 'feature_id');
    }

    public function options()
    {
        return $this->hasMany(Option::class, 'parent')->where('type', 'property');
    }

    public function rooms()
    {
        return $this->hasMany(Room::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function questions()
    {
        return $this->hasMany(Question::class)->where('response', '!=', '');
    }

    public function reviews()
    {
        return $this->hasMany(Reviews::class)->where('status', 1);
    }

    public function rating()
    {
        return $this->hasMany(Rating::class, 'property_id', 'id');
    }

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

    public function featuresByCat($featureCategoryId) {
        return array_filter($this->features->all(), function($item) use ($featureCategoryId) {
            return $item->feature_category['id'] == $featureCategoryId;
        });
    }

    public function hotelTypesMap()
    {
        $types = Option::where('type', 'property')->where('parent', $this->id)->where('key', 'hotel_type')->first();
        if (!$types){
            return [];
        }
        $map = BookingDataService::getHouseMap();

        return $map[$types['native_id']] ?? false;
    }

    public function getTotalRooms($typeId = null)
    {
        return array_reduce($this->rooms->toArray(), function ($carry, $item) use ($typeId) {
            return $carry + ($typeId == null || $typeId == $item['room_type_id'] ? $item['number'] : 0);
        }, 0);
    }

    public function getRoomPersonsMin()
    {
        if (!$this->rooms->toArray()) {
            return 0;
        }
        return array_reduce($this->rooms->toArray(), function ($carry, $item) {
            return $item['person'] < $carry ? $item['person'] : $carry;
        }, 999);
    }

    public function getRoomTypes() {
        if ($this->roomTypes == null) {
            $roomTypes = array_column($this->rooms->toArray(), 'room_type_id');
            $this->roomTypes = RoomType::whereIn('id', $roomTypes)->get();
        }
        return $this->roomTypes;
    }
    public function getRoomsByType($typeId) {
        return array_filter($this->rooms->toArray(), function($item) use ($typeId) {
            return $item['room_type_id'] == $typeId;
        });
    }
    public function getRoomPersonsMax($typeId = null)
    {
        return array_reduce($this->rooms->toArray(), function ($carry, $item) use ($typeId) {
            return $carry + (($typeId == null || $typeId == $item['room_type_id']) && $item['price'] > 0 ? $item['number'] * $item['person'] : 0);
        }, 0);
    }

    public function checkHideAdress(){
        $hideAdress = Option::where('type', 'property')->where('parent', $this->id)->where('key', 'hide_address')->first();
        if (!$hideAdress){
            return true;
        }
    }
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

    public static function getTotalNumberObjects($type)
    {
        if ($type) {
            return self::count();
        } else {
            return self::where('type', '=', 'affiliate')->count();
        }
    }

    public static function getNumberObjectViewsLastMonth()
    {
        return self::where('created_at', '>=', Carbon::now()->subMonth())->sum('views');
    }

    public static function getTopObjectsReferrals()
    {
        return self::orderBy('views', 'desc')->take(20)->get()->toArray();
    }

    public function updateRelations(array $data)
    {
        //TODO вынести в трейт fillRelations
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
    public function getSEOTitle()
    {
        $title = $this->getCurrentOption('seo_title');
        return $this->handleTemplate($title ?? '');
    }
    public function getSEODescription() {
        $description = $this->getCurrentOption('seo_description');
        return $this->handleTemplate($description ?? '');
    }
}
