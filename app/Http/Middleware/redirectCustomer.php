<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class redirectCustomer
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
        if($request->user()->userType == 'Customer'){
            if($request->user()->status == 0)
            return $next($request);
        }
        return redirect()->back() ->with('alert', 'You are not authorized or banned!');
    }
}
