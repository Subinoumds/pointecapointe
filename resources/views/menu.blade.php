@extends('layouts.app')

@section('title', 'Pointe ça Pointe | Carte, Menus & Boissons - Cuisine Française et Burgers Maison à Bouchemaine')
@section('description', 'Consultez la carte, les menus du midi et de groupe, et la carte des boissons de notre bistrot à Bouchemaine. Idéalement situé sur la route de La Loire à Vélo.')

@section('content')
    <section class="relative bg-white py-20 text-center overflow-hidden">
        <div class="container mx-auto max-w-7xl px-4 relative z-20">
            <h1 class="text-5xl md:text-7xl font-bold text-primary-blue" data-aos="fade-up">Notre Carte Gourmande</h1>
            <p class="mt-4 text-xl text-gray-600" data-aos="fade-up" data-aos-delay="200">
                Découvrez nos plats frais et de saison, préparés avec passion.
            </p>
        </div>
        <div class="wave-container">
            <div class="wave top-wave-blue wave-animation"></div>
        </div>
    </section>

    <section class="bg-primary-blue py-20 text-white relative">
        <div class="container mx-auto max-w-7xl px-4 relative z-20">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div data-aos="fade-up">
                    <div class="p-6 rounded-xl shadow-lg backdrop-blur-sm bg-black/20 h-full">
                        <h3 class="text-3xl font-bold text-secondary-yellow mb-6 pb-2 border-b border-secondary-yellow">Entrées</h3>
                        <ul class="space-y-4">
                            @forelse($entrees as $entree)
                            <li class="flex justify-between items-center text-lg">
                                <span>{{ $entree->name }}</span>
                                <span class="font-bold text-secondary-yellow ml-4 flex-shrink-0">{{ number_format($entree->price, 2) }} €</span>
                            </li>
                            @empty
                            <li class="text-lg text-gray-300">Aucune entrée disponible</li>
                            @endforelse
                        </ul>
                    </div>
                </div>

                <div data-aos="fade-up" data-aos-delay="100">
                    <div class="p-6 rounded-xl shadow-lg backdrop-blur-sm bg-black/20 h-full">
                        <h3 class="text-3xl font-bold text-secondary-yellow mb-6 pb-2 border-b border-secondary-yellow">Plats</h3>
                        <ul class="space-y-4">
                            @forelse($plats as $plat)
                            <li class="flex justify-between items-center text-lg">
                                <span>{{ $plat->name }}</span>
                                <span class="font-bold text-secondary-yellow ml-4 flex-shrink-0">{{ number_format($plat->price, 2) }} €</span>
                            </li>
                            @empty
                            <li class="text-lg text-gray-300">Aucun plat disponible</li>
                            @endforelse
                        </ul>
                    </div>
                </div>

                <div data-aos="fade-up" data-aos-delay="200">
                    <div class="p-6 rounded-xl shadow-lg backdrop-blur-sm bg-black/20 h-full">
                        <h3 class="text-3xl font-bold text-secondary-yellow mb-6 pb-2 border-b border-secondary-yellow">Les Burgers</h3>
                        <p class="text-lg italic mb-4">Servis avec Frites Maison. Disponible sur place ou à emporter.</p>
                        <ul class="space-y-4">
                            @forelse($burgers as $burger)
                            <li class="flex justify-between items-start text-lg">
                                <div class="flex-1 mr-4">
                                    <span class="font-semibold">{{ $burger->name }}</span>
                                    @if($burger->description)
                                    <p class="text-sm">{{ $burger->description }}</p>
                                    @endif
                                </div>
                                <span class="font-bold text-secondary-yellow ml-4 flex-shrink-0">{{ number_format($burger->price, 2) }} €</span>
                            </li>
                            @empty
                            <li class="text-lg text-gray-300">Aucun burger disponible</li>
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>

            <div class="mt-16 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-8">
                <div data-aos="fade-up" data-aos-delay="300">
                    <div class="p-6 rounded-xl shadow-lg backdrop-blur-sm bg-black/20 h-full">
                        <h3 class="text-3xl font-bold text-secondary-yellow mb-6 pb-2 border-b border-secondary-yellow">Menu Enfant</h3>
                        <ul class="space-y-4">
                            @forelse($menuEnfant as $menu)
                            <li class="flex justify-between items-center text-lg">
                                <span>{{ $menu->name }}</span>
                                <span class="font-bold text-secondary-yellow ml-4 flex-shrink-0">{{ number_format($menu->price, 2) }} €</span>
                            </li>
                            @empty
                            <li class="text-lg text-gray-300">Aucun menu enfant disponible</li>
                            @endforelse
                        </ul>
                    </div>
                </div>

                <div data-aos="fade-up" data-aos-delay="400">
                    <div class="p-6 rounded-xl shadow-lg backdrop-blur-sm bg-black/20 h-full">
                        <h3 class="text-3xl font-bold text-secondary-yellow mb-6 pb-2 border-b border-secondary-yellow">Desserts</h3>
                        <ul class="space-y-4">
                            @forelse($desserts as $dessert)
                            <li class="flex justify-between items-center text-lg">
                                <span>{{ $dessert->name }}</span>
                                <span class="font-bold text-secondary-yellow ml-4 flex-shrink-0">{{ number_format($dessert->price, 2) }} €</span>
                            </li>
                            @empty
                            <li class="text-lg text-gray-300">Aucun dessert disponible</li>
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-white py-20 relative">
        <div class="container mx-auto max-w-7xl px-4 relative z-20">
            <h2 class="text-4xl md:text-5xl font-bold text-center text-primary-blue mb-12" data-aos="fade-up">Boissons et Vins</h2>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12" data-aos="fade-up" data-aos-delay="100">
                <div class="lg:col-span-1">
                    <h3 class="text-3xl font-bold text-accent-gold mb-6 border-b-2 border-accent-gold pb-2">Les Vins</h3>
                    <div id="wine-carousel" class="relative overflow-hidden w-full h-auto">
                        <div class="wine-slides-container flex transition-transform duration-700 ease-in-out">
                            @forelse($vins as $vin)
                            <div class="wine-slide min-w-full text-center">
                                @if($vin->image)
                                <img src="{{ asset('storage/vins/' . $vin->image) }}" alt="{{ $vin->name }}" class="w-full h-80 object-contain mx-auto mb-4" width="1600" height="2660" loading="lazy" decoding="async">
                                @else
                                <div class="bg-gray-200 h-80 w-full flex items-center justify-center rounded-lg mb-4">
                                    <span class="text-primary-blue text-xl font-semibold text-center p-4">Visuel à venir</span>
                                </div>
                                @endif
                                <h4 class="text-xl font-semibold text-primary-blue">{{ $vin->name }}</h4>
                                <p class="text-lg">{{ number_format($vin->glass_price, 2) }} € (Verre) | {{ number_format($vin->bottle_price, 2) }} € (Bouteille)</p>
                            </div>
                            @empty
                            <div class="wine-slide min-w-full text-center">
                                <div class="bg-gray-200 h-80 w-full flex items-center justify-center rounded-lg mb-4">
                                    <span class="text-primary-blue text-xl font-semibold text-center p-4">Aucun vin disponible</span>
                                </div>
                            </div>
                            @endforelse
                        </div>
                        
                        <button id="prev-wine" class="absolute left-0 top-1/2 transform -translate-y-1/2 p-2 bg-primary-blue text-white rounded-full ml-2 z-10 opacity-70 hover:opacity-100 transition" aria-label="Vin précédent">
                            <i data-feather="chevron-left" class="w-6 h-6" aria-hidden="true"></i>
                        </button>
                        <button id="next-wine" class="absolute right-0 top-1/2 transform -translate-y-1/2 p-2 bg-primary-blue text-white rounded-full mr-2 z-10 opacity-70 hover:opacity-100 transition" aria-label="Vin suivant">
                            <i data-feather="chevron-right" class="w-6 h-6" aria-hidden="true"></i>
                        </button>
                    </div>
                </div>

                <div class="lg:col-span-1">
                    <h3 class="text-3xl font-bold text-accent-gold mb-6 border-b-2 border-accent-gold pb-2">Les Boissons</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div>
                            <h4 class="text-xl font-semibold text-primary-blue mb-2">Boissons fraîches</h4>
                            <ul class="space-y-2">
                                @forelse($boissonsFraiches as $boisson)
                                <li class="font-medium">{{ $boisson->name }}</li>
                                @empty
                                <li class="font-medium text-gray-500">Aucune boisson fraîche disponible</li>
                                @endforelse
                            </ul>
                        </div>
                        <div>
                            <h4 class="text-xl font-semibold text-primary-blue mb-2">Apéritifs et digestifs</h4>
                            <ul class="space-y-2">
                                @forelse($aperitifsDigestifs as $aperitif)
                                <li class="font-medium">{{ $aperitif->name }}</li>
                                @empty
                                <li class="font-medium text-gray-500">Aucun apéritif disponible</li>
                                @endforelse
                            </ul>
                            <h4 class="text-xl font-semibold text-primary-blue mt-4 mb-2">Boissons chaudes & Eaux</h4>
                            <ul class="space-y-2">
                                @forelse($boissonsChaudes as $boisson)
                                <li class="font-medium">{{ $boisson->name }}</li>
                                @empty
                                <li class="font-medium text-gray-500">Aucune boisson chaude disponible</li>
                                @endforelse
                            </ul>
                        </div>
                    </div>
                    <div class="mt-8 text-center" data-aos="fade-up" data-aos-delay="200">
                        <a href="{{ (isset($contents['drinks_pdf']) && $contents['drinks_pdf'] !== 'boissons.pdf') ? asset('storage/' . $contents['drinks_pdf']) : asset('boissons.pdf') }}" target="_blank" rel="noopener noreferrer" class="px-8 py-4 inline-block bg-primary-blue text-white font-semibold rounded-full shadow-lg hover:bg-secondary-yellow hover:text-primary-blue transition duration-300 transform hover:scale-105">
                            Télécharger notre carte complète des boissons
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="wave-container">
            <div class="wave bottom-wave-blue"></div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Logique du carrousel des vins
            const wineSlides = document.querySelector('.wine-slides-container');
            const prevWineBtn = document.getElementById('prev-wine');
            const nextWineBtn = document.getElementById('next-wine');
            const totalWineSlides = document.querySelectorAll('.wine-slide').length;
            let currentWineIndex = 0;
            let wineInterval;

            if (wineSlides && prevWineBtn && nextWineBtn && totalWineSlides > 0) {
                function showWineSlide(index) {
                    wineSlides.style.transform = `translateX(-${index * 100}%)`;
                }

                function nextWineSlide() {
                    currentWineIndex = (currentWineIndex + 1) % totalWineSlides;
                    showWineSlide(currentWineIndex);
                }

                function prevWineSlide() {
                    currentWineIndex = (currentWineIndex - 1 + totalWineSlides) % totalWineSlides;
                    showWineSlide(currentWineIndex);
                }

                nextWineBtn.addEventListener('click', () => {
                    clearInterval(wineInterval);
                    nextWineSlide();
                    wineInterval = setInterval(nextWineSlide, 5000);
                });

                prevWineBtn.addEventListener('click', () => {
                    clearInterval(wineInterval);
                    prevWineSlide();
                    wineInterval = setInterval(nextWineSlide, 5000);
                });

                wineInterval = setInterval(nextWineSlide, 5000);
            }
        });
    </script>
@endpush