<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\noCRUD;

class Option extends Model {
    protected $table = 'options';
    protected $fillable = ['parent', 'type', 'key', 'value'];
    static $optionType = 'options';
    private static $children = [];
    private static $identifier = 'key';
    use noCRUD;
}
