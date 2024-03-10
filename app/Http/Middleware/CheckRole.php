<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    const ROLE_ADMIN = 'admin';
    const ROLE_ORGANISATEUR = 'organisateur';
    const ROLE_UTILISATEUR = 'utilisateur';

    public function handle($request, Closure $next, $role)
    {
        // Check if the user has the required role
        if ($request->user() && $request->user()->role === $role) {
            return $next($request);
        }

        // Redirect or abort if the user doesn't have the required role
        abort(403, 'Unauthorized action.');
    }
}
