@extends('layouts.admin')

@section('title', 'Ajouter des images au carousel - Administration')
@section('description', 'Ajoutez des images qui apparaîtront dans le carousel de la page menus du midi')

@section('content')
<div class="min-h-screen bg-gray-100 pt-20">
    <div class="container mx-auto max-w-4xl px-4 py-20">
        <div class="bg-white rounded-lg shadow-lg p-8">
            <div class="mb-8">
                <h1 class="text-4xl font-bold text-primary-blue mb-4">Ajouter des images au carousel</h1>
                <p class="text-gray-600">Sélectionnez une ou plusieurs images qui apparaîtront dans le carousel de la page menus du midi.</p>
            </div>
            
            <form action="{{ route('admin.menu-midi.store-images') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                
                <div>
                    <label for="images" class="block text-sm font-medium text-gray-700 mb-2">Images du carousel *</label>
                    <input type="file" id="images" name="images[]" accept="image/*" multiple required 
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-blue focus:border-transparent @error('images') border-red-500 @enderror">
                    <p class="mt-1 text-sm text-gray-500">Sélectionnez une ou plusieurs images. Formats acceptés: JPG, PNG, GIF. Taille max: 2MB par image</p>
                    @error('images')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <div class="bg-blue-50 border border-blue-200 rounded-lg p-4">
                    <h3 class="text-lg font-semibold text-blue-800 mb-2">💡 Astuce</h3>
                    <p class="text-blue-700 text-sm">
                        Vous pouvez sélectionner plusieurs images à la fois en maintenant la touche Ctrl (ou Cmd sur Mac) 
                        et en cliquant sur les images souhaitées. Chaque image sera automatiquement ajoutée au carousel.
                    </p>
                </div>
                
                <div class="flex justify-end space-x-4 pt-6">
                    <a href="{{ route('admin.menu-midi.index') }}" 
                       class="px-6 py-3 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition duration-300">
                        Annuler
                    </a>
                    <button type="submit" 
                            class="px-6 py-3 bg-primary-blue text-white font-semibold rounded-lg hover:bg-secondary-yellow hover:text-primary-blue transition duration-300">
                        Ajouter les images au carousel
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
