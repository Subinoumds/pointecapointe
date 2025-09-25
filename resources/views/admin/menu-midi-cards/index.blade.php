@extends('layouts.admin')

@section('title', 'Gestion des cartes de menus du midi - Administration')
@section('description', 'Gérez les cartes de menus statiques (Menu du marché, Formule express)')

@section('content')
<div class="min-h-screen bg-gray-100 pt-20">
    <div class="container mx-auto max-w-7xl px-4 py-20">
        <div class="bg-white rounded-lg shadow-lg p-8">
            <div class="flex justify-between items-center mb-8">
                <h1 class="text-4xl font-bold text-primary-blue">Gestion des Cartes de Menus du Midi</h1>
                <a href="{{ route('admin.menu-midi-cards.create') }}" class="px-6 py-3 bg-secondary-yellow text-primary-blue font-semibold rounded-lg hover:bg-primary-blue hover:text-white transition duration-300">
                    + Ajouter une carte de menu
                </a>
            </div>
            
            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                    {{ session('success') }}
                </div>
            @endif
            
            @if($middayMenuCards->count() > 0)
                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white border border-gray-200">
                        <thead class="bg-primary-blue text-white">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Titre</th>
                                <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Sous-titre</th>
                                <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Prix</th>
                                <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Items</th>
                                <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Statut</th>
                                <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Ordre</th>
                                <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($middayMenuCards as $card)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-900">{{ $card->title }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{ $card->subtitle ?? '-' }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    @if($card->price)
                                        {{ number_format($card->price, 2) }} €
                                    @else
                                        -
                                    @endif
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-gray-900">
                                        @if($card->items && count($card->items) > 0)
                                            {{ count($card->items) }} item(s)
                                            <div class="text-xs text-gray-500 mt-1">
                                                @foreach($card->items as $item)
                                                    <div>{{ $item['type'] }}: {{ $item['name'] }}</div>
                                                @endforeach
                                            </div>
                                        @else
                                            Aucun item
                                        @endif
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $card->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                        {{ $card->is_active ? 'Actif' : 'Inactif' }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    {{ $card->sort_order }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <div class="flex space-x-2">
                                        <a href="{{ route('admin.menu-midi-cards.edit', $card) }}" class="text-indigo-600 hover:text-indigo-900">
                                            <i data-feather="edit" class="w-4 h-4"></i>
                                        </a>
                                        <form action="{{ route('admin.menu-midi-cards.destroy', $card) }}" method="POST" class="inline" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette carte de menu ?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900">
                                                <i data-feather="trash-2" class="w-4 h-4"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="text-center py-12">
                    <i data-feather="file-text" class="w-16 h-16 text-gray-400 mx-auto mb-4"></i>
                    <h3 class="text-lg font-medium text-gray-900 mb-2">Aucune carte de menu</h3>
                    <p class="text-gray-500 mb-6">Commencez par créer votre première carte de menu.</p>
                    <a href="{{ route('admin.menu-midi-cards.create') }}" class="inline-block px-6 py-3 bg-primary-blue text-white font-semibold rounded-lg hover:bg-secondary-yellow hover:text-primary-blue transition duration-300">
                        Créer une carte de menu
                    </a>
                </div>
            @endif
            
            <div class="mt-8 flex justify-between">
                <a href="{{ route('admin.menu-midi.index') }}" class="text-primary-blue hover:text-secondary-yellow">← Retour aux images du carousel</a>
                <a href="{{ route('admin.menu.index') }}" class="text-primary-blue hover:text-secondary-yellow">← Retour à la gestion des menus</a>
            </div>
        </div>
    </div>
</div>
@endsection
