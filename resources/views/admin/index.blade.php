@extends('layouts.admin')

@section('title', 'Administration - Pointe ça Pointe')
@section('description', 'Interface d\'administration du site Pointe ça Pointe')

@section('content')
<div class="min-h-screen bg-gray-100 py-8">
    <div class="container mx-auto max-w-7xl px-4 py-20">
        <div class="bg-white rounded-lg shadow-lg p-8">
            <h1 class="text-4xl font-bold text-primary-blue mb-8">Administration du site</h1>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-8">
                <div class="bg-light-blue p-6 rounded-lg">
                    <h2 class="text-2xl font-bold text-primary-blue mb-4">Contenu textuel de la page d'accueil</h2>
                    <p class="text-gray-600 mb-4">Gérez les textes du site (titres, descriptions, etc.)</p>
                    <a href="{{ route('admin.content.index') }}" class="inline-block px-4 py-2 bg-primary-blue text-white font-medium rounded-md hover:bg-secondary-yellow hover:text-primary-blue transition duration-300 text-sm">
                        Gérer le contenu
                    </a>
                </div>
                
                <div class="bg-light-blue p-6 rounded-lg">
                    <h2 class="text-2xl font-bold text-primary-blue mb-4">Menus & Carte</h2>
                    <p class="text-gray-600 mb-4">Gérez les éléments de menu, boissons et vins</p>
                    <a href="{{ route('admin.menu.index') }}" class="inline-block px-4 py-2 bg-primary-blue text-white font-medium rounded-md hover:bg-secondary-yellow hover:text-primary-blue transition duration-300 text-sm">
                        Gérer les menus
                    </a>
                </div>
                
                <div class="bg-light-blue p-6 rounded-lg">
                    <h2 class="text-2xl font-bold text-primary-blue mb-4">Galerie</h2>
                    <p class="text-gray-600 mb-4">Gérez les images de la galerie</p>
                    <a href="{{ route('admin.image.index') }}" class="inline-block px-4 py-2 bg-primary-blue text-white font-medium rounded-md hover:bg-secondary-yellow hover:text-primary-blue transition duration-300 text-sm">
                        Gérer les images
                    </a>
                </div>
                
                <div class="bg-light-blue p-6 rounded-lg">
                    <h2 class="text-2xl font-bold text-primary-blue mb-4">Événements</h2>
                    <p class="text-gray-600 mb-4">Gérez les événements et concerts</p>
                    <a href="{{ route('admin.event.index') }}" class="inline-block px-4 py-2 bg-primary-blue text-white font-medium rounded-md hover:bg-secondary-yellow hover:text-primary-blue transition duration-300 text-sm">
                        Gérer les événements
                    </a>
                </div>
            </div>
        
        </div>
    </div>
</div>
@endsection
