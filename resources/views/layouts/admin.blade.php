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
    <!-- Navigation admin responsive -->
    <nav class="bg-primary-blue text-white py-3 px-4 md:px-6 shadow-lg">
        <div class="container mx-auto max-w-7xl">
            <div class="flex justify-between items-center">
                <!-- Logo et lien vers le site -->
                <div class="flex items-center space-x-4">
                    <a href="{{ route('admin.index') }}" class="text-lg md:text-xl font-bold text-secondary-yellow">
                        Administration
                    </a>
                    <span class="text-gray-300 hidden md:inline">|</span>
                    <a href="{{ route('home') }}" class="text-sm text-white hover:text-secondary-yellow transition-colors duration-300" target="_blank">
                        Voir le site
                    </a>
                </div>
                
                <!-- Menu de navigation (desktop) -->
                <div class="hidden md:flex items-center space-x-6">
                    <a href="{{ route('admin.index') }}" class="text-sm text-white hover:text-secondary-yellow transition-colors duration-300">
                        Dashboard
                    </a>
                    <a href="{{ route('admin.content.index') }}" class="text-sm text-white hover:text-secondary-yellow transition-colors duration-300">
                        Contenu de la page d'accueil
                    </a>
                    <a href="{{ route('admin.menu.index') }}" class="text-sm text-white hover:text-secondary-yellow transition-colors duration-300">
                        Menus
                    </a>
                    <a href="{{ route('admin.image.index') }}" class="text-sm text-white hover:text-secondary-yellow transition-colors duration-300">
                        Galerie
                    </a>
                    <a href="{{ route('admin.event.index') }}" class="text-sm text-white hover:text-secondary-yellow transition-colors duration-300">
                        Événements
                    </a>
                </div>
                
                <!-- Menu hamburger pour mobile -->
                <button id="mobile-menu-button" class="md:hidden text-white hover:text-secondary-yellow transition-colors duration-300">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
            
            <!-- Menu de navigation mobile -->
            <div id="mobile-menu" class="hidden md:hidden mt-4">
                <div class="flex flex-col space-y-2">
                    <a href="{{ route('admin.index') }}" class="text-sm text-white hover:text-secondary-yellow transition-colors duration-300 py-2">
                        Dashboard
                    </a>
                    <a href="{{ route('admin.content.index') }}" class="text-sm text-white hover:text-secondary-yellow transition-colors duration-300 py-2">
                        Contenu
                    </a>
                    <a href="{{ route('admin.menu.index') }}" class="text-sm text-white hover:text-secondary-yellow transition-colors duration-300 py-2">
                        Menus
                    </a>
                    <a href="{{ route('admin.image.index') }}" class="text-sm text-white hover:text-secondary-yellow transition-colors duration-300 py-2">
                        Galerie
                    </a>
                    <a href="{{ route('admin.event.index') }}" class="text-sm text-white hover:text-secondary-yellow transition-colors duration-300 py-2">
                        Événements
                    </a>
                </div>
            </div>
        </div>
    </nav>

    @yield('content')
    
    <!-- Scripts -->
    <script src="https://unpkg.com/feather-icons"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            feather.replace();
            
            // Menu mobile
            const mobileMenuButton = document.getElementById('mobile-menu-button');
            const mobileMenu = document.getElementById('mobile-menu');
            
            if (mobileMenuButton && mobileMenu) {
                mobileMenuButton.addEventListener('click', function() {
                    mobileMenu.classList.toggle('hidden');
                });
            }
        });
    </script>
    @yield('scripts')
    </body>
    </html>
