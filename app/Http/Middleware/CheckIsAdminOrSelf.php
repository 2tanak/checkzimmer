<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Support\Facades\Auth;

/**
 * Class CheckIsAdminOrSelf
 * Checks if current user is admin or a requested user
 *
 * @package App\Http\Middleware
 */

class CheckIsAdminOrSelf
{
    /**
     * Check if user is admin or a requested user
     *
     * @param $request
     * @param Closure $next
     * @return \Illuminate\Http\JsonResponse|mixed
     */
    public function handle($request, Closure $next)
    {
        $requestedUserId = $request->route()->parameter('id');
        if (Auth::user()->role === 'admin' ||
            Auth::user()->id == $requestedUserId
        ) {
            return $next($request);
        }
        else {
            return response()->json(['error' => 'Unauthorized'], 403);
        }
    }
}
