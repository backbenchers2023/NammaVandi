<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SecureAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // Check if user is authenticated
        if (!Auth::check()) {
            return redirect()->route('login'); // Redirect to login if not authenticated
        }

        $user = Auth::user();

        // Example: Check if the user is not banned (custom field)
        if ($user->status === 'banned') {
            Auth::logout();
            return redirect()->route('login')->withErrors(['Your account is banned.']);
        }

        // Example: Restrict access based on user role
        if ($user->role !== 'admin' && $user->role !== 'super admin') {
            return redirect()->route('dashboard')->withErrors(['Unauthorized access.']);
        }

        return $next($request); 
    }
}
