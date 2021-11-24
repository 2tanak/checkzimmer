<?php

namespace App\Http\Middleware;
use App\Option;
use Closure;
use Illuminate\Support\Facades\Auth;

/**
 * Class CheckIfMaintenance
 * Checks if maintenance mode is enabled
 *
 * @package App\Http\Middleware
 */

class CheckIfMaintenance
{
    /**
     * Checks for maintenance mode
     *
     * @param $request
     * @param Closure $next
     * @return \Illuminate\Http\Response|mixed
     */
    public function handle($request, Closure $next)
    {
        $maintenance = Option::where('type', 'system')->where('key', 'maintenance')->first();
        if (!$maintenance || $maintenance->value != '1' || ($_COOKIE['authDone'] ?? false)) {
            return $next($request);
        }

        $message = __('The website is temporarily unavailable.<br>We\'re going to be back soon');
        return response()->view('errors.503', compact('message'), 503);

    }
}
