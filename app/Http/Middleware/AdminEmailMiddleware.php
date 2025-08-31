<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminEmailMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        // Only allow this email to access Filament
        if (Auth::user()->email === 'mdnur701@gmail.com') {
            return $next($request);
        }

        abort(403, 'Unauthorized access.');
    }
}
