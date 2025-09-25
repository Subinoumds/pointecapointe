<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Administration - Pointe ça Pointe')</title>
    <meta name="description" content="@yield('description', 'Interface d\'administration du site Pointe ça Pointe')">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('img/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('img/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('img/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('site.webmanifest') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'primary-blue': '#003366',
                        'secondary-yellow': '#fbbd08',
                        'light-blue': '#e6f0ff',
                    },
                    fontFamily: {
                        sans: ['Poppins', 'sans-serif'],
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gray-100 font-sans">
    <!-- Navigation admin simple -->
    <nav class="bg-primary-blue text-white py-4 px-6 shadow-lg">
        <div class="container mx-auto max-w-7xl flex justify-between items-center">
            <div class="flex items-center space-x-4">
                <a href="{{ route('admin.index') }}" class="text-2xl font-bold text-secondary-yellow">
                    Administration
                </a>
                <span class="text-gray-300">|</span>
                <a href="{{ route('home') }}" class="text-white hover:text-secondary-yellow transition-colors duration-300" target="_blank">
                    Voir le site
                </a>
            </div>
            
            <div class="flex items-center space-x-6">
                <a href="{{ route('admin.index') }}" class="text-white hover:text-secondary-yellow transition-colors duration-300">
                    Dashboard
                </a>
                <a href="{{ route('admin.content.index') }}" class="text-white hover:text-secondary-yellow transition-colors duration-300">
                    Conteu page d'accueil
                </a>
                <a href="{{ route('admin.menu.index') }}" class="text-white hover:text-secondary-yellow transition-colors duration-300">
                    Menus
                </a>
                <a href="{{ route('admin.image.index') }}" class="text-white hover:text-secondary-yellow transition-colors duration-300">
                    Galerie
                </a>
                <a href="{{ route('admin.event.index') }}" class="text-white hover:text-secondary-yellow transition-colors duration-300">
                    Événements
                </a>

            </div>
        </div>
    </nav>

    @yield('content')
</body>
</html>
