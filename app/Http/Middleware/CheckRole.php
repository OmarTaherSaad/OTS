<?php

namespace App\Http\Middleware;

use Closure;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        $user = auth()->guard('api')->check() ? $request->user("api") : $request->user();
        abort_unless(!is_null($user) && ($user->hasRole($role) || $user->isSuperAdmin()), 401); //Unauthorized
        return $next($request);
    }
}
