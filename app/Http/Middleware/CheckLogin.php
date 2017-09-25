<?php

namespace App\Http\Middleware;

use Closure;

class CheckLogin
{
    public function handle($request, Closure $next)
    {
        if (\Auth::check())
        {
            return $next($request);
        }else{
            return redirect('/');
        }
    }
}
