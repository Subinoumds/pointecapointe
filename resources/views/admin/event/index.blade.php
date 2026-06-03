@extends('layouts.admin')

@section('title', 'Gestion des événements - Administration')
@section('description', 'Gérez les événements du site Pointe ça Pointe')

@section('content')
<div class="min-h-screen bg-gray-100 py-8">
    <div class="container mx-auto max-w-7xl px-4 py-10 md:py-20">
        <div class="bg-white rounded-lg shadow-lg p-4 sm:p-8">
            <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-4 mb-8">
                <h1 class="text-2xl sm:text-3xl md:text-4xl font-bold text-primary-blue">Gestion des événements</h1>
                <a href="{{ route('admin.event.create') }}" class="px-6 py-3 bg-primary-blue text-white font-semibold rounded-lg hover:bg-secondary-yellow hover:text-primary-blue transition duration-300 w-full sm:w-auto text-center">
                    + Ajouter un événement
                </a>
            </div>

            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                    {{ session('success') }}
                </div>
            @endif

            <div class="overflow-x-auto">
                <table class="min-w-full bg-white border border-gray-200">
                    <thead class="bg-primary-blue text-white">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Titre</th>
                            <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Date</th>
                            <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Type</th>
                            <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Statut</th>
                            <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @forelse($events as $event)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-gray-900">{{ $event->title }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{ $event->formatted_date }}</div>
                                @if($event->event_time)
                                    <div class="text-sm text-gray-500">{{ $event->formatted_time }}</div>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                    {{ $event->type === 'upcoming' ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                                    {{ $event->type === 'upcoming' ? 'À venir' : 'Passé' }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                    {{ $event->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                    {{ $event->is_active ? 'Actif' : 'Inactif' }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <div class="flex space-x-2">
                                    <a href="{{ route('admin.event.edit', $event) }}" class="text-primary-blue hover:text-secondary-yellow">
                                        Modifier
                                    </a>
                                    <form action="{{ route('admin.event.destroy', $event) }}" method="POST" class="inline" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet événement ?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900">
                                            Supprimer
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="px-6 py-4 text-center text-gray-500">
                                Aucun événement trouvé.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-8">
                <a href="{{ route('admin.index') }}" class="text-primary-blue hover:text-secondary-yellow">
                    ← Retour au tableau de bord
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
