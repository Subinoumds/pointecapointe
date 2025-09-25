<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion Admin - Pointe ça Pointe</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'primary-blue': '#003366',
                        'secondary-yellow': '#fbbd08',
                        'light-blue': '#e6f0ff',
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gradient-to-br from-primary-blue to-blue-900 min-h-screen flex items-center justify-center">
    <div class="max-w-md w-full mx-4">
        <div class="bg-white rounded-2xl shadow-2xl p-8">
            <!-- Logo et titre -->
            <div class="text-center mb-8">
                <div class="w-20 h-20 bg-primary-blue rounded-full mx-auto mb-4 flex items-center justify-center">
                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                    </svg>
                </div>
                <h1 class="text-2xl font-bold text-primary-blue">Administration</h1>
                <p class="text-gray-600 mt-2">Pointe ça Pointe</p>
            </div>

            <!-- Messages d'erreur/succès -->
            @if(session('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
                    {{ session('error') }}
                </div>
            @endif

            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Formulaire de connexion -->
            <form action="{{ route('admin.login') }}" method="POST" class="space-y-6">
                @csrf
                
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-2">
                        Mot de passe administrateur
                    </label>
                    <input type="password" 
                           id="password" 
                           name="password" 
                           required 
                           autocomplete="current-password"
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-blue focus:border-transparent @error('password') border-red-500 @enderror"
                           placeholder="Entrez le mot de passe">
                    @error('password')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit" 
                        class="w-full bg-primary-blue text-white font-semibold py-3 px-4 rounded-lg hover:bg-blue-800 transition duration-300 focus:outline-none focus:ring-2 focus:ring-primary-blue focus:ring-offset-2">
                    Se connecter
                </button>
            </form>

            <!-- Informations de sécurité -->
            <div class="mt-8 p-4 bg-gray-50 rounded-lg">
                <h3 class="text-sm font-semibold text-gray-700 mb-2">🔒 Sécurité</h3>
                <ul class="text-xs text-gray-600 space-y-1">
                    <li>• Session limitée à 2 heures</li>
                    <li>• Protection contre les attaques par force brute</li>
                    <li>• Connexion sécurisée avec token</li>
                    <li>• Protection XSS et CSRF</li>
                </ul>
            </div>
        </div>
    </div>

    <script>
        // Protection contre l'inspection du code
        document.addEventListener('keydown', function(e) {
            if (e.key === 'F12' || (e.ctrlKey && e.shiftKey && e.key === 'I')) {
                e.preventDefault();
                return false;
            }
        });

        // Protection contre le clic droit
        document.addEventListener('contextmenu', function(e) {
            e.preventDefault();
            return false;
        });

        // Masquer le mot de passe après 30 secondes d'inactivité
        let inactivityTimer;
        function resetTimer() {
            clearTimeout(inactivityTimer);
            inactivityTimer = setTimeout(() => {
                document.getElementById('password').value = '';
            }, 30000);
        }

        document.addEventListener('mousemove', resetTimer);
        document.addEventListener('keypress', resetTimer);
        resetTimer();
    </script>
</body>
</html>
