@extends('layouts.admin')

@section('title', 'Gestion du contenu - Administration')
@section('description', 'Gérez le contenu textuel du site')

@section('content')
<div class="min-h-screen bg-gray-50 py-12">
    <div class="container mx-auto max-w-7xl px-4 py-8">
        
        <!-- En-tête -->
        <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-4 mb-10">
            <div>
                <h1 class="text-3xl font-bold text-primary-blue">Modifier les textes du site</h1>
                <p class="text-gray-600 mt-1">Gérez facilement tous les textes affichés sur la page d'accueil.</p>
            </div>
            <a href="{{ route('admin.index') }}" class="px-5 py-2.5 bg-gray-100 hover:bg-gray-200 text-gray-700 font-semibold rounded-xl transition duration-300 text-center text-sm">
                ← Retour au tableau de bord
            </a>
        </div>

        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-xl mb-6 shadow-sm">
                {{ session('success') }}
            </div>
        @endif

        @php
            $standardKeys = ['home_title', 'home_subtitle', 'about_text', 'commitment_fresh', 'commitment_local', 'commitment_homemade', 'commitment_french'];
            $homeTitle = $contents->firstWhere('key', 'home_title');
            $homeSubtitle = $contents->firstWhere('key', 'home_subtitle');
            $aboutText = $contents->firstWhere('key', 'about_text');
            $commitmentFresh = $contents->firstWhere('key', 'commitment_fresh');
            $commitmentLocal = $contents->firstWhere('key', 'commitment_local');
            $commitmentHomemade = $contents->firstWhere('key', 'commitment_homemade');
            $commitmentFrench = $contents->firstWhere('key', 'commitment_french');
            
            $otherContents = $contents->whereNotIn('key', $standardKeys);
        @endphp

        <!-- Section 1 : En-tête de la page d'accueil -->
        <div class="bg-white rounded-3xl shadow-md border border-gray-100 p-6 md:p-8 mb-8">
            <h2 class="text-xl font-bold text-primary-blue mb-6 flex items-center gap-2">
                <i data-feather="monitor" class="w-5 h-5 text-secondary-yellow"></i>
                Grand bandeau d'accueil (Hero)
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Titre principal -->
                @if($homeTitle)
                <div class="bg-gray-50 rounded-2xl p-6 border border-gray-100 flex flex-col justify-between">
                    <div>
                        <h3 class="font-bold text-gray-800 text-sm uppercase tracking-wider mb-2">Grand titre d'accueil</h3>
                        <p class="text-xs text-gray-400 mb-4">Le titre principal affiché en lettres blanches au milieu du carrousel d'images.</p>
                        <div class="bg-white p-4 rounded-xl border border-gray-200 min-h-[80px] flex items-center justify-center text-center text-lg font-semibold text-primary-blue mb-4">
                            "{{ $homeTitle->content }}"
                        </div>
                    </div>
                    <a href="{{ route('admin.content.edit', $homeTitle) }}" class="mt-auto w-full py-2.5 px-4 bg-primary-blue text-white hover:bg-secondary-yellow hover:text-primary-blue transition duration-300 font-semibold rounded-xl text-sm text-center shadow-sm">
                        ✏️ Modifier le titre
                    </a>
                </div>
                @endif

                <!-- Sous-titre principal -->
                @if($homeSubtitle)
                <div class="bg-gray-50 rounded-2xl p-6 border border-gray-100 flex flex-col justify-between">
                    <div>
                        <h3 class="font-bold text-gray-800 text-sm uppercase tracking-wider mb-2">Sous-titre d'accueil</h3>
                        <p class="text-xs text-gray-400 mb-4">La description courte affichée juste en dessous du grand titre.</p>
                        <div class="bg-white p-4 rounded-xl border border-gray-200 min-h-[80px] flex items-center justify-center text-center text-sm font-medium text-gray-700 mb-4">
                            "{{ $homeSubtitle->content }}"
                        </div>
                    </div>
                    <a href="{{ route('admin.content.edit', $homeSubtitle) }}" class="mt-auto w-full py-2.5 px-4 bg-primary-blue text-white hover:bg-secondary-yellow hover:text-primary-blue transition duration-300 font-semibold rounded-xl text-sm text-center shadow-sm">
                        ✏️ Modifier le sous-titre
                    </a>
                </div>
                @endif
            </div>
        </div>

        <!-- Section 2 : A propos / Presentation -->
        @if($aboutText)
        <div class="bg-white rounded-3xl shadow-md border border-gray-100 p-6 md:p-8 mb-8">
            <h2 class="text-xl font-bold text-primary-blue mb-6 flex items-center gap-2">
                <i data-feather="info" class="w-5 h-5 text-secondary-yellow"></i>
                Présentation de l'établissement (À propos)
            </h2>
            <div class="bg-gray-50 rounded-2xl p-6 border border-gray-100">
                <h3 class="font-bold text-gray-800 text-sm uppercase tracking-wider mb-2">Texte d'introduction</h3>
                <p class="text-xs text-gray-400 mb-4">Le grand paragraphe de bienvenue qui présente l'ambiance et la philosophie de votre bistrot.</p>
                <div class="bg-white p-4 rounded-xl border border-gray-200 min-h-[100px] text-sm text-gray-700 leading-relaxed mb-6">
                    {{ $aboutText->content }}
                </div>
                <div class="flex justify-start">
                    <a href="{{ route('admin.content.edit', $aboutText) }}" class="py-2.5 px-6 bg-primary-blue text-white hover:bg-secondary-yellow hover:text-primary-blue transition duration-300 font-semibold rounded-xl text-sm text-center shadow-sm w-full sm:w-auto">
                        ✏️ Modifier le paragraphe de présentation
                    </a>
                </div>
            </div>
        </div>
        @endif

        <!-- Section 3 : Nos Engagements -->
        <div class="bg-white rounded-3xl shadow-md border border-gray-100 p-6 md:p-8 mb-8">
            <h2 class="text-xl font-bold text-primary-blue mb-6 flex items-center gap-2">
                <i data-feather="heart" class="w-5 h-5 text-secondary-yellow"></i>
                Nos 4 Engagements
            </h2>
            <p class="text-sm text-gray-600 mb-6">Ces textes décrivent la qualité et les engagements de votre cuisine (frais, local, fait maison, français).</p>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Engagement - Frais -->
                @if($commitmentFresh)
                <div class="bg-gray-50 rounded-2xl p-5 border border-gray-100 flex flex-col justify-between">
                    <div>
                        <h3 class="font-bold text-gray-800 text-sm mb-1">🥦 Produits Frais</h3>
                        <p class="text-xs text-gray-400 mb-3">Texte de l'engagement frais.</p>
                        <div class="bg-white p-3 rounded-xl border border-gray-200 text-xs text-gray-600 min-h-[100px] mb-4">
                            {{ $commitmentFresh->content }}
                        </div>
                    </div>
                    <a href="{{ route('admin.content.edit', $commitmentFresh) }}" class="mt-auto w-full py-2 bg-primary-blue text-white hover:bg-secondary-yellow hover:text-primary-blue transition duration-300 font-semibold rounded-lg text-xs text-center">
                        Modifier
                    </a>
                </div>
                @endif

                <!-- Engagement - Local -->
                @if($commitmentLocal)
                <div class="bg-gray-50 rounded-2xl p-5 border border-gray-100 flex flex-col justify-between">
                    <div>
                        <h3 class="font-bold text-gray-800 text-sm mb-1">📍 Approvisionnement Local</h3>
                        <p class="text-xs text-gray-400 mb-3">Texte de l'engagement local.</p>
                        <div class="bg-white p-3 rounded-xl border border-gray-200 text-xs text-gray-600 min-h-[100px] mb-4">
                            {{ $commitmentLocal->content }}
                        </div>
                    </div>
                    <a href="{{ route('admin.content.edit', $commitmentLocal) }}" class="mt-auto w-full py-2 bg-primary-blue text-white hover:bg-secondary-yellow hover:text-primary-blue transition duration-300 font-semibold rounded-lg text-xs text-center">
                        Modifier
                    </a>
                </div>
                @endif

                <!-- Engagement - Fait Maison -->
                @if($commitmentHomemade)
                <div class="bg-gray-50 rounded-2xl p-5 border border-gray-100 flex flex-col justify-between">
                    <div>
                        <h3 class="font-bold text-gray-800 text-sm mb-1">🍳 Cuisine Fait Maison</h3>
                        <p class="text-xs text-gray-400 mb-3">Texte de l'engagement maison.</p>
                        <div class="bg-white p-3 rounded-xl border border-gray-200 text-xs text-gray-600 min-h-[100px] mb-4">
                            {{ $commitmentHomemade->content }}
                        </div>
                    </div>
                    <a href="{{ route('admin.content.edit', $commitmentHomemade) }}" class="mt-auto w-full py-2 bg-primary-blue text-white hover:bg-secondary-yellow hover:text-primary-blue transition duration-300 font-semibold rounded-lg text-xs text-center">
                        Modifier
                    </a>
                </div>
                @endif

                <!-- Engagement - Français -->
                @if($commitmentFrench)
                <div class="bg-gray-50 rounded-2xl p-5 border border-gray-100 flex flex-col justify-between">
                    <div>
                        <h3 class="font-bold text-gray-800 text-sm mb-1">🇫🇷 Produits Français</h3>
                        <p class="text-xs text-gray-400 mb-3">Texte de l'engagement national.</p>
                        <div class="bg-white p-3 rounded-xl border border-gray-200 text-xs text-gray-600 min-h-[100px] mb-4">
                            {{ $commitmentFrench->content }}
                        </div>
                    </div>
                    <a href="{{ route('admin.content.edit', $commitmentFrench) }}" class="mt-auto w-full py-2 bg-primary-blue text-white hover:bg-secondary-yellow hover:text-primary-blue transition duration-300 font-semibold rounded-lg text-xs text-center">
                        Modifier
                    </a>
                </div>
                @endif
            </div>
        </div>

        <!-- Section 4 : Configuration Avancée (Autres textes) -->
        @if($otherContents->count() > 0)
        <div class="bg-white rounded-3xl shadow-md border border-gray-100 p-6 md:p-8 mb-8">
            <h2 class="text-xl font-bold text-primary-blue mb-4 flex items-center gap-2">
                <i data-feather="settings" class="w-5 h-5 text-gray-400"></i>
                Autres textes (Configuration avancée)
            </h2>
            <p class="text-sm text-gray-500 mb-6">Ces textes supplémentaires sont gérés par le système.</p>
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white border border-gray-200 rounded-2xl overflow-hidden">
                    <thead class="bg-gray-50 text-gray-700 text-xs uppercase font-semibold">
                        <tr>
                            <th class="px-6 py-3 text-left">Titre</th>
                            <th class="px-6 py-3 text-left">Valeur</th>
                            <th class="px-6 py-3 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 text-sm text-gray-600">
                        @foreach($otherContents as $content)
                        <tr>
                            <td class="px-6 py-4 font-medium text-gray-900">{{ $content->title }}</td>
                            <td class="px-6 py-4 truncate max-w-xs">{{ $content->content }}</td>
                            <td class="px-6 py-4 text-right">
                                <a href="{{ route('admin.content.edit', $content) }}" class="text-primary-blue hover:text-secondary-yellow font-semibold mr-4">
                                    Modifier
                                </a>
                                <form action="{{ route('admin.content.destroy', $content) }}" method="POST" class="inline" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce contenu ?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-800 font-semibold">
                                        Supprimer
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @endif
        
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        if (typeof feather !== 'undefined') {
            feather.replace();
        }
    });
</script>
@endsection
