<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Redirect;

class trailingSlashes
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!preg_match('/.+\/$/', $request->getRequestUri()))
        {
            if (!preg_match('/\?/', $request->getRequestUri())) {
                $base_url = Config::get('app.url');
                return Redirect::to($base_url . $request->getRequestUri() . '/', 301);
            }
        }
        return $next($request);
    }
}
