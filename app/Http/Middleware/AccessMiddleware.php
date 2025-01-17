<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class AccessMiddleware
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
        if (Auth::check()) {
            return $next($request);
        }else{
            return redirect()->route('login');
        }return $next($request);
    }
}
