@extends('layouts.admin')

@section('title', 'Ajouter un avis client - Administration')

@section('content')
<div class="min-h-screen bg-gray-50 py-12">
    <div class="container mx-auto max-w-3xl px-4 py-8">
        <div class="bg-white rounded-3xl shadow-lg border border-gray-100 p-6 md:p-10">
            
            <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-4 mb-8">
                <h1 class="text-2xl sm:text-3xl font-bold text-primary-blue">Ajouter un avis client</h1>
                <a href="{{ route('admin.testimonial.index') }}" class="text-primary-blue hover:text-secondary-yellow font-semibold text-sm">
                    ← Retour aux avis
                </a>
            </div>

            @if($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
                    <ul class="list-disc pl-5">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.testimonial.store') }}" method="POST" class="space-y-6">
                @csrf
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="client_name" class="block text-sm font-semibold text-gray-700 mb-2">Nom de l'auteur *</label>
                        <input type="text" name="client_name" id="client_name" value="{{ old('client_name') }}" required 
                               class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary-blue focus:border-transparent" placeholder="Ex. Ludovic M.">
                    </div>

                    <div>
                        <label for="stars" class="block text-sm font-semibold text-gray-700 mb-2">Note (Étoiles) *</label>
                        <select name="stars" id="stars" required 
                                class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary-blue focus:border-transparent">
                            <option value="5" {{ old('stars') === 5 ? 'selected' : '' }}>5 étoiles (Excellent)</option>
                            <option value="4" {{ old('stars') === 4 ? 'selected' : '' }}>4 étoiles (Très bon)</option>
                            <option value="3" {{ old('stars') === 3 ? 'selected' : '' }}>3 étoiles (Moyen)</option>
                            <option value="2" {{ old('stars') === 2 ? 'selected' : '' }}>2 étoiles (Mauvais)</option>
                            <option value="1" {{ old('stars') === 1 ? 'selected' : '' }}>1 étoile (Très mauvais)</option>
                        </select>
                    </div>
                </div>

                <div>
                    <label for="comment" class="block text-sm font-semibold text-gray-700 mb-2">Commentaire de l'avis *</label>
                    <textarea name="comment" id="comment" rows="5" required 
                              class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary-blue focus:border-transparent leading-relaxed" placeholder="Entrez le commentaire de l'avis..."></textarea>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="sort_order" class="block text-sm font-semibold text-gray-700 mb-2">Ordre de tri *</label>
                        <input type="number" name="sort_order" id="sort_order" value="{{ old('sort_order', 0) }}" required 
                               class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary-blue focus:border-transparent">
                    </div>

                    <div class="flex items-center pt-8">
                        <input type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }} 
                               class="h-5 w-5 text-primary-blue focus:ring-primary-blue border-gray-300 rounded-lg">
                        <label for="is_active" class="ml-3 text-sm font-semibold text-gray-700">
                            Afficher cet avis sur le site
                        </label>
                    </div>
                </div>

                <div class="flex flex-col-reverse sm:flex-row justify-end gap-3 pt-6 border-t border-gray-100">
                    <a href="{{ route('admin.testimonial.index') }}" class="px-6 py-3 border border-gray-300 text-gray-700 rounded-xl hover:bg-gray-50 transition duration-300 text-center w-full sm:w-auto text-sm font-semibold">
                        Annuler
                    </a>
                    <button type="submit" class="px-6 py-3 bg-primary-blue text-white font-semibold rounded-xl hover:bg-secondary-yellow hover:text-primary-blue transition duration-300 text-center w-full sm:w-auto text-sm shadow-sm">
                        Créer l'avis
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
