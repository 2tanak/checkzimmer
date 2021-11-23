<?php namespace App;


use Illuminate\Database\Eloquent\Model;

class Feedback extends Model {
    protected $fillable = [ 'client_id', 'furnish', 'comfort', 'location', 'price_to_perf', 'cleanliness', 'internet',
        'staff', 'name', 'comment' ];
}
