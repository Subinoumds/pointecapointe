@extends('layouts.admin')

@section('content')
<div class="container mx-auto max-w-4xl px-4 py-8">
    <div class="flex items-center justify-between mb-8">
        <h1 class="text-3xl font-bold text-primary-blue">✏️ Modifier l'image</h1>
        <a href="{{ route('admin.image.index') }}" class="text-primary-blue hover:text-secondary-yellow transition-colors duration-300">
            <i data-feather="arrow-left" class="w-5 h-5"></i>
        </a>
    </div>

    <div class="bg-white rounded-lg shadow-lg p-8">
        <form action="{{ route('admin.image.update', $image) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div>
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">Image actuelle</h3>
                    <div class="aspect-square overflow-hidden rounded-lg border border-gray-200">
                        <img src="{{ asset('storage/gallery/' . $image->filename) }}" 
                             alt="{{ $image->alt_text }}" 
                             class="w-full h-full object-cover">
                    </div>
                </div>
                
                <div class="space-y-6">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Nom de l'image *</label>
                        <input type="text" id="name" name="name" value="{{ old('name', $image->name) }}" required
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-blue focus:border-transparent @error('name') border-red-500 @enderror">
                        @error('name')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="category" class="block text-sm font-medium text-gray-700 mb-2">Catégorie</label>
                        <select id="category" name="category" 
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-blue focus:border-transparent @error('category') border-red-500 @enderror">
                            <option value="galerie" {{ old('category', $image->category) == 'galerie' ? 'selected' : '' }}>Galerie</option>
                            <option value="restaurant" {{ old('category', $image->category) == 'restaurant' ? 'selected' : '' }}>Restaurant</option>
                            <option value="terrasse" {{ old('category', $image->category) == 'terrasse' ? 'selected' : '' }}>Terrasse</option>
                            <option value="interieur" {{ old('category', $image->category) == 'interieur' ? 'selected' : '' }}>Intérieur</option>
                        </select>
                        @error('category')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="alt_text" class="block text-sm font-medium text-gray-700 mb-2">Texte alternatif</label>
                        <input type="text" id="alt_text" name="alt_text" value="{{ old('alt_text', $image->alt_text) }}"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-blue focus:border-transparent @error('alt_text') border-red-500 @enderror"
                               placeholder="Description de l'image pour l'accessibilité">
                        @error('alt_text')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="sort_order" class="block text-sm font-medium text-gray-700 mb-2">Ordre d'affichage</label>
                        <input type="number" id="sort_order" name="sort_order" value="{{ old('sort_order', $image->sort_order) }}" min="0"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-blue focus:border-transparent @error('sort_order') border-red-500 @enderror">
                        <p class="mt-1 text-sm text-gray-500">Plus le nombre est petit, plus l'image apparaîtra en premier</p>
                        @error('sort_order')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex items-center">
                        <input type="checkbox" id="is_active" name="is_active" value="1" {{ old('is_active', $image->is_active) ? 'checked' : '' }}
                               class="h-4 w-4 text-primary-blue focus:ring-primary-blue border-gray-300 rounded">
                        <label for="is_active" class="ml-2 block text-sm text-gray-700">
                            Image active (visible sur le site)
                        </label>
                    </div>
                </div>
            </div>

            <div class="border-t pt-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Changer l'image</h3>
                <div>
                    <label for="image" class="block text-sm font-medium text-gray-700 mb-2">Nouvelle image</label>
                    <input type="file" id="image" name="image" accept="image/*"
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-blue focus:border-transparent @error('image') border-red-500 @enderror">
                    <p class="mt-1 text-sm text-gray-500">Formats acceptés: JPG, PNG, GIF. Taille max: 2MB. Laisser vide pour garder l'image actuelle.</p>
                    @error('image')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            
            <div class="flex justify-end space-x-4 pt-6">
                <a href="{{ route('admin.image.index') }}" 
                   class="px-6 py-3 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition duration-300">
                    Annuler
                </a>
                <button type="submit" 
                        class="px-6 py-3 bg-primary-blue text-white font-semibold rounded-lg hover:bg-secondary-yellow hover:text-primary-blue transition duration-300">
                    Mettre à jour l'image
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    feather.replace();
</script>
@endsection
