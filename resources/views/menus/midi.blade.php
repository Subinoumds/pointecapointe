@extends('layouts.app')

@section('title', 'Menus du Midi Bouchemaine | Formule Déjeuner - Restaurant Pointe ça Pointe')
@section('description', 'Découvrez nos menus du midi, élaborés avec des produits frais et de saison. Idéal pour une pause déjeuner rapide et gourmande à Bouchemaine.')

@push('styles')
    <style>
        .dish-slide-container {
            width: 100%;
            height: 400px; /* Taille fixe pour le conteneur */
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .dish-slide-img {
            max-width: 100%;
            max-height: 100%;
            object-fit: contain;
        }
    </style>
@endpush

@section('content')
    <section class="relative bg-white py-20 text-center overflow-hidden">
        <div class="container mx-auto max-w-7xl px-4 relative z-20">
            <h1 class="text-5xl md:text-7xl font-bold text-primary-blue" data-aos="fade-up">Menus du midi</h1>
            <p class="mt-4 text-xl text-gray-600" data-aos="fade-up" data-aos-delay="200">
                Découvrez nos formules du jour, élaborées avec des produits frais.
            </p>
        </div>
        <div class="wave-container">
            <div class="wave top-wave-blue wave-animation"></div>
        </div>
    </section>

    <section class="bg-primary-blue text-white py-20 relative">
        <div class="container mx-auto max-w-7xl px-4 relative z-20">
            <div class="text-center" data-aos="fade-up">
                <h2 class="text-4xl md:text-5xl font-bold text-secondary-yellow mb-6">Nos propositions du midi</h2>
                <p class="text-lg text-gray-200 mb-12 max-w-2xl mx-auto">
                    Nos menus du midi sont créés à partir de produits frais et de saison. Notre chef revisite les classiques du bistrot chaque semaine pour vous surprendre et vous régaler.
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-start">
                @forelse($middayMenuCards as $card)
                <div class="p-6 rounded-xl shadow-lg backdrop-blur-sm bg-black/20" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                    <h3 class="text-3xl font-bold text-secondary-yellow mb-6 pb-2 border-b border-secondary-yellow">{{ $card->title }}</h3>
                    @if($card->subtitle)
                    <p class="text-lg italic mb-4">{{ $card->subtitle }}</p>
                    @endif
                    @if($card->items && count($card->items) > 0)
                    <ul class="space-y-4">
                        @php
                            $groupedItems = collect($card->items)->groupBy('type');
                        @endphp
                        @foreach($groupedItems as $type => $items)
                        <li>
                            <h4 class="text-xl font-semibold">{{ $type }}</h4>
                            @foreach($items as $item)
                                <p class="text-gray-200">{{ $item['name'] }}</p>
                                @if(isset($item['description']) && $item['description'] && $item['description'] !== 'null' && trim($item['description']) !== '')
                                <p class="text-gray-300 text-sm">{{ $item['description'] }}</p>
                                @endif
                            @endforeach
                        </li>
                        @endforeach
                    </ul>
                    @endif
                    
                    @if($card->title === 'Formule express')
                    <div class="mt-8 text-center">
                        <p class="text-white text-lg font-semibold">
                            Pour connaître le menu du jour, appelez-nous !
                        </p>
                        <a href="tel:+33244855536" class="mt-4 inline-block px-6 py-3 bg-secondary-yellow text-primary-blue font-bold rounded-full transition-colors duration-300 hover:bg-white hover:text-primary-blue">
                            Appeler
                        </a>
                    </div>
                    @endif
                </div>
                @empty
                <div class="col-span-full text-center">
                    <p class="text-gray-200 text-lg">Aucune carte de menu disponible pour le moment.</p>
                </div>
                @endforelse
            </div>
        </div>
    </section>

    <section class="bg-white text-primary-blue py-20 relative">
        <div class="container mx-auto max-w-7xl px-4 relative z-20">
            <div class="text-center" data-aos="fade-up">
                <h2 class="text-4xl md:text-5xl font-bold text-primary-blue mb-6">Un menu du midi qui évolue</h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                    Nos menus du midi sont créés à partir de produits frais et de saison. Notre chef revisite les classiques du bistrot chaque semaine pour vous surprendre et vous régaler.
                </p>
            </div>
            
            <div class="mt-12 lg:w-3/4 mx-auto" data-aos="fade-up" data-aos-delay="100">
                <div id="dish-carousel" class="relative overflow-hidden w-full h-auto">
                    <div class="dish-slides-container flex transition-transform duration-700 ease-in-out">
                        @forelse($middayMenus as $menu)
                        <div class="dish-slide min-w-full text-center">
                            <div class="dish-slide-container rounded-xl shadow-lg">
                                <img src="{{ asset('storage/midday-menus/' . $menu->image) }}" alt="{{ $menu->name }}" class="dish-slide-img" loading="lazy" decoding="async">
                            </div>
                        </div>
                        @empty
                        <div class="dish-slide min-w-full text-center">
                            <div class="dish-slide-container rounded-xl shadow-lg bg-gray-200 flex items-center justify-center">
                                <p class="text-gray-500 text-xl">Aucune image disponible</p>
                            </div>
                        </div>
                        @endforelse
                    </div>
                    
                    <button id="prev-dish" class="absolute left-0 top-1/2 transform -translate-y-1/2 p-2 bg-primary-blue text-white rounded-full ml-2 z-10 opacity-70 hover:opacity-100 transition" aria-label="Plat précédent">
                        <i data-feather="chevron-left" class="w-6 h-6" aria-hidden="true"></i>
                    </button>
                    <button id="next-dish" class="absolute right-0 top-1/2 transform -translate-y-1/2 p-2 bg-primary-blue text-white rounded-full mr-2 z-10 opacity-70 hover:opacity-100 transition" aria-label="Plat suivant">
                        <i data-feather="chevron-right" class="w-6 h-6" aria-hidden="true"></i>
                    </button>
                </div>
            </div>
        </div>
        <div class="wave-container">
            <div class="wave bottom-wave-white"></div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Carousel des plats
            let currentDishSlide = 0;
            const dishSlides = document.querySelectorAll('.dish-slide');
            const totalDishSlides = dishSlides.length;
            
            if (totalDishSlides > 0) {
                const dishSlidesContainer = document.querySelector('.dish-slides-container');
                const prevDishBtn = document.getElementById('prev-dish');
                const nextDishBtn = document.getElementById('next-dish');

                function showDishSlide(index) {
                    if (dishSlidesContainer) {
                        const translateX = -index * 100;
                        dishSlidesContainer.style.transform = `translateX(${translateX}%)`;
                    }
                }

                if (prevDishBtn && nextDishBtn) {
                    prevDishBtn.addEventListener('click', () => {
                        currentDishSlide = (currentDishSlide - 1 + totalDishSlides) % totalDishSlides;
                        showDishSlide(currentDishSlide);
                    });

                    nextDishBtn.addEventListener('click', () => {
                        currentDishSlide = (currentDishSlide + 1) % totalDishSlides;
                        showDishSlide(currentDishSlide);
                    });
                }

                // Auto-play du carousel
                setInterval(() => {
                    if (totalDishSlides > 1) {
                        currentDishSlide = (currentDishSlide + 1) % totalDishSlides;
                        showDishSlide(currentDishSlide);
                    }
                }, 5000);
            }
        });
    </script>
@endpush