@extends('layouts.admin')

@section('title', 'Gestion des menus du midi - Administration')
@section('description', 'Gérez les cartes de menus et les images du carousel')

@section('content')
<div class="min-h-screen bg-gray-100 pt-20">
    <div class="container mx-auto max-w-7xl px-4 py-20">
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                {{ session('success') }}
            </div>
        @endif

        <!-- Section 1: Gestion des cartes de menus -->
        <div class="bg-white rounded-lg shadow-lg p-8 mb-8">
            <div class="flex justify-between items-center mb-8">
                <h2 class="text-3xl font-bold text-primary-blue">📋 Cartes de Menus</h2>
                <a href="{{ route('admin.menu-midi-cards.create') }}" class="px-6 py-3 bg-secondary-yellow text-primary-blue font-semibold rounded-lg hover:bg-primary-blue hover:text-white transition duration-300">
                    + Ajouter une carte
                </a>
            </div>
            
            @if($middayMenuCards->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($middayMenuCards as $card)
                    <div class="border border-gray-200 rounded-lg p-6 hover:shadow-md transition-shadow">
                        <h3 class="text-xl font-bold text-primary-blue mb-2">{{ $card->title }}</h3>
                        @if($card->subtitle)
                        <p class="text-gray-600 mb-3">{{ $card->subtitle }}</p>
                        @endif
                        <div class="flex justify-between items-center">
                            <span class="text-sm text-gray-500">{{ count($card->items ?? []) }} item(s)</span>
                            <div class="flex space-x-2">
                                <a href="{{ route('admin.menu-midi-cards.edit', $card) }}" class="text-indigo-600 hover:text-indigo-900">
                                    <i data-feather="edit" class="w-4 h-4"></i>
                                </a>
                                <form action="{{ route('admin.menu-midi-cards.destroy', $card) }}" method="POST" class="inline" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette carte ?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900">
                                        <i data-feather="trash-2" class="w-4 h-4"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-8">
                    <i data-feather="file-text" class="w-12 h-12 text-gray-400 mx-auto mb-4"></i>
                    <p class="text-gray-500 mb-4">Aucune carte de menu</p>
                    <a href="{{ route('admin.menu-midi-cards.create') }}" class="inline-block px-4 py-2 bg-primary-blue text-white font-semibold rounded-lg hover:bg-secondary-yellow hover:text-primary-blue transition duration-300">
                        Créer la première carte
                    </a>
                </div>
            @endif
        </div>

        <!-- Section 2: Gestion des images du carousel -->
        <div class="bg-white rounded-lg shadow-lg p-8">
            <div class="flex justify-between items-center mb-8">
                <h2 class="text-3xl font-bold text-primary-blue">🖼️ Images du Carousel</h2>
                <a href="{{ route('admin.menu-midi.add-images') }}" class="px-6 py-3 bg-secondary-yellow text-primary-blue font-semibold rounded-lg hover:bg-primary-blue hover:text-white transition duration-300">
                    + Ajouter des images
                </a>
            </div>
            
            @if($middayMenus->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    @foreach($middayMenus as $menu)
                    <div class="border border-gray-200 rounded-lg overflow-hidden hover:shadow-md transition-shadow">
                        @if($menu->image)
                            <img src="{{ asset('storage/midday-menus/' . $menu->image) }}" alt="{{ $menu->name }}" class="w-full h-48 object-cover">
                        @else
                            <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
                                <i data-feather="image" class="w-12 h-12 text-gray-400"></i>
                            </div>
                        @endif
                        <div class="p-4">
                            <h3 class="font-semibold text-gray-900 mb-3">{{ $menu->name }}</h3>
                            <div class="flex justify-between items-center">
                                <span class="px-2 py-1 text-xs rounded-full {{ $menu->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                    {{ $menu->is_active ? 'Actif' : 'Inactif' }}
                                </span>
                                <div class="flex space-x-2">
                                    <a href="{{ route('admin.menu-midi.edit-image', $menu) }}" class="text-indigo-600 hover:text-indigo-900">
                                        <i data-feather="edit" class="w-4 h-4"></i>
                                    </a>
                                    <form action="{{ route('admin.menu-midi.destroy', $menu) }}" method="POST" class="inline" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette image ?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900">
                                            <i data-feather="trash-2" class="w-4 h-4"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-8">
                    <i data-feather="image" class="w-12 h-12 text-gray-400 mx-auto mb-4"></i>
                    <p class="text-gray-500 mb-4">Aucune image dans le carousel</p>
                    <a href="{{ route('admin.menu-midi.add-images') }}" class="inline-block px-4 py-2 bg-primary-blue text-white font-semibold rounded-lg hover:bg-secondary-yellow hover:text-primary-blue transition duration-300">
                        Ajouter des images
                    </a>
                </div>
            @endif
        </div>
        
        <div class="mt-8">
            <a href="{{ route('admin.menu.index') }}" class="text-primary-blue hover:text-secondary-yellow">← Retour à la gestion des menus</a>
        </div>
    </div>
</div>
@endsection
