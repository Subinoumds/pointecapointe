@extends('layouts.admin')

@section('title', 'Créer un menu de groupe - Administration')
@section('description', 'Ajoutez un nouveau menu de groupe pour les repas d\'entreprise et événements')

@section('content')
<div class="min-h-screen bg-gray-100 pt-20">
    <div class="container mx-auto max-w-6xl px-4 py-20">
        <div class="bg-white rounded-lg shadow-lg p-8">
            <div class="flex justify-between items-center mb-8">
                <h1 class="text-4xl font-bold text-primary-blue">Créer un Menu de Groupe</h1>
                <a href="{{ route('admin.group-menu.index') }}" class="px-6 py-3 bg-gray-500 text-white font-semibold rounded-lg hover:bg-gray-600 transition duration-300">
                    ← Retour
                </a>
            </div>
            
            <form action="{{ route('admin.group-menu.store') }}" method="POST" class="space-y-6">
                @csrf
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Nom du menu *</label>
                        <input type="text" id="name" name="name" value="{{ old('name') }}" required class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary-blue focus:border-transparent">
                        @error('name')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="price_per_person" class="block text-sm font-medium text-gray-700 mb-2">Prix par personne (€) *</label>
                        <input type="number" id="price_per_person" name="price_per_person" value="{{ old('price_per_person') }}" step="0.01" min="0" required class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary-blue focus:border-transparent">
                        @error('price_per_person')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                
                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                    <textarea id="description" name="description" rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary-blue focus:border-transparent">{{ old('description') }}</textarea>
                    @error('description')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Entrées *</label>
                        <div id="entrees-container" class="space-y-2">
                            <div class="entree-item flex items-center space-x-2">
                                <input type="text" name="entrees[]" required class="flex-1 px-3 py-2 text-sm border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary-blue focus:border-transparent" placeholder="Nom de l'entrée">
                                <button type="button" class="remove-entree text-red-600 hover:text-red-800 p-1" style="display: none;">
                                    <i data-feather="x" class="w-4 h-4"></i>
                                </button>
                            </div>
                        </div>
                        <button type="button" id="add-entree" class="mt-2 px-3 py-1.5 text-sm bg-secondary-yellow text-primary-blue rounded-lg hover:bg-primary-blue hover:text-white transition duration-300">
                            + Ajouter une entrée
                        </button>
                        @error('entrees')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Plats *</label>
                        <div id="plats-container" class="space-y-2">
                            <div class="plat-item flex items-center space-x-2">
                                <input type="text" name="plats[]" required class="flex-1 px-3 py-2 text-sm border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary-blue focus:border-transparent" placeholder="Nom du plat">
                                <button type="button" class="remove-plat text-red-600 hover:text-red-800 p-1" style="display: none;">
                                    <i data-feather="x" class="w-4 h-4"></i>
                                </button>
                            </div>
                        </div>
                        <button type="button" id="add-plat" class="mt-2 px-3 py-1.5 text-sm bg-secondary-yellow text-primary-blue rounded-lg hover:bg-primary-blue hover:text-white transition duration-300">
                            + Ajouter un plat
                        </button>
                        @error('plats')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Desserts *</label>
                        <div id="desserts-container" class="space-y-2">
                            <div class="dessert-item flex items-center space-x-2">
                                <input type="text" name="desserts[]" required class="flex-1 px-3 py-2 text-sm border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary-blue focus:border-transparent" placeholder="Nom du dessert">
                                <button type="button" class="remove-dessert text-red-600 hover:text-red-800 p-1" style="display: none;">
                                    <i data-feather="x" class="w-4 h-4"></i>
                                </button>
                            </div>
                        </div>
                        <button type="button" id="add-dessert" class="mt-2 px-3 py-1.5 text-sm bg-secondary-yellow text-primary-blue rounded-lg hover:bg-primary-blue hover:text-white transition duration-300">
                            + Ajouter un dessert
                        </button>
                        @error('desserts')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="sort_order" class="block text-sm font-medium text-gray-700 mb-2">Ordre d'affichage</label>
                        <input type="number" id="sort_order" name="sort_order" value="{{ old('sort_order', 0) }}" min="0" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary-blue focus:border-transparent">
                        @error('sort_order')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div class="flex items-center">
                        <input type="checkbox" id="is_active" name="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }} class="h-4 w-4 text-primary-blue focus:ring-primary-blue border-gray-300 rounded">
                        <label for="is_active" class="ml-2 block text-sm text-gray-700">
                            Menu actif
                        </label>
                    </div>
                </div>
                
                <div class="flex justify-end space-x-4">
                    <a href="{{ route('admin.group-menu.index') }}" class="px-6 py-3 bg-gray-500 text-white font-semibold rounded-lg hover:bg-gray-600 transition duration-300">
                        Annuler
                    </a>
                    <button type="submit" class="px-6 py-3 bg-primary-blue text-white font-semibold rounded-lg hover:bg-secondary-yellow hover:text-primary-blue transition duration-300">
                        Créer le menu
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    feather.replace();
    
    // Gestion des entrées
    let entreeCount = 1;
    document.getElementById('add-entree').addEventListener('click', function() {
        const container = document.getElementById('entrees-container');
        const newItem = document.createElement('div');
        newItem.className = 'entree-item flex items-center space-x-2';
        newItem.innerHTML = `
            <input type="text" name="entrees[]" required class="flex-1 px-3 py-2 text-sm border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary-blue focus:border-transparent" placeholder="Nom de l'entrée">
            <button type="button" class="remove-entree text-red-600 hover:text-red-800 p-1">
                <i data-feather="x" class="w-4 h-4"></i>
            </button>
        `;
        container.appendChild(newItem);
        feather.replace();
        entreeCount++;
        
        // Afficher les boutons de suppression si plus d'un élément
        if (entreeCount > 1) {
            document.querySelectorAll('.remove-entree').forEach(btn => btn.style.display = 'block');
        }
    });
    
    // Gestion des plats
    let platCount = 1;
    document.getElementById('add-plat').addEventListener('click', function() {
        const container = document.getElementById('plats-container');
        const newItem = document.createElement('div');
        newItem.className = 'plat-item flex items-center space-x-2';
        newItem.innerHTML = `
            <input type="text" name="plats[]" required class="flex-1 px-3 py-2 text-sm border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary-blue focus:border-transparent" placeholder="Nom du plat">
            <button type="button" class="remove-plat text-red-600 hover:text-red-800 p-1">
                <i data-feather="x" class="w-4 h-4"></i>
            </button>
        `;
        container.appendChild(newItem);
        feather.replace();
        platCount++;
        
        if (platCount > 1) {
            document.querySelectorAll('.remove-plat').forEach(btn => btn.style.display = 'block');
        }
    });
    
    // Gestion des desserts
    let dessertCount = 1;
    document.getElementById('add-dessert').addEventListener('click', function() {
        const container = document.getElementById('desserts-container');
        const newItem = document.createElement('div');
        newItem.className = 'dessert-item flex items-center space-x-2';
        newItem.innerHTML = `
            <input type="text" name="desserts[]" required class="flex-1 px-3 py-2 text-sm border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary-blue focus:border-transparent" placeholder="Nom du dessert">
            <button type="button" class="remove-dessert text-red-600 hover:text-red-800 p-1">
                <i data-feather="x" class="w-4 h-4"></i>
            </button>
        `;
        container.appendChild(newItem);
        feather.replace();
        dessertCount++;
        
        if (dessertCount > 1) {
            document.querySelectorAll('.remove-dessert').forEach(btn => btn.style.display = 'block');
        }
    });
    
    // Gestion de la suppression
    document.addEventListener('click', function(e) {
        if (e.target.closest('.remove-entree')) {
            e.target.closest('.entree-item').remove();
            entreeCount--;
            if (entreeCount <= 1) {
                document.querySelectorAll('.remove-entree').forEach(btn => btn.style.display = 'none');
            }
        }
        
        if (e.target.closest('.remove-plat')) {
            e.target.closest('.plat-item').remove();
            platCount--;
            if (platCount <= 1) {
                document.querySelectorAll('.remove-plat').forEach(btn => btn.style.display = 'none');
            }
        }
        
        if (e.target.closest('.remove-dessert')) {
            e.target.closest('.dessert-item').remove();
            dessertCount--;
            if (dessertCount <= 1) {
                document.querySelectorAll('.remove-dessert').forEach(btn => btn.style.display = 'none');
            }
        }
    });
});
</script>
@endsection
