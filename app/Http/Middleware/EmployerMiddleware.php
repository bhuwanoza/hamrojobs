<?php

namespace App\Http\Middleware;

use Closure;
use Sentinel;

class EmployerMiddleware
{
    public function handle($request, Closure $next)
    {
        if($user= Sentinel::check() && Sentinel::getUser()->roles()->first()->slug=='employer'){
            $user=Sentinel::check();
            if(!$user->company){
                return redirect('/employer/add-company')->with(['warning_message'=>'Please complete your company profile !']);
            }
            return $next($request);
        }
        else{
            return redirect('/login')->with('error_message','Please need to login first');
        }
    }
}
