<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class PreventLoginForAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            $role = Auth::user()->role;

            // Redirect sesuai role
            switch ($role) {
                case 'admin':
                    return redirect()->route('admin.dashboard');
                case 'mitra':
                    return redirect()->route('mitra.dashboard');
                default:
                    return redirect('/dashboard'); // fallback
            }
        }

        return $next($request);
    }
}
