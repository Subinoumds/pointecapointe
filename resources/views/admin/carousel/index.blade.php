@extends('layouts.admin')

@section('content')
<div class="container mx-auto max-w-7xl px-4 py-8">
    <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center mb-8 space-y-4 sm:space-y-0">
        <h1 class="text-3xl font-bold text-primary-blue">🎠 Carousel de la Page d'Accueil</h1>
        <a href="{{ route('admin.carousel.create') }}" class="px-4 py-2 bg-secondary-yellow text-primary-blue font-medium rounded-md hover:bg-primary-blue hover:text-white transition duration-300 text-center">
            + Ajouter une image au carousel
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white rounded-lg shadow-lg p-6">
        @if($images->count() > 0)
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach($images as $image)
                <div class="bg-gray-50 rounded-lg p-4 border border-gray-200 flex flex-col justify-between">
                    <div>
                        <div class="aspect-video mb-4 overflow-hidden rounded-lg bg-gray-100 flex items-center justify-center">
                            <img src="{{ asset('storage/' . $image->path) }}" 
                                 alt="{{ $image->alt_text }}" 
                                 class="w-full h-full object-cover">
                        </div>
                        
                        <div class="space-y-2">
                            <h3 class="font-semibold text-gray-800 truncate" title="{{ $image->name }}">{{ $image->name }}</h3>
                            <p class="text-sm text-gray-600 truncate" title="{{ $image->alt_text }}">Alt: {{ $image->alt_text ?: 'Non défini' }}</p>
                            <p class="text-xs text-gray-500">Ordre: {{ $image->sort_order }}</p>
                            
                            <div class="flex items-center space-x-2">
                                <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium {{ $image->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                    {{ $image->is_active ? 'Actif' : 'Inactif' }}
                                </span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="flex justify-between items-center mt-6 pt-4 border-t border-gray-200">
                        <a href="{{ route('admin.carousel.edit', $image) }}" 
                           class="text-primary-blue hover:text-secondary-yellow transition-colors duration-300">
                            <i data-feather="edit" class="w-4 h-4"></i>
                        </a>
                        <form action="{{ route('admin.carousel.destroy', $image) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    class="text-red-600 hover:text-red-800 transition-colors duration-300"
                                    onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette image du carousel ?')">
                                <i data-feather="trash-2" class="w-4 h-4"></i>
                            </button>
                        </form>
                    </div>
                </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-12">
                <div class="text-gray-400 mb-4">
                    <i data-feather="image" class="w-16 h-16 mx-auto"></i>
                </div>
                <h3 class="text-lg font-medium text-gray-900 mb-2">Aucune image dans le carousel</h3>
                <p class="text-gray-500 mb-6">Commencez par ajouter des images à votre carousel d'accueil.</p>
                <a href="{{ route('admin.carousel.create') }}" 
                   class="inline-flex items-center px-4 py-2 bg-primary-blue text-white font-medium rounded-md hover:bg-secondary-yellow hover:text-primary-blue transition duration-300">
                    <i data-feather="plus" class="w-4 h-4 mr-2"></i>
                    Ajouter une image
                </a>
            </div>
        @endif
    </div>
</div>

<script>
    feather.replace();
</script>
@endsection
