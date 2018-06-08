<?php

namespace App\Http\Middleware;

use Closure;

class CheckUserActivated
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
        if (!$request->user()->is_activated) {
            return redirect('/not-enabled'); // You can add a route of your choice
        }

        return $next($request);
    }
}
