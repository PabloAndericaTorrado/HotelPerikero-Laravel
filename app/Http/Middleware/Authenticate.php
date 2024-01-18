<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    public function handle($request, Closure|\Closure $next, ...$guards)
    {
        if (! $request->expectsJson()) {
            return $next($request);
        }

        return $this->authenticate($request, $guards);
    }

}
