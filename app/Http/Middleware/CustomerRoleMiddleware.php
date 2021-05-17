<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CustomerRoleMiddleware
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
        if(session()->has('LoginID') && session()->has('UserRole') && session()->get('UserRole') != 'Customer') return back();
        return $next($request);
    }
}
