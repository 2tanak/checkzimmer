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
    protected $fillable = ['user_id', 'type', 'status', 'views', 'lat', 'lng', 'name', 'city', 'zip', 'address', 'slug', 'description' ];
    protected $with = ['options', 'user', 'rooms', 'questions', 'rating', 'questions', 'features'];
    protected $fillableRelations = ['options', 'rooms', 'features'];
    private static $identifier = 'id';
    private static $children = ['options', 'user'];

    protected $_options = null;
    protected $_photos = null;
    protected $_photoMain = null;

    public const PENDING = 'pending';
    public const APPROVED = 'approved';
    public const DESCLINED = 'declined';

    public const GENERAL = 'general';
    public const AFFILIATE = 'affiliate';

    static function hasFeature($name, $features) {
        $features = array_column($features, 'name');
        return array_search($name, $features) !== false;
    }

    private function getOptions() {
        if ($this->_options == null) {
            $this->_options = $this->options->toArray();
        }
    }
    private function getPhotos() {
        $this->getOptions();

        if ($this->_photos == null) {
            $photos = json_decode(self::optionFind($this->_options, 'photos'), true) ?: [];
            $this->_photoMain = array_reduce( $photos, function($current, $item) { return ($item['main_photo'] ?? false) ? $item : $current; });
            $this->_photos = array_values(array_filter($photos, function($item) { return isset($item['main_photo']) ? false : true; }));
        }
        return $this->_photos;
    }

    public function photos() {
        return $this->getPhotos();
    }

    public function photoMain() {
        $this->getPhotos();
        return $this->_photoMain;
    }

    public function languages() {
        $this->getOptions();
        return explode(',', self::optionFind($this->_options, 'languages')) ?: [];
    }

//    public function features() {
//        $this->getOptions();
//        return json_decode(self::optionFind($this->_options, 'features'), true) ?: [];
//    }

    public function features(){
        return $this->belongsToMany(Feature::class, 'property_features',
            'property_id', 'feature_id');
    }

    public function options() {
        return $this->hasMany(Option::class, 'parent')->where('type', 'property');
    }

    public function rooms() {
        return $this->hasMany(Room::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function questions() {
        return $this->hasMany(Question::class)->where('response', '!=', '');
    }

    public function reviews() {
        return $this->hasMany(Reviews::class)->where('status', 1);
    }

    public function rating() {
        return $this->hasMany(Rating::class, 'property_id', 'id');
    }

    public function featuresMap() {
        $features = Option::where('type', 'property')->where('parent', $this->id)->where('key', 'features')->first();
        if (!$features) {
            return [];
        }
        $mappedFeatures = [];
        $map = BookingDataService::getFeaturesMap();
        foreach ($features as $item) {
            if (!isset($map[$item['native_id']])) {
                continue;
            }
            $mappedFeatures[] = $map[$item['native_id']];
        }
        return $mappedFeatures;
    }
    public function hotelTypesMap() {
        $types = Option::where('type', 'property')->where('parent', $this->id)->where('key', 'hotel_type')->first();
        if (!$types) {
            return [];
        }
        $map = BookingDataService::getHouseMap();
        return $map[$types['native_id']] ?? false;
    }
    public function getRoomPersonsMin() {
        return array_reduce($this->rooms->toArray(), function($carry, $item) {
            return $item['person'] < $carry ? $item['person'] : $carry;
        }, 999);
    }
    public function getRoomPersonsMax() {
        return array_reduce($this->rooms->toArray(), function($carry, $item) {
            return $item['person'] > $carry ? $item['person'] : $carry;
        }, 0);
    }
    public function getRoomPriceMin() {
        return array_reduce($this->rooms->toArray(), function($carry, $item) {
            return $item['price'] < $carry && $item['price'] > 0 ? ceil($item['price']) : $carry;
        }, 9999);
    }
    public static function getTotalNumberObjects($type) {
        if ($type) {
            return self::count();
        } else {
            return self::where('type','=','affiliate')->count();
        }
    }

    public static function getNumberObjectViewsLastMonth() {
        return self::where('created_at', '>=', Carbon::now()->subMonth())->sum('views');
    }

    public static function getTopObjectsReferrals() {
        return self::orderBy('views', 'desc')->take(20)->get()->toArray();
    }

    public function updateRelations(array $data)
    {
        //TODO вынести в трейт fillRelations
        $this->fill($data);

        foreach ($this->fillableRelations as $fillableRelationName){
            if($relationData = $data[$fillableRelationName]){
                $currentRelation = $this->$fillableRelationName;

                array_map(static function(array $data) use ($relationData, $currentRelation){
                    $relationModel = $currentRelation->filter(function ($item) use ($data){
                        return $item->id === $data['id'];
                    })->first();

                    $relationModel->fill($data);

                }, $relationData);
            }
        }

    }
}
