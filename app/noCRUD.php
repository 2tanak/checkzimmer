<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class noCRUD extends Model
{
    // Access rules
    private $access = [
        'create' => [
            'type' => 'value',
            'selector' => 'users.role',
            'value' => 'auth.role',
            'allow' => '*',
            'disallow' => 'banned'
        ],
        'read' => [],
        'update' => [],
        'delete' => []
    ];
    // Children. Required to for getting linked data
    private $children = [

    ];
    // Cascade
    private $cascade = [
    ];
    function accessible() {
        return true;
    }
}
