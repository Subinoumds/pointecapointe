@extends('layouts.admin')

@section('title', 'Créer un menu du midi - Administration')
@section('description', 'Ajoutez un nouveau plat du jour avec son image')

@section('content')
<div class="min-h-screen bg-gray-100 pt-20">
    <div class="container mx-auto max-w-4xl px-4 py-20">
        <div class="bg-white rounded-lg shadow-lg p-8">
            <div class="mb-8">
                <h1 class="text-4xl font-bold text-primary-blue mb-4">Créer un menu du midi</h1>
                <p class="text-gray-600">Ajoutez un nouveau plat du jour qui apparaîtra dans le carousel de la page menus du midi.</p>
            </div>
            
            <form action="{{ route('admin.menu-midi.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Nom du menu *</label>
                        <input type="text" id="name" name="name" value="{{ old('name') }}" required 
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-blue focus:border-transparent @error('name') border-red-500 @enderror"
                               placeholder="Ex: Plat du jour 1">
                        @error('name')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="price" class="block text-sm font-medium text-gray-700 mb-2">Prix (€) *</label>
                        <input type="number" id="price" name="price" value="{{ old('price') }}" step="0.01" min="0" required 
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-blue focus:border-transparent @error('price') border-red-500 @enderror"
                               placeholder="Ex: 15.50">
                        @error('price')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                
                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                    <textarea id="description" name="description" rows="3" 
                              class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-blue focus:border-transparent @error('description') border-red-500 @enderror"
                              placeholder="Description du plat...">{{ old('description') }}</textarea>
                    @error('description')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <div>
                    <label for="image" class="block text-sm font-medium text-gray-700 mb-2">Image du plat *</label>
                    <input type="file" id="image" name="image" accept="image/*" required 
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-blue focus:border-transparent @error('image') border-red-500 @enderror">
                    <p class="mt-1 text-sm text-gray-500">Formats acceptés: JPG, PNG, GIF. Taille max: 2MB</p>
                    @error('image')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="sort_order" class="block text-sm font-medium text-gray-700 mb-2">Ordre d'affichage</label>
                        <input type="number" id="sort_order" name="sort_order" value="{{ old('sort_order', 0) }}" min="0" 
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-blue focus:border-transparent @error('sort_order') border-red-500 @enderror"
                               placeholder="0">
                        <p class="mt-1 text-sm text-gray-500">Plus le nombre est petit, plus le menu apparaîtra en premier</p>
                        @error('sort_order')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div class="flex items-center">
                        <input type="checkbox" id="is_active" name="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }}
                               class="h-4 w-4 text-primary-blue focus:ring-primary-blue border-gray-300 rounded">
                        <label for="is_active" class="ml-2 block text-sm text-gray-700">
                            Menu actif (visible sur le site)
                        </label>
                    </div>
                </div>
                
                <div class="flex justify-end space-x-4 pt-6">
                    <a href="{{ route('admin.menu-midi.index') }}" 
                       class="px-6 py-3 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition duration-300">
                        Annuler
                    </a>
                    <button type="submit" 
                            class="px-6 py-3 bg-primary-blue text-white font-semibold rounded-lg hover:bg-secondary-yellow hover:text-primary-blue transition duration-300">
                        Créer le menu du midi
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
