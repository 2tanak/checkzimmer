<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

/**
 * Class Authenticate
 * Checks authentication
 *
 * @package App\Http\Middleware
 */

class Authenticate extends Middleware
{
    /**
     * Check if user is authentified
     *
     * @param Request $request
     * @param Closure $next
     * @param string[] ...$guards
     * @return JsonResponse|mixed
     */
    public function handle($request, Closure $next, ...$guards)
    {
        if (!$this->authenticate($request, $guards) === false) {
            return response()->json(['error'=>'Unauthorized']);
        }
        return $next($request);
    }

    /**
     * Checks if user is authenticated
     *
     * @param Request $request
     * @param array $guards
     * @return bool
     */
    protected function authenticate($request, array $guards): bool
    {
        if (Auth::id()) {
            return true;
        }
        return false;
    }
}
