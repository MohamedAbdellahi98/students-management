<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * This middleware checks if the authenticated user has a specific role
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return mixed
     */
    public function handle(Request $request, Closure $next, string $role)
    {
        // Checks if a user is authenticated and if the user's role matches the role required
        // If the check passes, it forwards the request to the next handler in the middleware stack
        if (Auth::check() && Auth::user()->role === $role) {
            return $next($request);
        }

        return abort(403, 'Unauthorized action.');
    }
}
