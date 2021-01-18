<?php

namespace App\Http\Middleware;
use App\Domain;
use App\Option;
use Closure;
use Illuminate\Support\Facades\View;

class SubdomainControl
{
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
