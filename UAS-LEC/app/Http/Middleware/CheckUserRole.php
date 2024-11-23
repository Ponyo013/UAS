<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckUserRole
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && Auth::user()->role == 0) {
            return redirect('/')->with('error', 'Access denied. You do not have permission to view the dashboard.');
        }

        return $next($request);
    }
}
