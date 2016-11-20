<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class auth_admin
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
            return redirect('/login');
        }
        if(Auth::user()->is_admin == 0){
            return redirect('/');
        }
        return $next($request);
    }
}
