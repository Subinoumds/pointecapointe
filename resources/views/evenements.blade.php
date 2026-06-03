@extends('layouts.app')

@section('title', 'Pointe ça Pointe - Événements & Concerts à Bouchemaine')
@section('description', 'Découvrez les événements à venir et les concerts organisés au Pointe ça Pointe, votre bistrot sur les bords de Loire à Bouchemaine.')

@push('styles')
    <style>
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
@endpush

@section('content')
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
                                        <img src="{{ asset($image) }}" alt="{{ $event->title }}" class="rounded-lg" width="1600" height="1067" loading="lazy" decoding="async">
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
@endsection
