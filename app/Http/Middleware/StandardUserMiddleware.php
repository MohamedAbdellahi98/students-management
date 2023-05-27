<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class StandardUserMiddleware
{
    /**
     * This middleware checks if the authenticated user is a standard user (not an admin)
     * If the user is an admin, it redirects the user to the home route
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check() && !auth()->user()->isAdmin()) {
            return $next($request);
        }

        return redirect()->route('home')->withErrors(['error' => 'You do not have permission to access this page.']);
    }

}
