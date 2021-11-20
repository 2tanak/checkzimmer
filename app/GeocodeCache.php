<?php

namespace App;

use App\Traits\noCRUD;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * Class GeocodeCache
 * Model for geocoder cache
 *
 * @package App
 */

class GeocodeCache extends Model
{
    /**
     * Model properties
     *
     * @property string $address requested address
     * @property float $lat position latitude
     * @property float $lon position longitude
     * @property string $timestamp cache creation time
     */

    protected $table = 'geocoder-cache';
    protected $fillable = ['address', 'lat', 'lng', 'timestamp'];
    public $timestamps = false;

    /**
     * @var array $children noCRUD-related property
     */
    private static $children = [];

    /**
     * @var string $identifier noCRUD-related property
     */
    private static $identifier = 'address';
    use noCRUD;

    /**
     * Filter actual data by configured expiration time
     * @param $query
     * @return mixed
     */
    public function scopeOnlyActual($query)
    {
        return $query->where('timestamp', '>', time() - config('geocoder.cache_time'));
    }

    /**
     * Transform object to array
     *
     * @return array
     */
    public function toArray(): array
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
