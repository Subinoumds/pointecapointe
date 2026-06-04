@extends('layouts.admin')

@section('title', 'Modifier la carte PDF - Administration')
@section('description', 'Téléversez une nouvelle version du menu boissons PDF')

@section('content')
<div class="min-h-screen bg-gray-50 py-12">
    <div class="container mx-auto max-w-3xl px-4 py-8">
        <div class="bg-white rounded-3xl shadow-lg border border-gray-100 p-6 md:p-10">
            
            <!-- En-tête -->
            <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-4 mb-8">
                <h1 class="text-2xl sm:text-3xl font-bold text-primary-blue">Modifier la carte PDF</h1>
                <a href="{{ route('admin.menu.index') }}" class="text-primary-blue hover:text-secondary-yellow font-semibold text-sm flex items-center gap-1">
                    ← Retour aux menus
                </a>
            </div>

            <!-- Bannière informative -->
            <div class="bg-blue-50 border-l-4 border-primary-blue p-4 mb-8 rounded-r-2xl">
                <p class="text-xs uppercase tracking-wider font-bold text-primary-blue">Fichier actuel</p>
                <p class="text-base font-semibold text-gray-800 mt-1 truncate">
                    @if($content->content && $content->content !== 'boissons.pdf')
                        <span class="text-green-600 font-bold">✓ Fichier personnalisé :</span> {{ $content->content }}
                    @else
                        <span class="text-gray-500 italic">Fichier par défaut (boissons.pdf)</span>
                    @endif
                </p>
                @if($content->content)
                    <div class="mt-2">
                        <a href="{{ $content->content === 'boissons.pdf' ? asset('boissons.pdf') : asset('storage/' . $content->content) }}" target="_blank" class="text-xs text-primary-blue hover:underline inline-flex items-center gap-1 font-semibold">
                            👁️ Visualiser le fichier actuel
                        </a>
                    </div>
                @endif
            </div>
            
            <form action="{{ route('admin.menu.pdf.update') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                @method('PUT')
                
                <!-- Zone d'upload du fichier -->
                <div>
                    <label for="pdf" class="block text-sm font-semibold text-gray-700 mb-2">
                        Sélectionner le nouveau fichier PDF *
                    </label>
                    <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-2xl hover:border-primary-blue transition duration-300 bg-gray-50">
                        <div class="space-y-1 text-center">
                            <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12m28-12h-8m8 0a4 4 0 00-4-4h-8m-4-10v8m0-8L18 16" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <div class="flex text-sm text-gray-600 justify-center">
                                <label for="pdf" class="relative cursor-pointer bg-white rounded-md font-semibold text-primary-blue hover:text-secondary-yellow focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-primary-blue">
                                    <span>Choisir un fichier</span>
                                    <input id="pdf" name="pdf" type="file" accept="application/pdf" class="sr-only" required>
                                </label>
                                <p class="pl-1">ou glisser-déposer</p>
                            </div>
                            <p class="text-xs text-gray-500">
                                Uniquement des fichiers PDF jusqu'à 10 Mo
                            </p>
                        </div>
                    </div>
                    <!-- Zone pour afficher le nom du fichier sélectionné -->
                    <p id="file-name-display" class="text-sm text-primary-blue font-semibold mt-3 text-center hidden"></p>
                    @error('pdf')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                
                <!-- Actions du formulaire -->
                <div class="flex flex-col-reverse sm:flex-row justify-end gap-3 pt-6 border-t border-gray-100">
                    <a href="{{ route('admin.menu.index') }}" class="px-6 py-3 border border-gray-300 text-gray-700 rounded-xl hover:bg-gray-50 transition duration-300 text-center w-full sm:w-auto text-sm font-semibold">
                        Annuler
                    </a>
                    <button type="submit" class="px-6 py-3 bg-primary-blue text-white font-semibold rounded-xl hover:bg-secondary-yellow hover:text-primary-blue transition duration-300 text-center w-full sm:w-auto text-sm shadow-sm flex items-center justify-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path>
                        </svg>
                        Mettre à jour la carte PDF
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const fileInput = document.getElementById('pdf');
        const nameDisplay = document.getElementById('file-name-display');

        if (fileInput && nameDisplay) {
            fileInput.addEventListener('change', function(e) {
                if (e.target.files.length > 0) {
                    nameDisplay.textContent = 'Fichier sélectionné : ' + e.target.files[0].name;
                    nameDisplay.classList.remove('hidden');
                } else {
                    nameDisplay.classList.add('hidden');
                }
            });
        }
    });
</script>
@endsection
