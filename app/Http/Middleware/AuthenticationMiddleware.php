<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthenticationMiddleware
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
        // logout condition
        if(!session()->has('LoginID') && !session()->has('UserRole') && $request->path() != '/login' && $request->path() !='/register'){
            return redirect('/login')->with('fail','You have to log in into system');
        }

        // disini letak permasalahannya
        if(session()->has('LoginID') && session()->has('UserRole') && ($request->path() == '/login' || $request->path() == '/register')) return back();
        return $next($request);
    }
}
