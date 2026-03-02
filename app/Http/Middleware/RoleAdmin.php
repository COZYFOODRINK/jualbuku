<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (session('role') === 'admin') {
            return $next($request);
        }

        // gunakan nama route, bukan path literal
        return redirect()->route('login')->with('error', 'Anda tidak memiliki akses ke halaman ini');
    }
}
