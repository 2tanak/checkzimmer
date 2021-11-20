<?php

namespace App;

use App\Traits\noCRUD;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Reviews
 * Model for storing reviews
 *
 * @package App
 */

class Reviews extends Model
{
    /**
     * Model properties
     *
     * @property int $name reviewer name
     * @property int $company reviewer company
     * @property int $title review title
     * @property int $rating reviewer estimation
     * @property int $description review text
     * @property int $status publication status
     * @property int $property_id related property
     */

    /**
     * @const STATUS_WAITING the review is on moderation
     */
    public const STATUS_WAITING = 2;

    /**
     * @const  STATUS_PUBLISH the review is published
     */
    public const STATUS_PUBLISH = 1;

    use noCRUD;

    protected $table = 'reviews';
    protected $fillable = ['name', 'company', 'title', 'rating', 'description', 'status', 'property_id'];

}
