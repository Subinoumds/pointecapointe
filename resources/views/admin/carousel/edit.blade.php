@extends('layouts.admin')

@section('content')
<div class="container mx-auto max-w-3xl px-4 py-8">
    <div class="mb-8">
        <a href="{{ route('admin.carousel.index') }}" class="text-primary-blue hover:text-secondary-yellow transition duration-300 flex items-center font-medium">
            <i data-feather="arrow-left" class="w-4 h-4 mr-2"></i>
            Retour au carousel
        </a>
        <h1 class="text-3xl font-bold text-primary-blue mt-4">✏️ Modifier l'image du carousel</h1>
    </div>

    @if($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
            <ul class="list-disc list-inside">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="bg-white rounded-lg shadow-lg p-6">
        <form action="{{ route('admin.carousel.update', $image) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <div class="mb-6">
                <p class="block text-sm font-semibold text-gray-700 mb-2">Image actuelle</p>
                <div class="aspect-video w-full max-w-md overflow-hidden rounded-lg bg-gray-100 border border-gray-200">
                    <img src="{{ asset('storage/' . $image->path) }}" alt="{{ $image->alt_text }}" class="w-full h-full object-cover">
                </div>
            </div>

            <div>
                <label for="image" class="block text-sm font-semibold text-gray-700 mb-2">Remplacer l'image (Optionnel - Max 10Mo)</label>
                <input type="file" 
                       id="image" 
                       name="image" 
                       accept="image/*" 
                       class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-light-blue file:text-primary-blue hover:file:bg-blue-100 transition">
                <p class="mt-1 text-xs text-gray-500">Formats acceptés : JPG, JPEG, PNG, GIF. L'image sera automatiquement optimisée.</p>
            </div>

            <div>
                <label for="alt_text" class="block text-sm font-semibold text-gray-700 mb-2">Texte alternatif (SEO)</label>
                <input type="text" 
                       id="alt_text" 
                       name="alt_text" 
                       value="{{ old('alt_text', $image->alt_text) }}"
                       placeholder="Ex: Belle vue sur la Loire depuis notre terrasse"
                       class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-primary-blue focus:border-primary-blue">
                <p class="mt-1 text-xs text-gray-500">Décrivez le contenu de l'image pour les moteurs de recherche et l'accessibilité.</p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div>
                    <label for="sort_order" class="block text-sm font-semibold text-gray-700 mb-2">Ordre d'affichage</label>
                    <input type="number" 
                           id="sort_order" 
                           name="sort_order" 
                           value="{{ old('sort_order', $image->sort_order) }}"
                           min="0"
                           class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-primary-blue focus:border-primary-blue">
                </div>

                <div class="flex items-center pt-8">
                    <input type="checkbox" 
                           id="is_active" 
                           name="is_active" 
                           value="1" 
                           {{ old('is_active', $image->is_active) ? 'checked' : '' }}
                           class="h-4 w-4 text-primary-blue focus:ring-primary-blue border-gray-300 rounded">
                    <label for="is_active" class="ml-2 block text-sm text-gray-900 font-semibold">
                        Activer l'image (visible sur le site)
                    </label>
                </div>
            </div>

            <div class="pt-4 border-t border-gray-200">
                <button type="submit" 
                        class="w-full py-3 bg-secondary-yellow text-primary-blue font-bold rounded-md hover:bg-primary-blue hover:text-white transition duration-300 shadow-md">
                    Enregistrer les modifications
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    feather.replace();
</script>
@endsection
