<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        if(! Auth::check()) {
            return redirect()->route('login');
        }

        $user = Auth::user();
        $userRole = $user->role instanceof \BackedEnum ? $user->role->value : $user->role;

        $userRole = trim(strtolower($userRole ?? ''));

        $normalizedRoles = array_map(fn($role) => trim(strtolower($role)), $roles);
        if (!in_array($userRole, $normalizedRoles, true)) {
            abort(403, 'Unauthorized: Access denied for role "' . $userRole . '".');
        }

        return $next($request);
    }
}
