<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, ...$roles)
    {
        // $user = Auth::user()->roles->description;
        if(in_array($request->user()->roles->description, $roles)) {
            return $next($request);
        } else {
            return redirect('/');
        }

    }

    // public function handle($request, Closure $next, ...$roles)
    // {
    //     $roles = Auth::user()->authorizeRoles($roles);
    //     if($roles) {
    //         return $next($request);
    //     }
    //     return redirect()->route('/');

    // }

    // public function handle($request, Closure $next, ...$roles)
    // {
    //     foreach ($roles as $role) {
    //         if (! $request->user()->hasRole($role)) {
    //             return $next($request);
    //         }

    //         return redirect('/');
    //     }
    // }

    // public function handle($request, Closure $next, $roleName)
    // {
    //     if (auth()->check() && ! auth()->user()->hasRole($roleName))
    //     {
    //         return abort(401, 'Unauthorized');
    //     }

    //     return $next($request);
    // }
}
