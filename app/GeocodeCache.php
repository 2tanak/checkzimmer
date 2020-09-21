<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GeocodeCache extends Model
{
    protected $table = 'geocoder-cache';
    protected $fillable = ['address', 'lat', 'lng', 'timestamp'];
    public $timestamps = false;

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
        return ['lat' => $this->lat, 'lng' => $this->lng, 'address' => $this->address];
    }
}
