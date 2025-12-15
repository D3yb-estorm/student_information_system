<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRole
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        if (!auth()->check()) {
            return redirect('/login');
        }

        // If no roles specified, allow all authenticated users
        if (empty($roles)) {
            return $next($request);
        }

        // Check if user's role is in the allowed roles
        if (in_array(auth()->user()->role, $roles)) {
            return $next($request);
        }

        // User doesn't have the required role
        abort(403, 'Unauthorized access. Your role does not have permission to access this page.');
    }
}
