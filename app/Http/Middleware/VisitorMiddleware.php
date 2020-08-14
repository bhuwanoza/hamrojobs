<?php

namespace App\Http\Middleware;

use Closure;
use Sentinel;

class VisitorMiddleware
{
    public function handle($request, Closure $next)
    {
        if(!Sentinel::check())
            return $next($request);
        else
            return redirect('/')->with('success_message',' You are already logged in');
    }
}
