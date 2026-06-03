<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class AdminAuthController extends Controller
{
    public function showLogin()
    {
        return view('admin.auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'password' => 'required|string|min:8'
        ]);

        // Vérifier le mot de passe admin (stocké de manière sécurisée)
        $adminPassword = config('app.admin_password');
        
        if (Hash::check($request->password, $adminPassword)) {
            // Générer un token de session sécurisé
            $sessionToken = Str::random(64);
            Session::put('admin_authenticated', true);
            Session::put('admin_token', $sessionToken);
            Session::put('admin_login_time', now());
            
            return redirect()->route('admin.index')->with('success', 'Connexion réussie !');
        }

        return back()->withErrors(['password' => 'Mot de passe incorrect.'])->withInput();
    }

    public function logout()
    {
        Session::forget(['admin_authenticated', 'admin_token', 'admin_login_time']);
        return redirect()->route('admin.login')->with('success', 'Déconnexion réussie !');
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required|string',
            'new_password' => 'required|string|min:12|confirmed',
            'new_password_confirmation' => 'required|string|min:12'
        ]);

        $adminPassword = config('app.admin_password');
        
        if (!Hash::check($request->current_password, $adminPassword)) {
            return back()->withErrors(['current_password' => 'Mot de passe actuel incorrect.']);
        }

        // Mettre à jour le mot de passe dans la configuration
        $newHashedPassword = Hash::make($request->new_password);
        
        // Écrire dans le fichier .env
        $envFile = base_path('.env');
        $envContent = file_get_contents($envFile);
        
        if (preg_match('/^ADMIN_PASSWORD=/m', $envContent)) {
            $envContent = preg_replace('/^ADMIN_PASSWORD=.*$/m', 'ADMIN_PASSWORD=' . $newHashedPassword, $envContent);
        } else {
            $envContent .= PHP_EOL . 'ADMIN_PASSWORD=' . $newHashedPassword . PHP_EOL;
        }
        
        file_put_contents($envFile, $envContent);

        // Vider le cache de configuration pour appliquer le changement immédiatement
        try {
            \Illuminate\Support\Facades\Artisan::call('config:clear');
        } catch (\Exception $e) {
            // Ignorer silencieusement si Artisan n'est pas disponible
        }

        return redirect()->route('admin.index')->with('success', 'Mot de passe modifié avec succès !');
    }
}
