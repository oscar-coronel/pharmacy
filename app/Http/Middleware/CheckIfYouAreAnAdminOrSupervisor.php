<?php

namespace App\Http\Middleware;

use Closure;

class CheckIfYouAreAnAdminOrSupervisor
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
        if (auth()->user()->isAdmin() || auth()->user()->isSupervisor()) {
            return $next($request);
        }
        return back()->with('status', 'Su usuario no posee los permisos necesarios.');
    }
}
