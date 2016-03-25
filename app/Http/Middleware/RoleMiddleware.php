<?php

namespace App\Http\Middleware;

use Closure;

class RoleMiddleware
{
    public function handle($request, Closure $next, $role1="", $role2="", $role3="", $role4="")
    {
        if( $request->user()->hasRole($role1) ||
            $request->user()->hasRole($role2) ||
            $request->user()->hasRole($role3) ||
            $request->user()->hasRole($role4)){
            return $next($request);
        }
        return redirect()->route('berandaumum');
    }
}
