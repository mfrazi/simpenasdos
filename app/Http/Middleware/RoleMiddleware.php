<?php

namespace App\Http\Middleware;

use Closure;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role1="", $role2="", $role3="")
    {
        if($request->user()->hasRole($role1)){
            return $next($request);
        }
        if($role2){
            if($request->user()->hasRole($role2)){
                return $next($request);
            }
        }
        if($role3){
            if($request->user()->hasRole($role3)){
                return $next($request);
            }
        }
        return redirect('/');
    }
}
