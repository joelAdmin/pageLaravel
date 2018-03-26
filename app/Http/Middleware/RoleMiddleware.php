<?php

namespace App\Http\Middleware;

use Closure;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
     public function handle($request, Closure $next, $role)
    {
        if (\Auth::guest()) {
            return redirect('/login');
        }
     
        if (! $request->user()->role($role)) {
           abort(403);
        }
     
        return $next($request);
    }
}
