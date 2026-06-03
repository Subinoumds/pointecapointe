@extends('layouts.admin')

@section('title', 'Gestion des menus de groupe - Administration')
@section('description', 'Gérez les menus de groupe pour les repas d\'entreprise et événements')

@section('content')
<div class="min-h-screen bg-gray-100 py-8">
    <div class="container mx-auto max-w-7xl px-4 py-10 md:py-20">
        <div class="bg-white rounded-lg shadow-lg p-4 sm:p-8">
            <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-4 mb-8">
                <h1 class="text-2xl sm:text-3xl md:text-4xl font-bold text-primary-blue">Gestion des Menus de Groupe</h1>
                <a href="{{ route('admin.group-menu.create') }}" class="px-6 py-3 bg-secondary-yellow text-primary-blue font-semibold rounded-lg hover:bg-primary-blue hover:text-white transition duration-300 w-full sm:w-auto text-center">
                    + Ajouter un menu de groupe
                </a>
            </div>
            
            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                    {{ session('success') }}
                </div>
            @endif
            
            @if($groupMenus->count() > 0)
                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white border border-gray-200">
                        <thead class="bg-primary-blue text-white">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Nom</th>
                                <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Prix/personne</th>
                                <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Statut</th>
                                <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Ordre</th>
                                <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($groupMenus as $menu)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-900">{{ $menu->name }}</div>
                                    @if($menu->description)
                                        <div class="text-sm text-gray-500">{{ Str::limit($menu->description, 50) }}</div>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    {{ number_format($menu->price_per_person, 2) }} €
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $menu->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                        {{ $menu->is_active ? 'Actif' : 'Inactif' }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    {{ $menu->sort_order }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <div class="flex space-x-2">
                                        <a href="{{ route('admin.group-menu.edit', $menu) }}" class="text-indigo-600 hover:text-indigo-900">
                                            <i data-feather="edit" class="w-4 h-4"></i>
                                        </a>
                                        <form action="{{ route('admin.group-menu.destroy', $menu) }}" method="POST" class="inline" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce menu de groupe ?')">
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
                    <i data-feather="users" class="w-16 h-16 text-gray-400 mx-auto mb-4"></i>
                    <h3 class="text-lg font-medium text-gray-900 mb-2">Aucun menu de groupe</h3>
                    <p class="text-gray-500 mb-6">Commencez par créer votre premier menu de groupe.</p>
                    <a href="{{ route('admin.group-menu.create') }}" class="inline-block px-6 py-3 bg-primary-blue text-white font-semibold rounded-lg hover:bg-secondary-yellow hover:text-primary-blue transition duration-300">
                        Créer un menu de groupe
                    </a>
                </div>
            @endif
            
            <div class="mt-8">
                <a href="{{ route('admin.menu.index') }}" class="text-primary-blue hover:text-secondary-yellow">← Retour à la gestion des menus</a>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://unpkg.com/feather-icons"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        feather.replace();
    });
</script>
@endsection
