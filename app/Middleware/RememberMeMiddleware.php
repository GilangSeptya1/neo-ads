<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use App\Models\User;

class RememberMeMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        // Cek jika user belum login tapi ada cookie remember_token
        if (!Auth::check() && $rememberToken = Cookie::get('remember_token')) {
            // Cari user berdasarkan remember_token
            $user = User::where('remember_token', $rememberToken)->first();
            
            if ($user) {
                // Login user secara otomatis
                Auth::login($user);
            }
        }
        
        return $next($request);
    }
}