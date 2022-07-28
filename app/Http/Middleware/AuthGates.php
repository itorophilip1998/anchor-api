<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Role;

class AuthGates
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();

        // if ( $user ) {
        //    $roles  = Rols::with('permissions');
        //    $permissionArray = [];

        //    foreach($roles as $role) {
        //         foreach($role->permissions as $permissions) {
        //             $permissionArray[$permission->title][] = $role
        //         }
        //    }

        //    foreach($permissionArray as $title => $roles ) {
        //         Gate::defind($title, function(\App\User $user) use)
        //    }
        // }


        return $next($request);
    }

}
