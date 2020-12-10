<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Statistic extends Model
{
    protected $table = 'statistic';

    protected $fillable = [
        'type_object',
        'type_action',
        'link',
        'params'
    ];

    public static function getNumberClicksAffiliate()
    {
        return self::sum('link');
    }

    public static function getNumberClicksAffiliateMonth()
    {
        return self::where('created_at', '>=', Carbon::now()->subMonth())->sum('link');
    }

    public static function getTopObjectsReferrals()
    {
        return self::orderBy('link', 'desc')->take(20)->get()->toArray();
    }
}
