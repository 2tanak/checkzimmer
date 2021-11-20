<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode as Middleware;

/**
 * Class CheckForMaintenanceMode
 * Checks if maintenance mode is enabled
 * ToDo: check if unnecessary class and remove
 *
 * @package App\Http\Middleware
 */


class CheckForMaintenanceMode extends Middleware
{
    /**
     * The URIs that should be reachable while maintenance mode is enabled.
     *
     * @var array
     */
    protected $except = [
        //
    ];
}
