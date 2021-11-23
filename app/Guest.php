<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Guest
 * Model for guests
 *
 * @package App
 */

class Guest extends Model {
    /**
     * Model properties
     *
     * @property string $pin pin for special access
     * @property string $name guest name
     * @property string $email guest email
     * @property string $reference guest reference
     * @property bool $active activity flag (0 = disabled)
     */

    protected $table = 'guests';
    protected $fillable = ['pin', 'name', 'email', 'reference', 'active'];

}
