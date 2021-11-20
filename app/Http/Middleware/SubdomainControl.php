<?php

namespace App\Http\Middleware;
use App\Domain;
use App\Option;
use Closure;
use Illuminate\Support\Facades\View;

/**
 * Class SubdomainControl
 * Checks if user is in a correct domain
 *
 * @package App\Http\Middleware
 */

class SubdomainControl
{
    /**
     * Checks current domain
     * and redirects if the domain is wrong
     *
     * @param $request
     * @param Closure $next
     * @return \Illuminate\Http\Response|mixed
     */
    public function handle($request, Closure $next)
    {
        $domain = $request->root();
        if ($domain != env('APP_URL', false)) {
            $domain = explode('/', $domain);
            $domain = explode('.', $domain[2])[0];
            $domain = Domain::where('subdomain', $domain)->where('active', true)->first();

            if (!$domain) {
                $message = __('Wrong domain name');
                return response()->view('errors.404', compact('message'), 404);
            }
        } else {
            $domain = new Domain;
            $domain->options = Option::where('type', 'system')->where('parent', 0)->get();
        }

        View::share('domain', $domain);

        return $next($request);
    }
}
