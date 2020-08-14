<?php

namespace App\Http\Middleware;

use Closure;
use Sentinel;

class JobSeekerMiddleware
{

    public function handle($request, Closure $next)
    {
        if(Sentinel::check() && Sentinel::getUser()->roles()->first()->slug=='jobseeker'){
            return $next($request);
        }
        else{
            return redirect('/login')->with('error_message','Please need to login first');
        }

    }
}
