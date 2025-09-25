@extends('layouts.admin')

@section('title', 'Gestion des menus - Administration')
@section('description', 'Gérez tous les éléments des menus du restaurant')

@section('content')
<div class="min-h-screen bg-gray-100 pt-20">
    <div class="container mx-auto max-w-7xl px-4 py-20">
        <div class="bg-white rounded-lg shadow-lg p-8">
            <div class="flex justify-between items-center mb-8">
                <h1 class="text-4xl font-bold text-primary-blue">Gestion des menus</h1>
                <a href="{{ route('admin.index') }}" class="px-6 py-3 bg-gray-500 text-white font-semibold rounded-lg hover:bg-gray-600 transition duration-300">
                    ← Retour à l'administration
                </a>
            </div>
            
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-8">
                <!-- Éléments de menu -->
                <div class="bg-light-blue p-6 rounded-lg">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-primary-blue rounded-lg flex items-center justify-center mr-4">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                            </svg>
                        </div>
                        <h2 class="text-2xl font-bold text-primary-blue">Éléments de menu</h2>
                    </div>
                    <p class="text-gray-600 mb-4">Gérez les entrées, plats, burgers, desserts et menus enfant</p>
                    <div class="space-y-2">
                        <a href="{{ route('admin.menu-item.index') }}" class="block w-full px-4 py-2 bg-primary-blue text-white font-semibold rounded-lg hover:bg-secondary-yellow hover:text-primary-blue transition duration-300 text-center">
                            Gérer les éléments
                        </a>
                        <a href="{{ route('admin.menu-item.create') }}" class="block w-full px-4 py-2 bg-secondary-yellow text-primary-blue font-semibold rounded-lg hover:bg-primary-blue hover:text-white transition duration-300 text-center">
                            + Ajouter un élément
                        </a>
                    </div>
                </div>

                <!-- Boissons -->
                <div class="bg-light-blue p-6 rounded-lg">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-primary-blue rounded-lg flex items-center justify-center mr-4">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                            </svg>
                        </div>
                        <h2 class="text-2xl font-bold text-primary-blue">Boissons</h2>
                    </div>
                    <p class="text-gray-600 mb-4">Gérez les boissons fraîches, apéritifs et boissons chaudes</p>
                    <div class="space-y-2">
                        <a href="{{ route('admin.drink.index') }}" class="block w-full px-4 py-2 bg-primary-blue text-white font-semibold rounded-lg hover:bg-secondary-yellow hover:text-primary-blue transition duration-300 text-center">
                            Gérer les boissons
                        </a>
                        <a href="{{ route('admin.drink.create') }}" class="block w-full px-4 py-2 bg-secondary-yellow text-primary-blue font-semibold rounded-lg hover:bg-primary-blue hover:text-white transition duration-300 text-center">
                            + Ajouter une boisson
                        </a>
                    </div>
                </div>

                <!-- Vins -->
                <div class="bg-light-blue p-6 rounded-lg">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-primary-blue rounded-lg flex items-center justify-center mr-4">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                            </svg>
                        </div>
                        <h2 class="text-2xl font-bold text-primary-blue">Vins</h2>
                    </div>
                    <p class="text-gray-600 mb-4">Gérez la carte des vins avec photos et prix</p>
                    <div class="space-y-2">
                        <a href="{{ route('admin.wine.index') }}" class="block w-full px-4 py-2 bg-primary-blue text-white font-semibold rounded-lg hover:bg-secondary-yellow hover:text-primary-blue transition duration-300 text-center">
                            Gérer les vins
                        </a>
                        <a href="{{ route('admin.wine.create') }}" class="block w-full px-4 py-2 bg-secondary-yellow text-primary-blue font-semibold rounded-lg hover:bg-primary-blue hover:text-white transition duration-300 text-center">
                            + Ajouter un vin
                        </a>
                    </div>
                </div>

                <!-- Menus de groupe -->
                <div class="bg-light-blue p-6 rounded-lg">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-primary-blue rounded-lg flex items-center justify-center mr-4">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                        </div>
                        <h2 class="text-2xl font-bold text-primary-blue">Menus de groupe</h2>
                    </div>
                    <p class="text-gray-600 mb-4">Gérez les menus pour les repas de groupe et événements</p>
                    <div class="space-y-2">
                        <a href="{{ route('admin.group-menu.index') }}" class="block w-full px-4 py-2 bg-primary-blue text-white font-semibold rounded-lg hover:bg-secondary-yellow hover:text-primary-blue transition duration-300 text-center">
                            Gérer les menus de groupe
                        </a>
                        <a href="{{ route('admin.group-menu.create') }}" class="block w-full px-4 py-2 bg-secondary-yellow text-primary-blue font-semibold rounded-lg hover:bg-primary-blue hover:text-white transition duration-300 text-center">
                            + Ajouter un menu de groupe
                        </a>
                    </div>
                </div>

                <!-- Menus du midi -->
                <div class="bg-light-blue p-6 rounded-lg">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-primary-blue rounded-lg flex items-center justify-center mr-4">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <h2 class="text-2xl font-bold text-primary-blue">Menus du midi</h2>
                    </div>
                    <p class="text-gray-600 mb-4">Gérez les plats du jour avec images</p>
                    <div class="space-y-2">
                        <a href="{{ route('admin.menu-midi.index') }}" class="block w-full px-4 py-2 bg-primary-blue text-white font-semibold rounded-lg hover:bg-secondary-yellow hover:text-primary-blue transition duration-300 text-center">
                            Gérer les menus du midi
                        </a>
                        <a href="{{ route('admin.menu-midi.create') }}" class="block w-full px-4 py-2 bg-secondary-yellow text-primary-blue font-semibold rounded-lg hover:bg-primary-blue hover:text-white transition duration-300 text-center">
                            + Ajouter un menu du midi
                        </a>
                    </div>
                </div>
            </div>

            <!-- Statistiques rapides -->
            <div class="mt-12 bg-gray-50 p-6 rounded-lg">
                <h3 class="text-2xl font-bold text-primary-blue mb-6">Statistiques rapides</h3>
                <div class="grid grid-cols-1 md:grid-cols-5 gap-6">
                    <div class="text-center">
                        <div class="text-3xl font-bold text-primary-blue">{{ \App\Models\MenuItem::count() }}</div>
                        <div class="text-gray-600">Éléments de menu</div>
                    </div>
                    <div class="text-center">
                        <div class="text-3xl font-bold text-primary-blue">{{ \App\Models\Drink::count() }}</div>
                        <div class="text-gray-600">Boissons</div>
                    </div>
                    <div class="text-center">
                        <div class="text-3xl font-bold text-primary-blue">{{ \App\Models\Wine::count() }}</div>
                        <div class="text-gray-600">Vins</div>
                    </div>
                    <div class="text-center">
                        <div class="text-3xl font-bold text-primary-blue">{{ \App\Models\GroupMenu::count() }}</div>
                        <div class="text-gray-600">Menus de groupe</div>
                    </div>
                    <div class="text-center">
                        <div class="text-3xl font-bold text-primary-blue">{{ \App\Models\MiddayMenu::count() }}</div>
                        <div class="text-gray-600">Menus du midi</div>
                    </div>
                </div>
            </div>

            <!-- Lien vers la page publique -->
            <div class="mt-8 text-center">
                <a href="{{ route('menu') }}" target="_blank" class="inline-block px-6 py-3 bg-secondary-yellow text-primary-blue font-semibold rounded-lg hover:bg-primary-blue hover:text-white transition duration-300">
                    👁️ Voir la page menu publique
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
