@extends('layouts.app')

@section('title', 'Administration - Pointe ça Pointe')
@section('description', 'Interface d\'administration du site Pointe ça Pointe')

@section('content')
<div class="min-h-screen bg-gray-100 pt-20">
    <div class="container mx-auto max-w-7xl px-4 py-20">
        <div class="bg-white rounded-lg shadow-lg p-8">
            <h1 class="text-4xl font-bold text-primary-blue mb-8">Administration du site</h1>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-8">
                <div class="bg-light-blue p-6 rounded-lg">
                    <h2 class="text-2xl font-bold text-primary-blue mb-4">Contenu textuel de la page d'accueil</h2>
                    <p class="text-gray-600 mb-4">Gérez les textes du site (titres, descriptions, etc.)</p>
                    <a href="{{ route('admin.content.index') }}" class="inline-block px-6 py-3 bg-primary-blue text-white font-semibold rounded-lg hover:bg-secondary-yellow hover:text-primary-blue transition duration-300">
                        Gérer le contenu
                    </a>
                </div>
                
                <div class="bg-light-blue p-6 rounded-lg">
                    <h2 class="text-2xl font-bold text-primary-blue mb-4">Menus</h2>
                    <p class="text-gray-600 mb-4">Gérez les menus et cartes du restaurant</p>
                    <a href="{{ route('admin.menu.index') }}" class="inline-block px-6 py-3 bg-primary-blue text-white font-semibold rounded-lg hover:bg-secondary-yellow hover:text-primary-blue transition duration-300">
                        Gérer les menus
                    </a>
                </div>
                
                <div class="bg-light-blue p-6 rounded-lg">
                    <h2 class="text-2xl font-bold text-primary-blue mb-4">Images</h2>
                    <p class="text-gray-600 mb-4">Gérez les images du site (carousel, galerie, etc.)</p>
                    <a href="{{ route('admin.image.index') }}" class="inline-block px-6 py-3 bg-primary-blue text-white font-semibold rounded-lg hover:bg-secondary-yellow hover:text-primary-blue transition duration-300">
                        Gérer les images
                    </a>
                </div>
                
                <div class="bg-light-blue p-6 rounded-lg">
                    <h2 class="text-2xl font-bold text-primary-blue mb-4">Événements</h2>
                    <p class="text-gray-600 mb-4">Gérez les événements et concerts</p>
                    <a href="{{ route('admin.event.index') }}" class="inline-block px-6 py-3 bg-primary-blue text-white font-semibold rounded-lg hover:bg-secondary-yellow hover:text-primary-blue transition duration-300">
                        Gérer les événements
                    </a>
                </div>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white border-2 border-primary-blue p-6 rounded-lg">
                    <h3 class="text-xl font-bold text-primary-blue mb-4">Statistiques</h3>
                    <div class="space-y-2">
                        <p><span class="font-semibold">Contenus :</span> {{ $contents->count() }}</p>
                        <p><span class="font-semibold">Menus :</span> {{ $menus->count() }}</p>
                        <p><span class="font-semibold">Images :</span> {{ $images->count() }}</p>
                        <p><span class="font-semibold">Événements :</span> {{ $events->count() }}</p>
                    </div>
                </div>
                
                <div class="bg-white border-2 border-secondary-yellow p-6 rounded-lg">
                    <h3 class="text-xl font-bold text-primary-blue mb-4">Actions rapides</h3>
                    <div class="space-y-2">
                        <a href="{{ route('admin.content.create') }}" class="block text-primary-blue hover:text-secondary-yellow">+ Ajouter du contenu</a>
                        <a href="{{ route('admin.menu.create') }}" class="block text-primary-blue hover:text-secondary-yellow">+ Ajouter un menu</a>
                        <a href="{{ route('admin.image.create') }}" class="block text-primary-blue hover:text-secondary-yellow">+ Ajouter une image</a>
                        <a href="{{ route('admin.event.create') }}" class="block text-primary-blue hover:text-secondary-yellow">+ Ajouter un événement</a>
                    </div>
                </div>
                
                <div class="bg-white border-2 border-gray-300 p-6 rounded-lg">
                    <h3 class="text-xl font-bold text-primary-blue mb-4">Site public</h3>
                    <div class="space-y-2">
                        <a href="{{ route('home') }}" class="block text-primary-blue hover:text-secondary-yellow" target="_blank">Voir le site</a>
                        <a href="{{ route('menu') }}" class="block text-primary-blue hover:text-secondary-yellow" target="_blank">Voir les menus</a>
                        <a href="{{ route('galerie') }}" class="block text-primary-blue hover:text-secondary-yellow" target="_blank">Voir la galerie</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
