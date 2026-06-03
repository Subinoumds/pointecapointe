@extends('layouts.admin')

@section('title', 'Gestion des vins - Administration')
@section('description', 'Gérez les vins du restaurant')

@section('content')
<div class="min-h-screen bg-gray-100 py-8">
    <div class="container mx-auto max-w-7xl px-4 py-10 md:py-20">
        <div class="bg-white rounded-lg shadow-lg p-4 sm:p-8">
            <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-4 mb-8">
                <h1 class="text-2xl sm:text-3xl md:text-4xl font-bold text-primary-blue">Gestion des vins</h1>
                <a href="{{ route('admin.wine.create') }}" class="px-6 py-3 bg-primary-blue text-white font-semibold rounded-lg hover:bg-secondary-yellow hover:text-primary-blue transition duration-300 w-full sm:w-auto text-center">
                    + Ajouter un vin
                </a>
            </div>
            
            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                    {{ session('success') }}
                </div>
            @endif
            
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white border border-gray-300">
                    <thead class="bg-primary-blue text-white">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Nom</th>
                            <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Image</th>
                            <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Prix verre</th>
                            <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Prix bouteille</th>
                            <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Ordre</th>
                            <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Statut</th>
                            <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @forelse($wines as $wine)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                    {{ $wine->name }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    @if($wine->image)
                                        <img src="{{ asset('storage/vins/' . $wine->image) }}" alt="{{ $wine->name }}" class="w-16 h-16 object-cover rounded">
                                    @else
                                        <span class="text-gray-400">Aucune image</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    {{ number_format($wine->glass_price, 2) }} €
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    {{ number_format($wine->bottle_price, 2) }} €
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    {{ $wine->sort_order }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    <span class="px-2 py-1 text-xs font-semibold rounded-full {{ $wine->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                        {{ $wine->is_active ? 'Actif' : 'Inactif' }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <div class="flex space-x-2">
                                        <a href="{{ route('admin.wine.edit', $wine) }}" class="text-primary-blue hover:text-secondary-yellow">Modifier</a>
                                        <form action="{{ route('admin.wine.destroy', $wine) }}" method="POST" class="inline" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce vin ?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-800">Supprimer</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="px-6 py-4 text-center text-gray-500">
                                    Aucun vin trouvé.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            <div class="mt-8">
                <a href="{{ route('admin.menu.index') }}" class="text-primary-blue hover:text-secondary-yellow">← Retour au menu</a>
            </div>
        </div>
    </div>
</div>
@endsection
