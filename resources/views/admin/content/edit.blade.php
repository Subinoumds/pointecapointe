@extends('layouts.admin')

@section('title', 'Modifier le contenu - Administration')
@section('description', 'Modifier le contenu existant')

@section('content')
<div class="min-h-screen bg-gray-100 pt-20">
    <div class="container mx-auto max-w-7xl px-4 py-20">
        <div class="bg-white rounded-lg shadow-lg p-8">
            <h1 class="text-4xl font-bold text-primary-blue mb-8">Modifier le contenu</h1>
            
            <form action="{{ route('admin.content.update', $content) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')
                
                <div>
                    <label for="key" class="block text-sm font-medium text-gray-700 mb-2">Clé unique *</label>
                    <input type="text" name="key" id="key" value="{{ old('key', $content->key) }}" required 
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary-blue focus:border-transparent">
                    @error('key')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                
                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Titre *</label>
                    <input type="text" name="title" id="title" value="{{ old('title', $content->title) }}" required 
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary-blue focus:border-transparent">
                    @error('title')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                
                <div>
                    <label for="type" class="block text-sm font-medium text-gray-700 mb-2">Type *</label>
                    <select name="type" id="type" required 
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary-blue focus:border-transparent">
                        <option value="">Sélectionner un type</option>
                        <option value="text" {{ old('type', $content->type) === 'text' ? 'selected' : '' }}>Texte simple</option>
                        <option value="html" {{ old('type', $content->type) === 'html' ? 'selected' : '' }}>HTML</option>
                    </select>
                    @error('type')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                
                <div>
                    <label for="content" class="block text-sm font-medium text-gray-700 mb-2">Contenu *</label>
                    <textarea name="content" id="content" rows="6" required 
                              class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary-blue focus:border-transparent">{{ old('content', $content->content) }}</textarea>
                    @error('content')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                
                <div class="flex items-center">
                    <input type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active', $content->is_active) ? 'checked' : '' }} 
                           class="h-4 w-4 text-primary-blue focus:ring-primary-blue border-gray-300 rounded">
                    <label for="is_active" class="ml-2 block text-sm text-gray-700">
                        Contenu actif
                    </label>
                </div>
                
                <div class="flex space-x-4">
                    <button type="submit" class="px-6 py-3 bg-primary-blue text-white font-semibold rounded-lg hover:bg-secondary-yellow hover:text-primary-blue transition duration-300">
                        Mettre à jour
                    </button>
                    <a href="{{ route('admin.content.index') }}" class="px-6 py-3 bg-gray-500 text-white font-semibold rounded-lg hover:bg-gray-600 transition duration-300">
                        Annuler
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
