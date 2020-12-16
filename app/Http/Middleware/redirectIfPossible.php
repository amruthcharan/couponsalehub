<?php

namespace App\Http\Middleware;

use App\Redirect;
use Closure;

class redirectIfPossible
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
        $slug = ltrim($request->getRequestUri(), '/');
        if ($redirect = Redirect::whereSlug($slug)->first()) {
            return redirect($redirect->redirect_to, 301);
        }
        return $next($request);
    }
}
