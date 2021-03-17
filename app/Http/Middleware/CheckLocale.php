<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;

class CheckLocale
{
    public function handle($request, Closure $next)
    {
        $defaultLocale = app('locale')->getDefaultLocale();
        $currentLocale = $request->segment(1);
        $locales = app('locale')->getLanguagesAvailable();
        if (!in_array($currentLocale, $locales)){
            $currentLocale = $defaultLocale;
        }
        App::setLocale($currentLocale);
        return $next($request);
    }
}
