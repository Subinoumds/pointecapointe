<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accès bloqué - Pointe ça Pointe</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'primary-blue': '#003366',
                        'secondary-yellow': '#fbbd08',
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gradient-to-br from-red-600 to-red-900 min-h-screen flex items-center justify-center">
    <div class="max-w-md w-full mx-4">
        <div class="bg-white rounded-2xl shadow-2xl p-8 text-center">
            <!-- Icône d'alerte -->
            <div class="w-20 h-20 bg-red-100 rounded-full mx-auto mb-6 flex items-center justify-center">
                <svg class="w-10 h-10 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z"></path>
                </svg>
            </div>

            <h1 class="text-2xl font-bold text-red-600 mb-4">Accès temporairement bloqué</h1>
            
            <p class="text-gray-700 mb-6">
                Trop de tentatives de connexion échouées. 
                Veuillez patienter avant de réessayer.
            </p>

            <div class="bg-red-50 border border-red-200 rounded-lg p-4 mb-6">
                <p class="text-sm text-red-700">
                    <strong>Temps d'attente restant :</strong>
                    <span id="countdown" class="font-mono text-lg">{{ $seconds }} secondes</span>
                </p>
            </div>

            <div class="text-xs text-gray-500">
                <p>Cette mesure de sécurité protège contre les attaques par force brute.</p>
            </div>
        </div>
    </div>

    <script>
        // Compte à rebours
        let timeLeft = {{ $seconds }};
        const countdownElement = document.getElementById('countdown');
        
        const timer = setInterval(() => {
            timeLeft--;
            countdownElement.textContent = timeLeft + ' secondes';
            
            if (timeLeft <= 0) {
                clearInterval(timer);
                countdownElement.textContent = 'Temps écoulé';
                // Rediriger vers la page de connexion
                setTimeout(() => {
                    window.location.href = '{{ route("admin.login") }}';
                }, 1000);
            }
        }, 1000);
    </script>
</body>
</html>
