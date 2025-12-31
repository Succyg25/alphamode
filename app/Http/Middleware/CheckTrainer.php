<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckTrainer
{
    public function handle($request, Closure $next)
    {
        // User must be logged in AND must be trainer
        if (!Auth::check() || Auth::user()->role !== 'trainer') {
            abort(403);
        }

        return $next($request);
    }
}
