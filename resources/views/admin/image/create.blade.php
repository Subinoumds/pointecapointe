@extends('layouts.admin')

@section('content')
<div class="container mx-auto max-w-4xl px-4 py-8">
    <div class="flex items-center justify-between mb-8">
        <h1 class="text-3xl font-bold text-primary-blue">🖼️ Ajouter des images à la galerie</h1>
        <a href="{{ route('admin.image.index') }}" class="text-primary-blue hover:text-secondary-yellow transition-colors duration-300">
            <i data-feather="arrow-left" class="w-5 h-5"></i>
        </a>
    </div>

    <div class="bg-white rounded-lg shadow-lg p-8">
        <form action="{{ route('admin.image.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            
            <div>
                <label for="images" class="block text-sm font-medium text-gray-700 mb-2">Images de la galerie *</label>
                <input type="file" id="images" name="images[]" accept="image/*" multiple required 
                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-blue focus:border-transparent @error('images') border-red-500 @enderror">
                <p class="mt-1 text-sm text-gray-500">Sélectionnez une ou plusieurs images. Formats acceptés: JPG, PNG, GIF. Taille max: 2MB par image</p>
                @error('images')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="category" class="block text-sm font-medium text-gray-700 mb-2">Catégorie</label>
                <select id="category" name="category" 
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-blue focus:border-transparent @error('category') border-red-500 @enderror">
                    <option value="galerie">Galerie</option>
                    <option value="restaurant">Restaurant</option>
                    <option value="terrasse">Terrasse</option>
                    <option value="interieur">Intérieur</option>
                </select>
                @error('category')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="alt_text" class="block text-sm font-medium text-gray-700 mb-2">Texte alternatif</label>
                <input type="text" id="alt_text" name="alt_text" 
                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-blue focus:border-transparent @error('alt_text') border-red-500 @enderror"
                       placeholder="Description de l'image pour l'accessibilité">
                @error('alt_text')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="sort_order" class="block text-sm font-medium text-gray-700 mb-2">Ordre d'affichage</label>
                <input type="number" id="sort_order" name="sort_order" value="0" min="0"
                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-blue focus:border-transparent @error('sort_order') border-red-500 @enderror">
                <p class="mt-1 text-sm text-gray-500">Plus le nombre est petit, plus l'image apparaîtra en premier</p>
                @error('sort_order')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center">
                <input type="checkbox" id="is_active" name="is_active" value="1" checked
                       class="h-4 w-4 text-primary-blue focus:ring-primary-blue border-gray-300 rounded">
                <label for="is_active" class="ml-2 block text-sm text-gray-700">
                    Image active (visible sur le site)
                </label>
            </div>
            
            <div class="flex justify-end space-x-4 pt-6">
                <a href="{{ route('admin.image.index') }}" 
                   class="px-6 py-3 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition duration-300">
                    Annuler
                </a>
                <button type="submit" 
                        class="px-6 py-3 bg-primary-blue text-white font-semibold rounded-lg hover:bg-secondary-yellow hover:text-primary-blue transition duration-300">
                    Ajouter les images
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    feather.replace();
</script>
@endsection
