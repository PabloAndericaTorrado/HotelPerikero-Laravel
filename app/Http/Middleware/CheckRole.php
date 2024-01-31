<?php
// app/Http/Middleware/CheckRole.php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        if (!Auth::check()) {
            return redirect('login');
        }

        $user = Auth::user();

        foreach ($roles as $role) {
            if ($user->rol === $role) {
                return $next($request);
            }
        }

        return redirect('home')->with('error', 'No tienes permisos para acceder a esta página.');
    }
}
