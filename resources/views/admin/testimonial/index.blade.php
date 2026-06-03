@extends('layouts.admin')

@section('title', 'Gestion des avis clients - Administration')
@section('description', 'Gerez les avis clients affiches sur la page d\'accueil')

@section('content')
<div class="min-h-screen bg-gray-100 py-8">
    <div class="container mx-auto max-w-7xl px-4 py-10 md:py-20">
        <div class="bg-white rounded-lg shadow-lg p-4 sm:p-8">
            <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-4 mb-8">
                <div>
                    <h1 class="text-2xl sm:text-3xl md:text-4xl font-bold text-primary-blue">Gestion des avis clients</h1>
                    <p class="text-gray-600 mt-1 text-sm">Gérez les témoignages de vos clients affichés sur la page d'accueil.</p>
                </div>
                <a href="{{ route('admin.testimonial.create') }}" class="px-6 py-3 bg-primary-blue text-white font-semibold rounded-lg hover:bg-secondary-yellow hover:text-primary-blue transition duration-300 w-full sm:w-auto text-center shadow-sm">
                    + Ajouter un avis
                </a>
            </div>

            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-xl mb-6 shadow-sm">
                    {{ session('success') }}
                </div>
            @endif

            @if($testimonials->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($testimonials as $testimonial)
                    <div class="bg-gray-50 rounded-2xl p-6 border border-gray-100 flex flex-col justify-between hover:shadow-md transition">
                        <div>
                            <div class="flex items-center mb-4">
                                <div class="w-12 h-12 bg-primary-blue rounded-full flex items-center justify-center text-white font-bold text-lg">
                                    {{ $testimonial->avatar_letter ?: mb_strtoupper(mb_substr($testimonial->client_name, 0, 1)) }}
                                </div>
                                <div class="ml-4">
                                    <h3 class="font-bold text-primary-blue">{{ $testimonial->client_name }}</h3>
                                    <div class="flex text-secondary-yellow text-sm mt-0.5">
                                        @for($i = 1; $i <= 5; $i++)
                                            <span class="mr-0.5">{{ $i <= $testimonial->stars ? '⭐' : '☆' }}</span>
                                        @endfor
                                    </div>
                                </div>
                            </div>
                            <p class="italic text-gray-700 text-sm leading-relaxed mb-6">
                                "{{ $testimonial->comment }}"
                            </p>
                        </div>
                        
                        <div class="flex justify-between items-center pt-4 border-t border-gray-200 text-xs text-gray-500">
                            <div class="flex items-center gap-2">
                                <span class="px-2 py-1 rounded-full text-xs font-semibold {{ $testimonial->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                    {{ $testimonial->is_active ? 'Actif' : 'Inactif' }}
                                </span>
                                <span>Ordre: {{ $testimonial->sort_order }}</span>
                            </div>
                            <div class="flex items-center space-x-3">
                                <a href="{{ route('admin.testimonial.edit', $testimonial) }}" class="text-primary-blue hover:text-secondary-yellow font-semibold flex items-center gap-1">
                                    <i data-feather="edit" class="w-4 h-4"></i> Modifier
                                </a>
                                <form action="{{ route('admin.testimonial.destroy', $testimonial) }}" method="POST" class="inline" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet avis client ?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900 font-semibold flex items-center gap-1">
                                        <i data-feather="trash-2" class="w-4 h-4"></i> Supprimer
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-12 bg-gray-50 rounded-2xl border border-dashed border-gray-300">
                    <i data-feather="message-square" class="w-12 h-12 text-gray-400 mx-auto mb-4"></i>
                    <h3 class="text-lg font-medium text-gray-900 mb-2">Aucun avis enregistré</h3>
                    <p class="text-gray-500 mb-6">Commencez par ajouter votre premier avis client pour l'afficher sur le site.</p>
                    <a href="{{ route('admin.testimonial.create') }}" class="inline-block px-6 py-3 bg-primary-blue text-white font-semibold rounded-xl hover:bg-secondary-yellow hover:text-primary-blue transition duration-300 shadow-sm">
                        Créer un avis
                    </a>
                </div>
            @endif

            <div class="mt-8 pt-6 border-t border-gray-100">
                <a href="{{ route('admin.index') }}" class="text-primary-blue hover:text-secondary-yellow font-semibold text-sm">
                    ← Retour au tableau de bord
                </a>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        if (typeof feather !== 'undefined') {
            feather.replace();
        }
    });
</script>
@endsection
