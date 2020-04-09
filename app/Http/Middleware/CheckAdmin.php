<?php

namespace App\Http\Middleware;

use Closure;
// use Auth;
use Illuminate\Support\Facades\Auth;
class CheckAdmin
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
        // return $next($request);
        $userRoles=Auth::user()->roles->pluck('name');
        if(!$userRoles->contains('admin') ){
            return redirect('/nopermission');
        }
        return $next($request);
    }
}
