<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!Session::get('admin_logged_in')) {
            return redirect()->route('login')->with('error', 'Anda harus login sebagai admin terlebih dahulu.');
        }

        return $next($request);
    }
}
