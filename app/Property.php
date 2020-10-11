<?php

namespace App;

use App\Traits\noCRUD;
use Illuminate\Database\Eloquent\Model;
use DB;
use Carbon\Carbon;

class Property extends Model
{
    use noCRUD;
    protected $table = 'property';
    protected $fillable = ['user_id', 'type', 'status', 'views', 'lat', 'lng', 'name', 'city', 'zip', 'address' ];
    protected $with = ['options', 'user', 'rooms', 'questions', 'rating', 'questions'];
    private static $identifier = 'id';
    private static $children = ['options', 'user'];
    
    public const PENDING = 'pending';
    public const APPROVED = 'approved';
    public const DESCLINED = 'declined';
    
    public const GENERAL = 'general';
    public const AFFILIATE = 'affiliate';

    static function hasFeature($name, $features) {
        $features = array_column($features, 'name');
        return array_search($name, $features) !== false;
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
        return $this->hasMany(Rating::class)->select(DB::raw('SUM(rating) as rate'))->groupBy('property_id');
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
