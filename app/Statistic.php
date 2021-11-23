<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

/**
 * Class Statistic
 * Model for storing statistics
 *
 * @package App
 */

class Statistic extends Model
{
    /**
     * Model properties
     *
     * @property int $type_object related object type
     * @property int $type_action action type
     * @property string $link event link
     * @property string $params event params
     */
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
