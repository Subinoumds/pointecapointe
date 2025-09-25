@extends('layouts.app')

@section('title', 'Modifier l\'événement - Administration')
@section('description', 'Modifier un événement du site Pointe ça Pointe')

@section('content')
<div class="min-h-screen bg-gray-100 pt-20">
    <div class="container mx-auto max-w-7xl px-4 py-20">
        <div class="bg-white rounded-lg shadow-lg p-8">
            <div class="flex justify-between items-center mb-8">
                <h1 class="text-4xl font-bold text-primary-blue">Modifier l'événement</h1>
                <a href="{{ route('admin.event.index') }}" class="text-primary-blue hover:text-secondary-yellow">
                    ← Retour à la liste
                </a>
            </div>

            @if($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.event.update', $event) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                @method('PUT')
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Titre de l'événement *</label>
                        <input type="text" name="title" id="title" value="{{ old('title', $event->title) }}" 
                               class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary-blue focus:border-transparent" required>
                    </div>

                    <div>
                        <label for="type" class="block text-sm font-medium text-gray-700 mb-2">Type d'événement *</label>
                        <select name="type" id="type" 
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary-blue focus:border-transparent" required>
                            <option value="">Sélectionner un type</option>
                            <option value="upcoming" {{ old('type', $event->type) === 'upcoming' ? 'selected' : '' }}>À venir</option>
                            <option value="past" {{ old('type', $event->type) === 'past' ? 'selected' : '' }}>Passé</option>
                        </select>
                    </div>
                </div>

                <div>
                    <label for="event_date" class="block text-sm font-medium text-gray-700 mb-2">Date de l'événement *</label>
                    <input type="date" name="event_date" id="event_date" value="{{ old('event_date', $event->event_date->format('Y-m-d')) }}" 
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary-blue focus:border-transparent" required>
                </div>

                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Description *</label>
                    <textarea name="description" id="description" rows="4" 
                              class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary-blue focus:border-transparent" required>{{ old('description', $event->description) }}</textarea>
                </div>

                <div>
                    <label for="images" class="block text-sm font-medium text-gray-700 mb-2">Ajouter de nouvelles images (upload depuis votre appareil)</label>
                    <input type="file" name="images[]" id="images" multiple accept="image/*" 
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary-blue focus:border-transparent">
                    <p class="text-sm text-gray-500 mt-1">
                        <span id="image-requirement-text">Optionnel pour les événements à venir</span>
                        <span id="image-requirement-past" style="display: none;">Au moins 4 images requises pour les événements passés</span>
                        (max 2MB par image). Les images seront automatiquement redimensionnées.
                    </p>
                </div>

                <div>
                    <label for="image_paths" class="block text-sm font-medium text-gray-700 mb-2">Images existantes (chemins séparés par des virgules)</label>
                    <input type="text" name="image_paths" id="image_paths" value="{{ old('image_paths', is_array($event->images) ? implode(', ', $event->images) : '') }}" 
                           placeholder="img/galerie/image1.jpg, img/galerie/image2.jpg"
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary-blue focus:border-transparent">
                    <p class="text-sm text-gray-500 mt-1">Séparez les chemins d'images par des virgules</p>
                </div>

                <div class="flex items-center">
                    <input type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active', $event->is_active) ? 'checked' : '' }} 
                           class="h-4 w-4 text-primary-blue focus:ring-primary-blue border-gray-300 rounded">
                    <label for="is_active" class="ml-2 block text-sm text-gray-700">
                        Événement actif
                    </label>
                </div>

                <div class="flex justify-end space-x-4">
                    <a href="{{ route('admin.event.index') }}" class="px-6 py-3 border border-gray-300 text-gray-700 rounded-md hover:bg-gray-50 transition duration-300">
                        Annuler
                    </a>
                    <button type="submit" class="px-6 py-3 bg-primary-blue text-white font-semibold rounded-md hover:bg-secondary-yellow hover:text-primary-blue transition duration-300">
                        Mettre à jour l'événement
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('form');
    const imagesInput = document.getElementById('images');
    const typeSelect = document.getElementById('type');
    
    form.addEventListener('submit', function(e) {
        if (typeSelect.value === 'past') {
            const files = imagesInput.files;
            const existingImages = document.getElementById('image_paths').value.split(',').filter(path => path.trim() !== '');
            const totalImages = files.length + existingImages.length;
            
            if (totalImages < 4) {
                e.preventDefault();
                alert('Les événements passés doivent avoir au moins 4 images au total (nouvelles + existantes).');
                return false;
            }
        }
    });
    
    // Validation en temps réel
    imagesInput.addEventListener('change', function() {
        const files = this.files;
        const type = typeSelect.value;
        const existingImages = document.getElementById('image_paths').value.split(',').filter(path => path.trim() !== '');
        const totalImages = files.length + existingImages.length;
        
        if (type === 'past' && totalImages < 4) {
            this.setCustomValidity('Vous devez avoir au moins 4 images au total pour les événements passés.');
        } else {
            this.setCustomValidity('');
        }
    });
    
    typeSelect.addEventListener('change', function() {
        const files = imagesInput.files;
        const existingImages = document.getElementById('image_paths').value.split(',').filter(path => path.trim() !== '');
        const totalImages = files.length + existingImages.length;
        const requirementText = document.getElementById('image-requirement-text');
        const requirementPast = document.getElementById('image-requirement-past');
        
        if (this.value === 'past') {
            requirementText.style.display = 'none';
            requirementPast.style.display = 'inline';
            
            if (totalImages < 4) {
                imagesInput.setCustomValidity('Vous devez avoir au moins 4 images au total pour les événements passés.');
            } else {
                imagesInput.setCustomValidity('');
            }
        } else {
            requirementText.style.display = 'inline';
            requirementPast.style.display = 'none';
            imagesInput.setCustomValidity('');
        }
    });
    
    // Initialiser l'affichage selon le type actuel
    if (typeSelect.value === 'past') {
        document.getElementById('image-requirement-text').style.display = 'none';
        document.getElementById('image-requirement-past').style.display = 'inline';
    }
});
</script>
@endsection
