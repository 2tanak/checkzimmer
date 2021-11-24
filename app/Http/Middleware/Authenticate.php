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
        if ($this->authenticate($request, $guards) === 'authentication_error') {
            return response()->json(['error'=>'Unauthorized']);
        }
        return $next($request);
    }

    /**
     * Checks if user is authenticated
     *
     * @param Request $request
     * @param array $guards
     * @return bool|string
     */
    protected function authenticate($request, array $guards)
    {

        /*if (empty($guards)) {
            $guards = [null];
        }
        foreach ($guards as $guard) {
            if ($this->auth->guard($guard)->check()) {
                return $this->auth->shouldUse($guard);
            }
        }*/
        if (Auth::id()) {
            return true;
        }
        return 'authentication_error';
    }
}
