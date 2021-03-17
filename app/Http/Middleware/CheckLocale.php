<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class CheckLocale
{
    public function handle($request, Closure $next)
    {
        $defaultLocale = config('app.locale');
        $locale = $request->segment(1) ?? $defaultLocale;
        App::setLocale($locale);
        return $next($request);
        dd($request);
        if (Auth::user()->role === 2) {
            return $next($request);
        } else {
            return response()->json(['error' => 'Unauthorized'], 403);
        }
    }
}
