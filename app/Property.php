<?php

namespace App;

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
    protected $with = ['options', 'user', 'rooms', 'questions', 'rating', 'questions'];
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

    function photos() {
        return $this->getPhotos();
    }
    function photoMain() {
        $this->getPhotos();
        return $this->_photoMain;
    }
    function languages() {
        $this->getOptions();
        return json_decode(self::optionFind($this->_options, 'languages'), true) ?: [];
    }
    function features() {
        $this->getOptions();
        return json_decode(self::optionFind($this->_options, 'features'), true) ?: [];
    }

    function options() {
        return $this->hasMany(Option::class, 'parent')->where('type', 'property');
    }
    function rooms() {
        return $this->hasMany(Room::class);
    }
    function user() {
        return $this->belongsTo(User::class);
    }
    function questions() {
        return $this->hasMany(Question::class);
    }
    function rating() {
        return $this->hasMany(Rating::class, 'property_id', 'id');
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
   
}
