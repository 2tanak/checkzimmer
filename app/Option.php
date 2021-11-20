<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\noCRUD;

/**
 * Class Option
 * Model for options to handle other models metadata
 *
 * @package App
 */

class Option extends Model
{
    /**
     * Model properties
     *
     * @property int $parent id of a model that has the option
     * @property string $type option type
     * @property string $key option name
     * @property string $value option value
     */

    protected $table = 'options';
    protected $fillable = ['parent', 'type', 'key', 'value'];
    static $optionType = 'options';
    private static $children = [];
    private static $identifier = 'key';
    use noCRUD;
}
