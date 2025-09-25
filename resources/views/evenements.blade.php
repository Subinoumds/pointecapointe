<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pointe ça Pointe - Événements & Concerts à Bouchemaine</title>
    <meta name="description" content="Découvrez les événements à venir et les concerts organisés au Pointe ça Pointe, votre bistrot sur les bords de Loire à Bouchemaine.">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('img/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('img/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('img/favicon-16x16.png') }}">
    <link rel="manifest" href="/site.webmanifest">
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
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="{{ asset('style.css') }}" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
    <script src="https://unpkg.com/feather-icons"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/gsap.min.js"></script>
    <style>
        .wave-container {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 100px;
            overflow: hidden;
            z-index: 10;
        }

        .wave {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 200%;
            height: 100px;
            background-repeat: repeat no-repeat;
            background-position: 0 bottom;
            transform-origin: center bottom;
            background-size: 50% 100%;
        }
        
        .top-wave-blue {
            background-image: url('data:image/svg+xml;utf8,<svg viewBox="0 0 1200 120" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none"><path d="M0,120V104.19C13,83.08,27.64,63.14,47.69,47.95,99.41,8.73,165,9,224.58,28.42c31.15,10.15,60.09,26.07,89.67,39.8,40.92,19,84.73,46,130.83,49.67,36.26,2.85,70.9-9.42,98.6-31.56,31.77-25.39,62.32-62,103.63-73,40.44-10.79,81.35,6.69,119.13,24.28s75.16,39,116.92,43.05c59.73,5.85,113.28-22.88,168.9-38.84,30.2-8.66,59-6.17,87.09,7.5,22.43,10.89,48,26.93,60.65,49.24V120Z" fill="%23003366" opacity=".5"/><path d="M0,120V114.37C149.93,61,314.09,48.68,475.83,77.43c43,7.64,84.23,20.12,127.61,26.46,59,8.63,112.48-12.24,165.56-35.4C827.93,42.78,886,24.76,951.2,30c86.53,7,172.46,45.71,248.8,84.81V120Z" fill="%23003366"/></svg>');
        }
        
        .bottom-wave-white {
            background-image: url('data:image/svg+xml;utf8,<svg viewBox="0 0 1200 120" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none"><path d="M0,120V73.71c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V120Z" fill="%23ffffff" opacity=".25"/><path d="M0,120V104.19C13,83.08,27.64,63.14,47.69,47.95,99.41,8.73,165,9,224.58,28.42c31.15,10.15,60.09,26.07,89.67,39.8,40.92,19,84.73,46,130.83,49.67,36.26,2.85,70.9-9.42,98.6-31.56,31.77-25.39,62.32-62,103.63-73,40.44-10.79,81.35,6.69,119.13,24.28s75.16,39,116.92,43.05c59.73,5.85,113.28-22.88,168.9-38.84,30.2-8.66,59-6.17,87.09,7.5,22.43,10.89,48,26.93,60.65,49.24V120Z" fill="%23ffffff" opacity=".5"/><path d="M0,120V114.37C149.93,61,314.09,48.68,475.83,77.43c43,7.64,84.23,20.12,127.61,26.46,59,8.63,112.48-12.24,165.56-35.4C827.93,42.78,886,24.76,951.2,30c86.53,7,172.46,45.71,248.8,84.81V120Z" fill="%23ffffff"/></svg>');
        }
        
        .wave-animation {
            animation: wave 15s linear infinite;
        }
        
        @keyframes wave {
            0% { transform: translateX(0); }
            100% { transform: translateX(-50%); }
        }
        .mobile-menu {
            transition: transform 0.3s ease-in-out;
            transform: translateX(100%);
        }
        .mobile-menu.open {
            transform: translateX(0);
        }
        .past-event-gallery {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1rem;
            margin-top: 1rem;
        }
        .past-event-gallery img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 0.5rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body class="bg-gray-100 font-sans">
    <header class="relative top-0 left-0 w-full z-30 p-4 bg-white shadow-lg rounded-b-xl">
        <nav class="container mx-auto max-w-7xl flex justify-between items-center px-4">
            <a href="{{ route('home') }}" class="flex items-center space-x-2">
                <img src="{{ asset('img/logo.jpg') }}" alt="Logo Pointe ça Pointe" class="h-20 w-auto">
            </a>            
            <ul class="hidden md:flex space-x-6">
                <li><a href="{{ route('home') }}" class="font-semibold text-primary-blue hover:text-secondary-yellow transition-colors duration-300">Accueil</a></li>
                <li><a href="{{ route('evenements') }}" class="font-semibold text-secondary-yellow hover:text-secondary-yellow transition-colors duration-300">Événements</a></li>
                <li><a href="{{ route('repas') }}" class="font-semibold text-primary-blue hover:text-secondary-yellow transition-colors duration-300">Repas de groupe</a></li>
                <li class="relative">
                    <!-- Bouton principal -->
                    <button id="menuToggle" class="flex items-center font-semibold text-primary-blue hover:text-secondary-yellow transition-colors duration-300 focus:outline-none">
                        Menus & Carte 
                        <i data-feather="chevron-down" class="inline-block w-4 h-4 ml-1"></i>
                    </button>

                    <!-- Sous-menu -->
                    <div id="submenu" class="absolute hidden bg-white shadow-lg rounded-md mt-2 w-48 z-50">
                        <a href="{{ route('menu') }}" class="block px-4 py-2 text-primary-blue hover:bg-light-blue">Carte & Boissons</a>
                        <a href="{{ route('menus.midi') }}" class="block px-4 py-2 text-primary-blue hover:bg-light-blue">Menus du midi</a>
                        <a href="{{ route('menus.groupe') }}" class="block px-4 py-2 text-primary-blue hover:bg-light-blue">Menus de groupe</a>
                    </div>
                </li>
                <li><a href="{{ route('galerie') }}" class="font-semibold text-primary-blue hover:text-secondary-yellow transition-colors duration-300">Galerie</a></li>
                <li><a href="{{ route('bistrot') }}" class="font-semibold text-primary-blue hover:text-secondary-yellow transition-colors duration-300">Définition BISTROT</a></li>
            </ul>

            <button id="mobileMenuBtn" class="md:hidden text-primary-blue p-2">
                <i data-feather="menu" class="w-8 h-8"></i>
            </button>
        </nav>
    </header>

    <div id="mobileMenu" class="mobile-menu fixed top-0 right-0 w-64 h-full bg-white shadow-lg p-6 z-40 md:hidden">
        <div class="flex justify-end mb-8">
            <button id="closeMenuBtn" class="text-primary-blue p-2">
                <i data-feather="x" class="w-8 h-8"></i>
            </button>
        </div>
        <ul class="flex flex-col space-y-6">
            <li><a href="{{ route('home') }}" class="text-xl font-semibold text-primary-blue hover:text-secondary-yellow transition-colors duration-300">Accueil</a></li>
            <li><a href="{{ route('evenements') }}" class="text-xl font-semibold text-primary-blue hover:text-secondary-yellow transition-colors duration-300">Événements</a></li>
            <li><a href="{{ route('repas') }}" class="text-xl font-semibold text-primary-blue hover:text-secondary-yellow transition-colors duration-300">Repas de groupe</a></li>
            <li><a href="{{ route('menu') }}" class="text-xl font-semibold text-primary-blue hover:text-secondary-yellow transition-colors duration-300">Carte & Boissons</a></li>
            <li><a href="{{ route('menus.midi') }}" class="text-xl font-semibold text-primary-blue hover:text-secondary-yellow transition-colors duration-300">Menus du midi</a></li>
            <li><a href="{{ route('menus.groupe') }}" class="text-xl font-semibold text-primary-blue hover:text-secondary-yellow transition-colors duration-300">Menus de groupe</a></li>
            <li><a href="{{ route('galerie') }}" class="text-xl font-semibold text-primary-blue hover:text-secondary-yellow transition-colors duration-300">Galerie</a></li>
            <li><a href="{{ route('bistrot') }}" class="text-xl font-semibold text-primary-blue hover:text-secondary-yellow transition-colors duration-300">Définition BISTROT</a></li>
        </ul>
    </div>
    
    <section class="relative bg-white py-20 text-center overflow-hidden">
        <div class="container mx-auto max-w-7xl px-4 relative z-20">
            <h1 class="text-5xl md:text-7xl font-bold text-primary-blue" data-aos="fade-up">Événements & Concerts</h1>
            <p class="mt-4 text-xl text-gray-600" data-aos="fade-up" data-aos-delay="200">
                Découvrez nos animations à venir et revivez les meilleurs moments passés.
            </p>
        </div>
        <div class="wave-container">
            <div class="wave top-wave-blue wave-animation"></div>
        </div>
    </section>

    <section class="bg-primary-blue text-white py-20 relative">
        <div class="container mx-auto max-w-7xl px-4 relative z-20">
            <h2 class="text-4xl md:text-5xl font-bold text-center text-secondary-yellow mb-12" data-aos="fade-up">Nos événements à venir</h2>
            
            @if($upcomingEvents->count() > 0)
                <div class="flex flex-col md:flex-row gap-8 items-stretch" data-aos="fade-up">
                    @foreach($upcomingEvents as $index => $event)
                        <div class="p-6 rounded-xl shadow-lg backdrop-blur-sm bg-black/20 h-full flex-1 flex flex-col justify-between" 
                             @if($index > 0) data-aos="fade-up" data-aos-delay="{{ $index * 100 }}" @endif>
                            <div>
                                <h3 class="text-2xl font-bold text-secondary-yellow mb-2">{{ $event->title }}</h3>
                                <p class="text-lg font-semibold mb-2">{{ $event->formatted_date }}</p>
                                <p class="text-gray-200">
                                    {!! nl2br(e($event->description)) !!}
                                </p>
                            </div>
                            <div class="mt-6 text-center">
                                <a href="tel:+33244855536" class="inline-block px-6 py-3 bg-secondary-yellow text-primary-blue font-bold rounded-full transition-colors duration-300 hover:bg-white hover:text-primary-blue">
                                    Réserver pour cette date
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center">
                    <p class="text-xl text-gray-200">Aucun événement à venir pour le moment.</p>
                    <p class="text-lg text-gray-300 mt-2">Revenez bientôt pour découvrir nos prochains événements !</p>
                </div>
            @endif
        </div>
    </section>

    <section class="bg-white text-primary-blue py-20 relative">
        <div class="container mx-auto max-w-7xl px-4 relative z-20">
            <h2 class="text-4xl md:text-5xl font-bold text-center text-primary-blue mb-12" data-aos="fade-up">Nos événements passés</h2>
            <p class="text-center text-gray-600 mb-12" data-aos="fade-up" data-aos-delay="100">
                Revivez en images les meilleurs moments de nos concerts et soirées thématiques.
            </p>
            
            @if($pastEvents->count() > 0)
                <div class="space-y-16">
                    @foreach($pastEvents as $index => $event)
                        <div class="p-8 rounded-xl shadow-lg bg-light-blue" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                            <h3 class="text-3xl font-bold text-primary-blue mb-4">{{ $event->title }}</h3>
                            <p class="text-lg text-gray-700 mb-4">
                                {!! nl2br(e($event->description)) !!}
                            </p>
                            @if($event->images && count($event->images) > 0)
                                <div class="past-event-gallery">
                                    @foreach($event->images as $image)
                                        <img src="{{ asset($image) }}" alt="{{ $event->title }}" class="rounded-lg">
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center">
                    <p class="text-xl text-gray-600">Aucun événement passé à afficher pour le moment.</p>
                </div>
            @endif
        </div>
        <div class="wave-container">
            <div class="wave bottom-wave-blue"></div>
        </div>
    </section>
    
    <footer class="bg-primary-blue text-white py-16 relative z-10">
        <div class="container mx-auto max-w-7xl px-4 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-12 relative z-20">
            <div>
                <h3 class="text-2xl font-bold mb-6 text-secondary-yellow">Venez nous rencontrer : Nos horaires gourmands !</h3>
                <ul class="space-y-2 text-lg">
                    <li class="flex items-center text-red-400 font-semibold">
                        <i data-feather="slash" class="w-6 h-6 mr-3 flex-shrink-0 text-red-400"></i>
                        <span>Lundi: Fermé</span>
                    </li>
                    <li class="flex items-center text-red-400 font-semibold">
                        <i data-feather="slash" class="w-6 h-6 mr-3 flex-shrink-0 text-red-400"></i>
                        <span>Mardi: Fermé</span>
                    </li>
                    <li class="flex items-center">
                        <i data-feather="clock" class="w-6 h-6 mr-3 flex-shrink-0 text-secondary-yellow"></i>
                        <span>Mercredi: 11h00–14h00, 18h00–20h45</span>
                    </li>
                    <li class="flex items-center">
                        <i data-feather="clock" class="w-6 h-6 mr-3 flex-shrink-0 text-secondary-yellow"></i>
                        <span>Jeudi: 11h00–14h00, 18h00–20h45</span>
                    </li>
                    <li class="flex items-center">
                        <i data-feather="clock" class="w-6 h-6 mr-3 flex-shrink-0 text-secondary-yellow"></i>
                        <span>Vendredi: 10h30–14h00, 18h00–21h00</span>
                    </li>
                    <li class="flex items-center">
                        <i data-feather="clock" class="w-6 h-6 mr-3 flex-shrink-0 text-secondary-yellow"></i>
                        <span>Samedi: 10h00–21h00</span>
                    </li>
                    <li class="flex items-center">
                        <i data-feather="clock" class="w-6 h-6 mr-3 flex-shrink-0 text-secondary-yellow"></i>
                        <span>Dimanche: 10h30–17h00</span>
                    </li>
                </ul>
            </div>

            <div>
                <h3 class="text-2xl font-bold mb-6 text-secondary-yellow">Restons connectés : Votre table vous attend !</h3>
                <ul class="space-y-4 text-lg">
                    <li class="flex items-center">
                        <i data-feather="map-pin" class="w-6 h-6 mr-3 flex-shrink-0 text-secondary-yellow"></i>
                        <span>4 Pl. Ruzebouc, 49080 Bouchemaine</span>
                    </li>
                    <li class="flex items-center">
                        <i data-feather="phone" class="w-6 h-6 mr-3 flex-shrink-0 text-secondary-yellow"></i>
                        <a href="tel:+33244855536" class="hover:underline">+33 2 44 85 55 36</a>
                    </li>
                    <li class="flex items-center">
                        <i data-feather="mail" class="w-6 h-6 mr-3 flex-shrink-0 text-secondary-yellow"></i>
                        <a href="mailto:direction.papapoule@gmail.com" class="hover:underline">direction.papapoule@gmail.com</a>
                    </li>
                </ul>
                
                <h3 class="text-2xl font-bold mb-6 mt-10 text-secondary-yellow">Suivez-nous !</h3>
                <div class="flex space-x-6 text-white">
                    <a href="https://www.instagram.com/pointecapointe49?igsh=M3BxYTdjcDN1YzF1" target="_blank" rel="noopener noreferrer" class="hover:text-secondary-yellow transition-colors duration-300">
                        <i data-feather="instagram" class="w-8 h-8"></i>
                    </a>
                    <a href="https://www.facebook.com/PointeCaPointeBouchemaine/" target="_blank" rel="noopener noreferrer" class="hover:text-secondary-yellow transition-colors duration-300">
                        <i data-feather="facebook" class="w-8 h-8"></i>
                    </a>
                </div>
            </div>

            <div class="w-full h-80 lg:h-auto">
                <h3 class="text-2xl font-bold mb-6 text-secondary-yellow">Découvrez-nous sur la carte !</h3>
                <div class="rounded-xl overflow-hidden shadow-lg h-full w-full border-4 border-secondary-yellow">
                    <iframe 
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
    </footer>
    <script src="{{ asset('script.js') }}"></script>
</body>
</html>
