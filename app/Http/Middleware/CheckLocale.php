<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;

/**
 * Class CheckLocale
 * Checks if the provided locale is the correct one
 *
 * @package App\Http\Middleware
 */

class CheckLocale
{
    /**
     * Check if the provided locale is the correct one
     * Set it as current locale for the website
     * Or switch to the default one if the locale is wrong
     *
     * @param $request
     * @param Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $defaultLocale = app('locale')->getDefaultLocale();
        $currentLocale = $request->segment(1);
        $locales = app('locale')->getLanguagesAvailable();
        if (!in_array($currentLocale, $locales)) {
            $currentLocale = $defaultLocale;
        }
        App::setLocale($currentLocale);
        return $next($request);
    }
}
