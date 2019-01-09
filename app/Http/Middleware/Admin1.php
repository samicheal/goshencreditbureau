<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Admin1
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
        if(Auth::user()->admin == 2 OR Auth::user()->admin == 1){
            return $next($request);
        }

        else{
            return redirect()->back();
        }
        
    }
}
