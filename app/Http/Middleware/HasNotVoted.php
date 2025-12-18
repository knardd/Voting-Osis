<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class HasNotVoted
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
    $user = Auth::user();
    // Kalau belum login
    if (!$user) {
        return redirect()->route('login');
    }

    // Kalau sudah voting
        if (Auth::check() && Auth::user()->has_voted) {
        abort(403, 'Anda sudah melakukan voting');
        // atau redirect
    }

    return $next($request);
    }
}
