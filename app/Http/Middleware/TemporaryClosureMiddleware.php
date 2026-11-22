<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TemporaryClosureMiddleware
{
    /**
     * Gère la fermeture temporaire de l'établissement.
     * Si activée, redirige ou affiche la page d'information dédiée
     * tout en préservant l'accès au back-office admin et aux mentions légales.
     */
    public function handle(Request $request, Closure $next): Response
    {
        $isClosed = config('app.temporary_closure', env('TEMPORARY_CLOSURE', true));

        if (! $isClosed) {
            return $next($request);
        }

        // Permettre l'accès aux routes d'administration
        if ($request->is('admin') || $request->is('admin/*')) {
            return $next($request);
        }

        // Permettre l'accès aux pages légales obligatoires
        if ($request->is('mentions-legales*') || $request->is('politique-de-confidentialite*') || $request->is('politique-confidentialite*') || $request->is('privacy*') || $request->is('legal*')) {
            return $next($request);
        }

        // Permettre le healthcheck Laravel
        if ($request->is('up')) {
            return $next($request);
        }

        // Permettre la prévisualisation pour l'administrateur connecté ou avec clé de prévisualisation
        if ($request->session()->get('admin_authenticated', false) || $request->query('preview') === '1') {
            return $next($request);
        }

        // Si requête API/JSON
        if ($request->expectsJson()) {
            return response()->json([
                'status' => 'closed',
                'message' => 'Le restaurant Pointe ça Pointe est actuellement fermé temporairement. Les réservations sont suspendues.'
            ], 200);
        }

        // Afficher la page dédiée de fermeture temporaire
        return response()->view('fermeture-temporaire', [
            'isTemporaryClosure' => true,
        ], 200);
    }
}
