@extends('layouts.app')

@section('title', 'Pointe ça Pointe - Bistrot sur les bords de Loire à Bouchemaine')
@section('description', 'Découvrez Pointe ça Pointe, un bistrot décontracté sur les bords de Loire à Bouchemaine. Profitez de notre terrasse, de nos plats bistrot frais, de nos burgers maison et de notre ambiance familiale.')

@section('content')
<div class="relative h-screen overflow-hidden">
    <div class="relative h-full w-full">
        <div class="carousel-item absolute inset-0 flex items-center justify-center bg-cover bg-center" style="background-image: url('{{ asset('img/carousel/facade1.jpg') }}');">
            <div class="absolute inset-0 bg-black bg-opacity-40"></div>
            <div class="relative z-10 text-center px-4" data-aos="fade-up">
                <h1 class="text-5xl md:text-7xl font-bold text-white mb-8">{{ $contents['home_title'] ?? 'Pointe ça Pointe' }}</h1>
                <div class="flex flex-col md:flex-row justify-center gap-6">
                    <a href="{{ route('menu') }}" class="px-8 py-4 bg-white text-primary-blue font-semibold rounded-full shadow-lg hover:bg-gray-100 transition duration-300 transform hover:scale-105">
                        Menu
                    </a>
                    <a href="{{ route('repas') }}" class="px-8 py-4 bg-transparent border-2 border-white text-white font-semibold rounded-full hover:bg-white hover:text-primary-blue transition duration-300 transform hover:scale-105">
                        Repas de groupe
                    </a>
                </div>
            </div>
        </div>
        
        <!-- Item 2 - Vue sur la Loire -->
        <div class="carousel-item absolute inset-0 flex items-center justify-center bg-cover bg-center opacity-0" style="background-image: url('{{ asset('img/carousel/loire1.jpg') }}');">
            <div class="absolute inset-0 bg-black bg-opacity-40"></div>
            <div class="relative z-10 text-center px-4">
                <h1 class="text-5xl md:text-7xl font-bold text-white mb-8">{{ $contents['home_title'] ?? 'Pointe ça Pointe' }}</h1>
                <div class="flex flex-col md:flex-row justify-center gap-6">
                    <a href="{{ route('menu') }}" class="px-8 py-4 bg-white text-primary-blue font-semibold rounded-full shadow-lg hover:bg-gray-100 transition duration-300 transform hover:scale-105">
                        Menu
                    </a>
                    <a href="{{ route('repas') }}" class="px-8 py-4 bg-transparent border-2 border-white text-white font-semibold rounded-full hover:bg-white hover:text-primary-blue transition duration-300 transform hover:scale-105">
                        Repas de groupe
                    </a>
                </div>
            </div>
        </div>
        
        <!-- Item 3 - Autre façade -->
        <div class="carousel-item absolute inset-0 flex items-center justify-center bg-cover bg-center opacity-0" style="background-image: url('{{ asset('img/carousel/facade2.jpg') }}');">
            <div class="absolute inset-0 bg-black bg-opacity-40"></div>
            <div class="relative z-10 text-center px-4">
                <h1 class="text-5xl md:text-7xl font-bold text-white mb-8">{{ $contents['home_title'] ?? 'Pointe ça Pointe' }}</h1>
                <div class="flex flex-col md:flex-row justify-center gap-6">
                    <a href="{{ route('menu') }}" class="px-8 py-4 bg-white text-primary-blue font-semibold rounded-full shadow-lg hover:bg-gray-100 transition duration-300 transform hover:scale-105">
                        Menu
                    </a>
                    <a href="{{ route('repas') }}" class="px-8 py-4 bg-transparent border-2 border-white text-white font-semibold rounded-full hover:bg-white hover:text-primary-blue transition duration-300 transform hover:scale-105">
                        Repas de groupe
                    </a>
                </div>
            </div>
        </div>

        <div class="carousel-item absolute inset-0 flex items-center justify-center bg-cover bg-center opacity-0" style="background-image: url('{{ asset('img/carousel/loire2.jpg') }}');">
            <div class="absolute inset-0 bg-black bg-opacity-40"></div>
            <div class="relative z-10 text-center px-4">
                <h1 class="text-5xl md:text-7xl font-bold text-white mb-8">{{ $contents['home_title'] ?? 'Pointe ça Pointe' }}</h1>
                <div class="flex flex-col md:flex-row justify-center gap-6">
                    <a href="{{ route('menu') }}" class="px-8 py-4 bg-white text-primary-blue font-semibold rounded-full shadow-lg hover:bg-gray-100 transition duration-300 transform hover:scale-105">
                        Menu
                    </a>
                    <a href="{{ route('repas') }}" class="px-8 py-4 bg-transparent border-2 border-white text-white font-semibold rounded-full hover:bg-white hover:text-primary-blue transition duration-300 transform hover:scale-105">
                        Repas de groupe
                    </a>
                </div>
            </div>
        </div>

        <div class="carousel-item absolute inset-0 flex items-center justify-center bg-cover bg-center opacity-0" style="background-image: url('{{ asset('img/carousel/facade3.jpg') }}');">
            <div class="absolute inset-0 bg-black bg-opacity-40"></div>
            <div class="relative z-10 text-center px-4">
                <h1 class="text-5xl md:text-7xl font-bold text-white mb-8">{{ $contents['home_title'] ?? 'Pointe ça Pointe' }}</h1>
                <div class="flex flex-col md:flex-row justify-center gap-6">
                    <a href="{{ route('menu') }}" class="px-8 py-4 bg-white text-primary-blue font-semibold rounded-full shadow-lg hover:bg-gray-100 transition duration-300 transform hover:scale-105">
                        Menu
                    </a>
                    <a href="{{ route('repas') }}" class="px-8 py-4 bg-transparent border-2 border-white text-white font-semibold rounded-full hover:bg-white hover:text-primary-blue transition duration-300 transform hover:scale-105">
                        Repas de groupe
                    </a>
                </div>
            </div>
        </div>
    </div>
    
    <div class="absolute bottom-8 left-0 right-0 flex justify-center space-x-2 z-20">
        <button class="carousel-indicator w-3 h-3 rounded-full bg-white bg-opacity-50 hover:bg-opacity-100 transition" data-index="0"></button>
        <button class="carousel-indicator w-3 h-3 rounded-full bg-white bg-opacity-50 hover:bg-opacity-100 transition" data-index="1"></button>
        <button class="carousel-indicator w-3 h-3 rounded-full bg-white bg-opacity-50 hover:bg-opacity-100 transition" data-index="2"></button>
        <button class="carousel-indicator w-3 h-3 rounded-full bg-white bg-opacity-50 hover:bg-opacity-100 transition" data-index="3"></button>
        <button class="carousel-indicator w-3 h-3 rounded-full bg-white bg-opacity-50 hover:bg-opacity-100 transition" data-index="4"></button>
    </div>
</div>

<section class="relative py-20 bg-white">
    <div class="wave-container">
        <div class="wave top-wave-blue wave-animation"></div>
    </div>
    
    <div class="container mx-auto max-w-7xl px-4 relative z-20">
        <h2 class="text-3xl md:text-4xl font-bold text-center mb-16 text-primary-blue" data-aos="fade-up">Nos Engagements</h2>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="text-center p-6" data-aos="fade-up" data-aos-delay="100">
                <div class="w-24 h-24 mx-auto mb-6 bg-light-blue rounded-full flex items-center justify-center">
                    <i data-feather="refresh-cw" class="text-primary-blue w-12 h-12"></i>
                </div>
                <h3 class="text-xl font-bold mb-3 text-primary-blue">Frais</h3>
                <p class="text-gray-600">{{ $contents['commitment_fresh'] ?? 'Des produits toujours frais, préparés quotidiennement pour garantir qualité et saveur.' }}</p>
            </div>
            
            <div class="text-center p-6" data-aos="fade-up" data-aos-delay="200">
                <div class="w-24 h-24 mx-auto mb-6 bg-light-blue rounded-full flex items-center justify-center">
                    <i data-feather="map-pin" class="text-primary-blue w-12 h-12"></i>
                </div>
                <h3 class="text-xl font-bold mb-3 text-primary-blue">Local</h3>
                <p class="text-gray-600">{{ $contents['commitment_local'] ?? 'Nous privilégions les producteurs locaux pour soutenir notre économie régionale.' }}</p>
            </div>
            
            <div class="text-center p-6" data-aos="fade-up" data-aos-delay="300">
                <div class="w-24 h-24 mx-auto mb-6 bg-light-blue rounded-full flex items-center justify-center">
                    <i data-feather="home" class="text-primary-blue w-12 h-12"></i>
                </div>
                <h3 class="text-xl font-bold mb-3 text-primary-blue">Fait Maison</h3>
                <p class="text-gray-600">{{ $contents['commitment_homemade'] ?? 'Toutes nos preparations sont artisanales, réalisées avec passion dans nos cuisines.' }}</p>
            </div>
            
            <div class="text-center p-6" data-aos="fade-up" data-aos-delay="400">
                <div class="w-24 h-24 mx-auto mb-6 bg-light-blue rounded-full flex items-center justify-center">
                    <i data-feather="flag" class="text-primary-blue w-12 h-12"></i>
                </div>
                <h3 class="text-xl font-bold mb-3 text-primary-blue">Français</h3>
                <p class="text-gray-600">{{ $contents['commitment_french'] ?? 'Nous valorisons les produits français et le savoir-faire de nos artisans.' }}</p>
            </div>
        </div>
    </div>
</section>

<section class="relative bg-primary-blue py-20 text-white">
    <div class="container mx-auto max-w-7xl px-4 flex flex-col md:flex-row items-center gap-12">
        <div class="w-full md:w-1/2" data-aos="fade-right" data-aos-duration="1200">
            <img src="{{ asset('img/galerie/DSC06123.jpg') }}" alt="Image of bistrot Pointe ça Pointe" class="rounded-xl shadow-lg w-full">
        </div>
        <div class="w-full md:w-1/2" data-aos="fade-left" data-aos-duration="1200">
            <h2 class="text-3xl md:text-4xl font-bold mb-6">Notre bistrot</h2>
            <p class="text-lg mb-4">
                {{ $contents['about_text'] ?? 'Bienvenue à Pointe ça Pointe, votre destination culinaire à Bouchemaine. Notre bistrot est un lieu de partage et de convivialité, où la passion de la cuisine se marie avec un cadre exceptionnel. Situé au cœur de la ville, nous offrons une expérience gastronomique authentique, mettant en valeur les saveurs de notre région.' }}
            </p>
            <p class="text-lg">
                Chaque plat est une célébration de la cuisine française, préparé avec des ingrédients frais et locaux. Que ce soit pour un déjeuner ensoleillé sur la terrasse, un dîner romantique ou un événement spécial, notre équipe est dédiée à vous offrir un moment inoubliable, où chaque bouchée raconte une histoire.
            </p>
        </div>
    </div>
</section>

<section class="bg-white py-20 relative">
    <div class="container mx-auto max-w-7xl px-4">
        <h2 class="text-3xl md:text-4xl font-bold text-center mb-16 text-primary-blue">
            Nos clients nous adorent !
        </h2>
        <div class="flex items-center justify-center mb-8">
            <span class="text-5xl font-bold text-primary-blue mr-4">4,8/5</span>
            <div class="flex space-x-1 text-secondary-yellow">
                <i data-feather="star" class="w-8 h-8 fill-current"></i>
                <i data-feather="star" class="w-8 h-8 fill-current"></i>
                <i data-feather="star" class="w-8 h-8 fill-current"></i>
                <i data-feather="star" class="w-8 h-8 fill-current"></i>
                <i data-feather="star" class="w-8 h-8 fill-current"></i>
            </div>
        </div>
        <p class="text-center text-gray-700 text-lg mb-12">
            Avec une note de 4,8/5 sur Google, nos clients reconnaissent notre engagement envers la qualité et la convivialité.
        </p>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="bg-light-blue p-6 rounded-lg shadow-md" data-aos="fade-up" data-aos-delay="100">
                <div class="flex items-center mb-4">
                    <div class="w-12 h-12 bg-primary-blue rounded-full flex items-center justify-center text-white font-bold">L</div>
                    <div class="ml-4">
                        <p class="font-semibold text-primary-blue">Ludovic M.</p>
                        <span class="text-sm text-gray-600">⭐ ⭐ ⭐ ⭐</span>
                    </div>
                </div>
                <p class="italic text-gray-800">"Cadre très agréable, les plats sont délicieux, et service de qualité."</p>
            </div>
            
            <div class="bg-light-blue p-6 rounded-lg shadow-md" data-aos="fade-up" data-aos-delay="200">
                <div class="flex items-center mb-4">
                    <div class="w-12 h-12 bg-primary-blue rounded-full flex items-center justify-center text-white font-bold">M</div>
                    <div class="ml-4">
                        <p class="font-semibold text-primary-blue">Marie-France N.</p>
                        <span class="text-sm text-gray-600">⭐ ⭐ ⭐ ⭐ ⭐</span>
                    </div>
                </div>
                <p class="italic text-gray-800">"Vue imprenable et ambiance joyeuse. Une adresse à recommander sans hésitation."</p>
            </div>

            <div class="bg-light-blue p-6 rounded-lg shadow-md" data-aos="fade-up" data-aos-delay="300">
                <div class="flex items-center mb-4">
                    <div class="w-12 h-12 bg-primary-blue rounded-full flex items-center justify-center text-white font-bold">S</div>
                    <div class="ml-4">
                        <p class="font-semibold text-primary-blue">Sophie L.</p>
                        <span class="text-sm text-gray-600">⭐ ⭐ ⭐ ⭐ ⭐</span>
                    </div>
                </div>
                <p class="italic text-gray-800">"Un cadre exceptionnel face à la Maine et un personnel très agréable."</p>
            </div>
        </div>

        <div class="mt-12 text-center" data-aos="fade-up" data-aos-delay="400">
            <a href="https://www.google.com/maps/place/Pointe+ça+Pointe/@47.4090721,-0.6205203,17z/data=!4m8!3m7!1s0x4807d56f02983b9f:0x3e0a05775d46d9a2!8m2!3d47.4090721!4d-0.6179454!9m1!1b1!16s%2Fg%2F11t6v5pcg0?hl=fr&entry=ttu&g_ep=EgoyMDI1MDkwMy4wIKXMDSoASAFQAw%3D%3D" target="_blank" rel="noopener noreferrer" class="px-8 py-4 inline-block bg-primary-blue text-white font-semibold rounded-full shadow-lg hover:bg-secondary-yellow hover:text-primary-blue transition duration-300 transform hover:scale-105">
                Voir tous les avis sur Google
            </a>
        </div>
    </div>
    <div class="wave-container">
        <div class="wave bottom-wave-blue"></div>
    </div>
</section>
@endsection
