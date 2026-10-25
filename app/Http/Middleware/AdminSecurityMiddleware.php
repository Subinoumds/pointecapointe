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

        // Protection contre les attaques XSS : on nettoie uniquement les champs envoyés,
        // sauf le contenu des blocs de type HTML, qui doit garder ses balises.
        $sanitized = [];
        foreach (['name', 'description', 'content'] as $field) {
            if (! $request->has($field)) {
                continue;
            }
            if ($field === 'content' && $request->input('type') === 'html') {
                continue;
            }
            $sanitized[$field] = strip_tags((string) $request->input($field));
        }
        $request->merge($sanitized);

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
