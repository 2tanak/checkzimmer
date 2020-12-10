<?php

namespace App;

use App\Traits\noCRUD;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class GeocodeCache extends Model
{
    use noCRUD;

    protected $table = 'geocoder-cache';
    protected $fillable = ['address', 'lat', 'lng', 'timestamp'];
    public $timestamps = false;
    private static $children = [];
    private static $identifier = 'address';

    /**
     * Filter actual data by configured expiration time
     * @param $query
     * @return mixed
     */
    public function scopeOnlyActual($query)
    {
        return $query->where('timestamp', '>', time() - config('geocoder.cache_time'));
    }

    public function toArray()
    {
        return [
            'id'        => $this->id,
            'lat'       => $this->lat,
            'lng'       => $this->lng,
            'address'   => $this->address,
            'timestamp' => Carbon::parse($this->timestamp)->format('Y m d H:m:s')
        ];
    }
}
