@extends('layouts.admin')

@section('title', 'Modifier une boisson - Administration')
@section('description', 'Modifier une boisson existante')

@section('content')
<div class="min-h-screen bg-gray-100 pt-20">
    <div class="container mx-auto max-w-7xl px-4 py-20">
        <div class="bg-white rounded-lg shadow-lg p-8">
            <div class="flex justify-between items-center mb-8">
                <h1 class="text-4xl font-bold text-primary-blue">Modifier la boisson</h1>
                <a href="{{ route('admin.drink.index') }}" class="px-6 py-3 bg-gray-500 text-white font-semibold rounded-lg hover:bg-gray-600 transition duration-300">
                    ← Retour
                </a>
            </div>
            
            <form action="{{ route('admin.drink.update', $drink) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Nom *</label>
                        <input type="text" id="name" name="name" value="{{ old('name', $drink->name) }}" required
                               class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary-blue">
                        @error('name')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="category" class="block text-sm font-medium text-gray-700 mb-2">Catégorie *</label>
                        <select id="category" name="category" required
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary-blue">
                            <option value="">Sélectionner une catégorie</option>
                            <option value="boissons_fraiches" {{ old('category', $drink->category) == 'boissons_fraiches' ? 'selected' : '' }}>Boissons fraîches</option>
                            <option value="aperitifs_digestifs" {{ old('category', $drink->category) == 'aperitifs_digestifs' ? 'selected' : '' }}>Apéritifs et digestifs</option>
                            <option value="boissons_chaudes" {{ old('category', $drink->category) == 'boissons_chaudes' ? 'selected' : '' }}>Boissons chaudes & Eaux</option>
                        </select>
                        @error('category')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                
                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                    <textarea id="description" name="description" rows="3"
                              class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary-blue">{{ old('description', $drink->description) }}</textarea>
                    @error('description')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                
                <div>
                    <label for="sort_order" class="block text-sm font-medium text-gray-700 mb-2">Ordre d'affichage</label>
                    <input type="number" id="sort_order" name="sort_order" min="0" value="{{ old('sort_order', $drink->sort_order) }}"
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary-blue">
                    @error('sort_order')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                
                <div class="flex items-center">
                    <input type="checkbox" id="is_active" name="is_active" value="1" {{ old('is_active', $drink->is_active) ? 'checked' : '' }}
                           class="h-4 w-4 text-primary-blue focus:ring-primary-blue border-gray-300 rounded">
                    <label for="is_active" class="ml-2 block text-sm text-gray-700">
                        Boisson active
                    </label>
                </div>
                
                <div class="flex justify-end space-x-4">
                    <a href="{{ route('admin.drink.index') }}" class="px-6 py-3 bg-gray-500 text-white font-semibold rounded-lg hover:bg-gray-600 transition duration-300">
                        Annuler
                    </a>
                    <button type="submit" class="px-6 py-3 bg-primary-blue text-white font-semibold rounded-lg hover:bg-secondary-yellow hover:text-primary-blue transition duration-300">
                        Mettre à jour
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
