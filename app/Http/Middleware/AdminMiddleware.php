<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        // izinkan akses ke halaman login tanpa cek role
        if ($request->is('admin/login') || $request->is('admin/logout')) {
            return $next($request);
        }

        // cek apakah user admin
        if (auth()->check() && auth()->user()->role === 'admin') {
            return $next($request);
        }

        abort(403, 'Access denied');
    }
}
