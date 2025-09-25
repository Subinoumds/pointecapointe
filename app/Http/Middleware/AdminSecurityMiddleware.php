<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;

class AdminSecurityMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Vérifier l'authentification admin
        if (!Session::get('admin_authenticated', false)) {
            return redirect()->route('admin.login')->with('error', 'Accès non autorisé.');
        }

        // Vérifier le token de session
        if (!Session::get('admin_token')) {
            Session::forget(['admin_authenticated', 'admin_token', 'admin_login_time']);
            return redirect()->route('admin.login')->with('error', 'Session expirée.');
        }

        // Vérifier l'expiration de la session (2 heures)
        $loginTime = Session::get('admin_login_time');
        if ($loginTime && $loginTime->diffInHours(now()) > 2) {
            Session::forget(['admin_authenticated', 'admin_token', 'admin_login_time']);
            return redirect()->route('admin.login')->with('error', 'Session expirée.');
        }

        // Protection contre les attaques par force brute (seulement sur les tentatives de connexion)
        if ($request->is('admin/login') && $request->isMethod('POST')) {
            $key = 'admin-login-attempts:' . $request->ip();
            if (RateLimiter::tooManyAttempts($key, 5)) {
                $seconds = RateLimiter::availableIn($key);
                return response()->view('admin.auth.blocked', compact('seconds'), 429);
            }
        }

        // Protection contre les attaques XSS
        $request->merge([
            'password' => strip_tags($request->input('password', '')),
            'name' => strip_tags($request->input('name', '')),
            'description' => strip_tags($request->input('description', '')),
            'content' => strip_tags($request->input('content', ''))
        ]);

        // Headers de sécurité
        $response = $next($request);
        
        $response->headers->set('X-Content-Type-Options', 'nosniff');
        $response->headers->set('X-Frame-Options', 'DENY');
        $response->headers->set('X-XSS-Protection', '1; mode=block');
        $response->headers->set('Referrer-Policy', 'strict-origin-when-cross-origin');
        $response->headers->set('Content-Security-Policy', "default-src 'self'; script-src 'self' 'unsafe-inline' https://cdn.tailwindcss.com https://unpkg.com https://cdnjs.cloudflare.com; style-src 'self' 'unsafe-inline' https://fonts.googleapis.com https://unpkg.com; font-src 'self' https://fonts.gstatic.com; img-src 'self' data:;");

        return $response;
    }
}
