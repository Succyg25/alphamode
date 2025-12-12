<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckAdmin
{
    public function handle($request, Closure $next)
    {
        // User must be logged in AND must be admin
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            abort(403);
        }

        return $next($request);
    }
}
