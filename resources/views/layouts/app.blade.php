<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Pointe ça Pointe - Bistrot sur les bords de Loire à Bouchemaine')</title>
    <meta name="description" content="@yield('description', 'Découvrez Pointe ça Pointe, un bistrot décontracté sur les bords de Loire à Bouchemaine. Profitez de notre terrasse, de nos plats bistrot frais, de nos burgers maison et de notre ambiance familiale.')">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <meta name="google-site-verification" content="wlG1S9kkYbXYv-tIT9cly8AJPq_AZfLNIweHpikbUXc" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('img/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('img/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('img/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('site.webmanifest') }}">
    
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    @stack('preload')
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/gsap.min.js" defer></script>
    
    <!-- Local Business Structured Data (JSON-LD) -->
    <script type="application/ld+json">
    {
      "@@context": "https://schema.org",
      "@@type": "Restaurant",
      "name": "Pointe ça Pointe",
      "image": "https://pointe-ca-pointe.fr/img/logo.jpg",
      "url": "https://pointe-ca-pointe.fr",
      "telephone": "+33244855536",
      "email": "direction.papapoule@gmail.com",
      "priceRange": "€€",
      "servesCuisine": "Bistrot français",
      "address": {
        "@@type": "PostalAddress",
        "streetAddress": "4 Place Ruzebouc",
        "addressLocality": "Bouchemaine",
        "postalCode": "49080",
        "addressCountry": "FR"
      },
      "geo": {
        "@@type": "GeoCoordinates",
        "latitude": 47.411649,
        "longitude": -0.612845
      },
      "openingHoursSpecification": [
        { "@@type": "OpeningHoursSpecification", "dayOfWeek": "Tuesday", "opens": "10:30", "closes": "14:00" },
        { "@@type": "OpeningHoursSpecification", "dayOfWeek": "Tuesday", "opens": "18:30", "closes": "21:00" },
        { "@@type": "OpeningHoursSpecification", "dayOfWeek": "Wednesday", "opens": "10:30", "closes": "14:00" },
        { "@@type": "OpeningHoursSpecification", "dayOfWeek": "Wednesday", "opens": "18:30", "closes": "21:00" },
        { "@@type": "OpeningHoursSpecification", "dayOfWeek": "Thursday", "opens": "10:30", "closes": "14:00" },
        { "@@type": "OpeningHoursSpecification", "dayOfWeek": "Thursday", "opens": "18:30", "closes": "21:00" },
        { "@@type": "OpeningHoursSpecification", "dayOfWeek": "Friday", "opens": "10:30", "closes": "14:00" },
        { "@@type": "OpeningHoursSpecification", "dayOfWeek": "Friday", "opens": "18:30", "closes": "21:30" },
        { "@@type": "OpeningHoursSpecification", "dayOfWeek": "Saturday", "opens": "10:30", "closes": "14:00" },
        { "@@type": "OpeningHoursSpecification", "dayOfWeek": "Saturday", "opens": "18:30", "closes": "21:30" },
        { "@@type": "OpeningHoursSpecification", "dayOfWeek": "Sunday", "opens": "10:30", "closes": "15:00" }
      ],
      "aggregateRating": {
        "@@type": "AggregateRating",
        "ratingValue": "4.8",
        "reviewCount": "126",
        "bestRating": "5"
      },
      "sameAs": [
        "https://www.instagram.com/pointecapointe49",
        "https://www.facebook.com/PointeCaPointeBouchemaine/"
      ]
    }
    </script>

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="restaurant.restaurant" />
    <meta property="og:title" content="@yield('title', 'Pointe ça Pointe - Bistrot sur les bords de Loire à Bouchemaine')" />
    <meta property="og:description" content="@yield('description', 'Bistrot décontracté à Bouchemaine : terrasse, plats frais, burgers maison, ambiance familiale.')" />
    <meta property="og:image" content="https://pointe-ca-pointe.fr/storage/carousel/facade1.jpg" />
    <meta property="og:url" content="{{ request()->url() }}" />
    <meta property="og:locale" content="fr_FR" />
    <meta property="og:site_name" content="Pointe ça Pointe" />

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="@yield('title', 'Pointe ça Pointe - Bistrot sur les bords de Loire à Bouchemaine')" />
    <meta name="twitter:description" content="@yield('description', 'Bistrot décontracté à Bouchemaine : terrasse, plats frais, burgers maison, ambiance familiale.')" />
    <meta name="twitter:image" content="https://pointe-ca-pointe.fr/storage/carousel/facade1.jpg" />
    
    @stack('styles')
</head>
<body class="bg-gray-100 font-sans" style="overflow-x: hidden;">
    <header class="relative top-0 left-0 w-full z-30 p-4 bg-white shadow-lg rounded-b-xl">
        <nav class="container mx-auto max-w-7xl flex justify-between items-center px-4">
            <a href="{{ route('home') }}" class="flex items-center space-x-2">
                <img src="{{ asset('img/logo.jpg') }}" alt="Logo Pointe ça Pointe" class="h-20 w-auto" width="791" height="791">
            </a>            
            <ul class="hidden md:flex space-x-6">
                <li><a href="{{ route('home') }}" class="font-semibold {{ request()->routeIs('home') ? 'text-accent-gold' : 'text-primary-blue' }} hover:text-accent-gold transition-colors duration-300">Accueil</a></li>
                <li><a href="{{ route('evenements') }}" class="font-semibold {{ request()->routeIs('evenements') ? 'text-accent-gold' : 'text-primary-blue' }} hover:text-accent-gold transition-colors duration-300">Événements</a></li>
                <li><a href="{{ route('repas') }}" class="font-semibold {{ request()->routeIs('repas') ? 'text-accent-gold' : 'text-primary-blue' }} hover:text-accent-gold transition-colors duration-300">Repas de groupe</a></li>
                <li class="relative">
                    <button id="menuToggle" class="flex items-center font-semibold {{ request()->routeIs('menu', 'menus.midi', 'menus.groupe') ? 'text-accent-gold' : 'text-primary-blue' }} hover:text-accent-gold transition-colors duration-300 focus:outline-none" aria-haspopup="true" aria-expanded="false" aria-controls="submenu">
                        Menus & Carte 
                        <i data-feather="chevron-down" class="inline-block w-4 h-4 ml-1" aria-hidden="true"></i>
                    </button>

                    <!-- Sous-menu -->
                    <div id="submenu" class="absolute hidden bg-white shadow-lg rounded-md mt-2 w-48 z-50">
                        <a href="{{ route('menu') }}" class="block px-4 py-2 text-primary-blue hover:bg-light-blue">Carte & Boissons</a>
                        <a href="{{ route('menus.midi') }}" class="block px-4 py-2 text-primary-blue hover:bg-light-blue">Menus du midi</a>
                        <a href="{{ route('menus.groupe') }}" class="block px-4 py-2 text-primary-blue hover:bg-light-blue">Menus de groupe</a>
                    </div>
                </li>
                <li><a href="{{ route('galerie') }}" class="font-semibold {{ request()->routeIs('galerie') ? 'text-accent-gold' : 'text-primary-blue' }} hover:text-accent-gold transition-colors duration-300">Galerie</a></li>
                <li><a href="{{ route('bistrot') }}" class="font-semibold {{ request()->routeIs('bistrot') ? 'text-accent-gold' : 'text-primary-blue' }} hover:text-accent-gold transition-colors duration-300">Définition BISTROT</a></li>
            </ul>

            <button id="mobileMenuBtn" class="md:hidden text-primary-blue p-2" aria-label="Ouvrir le menu mobile" aria-expanded="false" aria-controls="mobileMenu">
                <i data-feather="menu" class="w-8 h-8" aria-hidden="true"></i>
            </button>
        </nav>
    </header>

    <div id="mobileMenu" class="mobile-menu fixed top-0 right-0 w-64 h-full bg-white shadow-lg p-6 z-40 md:hidden">
        <div class="flex justify-end mb-8">
            <button id="closeMenuBtn" class="text-primary-blue p-2" aria-label="Fermer le menu mobile" aria-controls="mobileMenu">
                <i data-feather="x" class="w-8 h-8" aria-hidden="true"></i>
            </button>
        </div>
        <ul class="flex flex-col space-y-6">
            <li><a href="{{ route('home') }}" class="text-xl font-semibold {{ request()->routeIs('home') ? 'text-accent-gold' : 'text-primary-blue' }} hover:text-accent-gold transition-colors duration-300">Accueil</a></li>
            <li><a href="{{ route('evenements') }}" class="text-xl font-semibold {{ request()->routeIs('evenements') ? 'text-accent-gold' : 'text-primary-blue' }} hover:text-accent-gold transition-colors duration-300">Événements</a></li>
            <li><a href="{{ route('repas') }}" class="text-xl font-semibold {{ request()->routeIs('repas') ? 'text-accent-gold' : 'text-primary-blue' }} hover:text-accent-gold transition-colors duration-300">Repas de groupe</a></li>
            <li><a href="{{ route('menu') }}" class="text-xl font-semibold {{ request()->routeIs('menu') ? 'text-accent-gold' : 'text-primary-blue' }} hover:text-accent-gold transition-colors duration-300">Carte & Boissons</a></li>
            <li><a href="{{ route('menus.midi') }}" class="text-xl font-semibold {{ request()->routeIs('menus.midi') ? 'text-accent-gold' : 'text-primary-blue' }} hover:text-accent-gold transition-colors duration-300">Menus du midi</a></li>
            <li><a href="{{ route('menus.groupe') }}" class="text-xl font-semibold {{ request()->routeIs('menus.groupe') ? 'text-accent-gold' : 'text-primary-blue' }} hover:text-accent-gold transition-colors duration-300">Menus de groupe</a></li>
            <li><a href="{{ route('galerie') }}" class="text-xl font-semibold {{ request()->routeIs('galerie') ? 'text-accent-gold' : 'text-primary-blue' }} hover:text-accent-gold transition-colors duration-300">Galerie</a></li>
            <li><a href="{{ route('bistrot') }}" class="text-xl font-semibold {{ request()->routeIs('bistrot') ? 'text-accent-gold' : 'text-primary-blue' }} hover:text-accent-gold transition-colors duration-300">Définition BISTROT</a></li>
        </ul>
    </div>

    <main id="main-content">
        @yield('content')
    </main>

    @php
        $lundi = $contents['hours_lundi'] ?? 'Lundi: Fermé';
        $isLundiFerme = stripos($lundi, 'Fermé') !== false;

        $mardi = $contents['hours_mardi'] ?? 'Mardi: Fermé';
        $isMardiFerme = stripos($mardi, 'Fermé') !== false;

        $mercredi = $contents['hours_mercredi'] ?? 'Mercredi: 11h00–14h00, 18h00–20h45';
        $isMercrediFerme = stripos($mercredi, 'Fermé') !== false;

        $jeudi = $contents['hours_jeudi'] ?? 'Jeudi: 11h00–14h00, 18h00–20h45';
        $isJeudiFerme = stripos($jeudi, 'Fermé') !== false;

        $vendredi = $contents['hours_vendredi'] ?? 'Vendredi: 10h30–14h00, 18h00–21h00';
        $isVendrediFerme = stripos($vendredi, 'Fermé') !== false;

        $samedi = $contents['hours_samedi'] ?? 'Samedi: 10h00–21h00';
        $isSamediFerme = stripos($samedi, 'Fermé') !== false;

        $dimanche = $contents['hours_dimanche'] ?? 'Dimanche: 10h30–17h00';
        $isDimancheFerme = stripos($dimanche, 'Fermé') !== false;
    @endphp

    <footer class="bg-primary-blue text-white py-16 relative z-10">
        <div class="container mx-auto max-w-7xl px-4 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-12 relative z-20">
            <div>
                <h3 class="text-2xl font-bold mb-6 text-secondary-yellow">{{ $contents['hours_title'] ?? 'Venez nous rencontrer : Nos horaires gourmands !' }}</h3>
                <ul class="space-y-2 text-lg">
                    <li class="flex items-center {{ $isLundiFerme ? 'text-accent-red font-semibold' : '' }}">
                        <i data-feather="{{ $isLundiFerme ? 'slash' : 'clock' }}" class="w-6 h-6 mr-3 flex-shrink-0 {{ $isLundiFerme ? 'text-accent-red' : 'text-secondary-yellow' }}" aria-hidden="true"></i>
                        <span>{{ $lundi }}</span>
                    </li>
                    <li class="flex items-center {{ $isMardiFerme ? 'text-accent-red font-semibold' : '' }}">
                        <i data-feather="{{ $isMardiFerme ? 'slash' : 'clock' }}" class="w-6 h-6 mr-3 flex-shrink-0 {{ $isMardiFerme ? 'text-accent-red' : 'text-secondary-yellow' }}" aria-hidden="true"></i>
                        <span>{{ $mardi }}</span>
                    </li>
                    <li class="flex items-center {{ $isMercrediFerme ? 'text-accent-red font-semibold' : '' }}">
                        <i data-feather="{{ $isMercrediFerme ? 'slash' : 'clock' }}" class="w-6 h-6 mr-3 flex-shrink-0 {{ $isMercrediFerme ? 'text-accent-red' : 'text-secondary-yellow' }}" aria-hidden="true"></i>
                        <span>{{ $mercredi }}</span>
                    </li>
                    <li class="flex items-center {{ $isJeudiFerme ? 'text-accent-red font-semibold' : '' }}">
                        <i data-feather="{{ $isJeudiFerme ? 'slash' : 'clock' }}" class="w-6 h-6 mr-3 flex-shrink-0 {{ $isJeudiFerme ? 'text-accent-red' : 'text-secondary-yellow' }}" aria-hidden="true"></i>
                        <span>{{ $jeudi }}</span>
                    </li>
                    <li class="flex items-center {{ $isVendrediFerme ? 'text-accent-red font-semibold' : '' }}">
                        <i data-feather="{{ $isVendrediFerme ? 'slash' : 'clock' }}" class="w-6 h-6 mr-3 flex-shrink-0 {{ $isVendrediFerme ? 'text-accent-red' : 'text-secondary-yellow' }}" aria-hidden="true"></i>
                        <span>{{ $vendredi }}</span>
                    </li>
                    <li class="flex items-center {{ $isSamediFerme ? 'text-accent-red font-semibold' : '' }}">
                        <i data-feather="{{ $isSamediFerme ? 'slash' : 'clock' }}" class="w-6 h-6 mr-3 flex-shrink-0 {{ $isSamediFerme ? 'text-accent-red' : 'text-secondary-yellow' }}" aria-hidden="true"></i>
                        <span>{{ $samedi }}</span>
                    </li>
                    <li class="flex items-center {{ $isDimancheFerme ? 'text-accent-red font-semibold' : '' }}">
                        <i data-feather="{{ $isDimancheFerme ? 'slash' : 'clock' }}" class="w-6 h-6 mr-3 flex-shrink-0 {{ $isDimancheFerme ? 'text-accent-red' : 'text-secondary-yellow' }}" aria-hidden="true"></i>
                        <span>{{ $dimanche }}</span>
                    </li>
                </ul>
            </div>

            <div>
                <h3 class="text-2xl font-bold mb-6 text-secondary-yellow">{{ $contents['footer_connect_title'] ?? 'Restons connectés : Votre table vous attend !' }}</h3>
                <ul class="space-y-4 text-lg">
                    <li class="flex items-center">
                        <i data-feather="map-pin" class="w-6 h-6 mr-3 flex-shrink-0 text-secondary-yellow" aria-hidden="true"></i>
                        <span>{{ $contents['footer_address'] ?? '4 Pl. Ruzebouc, 49080 Bouchemaine' }}</span>
                    </li>
                    <li class="flex items-center">
                        <i data-feather="phone" class="w-6 h-6 mr-3 flex-shrink-0 text-secondary-yellow" aria-hidden="true"></i>
                        <a href="tel:{{ str_replace([' ', '+'], '', $contents['footer_phone'] ?? '+33244855536') }}" class="hover:underline">{{ $contents['footer_phone'] ?? '+33 2 44 85 55 36' }}</a>
                    </li>
                    <li class="flex items-center">
                        <i data-feather="mail" class="w-6 h-6 mr-3 flex-shrink-0 text-secondary-yellow" aria-hidden="true"></i>
                        <a href="mailto:{{ $contents['footer_email'] ?? 'direction.papapoule@gmail.com' }}" class="hover:underline">{{ $contents['footer_email'] ?? 'direction.papapoule@gmail.com' }}</a>
                    </li>
                </ul>
                
                <h3 class="text-2xl font-bold mb-6 mt-10 text-secondary-yellow">{{ $contents['footer_follow_title'] ?? 'Suivez-nous !' }}</h3>
                <div class="flex space-x-6 text-white">
                    <a href="{{ $contents['social_instagram'] ?? 'https://www.instagram.com/pointecapointe49?igsh=M3BxYTdjcDN1YzF1' }}" target="_blank" rel="noopener noreferrer" class="hover:text-secondary-yellow transition-colors duration-300" aria-label="Suivez Pointe ça Pointe sur Instagram (nouvel onglet)">
                        <i data-feather="instagram" class="w-8 h-8" aria-hidden="true"></i>
                    </a>
                    <a href="{{ $contents['social_facebook'] ?? 'https://www.facebook.com/PointeCaPointeBouchemaine/' }}" target="_blank" rel="noopener noreferrer" class="hover:text-secondary-yellow transition-colors duration-300" aria-label="Suivre Pointe ça Pointe sur Facebook (nouvel onglet)">
                        <i data-feather="facebook" class="w-8 h-8" aria-hidden="true"></i>
                    </a>
                </div>
            </div>

            <div class="w-full flex flex-col h-[380px] lg:h-auto">
                <h3 class="text-2xl font-bold mb-6 text-secondary-yellow">Découvrez-nous sur la carte !</h3>
                <div class="rounded-xl overflow-hidden shadow-lg flex-1 min-h-[250px] w-full border-4 border-secondary-yellow">
                    <iframe 
                        title="Carte Google Maps - Localisation de Pointe ça Pointe"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2710.8524672689626!2d-0.6200000000000000!3d47.40907210000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4807d56f02983b9f%3A0x3e0a05775d46d9a2!2sPointe%20%C3%A7a%20Pointe!5e0!3m2!1sfr!2sfr!4v1699999999999!5m2!1sfr!2sfr" 
                        width="100%" 
                        height="100%" 
                        style="border:0;" 
                        allowfullscreen="" 
                        loading="lazy" 
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>
        </div>
        
        <!-- Bas de page avec crédits discrets -->
        <div class="border-t border-white/10 mt-12 pt-8 text-center text-sm text-white/60">
            <p>
                &copy; {{ date('Y') }} Pointe ça Pointe. Tous droits réservés. 
                <span class="mx-2" aria-hidden="true">|</span> 
                Créé par <a href="https://subtrack.eu" target="_blank" rel="noopener noreferrer" class="hover:text-secondary-yellow underline transition-colors duration-300" aria-label="Créé par Subtrack (ouvre un nouvel onglet)">Subtrack</a>
            </p>
        </div>
    </footer>
    @stack('scripts')
    
    <!-- Système de notification (toast) personnalisé pour remplacer alert() -->
    <script>
        (function() {
            const toastContainer = document.createElement('div');
            toastContainer.id = 'custom-toast-container';
            toastContainer.className = 'fixed top-5 right-5 z-[9999] flex flex-col gap-3 pointer-events-none max-w-sm w-full px-4';
            document.body.appendChild(toastContainer);

            window.alert = function(message) {
                const toast = document.createElement('div');
                toast.className = 'transform translate-x-full transition-all duration-300 ease-out p-4 rounded-2xl shadow-2xl flex items-start gap-3 bg-white text-gray-800 border-l-4 border-secondary-yellow pointer-events-auto w-full';
                toast.innerHTML = `
                    <div class="text-secondary-yellow mt-0.5 flex-shrink-0">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                    </div>
                    <div class="flex-1 text-sm font-semibold leading-5 text-primary-blue">${message}</div>
                    <button class="text-gray-400 hover:text-gray-600 focus:outline-none text-lg font-bold leading-3" onclick="this.parentElement.remove()">&times;</button>
                `;
                toastContainer.appendChild(toast);
                
                setTimeout(() => {
                    toast.classList.remove('translate-x-full');
                }, 10);

                setTimeout(() => {
                    toast.classList.add('translate-x-full');
                    toast.addEventListener('transitionend', () => toast.remove());
                }, 5000);
            };
        })();
    </script>
</body>
</html>
