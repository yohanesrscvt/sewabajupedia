<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthenticationValidation
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
        // if user logged out from system and try to access menu besides login and register screen then show login screen
        if(!session()->has('LoginID') && $request->path() != '/login' && $request->path() != '/register'){
            return redirect('/login')->with('fail','Please login before access system');
        }

        return $next($request);
    }
}
