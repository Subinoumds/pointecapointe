@extends('layouts.admin')

@section('title', 'Modifier le texte - Administration')
@section('description', 'Modifier un texte du site')

@section('content')
<div class="min-h-screen bg-gray-50 py-12">
    <div class="container mx-auto max-w-3xl px-4 py-8">
        <div class="bg-white rounded-3xl shadow-lg border border-gray-100 p-6 md:p-10">
            
            <!-- En-tête -->
            <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-4 mb-8">
                <h1 class="text-2xl sm:text-3xl font-bold text-primary-blue">Modifier le texte</h1>
                <a href="{{ route('admin.content.index') }}" class="text-primary-blue hover:text-secondary-yellow font-semibold text-sm">
                    ← Retour aux textes
                </a>
            </div>

            <!-- Bannière informative sur l'élément modifié -->
            <div class="bg-blue-50 border-l-4 border-primary-blue p-4 mb-8 rounded-r-2xl">
                <p class="text-xs uppercase tracking-wider font-bold text-primary-blue">Élément sélectionné</p>
                <p class="text-base font-semibold text-gray-800 mt-1">{{ $content->title }}</p>
            </div>
            
            <form action="{{ route('admin.content.update', $content) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')
                
                <!-- Paramètres système masqués pour éviter les erreurs accidentelles du client -->
                <input type="hidden" name="key" value="{{ old('key', $content->key) }}">
                <input type="hidden" name="title" value="{{ old('title', $content->title) }}">
                <input type="hidden" name="type" value="{{ old('type', $content->type) }}">
                <input type="hidden" name="is_active" value="1">
                
                <!-- Zone d'édition du texte -->
                <div>
                    <label for="content" class="block text-sm font-semibold text-gray-700 mb-2">
                        Texte affiché sur le site *
                    </label>
                    @if($content->type === 'html')
                        <textarea name="content" id="content" rows="10" required 
                                  class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary-blue focus:border-transparent font-mono text-sm leading-relaxed" 
                                  placeholder="Entrez votre texte ou code HTML...">{{ old('content', $content->content) }}</textarea>
                    @else
                        <textarea name="content" id="content" rows="6" required 
                                  class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary-blue focus:border-transparent leading-relaxed" 
                                  placeholder="Entrez votre texte ici...">{{ old('content', $content->content) }}</textarea>
                    @endif
                    @error('content')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                
                <!-- Actions du formulaire -->
                <div class="flex flex-col-reverse sm:flex-row justify-end gap-3 pt-4 border-t border-gray-100">
                    <a href="{{ route('admin.content.index') }}" class="px-6 py-3 border border-gray-300 text-gray-700 rounded-xl hover:bg-gray-50 transition duration-300 text-center w-full sm:w-auto text-sm font-semibold">
                        Annuler
                    </a>
                    <button type="submit" class="px-6 py-3 bg-primary-blue text-white font-semibold rounded-xl hover:bg-secondary-yellow hover:text-primary-blue transition duration-300 text-center w-full sm:w-auto text-sm shadow-sm">
                        Enregistrer les modifications
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
