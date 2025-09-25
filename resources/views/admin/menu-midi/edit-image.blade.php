@extends('layouts.admin')

@section('title', 'Modifier l\'image du carousel - Administration')
@section('description', 'Changez l\'image qui apparaît dans le carousel')

@section('content')
<div class="min-h-screen bg-gray-100 pt-20">
    <div class="container mx-auto max-w-2xl px-4 py-20">
        <div class="bg-white rounded-lg shadow-lg p-8">
            <div class="mb-8">
                <h1 class="text-4xl font-bold text-primary-blue mb-4">Modifier l'image du carousel</h1>
                <p class="text-gray-600">Changez l'image "{{ $middayMenu->name }}" qui apparaît dans le carousel.</p>
            </div>
            
            <!-- Aperçu de l'image actuelle -->
            <div class="mb-8">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Image actuelle :</h3>
                @if($middayMenu->image)
                    <div class="border border-gray-200 rounded-lg p-4">
                        <img src="{{ asset('storage/midday-menus/' . $middayMenu->image) }}" alt="{{ $middayMenu->name }}" class="w-full max-w-md mx-auto rounded-lg">
                    </div>
                @else
                    <p class="text-gray-500">Aucune image</p>
                @endif
            </div>
            
            <form action="{{ route('admin.menu-midi.update-image', $middayMenu) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                @method('PUT')
                
                <div>
                    <label for="image" class="block text-sm font-medium text-gray-700 mb-2">Nouvelle image *</label>
                    <input type="file" id="image" name="image" accept="image/*" required 
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-blue focus:border-transparent @error('image') border-red-500 @enderror">
                    <p class="mt-1 text-sm text-gray-500">Formats acceptés: JPG, PNG, GIF. Taille max: 2MB</p>
                    @error('image')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <div class="flex justify-end space-x-4 pt-6">
                    <a href="{{ route('admin.menu-midi.index') }}" 
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
</div>
@endsection
