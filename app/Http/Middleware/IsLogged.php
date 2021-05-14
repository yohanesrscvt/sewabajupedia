<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsLogged
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // if user is logged in, then the user can't access login and register (authentication screen)
        if(session()->has('LoginID') && ($request->path() == '/login' || $request->path() == '/register')){
            // return back();
            var_dump(session()->has('LoginID'));
            var_dump($request->path());
        }
        return $next($request);
    }
}
