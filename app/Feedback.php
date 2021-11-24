<?php namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Feedback
 * Model for feedback form data
 *
 * @package App
 */

class Feedback extends Model {
    /**
     * Model properties
     *
     * @property string $client_id ID for client (provided by third-party)
     * @property int $furnish estimation for furniture in rooms
     * @property int $comfort estimation for overall comfort
     * @property int location estimation for location
     * @property int price_to_perf estimation for price to quality
     * @property int cleanliness estimation for cleanliness
     * @property int internet estimation for internet
     * @property int staff estimation for staff
     * @property string name client name
     * @property string comment client comment
     */

    protected $table = 'feedback';
    protected $fillable = [ 'client_id', 'furnish', 'comfort', 'location', 'price_to_perf', 'cleanliness', 'internet',
        'staff', 'name', 'comment' ];
}
