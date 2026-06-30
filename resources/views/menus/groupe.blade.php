@extends('layouts.app')

@section('title', 'Menus de Groupe Bouchemaine | Repas de Famille & Séminaires - Pointe ça Pointe')
@section('description', 'Découvrez nos menus de groupe sur mesure, parfaits pour les événements d\'entreprise, les repas de famille ou les célébrations. Réservez pour une expérience culinaire unique à Bouchemaine.')

@section('content')
    <section class="relative bg-white py-20 text-center overflow-hidden">
        <div class="container mx-auto max-w-7xl px-4 relative z-20">
            <h1 class="text-5xl md:text-7xl font-bold text-primary-blue" data-aos="fade-up">Menus pour groupes</h1>
            <p class="mt-4 text-xl text-gray-600" data-aos="fade-up" data-aos-delay="200">
                Idéal pour les repas d'entreprise, les événements ou les grandes tablées en famille.
            </p>
        </div>
        <div class="wave-container">
            <div class="wave top-wave-blue wave-animation"></div>
        </div>
    </section>

    <section class="bg-primary-blue text-white py-20 relative">
        <div class="container mx-auto max-w-7xl px-4 relative z-20">
            <div class="text-center" data-aos="fade-up">
                <h2 class="text-4xl md:text-5xl font-bold text-secondary-yellow mb-6">Nos propositions de menus</h2>
                <p class="text-lg text-gray-200 mb-12 max-w-2xl mx-auto">
                    Nos menus de groupe sont élaborés sur mesure pour s'adapter à vos besoins et à votre budget.
                    Voici quelques exemples de menus que nous pouvons vous proposer.
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-stretch">
                @forelse($groupMenus as $menu)
                <div class="p-6 rounded-xl shadow-lg backdrop-blur-sm bg-black/20 h-full" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                    <h3 class="text-3xl font-bold text-secondary-yellow mb-6 pb-2 border-b border-secondary-yellow">{{ $menu->name }}</h3>
                    <p class="text-lg italic mb-4">À partir de {{ number_format($menu->price_per_person, 2) }} € par personne</p>
                    @if($menu->description)
                    <p class="text-gray-200 mb-4">{{ $menu->description }}</p>
                    @endif
                    <ul class="space-y-4">
                        @if($menu->entrees && count($menu->entrees) > 0)
                        <li>
                            <h4 class="text-xl font-semibold">Entrée</h4>
                            @foreach($menu->entrees as $entree)
                            <p class="text-gray-200">{{ $entree }}</p>
                            @endforeach
                        </li>
                        @endif
                        
                        @if($menu->plats && count($menu->plats) > 0)
                        <li>
                            <h4 class="text-xl font-semibold mt-4">Plat</h4>
                            @foreach($menu->plats as $plat)
                            <p class="text-gray-200">{{ $plat }}</p>
                            @endforeach
                        </li>
                        @endif
                        
                        @if($menu->desserts && count($menu->desserts) > 0)
                        <li>
                            <h4 class="text-xl font-semibold mt-4">Dessert</h4>
                            @foreach($menu->desserts as $dessert)
                            <p class="text-gray-200">{{ $dessert }}</p>
                            @endforeach
                        </li>
                        @endif
                    </ul>
                </div>
                @empty
                <div class="col-span-2 text-center">
                    <p class="text-gray-200 text-lg">Aucun menu de groupe disponible pour le moment.</p>
                </div>
                @endforelse
            </div>
            
            <div class="mt-12 text-center" data-aos="fade-up" data-aos-delay="200">
                <p class="text-white text-lg font-semibold mb-4">
                    Pour toute demande de menu sur mesure ou pour une réservation de groupe, contactez-nous !
                </p>
                <a href="tel:+33244855536" class="inline-block px-8 py-4 bg-secondary-yellow text-primary-blue font-bold rounded-full shadow-lg hover:bg-white transition duration-300 transform hover:scale-105">
                    Nous appeler
                </a>
            </div>
            
        </div>
    </section>

    <section class="bg-white text-primary-blue py-20 relative">
        <div class="container mx-auto max-w-7xl px-4 relative z-20">
            <div class="text-center" data-aos="fade-up">
                <h2 class="text-4xl md:text-5xl font-bold text-primary-blue mb-6">Un cadre unique pour vos événements</h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                    Notre bistrot et sa terrasse au bord de l'eau offrent un cadre idéal pour vos repas de groupe, séminaires ou événements spéciaux. Profitez d'une ambiance conviviale et d'un service attentionné pour rendre votre moment inoubliable.
                </p>
            </div>
            <div class="mt-12 grid grid-cols-1 md:grid-cols-2 gap-8" data-aos="fade-up" data-aos-delay="100">
                <div class="rounded-xl overflow-hidden shadow-lg border-4 border-secondary-yellow">
                    <img src="{{ asset('img/galerie/DSC06123.jpg') }}" alt="Intérieur du bistrot" class="w-full h-auto object-cover" width="1600" height="1067" loading="lazy" decoding="async">
                </div>
                <div class="rounded-xl overflow-hidden shadow-lg border-4 border-secondary-yellow">
                    <img src="{{ asset('img/galerie/DSC06147.jpg') }}" alt="Terrasse au bord de l'eau" class="w-full h-auto object-cover" width="1600" height="1067" loading="lazy" decoding="async">
                </div>
            </div>
        </div>
        <div class="wave-container">
            <div class="wave bottom-wave-white"></div>
        </div>
    </section>
@endsection