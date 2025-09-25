@extends('layouts.admin')

@section('title', 'Ajouter un vin - Administration')
@section('description', 'Ajouter un nouveau vin')

@section('content')
<div class="min-h-screen bg-gray-100 pt-20">
    <div class="container mx-auto max-w-7xl px-4 py-20">
        <div class="bg-white rounded-lg shadow-lg p-8">
            <div class="flex justify-between items-center mb-8">
                <h1 class="text-4xl font-bold text-primary-blue">Ajouter un vin</h1>
                <a href="{{ route('admin.wine.index') }}" class="px-6 py-3 bg-gray-500 text-white font-semibold rounded-lg hover:bg-gray-600 transition duration-300">
                    ← Retour
                </a>
            </div>
            
            <form action="{{ route('admin.wine.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Nom *</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}" required
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary-blue">
                    @error('name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                
                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                    <textarea id="description" name="description" rows="3"
                              class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary-blue">{{ old('description') }}</textarea>
                    @error('description')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                
                <div>
                    <label for="image" class="block text-sm font-medium text-gray-700 mb-2">Image</label>
                    <input type="file" id="image" name="image" accept="image/*"
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary-blue">
                    @error('image')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="glass_price" class="block text-sm font-medium text-gray-700 mb-2">Prix verre (€) *</label>
                        <input type="number" id="glass_price" name="glass_price" step="0.01" min="0" value="{{ old('glass_price') }}" required
                               class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary-blue">
                        @error('glass_price')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="bottle_price" class="block text-sm font-medium text-gray-700 mb-2">Prix bouteille (€) *</label>
                        <input type="number" id="bottle_price" name="bottle_price" step="0.01" min="0" value="{{ old('bottle_price') }}" required
                               class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary-blue">
                        @error('bottle_price')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                
                <div>
                    <label for="sort_order" class="block text-sm font-medium text-gray-700 mb-2">Ordre d'affichage</label>
                    <input type="number" id="sort_order" name="sort_order" min="0" value="{{ old('sort_order', 0) }}"
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary-blue">
                    @error('sort_order')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                
                <div class="flex items-center">
                    <input type="checkbox" id="is_active" name="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }}
                           class="h-4 w-4 text-primary-blue focus:ring-primary-blue border-gray-300 rounded">
                    <label for="is_active" class="ml-2 block text-sm text-gray-700">
                        Vin actif
                    </label>
                </div>
                
                <div class="flex justify-end space-x-4">
                    <a href="{{ route('admin.wine.index') }}" class="px-6 py-3 bg-gray-500 text-white font-semibold rounded-lg hover:bg-gray-600 transition duration-300">
                        Annuler
                    </a>
                    <button type="submit" class="px-6 py-3 bg-primary-blue text-white font-semibold rounded-lg hover:bg-secondary-yellow hover:text-primary-blue transition duration-300">
                        Créer le vin
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
