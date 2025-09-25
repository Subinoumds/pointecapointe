@extends('layouts.admin')

@section('title', 'Créer une carte de menu du midi - Administration')
@section('description', 'Ajoutez une nouvelle carte de menu (Menu du marché, Formule express, etc.)')

@section('content')
<div class="min-h-screen bg-gray-100 pt-20">
    <div class="container mx-auto max-w-4xl px-4 py-20">
        <div class="bg-white rounded-lg shadow-lg p-8">
            <div class="mb-8">
                <h1 class="text-4xl font-bold text-primary-blue mb-4">Créer une carte de menu du midi</h1>
                <p class="text-gray-600">Ajoutez une nouvelle carte de menu qui apparaîtra dans la section "Nos propositions du midi".</p>
            </div>
            
            <form action="{{ route('admin.menu-midi-cards.store') }}" method="POST" class="space-y-6">
                @csrf
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Titre de la carte *</label>
                        <input type="text" id="title" name="title" value="{{ old('title') }}" required 
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-blue focus:border-transparent @error('title') border-red-500 @enderror"
                               placeholder="Ex: Menu du marché">
                        @error('title')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="subtitle" class="block text-sm font-medium text-gray-700 mb-2">Sous-titre</label>
                        <input type="text" id="subtitle" name="subtitle" value="{{ old('subtitle') }}" 
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-blue focus:border-transparent @error('subtitle') border-red-500 @enderror"
                               placeholder="Ex: Prix : 16,50 € (entrée + plat ou plat + dessert)">
                        @error('subtitle')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                
                <div>
                    <label for="price" class="block text-sm font-medium text-gray-700 mb-2">Prix (€)</label>
                    <input type="number" id="price" name="price" value="{{ old('price') }}" step="0.01" min="0" 
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-blue focus:border-transparent @error('price') border-red-500 @enderror"
                           placeholder="Ex: 16.50">
                    @error('price')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Items du menu *</label>
                    <div id="items-container" class="space-y-4">
                        <!-- Les items seront ajoutés dynamiquement -->
                    </div>
                    <button type="button" id="add-item" class="mt-4 px-4 py-2 bg-secondary-yellow text-primary-blue font-semibold rounded-lg hover:bg-primary-blue hover:text-white transition duration-300">
                        + Ajouter un item
                    </button>
                    @error('items')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="sort_order" class="block text-sm font-medium text-gray-700 mb-2">Ordre d'affichage</label>
                        <input type="number" id="sort_order" name="sort_order" value="{{ old('sort_order', 0) }}" min="0" 
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-blue focus:border-transparent @error('sort_order') border-red-500 @enderror"
                               placeholder="0">
                        <p class="mt-1 text-sm text-gray-500">Plus le nombre est petit, plus la carte apparaîtra en premier</p>
                        @error('sort_order')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div class="flex items-center">
                        <input type="checkbox" id="is_active" name="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }}
                               class="h-4 w-4 text-primary-blue focus:ring-primary-blue border-gray-300 rounded">
                        <label for="is_active" class="ml-2 block text-sm text-gray-700">
                            Carte active (visible sur le site)
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
                        Créer la carte de menu
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    let itemCount = 0;
    
    function addItem() {
        const container = document.getElementById('items-container');
        const itemDiv = document.createElement('div');
        itemDiv.className = 'border border-gray-300 rounded-lg p-4';
        itemDiv.innerHTML = `
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Type</label>
                    <select name="items[${itemCount}][type]" required class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary-blue">
                        <option value="">Sélectionner...</option>
                        <option value="Entrée">Entrée</option>
                        <option value="Plat">Plat</option>
                        <option value="Dessert">Dessert</option>
                        <option value="Boisson">Boisson</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Nom</label>
                    <input type="text" name="items[${itemCount}][name]" required class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary-blue" placeholder="Nom de l'item">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                    <input type="text" name="items[${itemCount}][description]" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary-blue" placeholder="Description (optionnel)">
                </div>
            </div>
            <button type="button" class="remove-item mt-2 text-red-600 hover:text-red-800 text-sm">
                <i data-feather="x" class="w-4 h-4 inline"></i> Supprimer cet item
            </button>
        `;
        container.appendChild(itemDiv);
        itemCount++;
        feather.replace();
        
        // Ajouter l'événement de suppression
        itemDiv.querySelector('.remove-item').addEventListener('click', function() {
            itemDiv.remove();
        });
    }
    
    // Ajouter le premier item par défaut
    addItem();
    
    // Gérer le bouton d'ajout d'item
    document.getElementById('add-item').addEventListener('click', addItem);
});
</script>
@endsection
