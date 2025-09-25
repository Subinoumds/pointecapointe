@extends('layouts.admin')

@section('title', 'Gestion des boissons - Administration')
@section('description', 'Gérez les boissons du restaurant')

@section('content')
<div class="min-h-screen bg-gray-100 pt-20">
    <div class="container mx-auto max-w-7xl px-4 py-20">
        <div class="bg-white rounded-lg shadow-lg p-8">
            <div class="flex justify-between items-center mb-8">
                <h1 class="text-4xl font-bold text-primary-blue">Gestion des boissons</h1>
                <a href="{{ route('admin.drink.create') }}" class="px-6 py-3 bg-primary-blue text-white font-semibold rounded-lg hover:bg-secondary-yellow hover:text-primary-blue transition duration-300">
                    + Ajouter une boisson
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
                            <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Catégorie</th>
                            <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Ordre</th>
                            <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Statut</th>
                            <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @forelse($drinks as $drink)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                    {{ $drink->name }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    <span class="px-2 py-1 text-xs font-semibold rounded-full bg-blue-100 text-blue-800">
                                        {{ ucfirst(str_replace('_', ' ', $drink->category)) }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    {{ $drink->sort_order }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    <span class="px-2 py-1 text-xs font-semibold rounded-full {{ $drink->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                        {{ $drink->is_active ? 'Actif' : 'Inactif' }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <div class="flex space-x-2">
                                        <a href="{{ route('admin.drink.edit', $drink) }}" class="text-primary-blue hover:text-secondary-yellow">Modifier</a>
                                        <form action="{{ route('admin.drink.destroy', $drink) }}" method="POST" class="inline" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette boisson ?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-800">Supprimer</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-4 text-center text-gray-500">
                                    Aucune boisson trouvée.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            <div class="mt-8">
                <a href="{{ route('admin.index') }}" class="text-primary-blue hover:text-secondary-yellow">← Retour à l'administration</a>
            </div>
        </div>
    </div>
</div>
@endsection
