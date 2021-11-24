<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Support\Facades\Auth;

/**
 * Class CheckIsAdmin
 * Checks if current user is admin
 *
 * @package App\Http\Middleware
 */

class CheckIsAdmin
{
    /**
     * Check if user is admin
     *
     * @param $request
     * @param Closure $next
     * @return \Illuminate\Http\JsonResponse|mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::user()->role === 'admin') {
            return $next($request);
        }
        else {
            return response()->json(['error' => 'Unauthorized'], 403);
        }
    }
}
