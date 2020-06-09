<?php

namespace App\Http\Middleware;

use Closure;

class IsAuctioneer
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(auth()->user()->status == 0){
            return $next($request);
        }

        return redirect('/')->with('error_msg',"You don't have admin access.");
    }
}
