<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
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
            die("请先登陆");
        }
        return $next($request);
    }
}
