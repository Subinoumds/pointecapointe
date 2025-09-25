@extends('layouts.admin')

@section('title', 'Modifier un élément de menu - Administration')
@section('description', 'Modifier un élément de menu existant')

@section('content')
<div class="min-h-screen bg-gray-100 pt-20">
    <div class="container mx-auto max-w-7xl px-4 py-20">
        <div class="bg-white rounded-lg shadow-lg p-8">
            <div class="flex justify-between items-center mb-8">
                <h1 class="text-4xl font-bold text-primary-blue">Modifier l'élément de menu</h1>
                <a href="{{ route('admin.menu-item.index') }}" class="px-6 py-3 bg-gray-500 text-white font-semibold rounded-lg hover:bg-gray-600 transition duration-300">
                    ← Retour
                </a>
            </div>
            
            <form action="{{ route('admin.menu-item.update', $menuItem) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Nom *</label>
                        <input type="text" id="name" name="name" value="{{ old('name', $menuItem->name) }}" required
                               class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary-blue">
                        @error('name')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="type" class="block text-sm font-medium text-gray-700 mb-2">Type *</label>
                        <select id="type" name="type" required
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary-blue">
                            <option value="">Sélectionner un type</option>
                            <option value="entree" {{ old('type', $menuItem->type) == 'entree' ? 'selected' : '' }}>Entrée</option>
                            <option value="plat" {{ old('type', $menuItem->type) == 'plat' ? 'selected' : '' }}>Plat</option>
                            <option value="burger" {{ old('type', $menuItem->type) == 'burger' ? 'selected' : '' }}>Burger</option>
                            <option value="dessert" {{ old('type', $menuItem->type) == 'dessert' ? 'selected' : '' }}>Dessert</option>
                            <option value="menu_enfant" {{ old('type', $menuItem->type) == 'menu_enfant' ? 'selected' : '' }}>Menu Enfant</option>
                        </select>
                        @error('type')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                
                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                    <textarea id="description" name="description" rows="3"
                              class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary-blue">{{ old('description', $menuItem->description) }}</textarea>
                    @error('description')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="price" class="block text-sm font-medium text-gray-700 mb-2">Prix (€) *</label>
                        <input type="number" id="price" name="price" step="0.01" min="0" value="{{ old('price', $menuItem->price) }}" required
                               class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary-blue">
                        @error('price')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="sort_order" class="block text-sm font-medium text-gray-700 mb-2">Ordre d'affichage</label>
                        <input type="number" id="sort_order" name="sort_order" min="0" value="{{ old('sort_order', $menuItem->sort_order) }}"
                               class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary-blue">
                        @error('sort_order')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                
                <div class="flex items-center">
                    <input type="checkbox" id="is_active" name="is_active" value="1" {{ old('is_active', $menuItem->is_active) ? 'checked' : '' }}
                           class="h-4 w-4 text-primary-blue focus:ring-primary-blue border-gray-300 rounded">
                    <label for="is_active" class="ml-2 block text-sm text-gray-700">
                        Élément actif
                    </label>
                </div>
                
                <div class="flex justify-end space-x-4">
                    <a href="{{ route('admin.menu-item.index') }}" class="px-6 py-3 bg-gray-500 text-white font-semibold rounded-lg hover:bg-gray-600 transition duration-300">
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
