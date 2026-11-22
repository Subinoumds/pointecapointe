<!DOCTYPE html>
<html lang="fr" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fermeture Temporaire | Restaurant Pointe ça Pointe Bouchemaine</title>
    <meta name="description" content="Le bistrot Pointe ça Pointe à Bouchemaine est actuellement fermé temporairement. Les réservations sont suspendues. Nous avons hâte de vous retrouver très bientôt sur les bords de Loire !">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="https://pointe-ca-pointe.fr/">
    
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('img/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('img/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('img/favicon-16x16.png') }}">
    
    <!-- Open Graph -->
    <meta property="og:title" content="Fermeture Temporaire | Restaurant Pointe ça Pointe">
    <meta property="og:description" content="Notre établissement est temporairement fermé. On se revoit très bientôt sur les bords de Loire !">
    <meta property="og:image" content="{{ asset('img/notreresto.jpg') }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">

    <!-- Fonts & Icons -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 font-sans text-gray-800 flex flex-col min-h-screen" style="overflow-x: hidden;">

    <!-- En-tête simple et élégant -->
    <header class="bg-white shadow-md py-4 px-6 sticky top-0 z-30">
        <div class="container mx-auto max-w-7xl flex flex-col sm:flex-row justify-between items-center gap-4">
            <a href="/" class="flex items-center gap-3">
                <img src="{{ asset('img/logo.jpg') }}" alt="Logo Pointe ça Pointe" class="h-16 md:h-20 w-auto rounded-lg shadow-sm" width="791" height="791">
                <div>
                    <span class="block text-xl md:text-2xl font-extrabold text-primary-blue tracking-tight">Pointe ça Pointe</span>
                    <span class="block text-xs md:text-sm text-gray-500 font-medium">Bistrot de Loire • Bouchemaine</span>
                </div>
            </a>
            
            <div class="inline-flex items-center gap-2 px-4 py-2 bg-amber-50 border border-amber-300 text-amber-900 rounded-full text-xs md:text-sm font-semibold shadow-sm">
                <span class="w-2.5 h-2.5 rounded-full bg-amber-500 animate-pulse" aria-hidden="true"></span>
                <span>Établissement fermé temporairement</span>
            </div>
        </div>
    </header>

    <main class="flex-grow">
        <!-- Bannière Hero avec vagues signature -->
        <section class="relative bg-white py-16 md:py-24 text-center overflow-hidden">
            <div class="container mx-auto max-w-4xl px-4 relative z-20">
                <span class="inline-block px-4 py-1.5 bg-light-blue text-primary-blue font-bold rounded-full text-sm uppercase tracking-wider mb-6">
                    Information à notre aimable clientèle
                </span>
                
                <h1 class="text-4xl md:text-6xl font-extrabold text-primary-blue leading-tight">
                    Pointe ça Pointe prend <br class="hidden sm:inline">
                    <span class="text-secondary-yellow drop-shadow-sm">une courte pause !</span>
                </h1>
                
                <p class="mt-6 text-lg md:text-2xl text-gray-600 font-light max-w-2xl mx-auto leading-relaxed">
                    Notre bistrot est actuellement fermé temporairement. <br>
                    <strong>On se retrouve très bientôt sur les bords de Loire !</strong>
                </p>

                <!-- Alerte Réservations -->
                <div class="mt-8 bg-amber-50 border-l-4 border-amber-500 p-4 md:p-6 rounded-r-2xl shadow-sm text-left max-w-2xl mx-auto flex items-start gap-4">
                    <div class="text-amber-600 mt-1 flex-shrink-0">
                        <i data-feather="alert-triangle" class="w-6 h-6" aria-hidden="true"></i>
                    </div>
                    <div>
                        <h2 class="text-base md:text-lg font-bold text-amber-900 mb-1">Réservations suspendues</h2>
                        <p class="text-sm md:text-base text-amber-800 leading-snug">
                            Pour éviter tout malentendu, les réservations de tables et de repas de groupe sont momentanément indisponibles.
                        </p>
                    </div>
                </div>
            </div>

            <div class="wave-container">
                <div class="wave top-wave-blue wave-animation"></div>
            </div>
        </section>

        <!-- Section Contenu & Informations -->
        <section class="bg-primary-blue text-white py-16">
            <div class="container mx-auto max-w-5xl px-4 relative z-20">
                
                <!-- Carte principale avec photo du restaurant -->
                <div class="bg-white text-primary-blue rounded-3xl shadow-2xl overflow-hidden mb-12">
                    <div class="grid grid-cols-1 lg:grid-cols-12 items-stretch">
                        <div class="lg:col-span-5 relative min-h-[280px] lg:min-h-full">
                            <img src="{{ asset('img/notreresto.jpg') }}" alt="Restaurant Pointe ça Pointe au bord de l'eau à Bouchemaine" class="absolute inset-0 w-full h-full object-cover">
                            <div class="absolute inset-0 bg-gradient-to-t from-primary-blue/80 via-transparent to-transparent lg:hidden"></div>
                            <div class="absolute bottom-4 left-4 right-4 text-white lg:hidden">
                                <span class="text-xs uppercase tracking-wider font-bold text-secondary-yellow">Bouchemaine (49080)</span>
                                <p class="font-bold text-lg">Au cœur du village sur les bords de Loire</p>
                            </div>
                        </div>

                        <div class="lg:col-span-7 p-8 md:p-12 flex flex-col justify-center">
                            <span class="text-accent-gold font-bold uppercase tracking-wider text-xs mb-2">Message de l'équipe</span>
                            <h2 class="text-2xl md:text-4xl font-extrabold text-primary-blue mb-6">À très bientôt pour de nouveaux moments partagés</h2>
                            
                            <div class="text-gray-700 space-y-4 leading-relaxed text-base md:text-lg">
                                <p>
                                    Chères clientes, chers clients, fidèles épicuriens et amoureux de la Loire,
                                </p>
                                <p>
                                    Le restaurant <strong>Pointe ça Pointe</strong> est actuellement en période de <strong>fermeture temporaire</strong>.
                                </p>
                                <p>
                                    Nous mettons à profit cette pause pour nous ressourcer, faire le plein de nouvelles idées culinaires et dénicher de pépites auprès de nos producteurs locaux afin de vous concocter une toute nouvelle carte gourmande.
                                </p>
                                <p class="font-medium text-primary-blue bg-light-blue/40 p-4 rounded-xl border-l-4 border-primary-blue">
                                    Nous avons déjà hâte de vous rouvrir nos portes et de vous retrouver sur notre belle terrasse panoramique pour partager de chaleureux moments en famille ou entre amis !
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 3 Blocs Infos Pratiques -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
                    
                    <!-- Adresse -->
                    <div class="bg-white/10 backdrop-blur-sm border border-white/20 p-6 rounded-2xl flex flex-col items-center text-center">
                        <div class="w-14 h-14 rounded-2xl bg-secondary-yellow text-primary-blue flex items-center justify-center mb-4 shadow-md">
                            <i data-feather="map-pin" class="w-7 h-7" aria-hidden="true"></i>
                        </div>
                        <h3 class="text-xl font-bold text-secondary-yellow mb-2">Notre Adresse</h3>
                        <p class="text-gray-200 text-sm leading-relaxed mb-4">
                            4 Place Ruzebouc<br>
                            49080 Bouchemaine (Maine-et-Loire)
                        </p>
                        <span class="text-xs text-white/70 italic">Idéalement situé sur la Loire à Vélo</span>
                    </div>

                    <!-- Contact Urgence / Projets futurs -->
                    <div class="bg-white/10 backdrop-blur-sm border border-white/20 p-6 rounded-2xl flex flex-col items-center text-center">
                        <div class="w-14 h-14 rounded-2xl bg-secondary-yellow text-primary-blue flex items-center justify-center mb-4 shadow-md">
                            <i data-feather="mail" class="w-7 h-7" aria-hidden="true"></i>
                        </div>
                        <h3 class="text-xl font-bold text-secondary-yellow mb-2">Une Question ?</h3>
                        <p class="text-gray-200 text-sm leading-relaxed mb-4">
                            Pour toute demande d'information ou projet futur :
                        </p>
                        <div class="space-y-1 text-sm font-semibold">
                            <a href="mailto:direction.papapoule@gmail.com" class="block text-white hover:text-secondary-yellow underline transition-colors">
                                direction.papapoule@gmail.com
                            </a>
                            <a href="tel:+33244855536" class="block text-white hover:text-secondary-yellow underline transition-colors">
                                +33 2 44 85 55 36
                            </a>
                        </div>
                    </div>

                    <!-- Réseaux Sociaux -->
                    <div class="bg-white/10 backdrop-blur-sm border border-white/20 p-6 rounded-2xl flex flex-col items-center text-center">
                        <div class="w-14 h-14 rounded-2xl bg-secondary-yellow text-primary-blue flex items-center justify-center mb-4 shadow-md">
                            <i data-feather="bell" class="w-7 h-7" aria-hidden="true"></i>
                        </div>
                        <h3 class="text-xl font-bold text-secondary-yellow mb-2">Date de Réouverture</h3>
                        <p class="text-gray-200 text-sm leading-relaxed mb-4">
                            Suivez nos réseaux sociaux pour connaître en avant-première la date de reprise :
                        </p>
                        <div class="flex items-center gap-4">
                            <a href="https://www.instagram.com/pointecapointe49?igsh=M3BxYTdjcDN1YzF1" target="_blank" rel="noopener noreferrer" class="p-3 bg-white/20 hover:bg-secondary-yellow hover:text-primary-blue rounded-xl transition-all duration-300" aria-label="Suivre Pointe ça Pointe sur Instagram">
                                <i data-feather="instagram" class="w-6 h-6" aria-hidden="true"></i>
                            </a>
                            <a href="https://www.facebook.com/PointeCaPointeBouchemaine/" target="_blank" rel="noopener noreferrer" class="p-3 bg-white/20 hover:bg-secondary-yellow hover:text-primary-blue rounded-xl transition-all duration-300" aria-label="Suivre Pointe ça Pointe sur Facebook">
                                <i data-feather="facebook" class="w-6 h-6" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>

                </div>

                <!-- Carte de situation -->
                <div class="bg-white/10 backdrop-blur-sm border border-white/20 rounded-2xl p-6 md:p-8">
                    <h3 class="text-2xl font-bold text-secondary-yellow mb-4 text-center">Où nous retrouver à la réouverture ?</h3>
                    <div class="rounded-xl overflow-hidden shadow-lg h-[260px] md:h-[320px] w-full border-2 border-secondary-yellow/60">
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
        </section>
    </main>

    <!-- Pied de page officiel avec mentions légales et politique de confidentialité -->
    <footer class="bg-primary-blue border-t border-white/10 text-white py-10">
        <div class="container mx-auto max-w-7xl px-4 text-center">
            <div class="flex flex-wrap justify-center items-center gap-x-6 gap-y-2 mb-4 text-sm font-medium text-white/80">
                <a href="{{ route('mentions-legales') }}" class="hover:text-secondary-yellow underline underline-offset-4 transition-colors">Mentions Légales</a>
                <span class="text-white/30" aria-hidden="true">•</span>
                <a href="{{ route('politique-confidentialite') }}" class="hover:text-secondary-yellow underline underline-offset-4 transition-colors">Politique de Confidentialité</a>
            </div>
            
            <p class="text-xs text-white/60">
                &copy; {{ date('Y') }} Pointe ça Pointe. Tous droits réservés. 
                <span class="mx-2" aria-hidden="true">|</span> 
                Créé par <a href="https://khadidja-masri.fr" target="_blank" rel="noopener noreferrer" class="hover:text-secondary-yellow underline transition-colors" aria-label="Créé par Khadidja Masri (ouvre un nouvel onglet)">Khadidja Masri</a>
            </p>
        </div>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            if (typeof feather !== 'undefined') {
                feather.replace();
            }
        });
    </script>
</body>
</html>
