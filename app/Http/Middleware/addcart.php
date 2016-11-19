<?php

namespace App\Http\Middleware;

use Closure;

class addcart
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
        if(!Auth::check()){
            return "请先登陆";
        }
        return $next($request);
    }
}
