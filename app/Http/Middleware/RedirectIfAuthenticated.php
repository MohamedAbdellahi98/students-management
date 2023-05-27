<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * This middleware checks if the user is already authenticated.
     * If authenticated, it redirects the user to the appropriate dashboard depending on the user's role.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        // If no guard is provided, it defaults to the standard guard
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                $user = Auth::user();
                $redirectTo = $user->role === 'admin' ? '/dashboard' : '/standard_users/dashboard';
                return redirect($redirectTo);
            }
        }

        return $next($request);
    }
}
