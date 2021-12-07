<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class redirectStaff
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
        if($request->user()->userType == 'Staff'){
            return $next($request);
        }
        return redirect()->back() ->with('alert', 'You are not authorized!');
    }
}
