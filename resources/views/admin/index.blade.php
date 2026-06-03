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

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mt-8 border-t pt-8">
                <!-- Card Carousel -->
                <div class="bg-light-blue p-6 rounded-lg">
                    <h2 class="text-2xl font-bold text-primary-blue mb-4">🎠 Carousel Accueil</h2>
                    <p class="text-gray-600 mb-4">Gérez les images du slider de la page d'accueil (ajouter, modifier, supprimer ou trier)</p>
                    <a href="{{ route('admin.carousel.index') }}" class="inline-block px-4 py-2 bg-primary-blue text-white font-medium rounded-md hover:bg-secondary-yellow hover:text-primary-blue transition duration-300 text-sm">
                        Gérer le carousel
                    </a>
                </div>

                <!-- Formulaire de changement de mot de passe -->
                <div class="bg-white p-6 rounded-lg border border-gray-200 shadow-sm">
                    <h2 class="text-2xl font-bold text-primary-blue mb-4">🔑 Modifier le mot de passe admin</h2>
                    
                    @if($errors->has('current_password') || $errors->has('new_password'))
                        <div class="bg-red-50 text-red-700 p-3 rounded mb-4 text-sm">
                            {{ $errors->first('current_password') ?: $errors->first('new_password') }}
                        </div>
                    @endif

                    <form action="{{ route('admin.change-password') }}" method="POST" class="space-y-4">
                        @csrf
                        <div>
                            <label for="current_password" class="block text-sm font-semibold text-gray-700">Mot de passe actuel</label>
                            <input type="password" id="current_password" name="current_password" required class="w-full mt-1 px-3 py-2 border rounded-md text-sm">
                        </div>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label for="new_password" class="block text-sm font-semibold text-gray-700">Nouveau mot de passe</label>
                                <input type="password" id="new_password" name="new_password" required class="w-full mt-1 px-3 py-2 border rounded-md text-sm" placeholder="Min. 12 caractères">
                            </div>
                            <div>
                                <label for="new_password_confirmation" class="block text-sm font-semibold text-gray-700">Confirmer le mot de passe</label>
                                <input type="password" id="new_password_confirmation" name="new_password_confirmation" required class="w-full mt-1 px-3 py-2 border rounded-md text-sm">
                            </div>
                        </div>
                        <button type="submit" class="w-full py-2 bg-primary-blue text-white font-semibold rounded-md hover:bg-secondary-yellow hover:text-primary-blue transition duration-300 text-sm shadow">
                            Modifier le mot de passe
                        </button>
                    </form>
                </div>
            </div>
        
        </div>
    </div>
</div>
@endsection
