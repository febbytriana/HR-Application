<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $rolename)
    {
        $user = Auth::user();
        if($user->status === $rolename) {
            return $next($request);
        }
        return redirect('home');
    }
}
