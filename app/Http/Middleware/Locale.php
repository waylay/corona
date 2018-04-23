<?php

namespace App\Http\Middleware;

use Closure;

class Locale
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
	    if ( session('locale') && in_array( session('locale'), config('app.languages') ) ) {
		    \App::setLocale(session('locale'));
	    }
        return $next($request);
    }
}
