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
                <p class="text-gray-600 mt-1 text-sm">Gérez facilement tous les textes affichés sur la page d'accueil et le pied de page.</p>
            </div>
            <a href="{{ route('admin.index') }}" class="px-5 py-2.5 bg-gray-100 hover:bg-gray-200 text-gray-700 font-semibold rounded-xl transition duration-300 text-center text-sm shadow-sm">
                ← Retour au tableau de bord
            </a>
        </div>

        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-xl mb-6 shadow-sm">
                {{ session('success') }}
            </div>
        @endif

        @php
            $standardKeys = [
                'home_title', 'home_subtitle', 
                'about_title', 'about_text', 
                'commitment_title_fresh', 'commitment_fresh',
                'commitment_title_local', 'commitment_local',
                'commitment_title_homemade', 'commitment_homemade',
                'commitment_title_french', 'commitment_french',
                'rating_value', 'rating_text', 'rating_google_link',
                'hours_title', 'hours_lundi', 'hours_mardi', 'hours_mercredi', 'hours_jeudi', 'hours_vendredi', 'hours_samedi', 'hours_dimanche',
                'footer_connect_title', 'footer_address', 'footer_phone', 'footer_email',
                'footer_follow_title', 'social_instagram', 'social_facebook',
                'carousel_btn1_text', 'carousel_btn1_link', 'carousel_btn2_text', 'carousel_btn2_link',
                'drinks_pdf'
            ];

            $homeTitle = $contents->firstWhere('key', 'home_title');
            $homeSubtitle = $contents->firstWhere('key', 'home_subtitle');
            
            $aboutTitle = $contents->firstWhere('key', 'about_title');
            $aboutText = $contents->firstWhere('key', 'about_text');
            
            $commitmentTitleFresh = $contents->firstWhere('key', 'commitment_title_fresh');
            $commitmentFresh = $contents->firstWhere('key', 'commitment_fresh');
            
            $commitmentTitleLocal = $contents->firstWhere('key', 'commitment_title_local');
            $commitmentLocal = $contents->firstWhere('key', 'commitment_local');
            
            $commitmentTitleHomemade = $contents->firstWhere('key', 'commitment_title_homemade');
            $commitmentHomemade = $contents->firstWhere('key', 'commitment_homemade');
            
            $commitmentTitleFrench = $contents->firstWhere('key', 'commitment_title_french');
            $commitmentFrench = $contents->firstWhere('key', 'commitment_french');
            
            $ratingValue = $contents->firstWhere('key', 'rating_value');
            $ratingText = $contents->firstWhere('key', 'rating_text');
            $ratingGoogleLink = $contents->firstWhere('key', 'rating_google_link');
            
            $hoursTitle = $contents->firstWhere('key', 'hours_title');
            $hoursLundi = $contents->firstWhere('key', 'hours_lundi');
            $hoursMardi = $contents->firstWhere('key', 'hours_mardi');
            $hoursMercredi = $contents->firstWhere('key', 'hours_mercredi');
            $hoursJeudi = $contents->firstWhere('key', 'hours_jeudi');
            $hoursVendredi = $contents->firstWhere('key', 'hours_vendredi');
            $hoursSamedi = $contents->firstWhere('key', 'hours_samedi');
            $hoursDimanche = $contents->firstWhere('key', 'hours_dimanche');
            
            $footerConnectTitle = $contents->firstWhere('key', 'footer_connect_title');
            $footerAddress = $contents->firstWhere('key', 'footer_address');
            $footerPhone = $contents->firstWhere('key', 'footer_phone');
            $footerEmail = $contents->firstWhere('key', 'footer_email');
            
            $footerFollowTitle = $contents->firstWhere('key', 'footer_follow_title');
            $socialInstagram = $contents->firstWhere('key', 'social_instagram');
            $socialFacebook = $contents->firstWhere('key', 'social_facebook');

            $carouselBtn1Text = $contents->firstWhere('key', 'carousel_btn1_text');
            $carouselBtn1Link = $contents->firstWhere('key', 'carousel_btn1_link');
            $carouselBtn2Text = $contents->firstWhere('key', 'carousel_btn2_text');
            $carouselBtn2Link = $contents->firstWhere('key', 'carousel_btn2_link');
            
            $otherContents = $contents->whereNotIn('key', $standardKeys);
        @endphp

        <!-- Onglets de Navigation -->
        <div class="flex border-b border-gray-200 mb-8 overflow-x-auto whitespace-nowrap gap-2 pb-1">
            <button class="tab-btn px-6 py-3 border-b-2 font-bold text-sm transition-all duration-300 border-primary-blue text-primary-blue flex items-center gap-2" data-tab="tab-home">
                <i data-feather="home" class="w-4 h-4"></i> Accueil & Présentation
            </button>
            <button class="tab-btn px-6 py-3 border-b-2 font-bold text-sm transition-all duration-300 border-transparent text-gray-500 hover:text-primary-blue flex items-center gap-2" data-tab="tab-commitments">
                <i data-feather="heart" class="w-4 h-4"></i> Engagements & Avis Google
            </button>
            <button class="tab-btn px-6 py-3 border-b-2 font-bold text-sm transition-all duration-300 border-transparent text-gray-500 hover:text-primary-blue flex items-center gap-2" data-tab="tab-hours">
                <i data-feather="clock" class="w-4 h-4"></i> Horaires, Contacts & Réseaux
            </button>
        </div>

        <!-- ONGLET 1 : Accueil & Présentation -->
        <div id="tab-home" class="tab-content block space-y-8">
            <!-- Grand bandeau d'accueil -->
            <div class="bg-white rounded-3xl shadow-md border border-gray-100 p-6 md:p-8">
                <h2 class="text-xl font-bold text-primary-blue mb-6 flex items-center gap-2">
                    <i data-feather="monitor" class="w-5 h-5 text-secondary-yellow"></i>
                    Grand bandeau d'accueil (Carrousel)
                </h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    @if($homeTitle)
                    <div class="bg-gray-50 rounded-2xl p-6 border border-gray-100 flex flex-col justify-between">
                        <div>
                            <h3 class="font-bold text-gray-800 text-sm uppercase tracking-wider mb-2">Grand titre d'accueil</h3>
                            <p class="text-xs text-gray-400 mb-4 font-medium">Titre principal affiché au milieu du carrousel de la page d'accueil.</p>
                            <div class="bg-white p-4 rounded-xl border border-gray-200 min-h-[80px] flex items-center justify-center text-center text-lg font-semibold text-primary-blue mb-4">
                                "{{ $homeTitle->content }}"
                            </div>
                        </div>
                        <a href="{{ route('admin.content.edit', $homeTitle) }}" class="mt-auto w-full py-2.5 px-4 bg-primary-blue text-white hover:bg-secondary-yellow hover:text-primary-blue transition duration-300 font-semibold rounded-xl text-sm text-center shadow-sm">
                            ✏️ Modifier le titre
                        </a>
                    </div>
                    @endif

                    @if($homeSubtitle)
                    <div class="bg-gray-50 rounded-2xl p-6 border border-gray-100 flex flex-col justify-between">
                        <div>
                            <h3 class="font-bold text-gray-800 text-sm uppercase tracking-wider mb-2">Sous-titre d'accueil</h3>
                            <p class="text-xs text-gray-400 mb-4 font-medium">Description courte affichée juste en dessous du grand titre.</p>
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

            <!-- Boutons du carrousel -->
            <div class="bg-white rounded-3xl shadow-md border border-gray-100 p-6 md:p-8">
                <h2 class="text-xl font-bold text-primary-blue mb-2 flex items-center gap-2">
                    <i data-feather="mouse-pointer" class="w-5 h-5 text-secondary-yellow"></i>
                    Boutons d'action du carrousel
                </h2>
                <p class="text-sm text-gray-500 mb-8">Modifiez le texte et la destination des deux boutons affichés sur le carrousel de la page d'accueil.</p>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <!-- Bouton 1 -->
                    <div class="bg-gray-50 rounded-2xl p-6 border border-gray-100">
                        <h3 class="font-bold text-gray-800 text-sm uppercase tracking-wider mb-4">Bouton 1 (blanc)</h3>
                        <div class="space-y-4">
                            @if($carouselBtn1Text)
                            <div>
                                <h4 class="text-xs font-bold text-gray-400 uppercase mb-1">Texte du bouton</h4>
                                <div class="bg-white px-3 py-2 rounded-lg border border-gray-200 font-bold text-primary-blue text-sm">{{ $carouselBtn1Text->content }}</div>
                                <a href="{{ route('admin.content.edit', $carouselBtn1Text) }}" class="text-xs text-primary-blue hover:underline mt-1 inline-block font-semibold">✏️ Modifier le texte</a>
                            </div>
                            @endif
                            @if($carouselBtn1Link)
                            <div>
                                <h4 class="text-xs font-bold text-gray-400 uppercase mb-1">Lien de destination</h4>
                                <div class="bg-white px-3 py-2 rounded-lg border border-gray-200 text-xs text-gray-600 font-mono truncate">{{ $carouselBtn1Link->content }}</div>
                                <a href="{{ route('admin.content.edit', $carouselBtn1Link) }}" class="text-xs text-primary-blue hover:underline mt-1 inline-block font-semibold">✏️ Modifier le lien</a>
                            </div>
                            @endif
                        </div>
                    </div>

                    <!-- Bouton 2 -->
                    <div class="bg-gray-50 rounded-2xl p-6 border border-gray-100">
                        <h3 class="font-bold text-gray-800 text-sm uppercase tracking-wider mb-4">Bouton 2 (transparent)</h3>
                        <div class="space-y-4">
                            @if($carouselBtn2Text)
                            <div>
                                <h4 class="text-xs font-bold text-gray-400 uppercase mb-1">Texte du bouton</h4>
                                <div class="bg-white px-3 py-2 rounded-lg border border-gray-200 font-bold text-primary-blue text-sm">{{ $carouselBtn2Text->content }}</div>
                                <a href="{{ route('admin.content.edit', $carouselBtn2Text) }}" class="text-xs text-primary-blue hover:underline mt-1 inline-block font-semibold">✏️ Modifier le texte</a>
                            </div>
                            @endif
                            @if($carouselBtn2Link)
                            <div>
                                <h4 class="text-xs font-bold text-gray-400 uppercase mb-1">Lien de destination</h4>
                                <div class="bg-white px-3 py-2 rounded-lg border border-gray-200 text-xs text-gray-600 font-mono truncate">{{ $carouselBtn2Link->content }}</div>
                                <a href="{{ route('admin.content.edit', $carouselBtn2Link) }}" class="text-xs text-primary-blue hover:underline mt-1 inline-block font-semibold">✏️ Modifier le lien</a>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- Section Présentation -->
            <div class="bg-white rounded-3xl shadow-md border border-gray-100 p-6 md:p-8">
                <h2 class="text-xl font-bold text-primary-blue mb-6 flex items-center gap-2">
                    <i data-feather="info" class="w-5 h-5 text-secondary-yellow"></i>
                    Présentation de l'établissement
                </h2>
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                    @if($aboutTitle)
                    <div class="bg-gray-50 rounded-2xl p-6 border border-gray-100 flex flex-col justify-between">
                        <div>
                            <h3 class="font-bold text-gray-800 text-sm uppercase tracking-wider mb-2">Titre de la section</h3>
                            <p class="text-xs text-gray-400 mb-4 font-medium">Le titre de la rubrique de présentation (ex. "Notre bistrot").</p>
                            <div class="bg-white p-4 rounded-xl border border-gray-200 min-h-[80px] flex items-center justify-center text-center text-base font-semibold text-primary-blue mb-4">
                                "{{ $aboutTitle->content }}"
                            </div>
                        </div>
                        <a href="{{ route('admin.content.edit', $aboutTitle) }}" class="mt-auto w-full py-2.5 px-4 bg-primary-blue text-white hover:bg-secondary-yellow hover:text-primary-blue transition duration-300 font-semibold rounded-xl text-sm text-center shadow-sm">
                            ✏️ Modifier le titre de section
                        </a>
                    </div>
                    @endif

                    @if($aboutText)
                    <div class="lg:col-span-2 bg-gray-50 rounded-2xl p-6 border border-gray-100 flex flex-col justify-between">
                        <div>
                            <h3 class="font-bold text-gray-800 text-sm uppercase tracking-wider mb-2">Texte d'introduction</h3>
                            <p class="text-xs text-gray-400 mb-4 font-medium">Le grand paragraphe présentant l'ambiance et la philosophie de votre bistrot.</p>
                            <div class="bg-white p-4 rounded-xl border border-gray-200 min-h-[80px] text-sm text-gray-700 leading-relaxed mb-4">
                                {{ $aboutText->content }}
                            </div>
                        </div>
                        <a href="{{ route('admin.content.edit', $aboutText) }}" class="w-full sm:w-auto py-2.5 px-6 bg-primary-blue text-white hover:bg-secondary-yellow hover:text-primary-blue transition duration-300 font-semibold rounded-xl text-sm text-center shadow-sm self-start">
                            ✏️ Modifier le texte de présentation
                        </a>
                    </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- ONGLET 2 : Engagements & Avis Google -->
        <div id="tab-commitments" class="tab-content hidden space-y-8">
            <!-- Les 4 Engagements -->
            <div class="bg-white rounded-3xl shadow-md border border-gray-100 p-6 md:p-8">
                <h2 class="text-xl font-bold text-primary-blue mb-2 flex items-center gap-2">
                    <i data-feather="heart" class="w-5 h-5 text-secondary-yellow"></i>
                    Nos 4 Engagements
                </h2>
                <p class="text-sm text-gray-500 mb-8">Modifiez ici les titres et les textes explicatifs de vos 4 engagements d'accueil.</p>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <!-- Engagement 1 : Frais -->
                    <div class="bg-gray-50 rounded-2xl p-5 border border-gray-100 flex flex-col justify-between">
                        <div class="space-y-4 mb-4">
                            <div>
                                <h4 class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-1">Titre de l'engagement</h4>
                                <div class="bg-white px-3 py-2 rounded-lg border border-gray-200 font-bold text-primary-blue text-sm">
                                    {{ $commitmentTitleFresh->content ?? 'Frais' }}
                                </div>
                                <a href="{{ route('admin.content.edit', $commitmentTitleFresh) }}" class="text-xs text-primary-blue hover:underline mt-1 inline-block font-semibold">✏️ Modifier le titre</a>
                            </div>
                            <div>
                                <h4 class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-1">Texte explicatif</h4>
                                <div class="bg-white p-3 rounded-lg border border-gray-200 text-xs text-gray-600 min-h-[80px]">
                                    {{ $commitmentFresh->content ?? '' }}
                                </div>
                                <a href="{{ route('admin.content.edit', $commitmentFresh) }}" class="text-xs text-primary-blue hover:underline mt-1 inline-block font-semibold">✏️ Modifier le texte</a>
                            </div>
                        </div>
                    </div>

                    <!-- Engagement 2 : Local -->
                    <div class="bg-gray-50 rounded-2xl p-5 border border-gray-100 flex flex-col justify-between">
                        <div class="space-y-4 mb-4">
                            <div>
                                <h4 class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-1">Titre de l'engagement</h4>
                                <div class="bg-white px-3 py-2 rounded-lg border border-gray-200 font-bold text-primary-blue text-sm">
                                    {{ $commitmentTitleLocal->content ?? 'Local' }}
                                </div>
                                <a href="{{ route('admin.content.edit', $commitmentTitleLocal) }}" class="text-xs text-primary-blue hover:underline mt-1 inline-block font-semibold">✏️ Modifier le titre</a>
                            </div>
                            <div>
                                <h4 class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-1">Texte explicatif</h4>
                                <div class="bg-white p-3 rounded-lg border border-gray-200 text-xs text-gray-600 min-h-[80px]">
                                    {{ $commitmentLocal->content ?? '' }}
                                </div>
                                <a href="{{ route('admin.content.edit', $commitmentLocal) }}" class="text-xs text-primary-blue hover:underline mt-1 inline-block font-semibold">✏️ Modifier le texte</a>
                            </div>
                        </div>
                    </div>

                    <!-- Engagement 3 : Maison -->
                    <div class="bg-gray-50 rounded-2xl p-5 border border-gray-100 flex flex-col justify-between">
                        <div class="space-y-4 mb-4">
                            <div>
                                <h4 class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-1">Titre de l'engagement</h4>
                                <div class="bg-white px-3 py-2 rounded-lg border border-gray-200 font-bold text-primary-blue text-sm">
                                    {{ $commitmentTitleHomemade->content ?? 'Fait Maison' }}
                                </div>
                                <a href="{{ route('admin.content.edit', $commitmentTitleHomemade) }}" class="text-xs text-primary-blue hover:underline mt-1 inline-block font-semibold">✏️ Modifier le titre</a>
                            </div>
                            <div>
                                <h4 class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-1">Texte explicatif</h4>
                                <div class="bg-white p-3 rounded-lg border border-gray-200 text-xs text-gray-600 min-h-[80px]">
                                    {{ $commitmentHomemade->content ?? '' }}
                                </div>
                                <a href="{{ route('admin.content.edit', $commitmentHomemade) }}" class="text-xs text-primary-blue hover:underline mt-1 inline-block font-semibold">✏️ Modifier le texte</a>
                            </div>
                        </div>
                    </div>

                    <!-- Engagement 4 : Français -->
                    <div class="bg-gray-50 rounded-2xl p-5 border border-gray-100 flex flex-col justify-between">
                        <div class="space-y-4 mb-4">
                            <div>
                                <h4 class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-1">Titre de l'engagement</h4>
                                <div class="bg-white px-3 py-2 rounded-lg border border-gray-200 font-bold text-primary-blue text-sm">
                                    {{ $commitmentTitleFrench->content ?? 'Français' }}
                                </div>
                                <a href="{{ route('admin.content.edit', $commitmentTitleFrench) }}" class="text-xs text-primary-blue hover:underline mt-1 inline-block font-semibold">✏️ Modifier le titre</a>
                            </div>
                            <div>
                                <h4 class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-1">Texte explicatif</h4>
                                <div class="bg-white p-3 rounded-lg border border-gray-200 text-xs text-gray-600 min-h-[80px]">
                                    {{ $commitmentFrench->content ?? '' }}
                                </div>
                                <a href="{{ route('admin.content.edit', $commitmentFrench) }}" class="text-xs text-primary-blue hover:underline mt-1 inline-block font-semibold">✏️ Modifier le texte</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Notes & Avis Google -->
            <div class="bg-white rounded-3xl shadow-md border border-gray-100 p-6 md:p-8">
                <h2 class="text-xl font-bold text-primary-blue mb-2 flex items-center gap-2">
                    <i data-feather="star" class="w-5 h-5 text-secondary-yellow"></i>
                    Note Google Globale
                </h2>
                <p class="text-sm text-gray-500 mb-8">Modifiez la note de satisfaction globale affichée sur la page d'accueil.</p>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    @if($ratingValue)
                    <div class="bg-gray-50 rounded-2xl p-5 border border-gray-100 flex flex-col justify-between">
                        <div>
                            <h3 class="font-bold text-gray-800 text-sm mb-1">Note numérique</h3>
                            <p class="text-xs text-gray-400 mb-4 font-medium">La note globale du restaurant (ex. "4,8/5").</p>
                            <div class="bg-white px-4 py-3 rounded-xl border border-gray-200 text-xl font-bold text-primary-blue text-center mb-4">
                                {{ $ratingValue->content }}
                            </div>
                        </div>
                        <a href="{{ route('admin.content.edit', $ratingValue) }}" class="w-full py-2 bg-primary-blue text-white hover:bg-secondary-yellow hover:text-primary-blue transition duration-300 font-semibold rounded-xl text-xs text-center shadow-sm">
                            ✏️ Modifier la note
                        </a>
                    </div>
                    @endif

                    @if($ratingText)
                    <div class="bg-gray-50 rounded-2xl p-5 border border-gray-100 flex flex-col justify-between">
                        <div>
                            <h3 class="font-bold text-gray-800 text-sm mb-1">Texte de la note</h3>
                            <p class="text-xs text-gray-400 mb-4 font-medium font-medium">Paragraphe descriptif affiché en dessous de la note.</p>
                            <div class="bg-white p-3 rounded-xl border border-gray-200 text-xs text-gray-600 min-h-[60px] mb-4 leading-relaxed">
                                {{ $ratingText->content }}
                            </div>
                        </div>
                        <a href="{{ route('admin.content.edit', $ratingText) }}" class="w-full py-2 bg-primary-blue text-white hover:bg-secondary-yellow hover:text-primary-blue transition duration-300 font-semibold rounded-xl text-xs text-center shadow-sm">
                            ✏️ Modifier le texte
                        </a>
                    </div>
                    @endif

                    @if($ratingGoogleLink)
                    <div class="bg-gray-50 rounded-2xl p-5 border border-gray-100 flex flex-col justify-between">
                        <div>
                            <h3 class="font-bold text-gray-800 text-sm mb-1">Lien d'avis Google Maps</h3>
                            <p class="text-xs text-gray-400 mb-4 font-medium">Le lien du bouton "Voir tous les avis sur Google".</p>
                            <div class="bg-white p-3 rounded-xl border border-gray-200 text-xs text-gray-500 truncate mb-4 font-mono">
                                {{ $ratingGoogleLink->content }}
                            </div>
                        </div>
                        <a href="{{ route('admin.content.edit', $ratingGoogleLink) }}" class="w-full py-2 bg-primary-blue text-white hover:bg-secondary-yellow hover:text-primary-blue transition duration-300 font-semibold rounded-xl text-xs text-center shadow-sm">
                            ✏️ Modifier le lien
                        </a>
                    </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- ONGLET 3 : Horaires, Contacts & Réseaux -->
        <div id="tab-hours" class="tab-content hidden space-y-8">
            <!-- Horaires d'ouverture -->
            <div class="bg-white rounded-3xl shadow-md border border-gray-100 p-6 md:p-8">
                <h2 class="text-xl font-bold text-primary-blue mb-2 flex items-center gap-2">
                    <i data-feather="clock" class="w-5 h-5 text-secondary-yellow"></i>
                    Horaires d'ouverture
                </h2>
                <p class="text-sm text-gray-500 mb-8">Modifiez le titre de la section et les horaires détaillés pour chaque jour de la semaine.</p>
                <div class="grid grid-cols-1 lg:grid-cols-4 gap-6">
                    @if($hoursTitle)
                    <div class="lg:col-span-4 bg-gray-50 rounded-2xl p-5 border border-gray-100 flex justify-between items-center">
                        <div>
                            <h3 class="font-bold text-gray-800 text-sm mb-1">Titre de la section Horaires</h3>
                            <div class="text-sm font-semibold text-primary-blue">{{ $hoursTitle->content }}</div>
                        </div>
                        <a href="{{ route('admin.content.edit', $hoursTitle) }}" class="py-2 px-4 bg-primary-blue text-white hover:bg-secondary-yellow hover:text-primary-blue transition duration-300 font-semibold rounded-xl text-xs shadow-sm">
                            ✏️ Modifier
                        </a>
                    </div>
                    @endif

                    <div class="lg:col-span-4 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-7 gap-4">
                        @foreach([
                            'hours_lundi' => 'Lundi',
                            'hours_mardi' => 'Mardi',
                            'hours_mercredi' => 'Mercredi',
                            'hours_jeudi' => 'Jeudi',
                            'hours_vendredi' => 'Vendredi',
                            'hours_samedi' => 'Samedi',
                            'hours_dimanche' => 'Dimanche'
                        ] as $key => $dayName)
                            @php $dayContent = $contents->firstWhere('key', $key); @endphp
                            @if($dayContent)
                            <div class="bg-gray-50 rounded-xl p-4 border border-gray-100 flex flex-col justify-between h-32">
                                <div>
                                    <h4 class="font-bold text-gray-700 text-xs mb-1">{{ $dayName }}</h4>
                                    <div class="text-xs text-gray-600 line-clamp-2 leading-relaxed bg-white px-2 py-1.5 rounded border border-gray-150 font-medium">
                                        {{ str_replace($dayName . ': ', '', $dayContent->content) }}
                                    </div>
                                </div>
                                <a href="{{ route('admin.content.edit', $dayContent) }}" class="text-[11px] text-primary-blue hover:underline font-bold mt-2 self-start">✏️ Modifier</a>
                            </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Contacts du Pied de Page (Footer) -->
            <div class="bg-white rounded-3xl shadow-md border border-gray-100 p-6 md:p-8">
                <h2 class="text-xl font-bold text-primary-blue mb-2 flex items-center gap-2">
                    <i data-feather="map-pin" class="w-5 h-5 text-secondary-yellow"></i>
                    Informations de Contact & Réseaux Sociaux
                </h2>
                <p class="text-sm text-gray-500 mb-8">Gérez ici l'adresse du restaurant, le téléphone, l'email, et les liens vers vos réseaux sociaux.</p>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    
                    <!-- Adresse -->
                    @if($footerAddress)
                    <div class="bg-gray-50 rounded-2xl p-5 border border-gray-100 flex flex-col justify-between">
                        <div>
                            <h3 class="font-bold text-gray-800 text-xs uppercase mb-1">Adresse postale</h3>
                            <div class="bg-white px-3 py-2.5 rounded-xl border border-gray-200 text-sm text-gray-700 font-medium mb-4">
                                {{ $footerAddress->content }}
                            </div>
                        </div>
                        <a href="{{ route('admin.content.edit', $footerAddress) }}" class="w-full py-2 bg-primary-blue text-white hover:bg-secondary-yellow hover:text-primary-blue transition duration-300 font-semibold rounded-xl text-xs text-center shadow-sm">
                            ✏️ Modifier l'adresse
                        </a>
                    </div>
                    @endif

                    <!-- Téléphone -->
                    @if($footerPhone)
                    <div class="bg-gray-50 rounded-2xl p-5 border border-gray-100 flex flex-col justify-between">
                        <div>
                            <h3 class="font-bold text-gray-800 text-xs uppercase mb-1">Téléphone</h3>
                            <div class="bg-white px-3 py-2.5 rounded-xl border border-gray-200 text-sm text-gray-700 font-medium mb-4 font-mono">
                                {{ $footerPhone->content }}
                            </div>
                        </div>
                        <a href="{{ route('admin.content.edit', $footerPhone) }}" class="w-full py-2 bg-primary-blue text-white hover:bg-secondary-yellow hover:text-primary-blue transition duration-300 font-semibold rounded-xl text-xs text-center shadow-sm">
                            ✏️ Modifier le téléphone
                        </a>
                    </div>
                    @endif

                    <!-- Email -->
                    @if($footerEmail)
                    <div class="bg-gray-50 rounded-2xl p-5 border border-gray-100 flex flex-col justify-between">
                        <div>
                            <h3 class="font-bold text-gray-800 text-xs uppercase mb-1">Adresse E-mail</h3>
                            <div class="bg-white px-3 py-2.5 rounded-xl border border-gray-200 text-sm text-gray-700 font-medium mb-4 font-mono">
                                {{ $footerEmail->content }}
                            </div>
                        </div>
                        <a href="{{ route('admin.content.edit', $footerEmail) }}" class="w-full py-2 bg-primary-blue text-white hover:bg-secondary-yellow hover:text-primary-blue transition duration-300 font-semibold rounded-xl text-xs text-center shadow-sm">
                            ✏️ Modifier l'email
                        </a>
                    </div>
                    @endif

                    <!-- Instagram -->
                    @if($socialInstagram)
                    <div class="bg-gray-50 rounded-2xl p-5 border border-gray-100 flex flex-col justify-between">
                        <div>
                            <h3 class="font-bold text-gray-800 text-xs uppercase mb-1">Lien Instagram</h3>
                            <div class="bg-white px-3 py-2.5 rounded-xl border border-gray-200 text-sm text-gray-700 font-medium truncate mb-4 font-mono">
                                {{ $socialInstagram->content }}
                            </div>
                        </div>
                        <a href="{{ route('admin.content.edit', $socialInstagram) }}" class="w-full py-2 bg-primary-blue text-white hover:bg-secondary-yellow hover:text-primary-blue transition duration-300 font-semibold rounded-xl text-xs text-center shadow-sm">
                            ✏️ Modifier le lien Instagram
                        </a>
                    </div>
                    @endif

                    <!-- Facebook -->
                    @if($socialFacebook)
                    <div class="bg-gray-50 rounded-2xl p-5 border border-gray-100 flex flex-col justify-between">
                        <div>
                            <h3 class="font-bold text-gray-800 text-xs uppercase mb-1">Lien Facebook</h3>
                            <div class="bg-white px-3 py-2.5 rounded-xl border border-gray-200 text-sm text-gray-700 font-medium truncate mb-4 font-mono">
                                {{ $socialFacebook->content }}
                            </div>
                        </div>
                        <a href="{{ route('admin.content.edit', $socialFacebook) }}" class="w-full py-2 bg-primary-blue text-white hover:bg-secondary-yellow hover:text-primary-blue transition duration-300 font-semibold rounded-xl text-xs text-center shadow-sm">
                            ✏️ Modifier le lien Facebook
                        </a>
                    </div>
                    @endif

                    <!-- Titres de footer supplémentaires -->
                    <div class="bg-gray-50 rounded-2xl p-5 border border-gray-100 flex flex-col justify-between">
                        <div class="space-y-4 mb-4">
                            @if($footerConnectTitle)
                            <div>
                                <h4 class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-1">Titre Section Contact</h4>
                                <div class="bg-white px-2 py-1.5 rounded border border-gray-150 text-xs font-semibold text-primary-blue truncate">
                                    {{ $footerConnectTitle->content }}
                                </div>
                                <a href="{{ route('admin.content.edit', $footerConnectTitle) }}" class="text-[11px] text-primary-blue hover:underline font-bold mt-1 inline-block">✏️ Modifier</a>
                            </div>
                            @endif

                            @if($footerFollowTitle)
                            <div>
                                <h4 class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-1">Titre Section Réseaux</h4>
                                <div class="bg-white px-2 py-1.5 rounded border border-gray-150 text-xs font-semibold text-primary-blue truncate">
                                    {{ $footerFollowTitle->content }}
                                </div>
                                <a href="{{ route('admin.content.edit', $footerFollowTitle) }}" class="text-[11px] text-primary-blue hover:underline font-bold mt-1 inline-block">✏️ Modifier</a>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
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

        // Script pour la gestion des onglets
        const tabButtons = document.querySelectorAll('.tab-btn');
        const tabContents = document.querySelectorAll('.tab-content');

        tabButtons.forEach(button => {
            button.addEventListener('click', () => {
                const targetTabId = button.getAttribute('data-tab');

                // Mettre à jour l'état des boutons d'onglet
                tabButtons.forEach(btn => {
                    btn.classList.remove('border-primary-blue', 'text-primary-blue');
                    btn.classList.add('border-transparent', 'text-gray-500');
                });
                button.classList.remove('border-transparent', 'text-gray-500');
                button.classList.add('border-primary-blue', 'text-primary-blue');

                // Afficher le bon contenu
                tabContents.forEach(content => {
                    if (content.id === targetTabId) {
                        content.classList.remove('hidden');
                        content.classList.add('block');
                    } else {
                        content.classList.remove('block');
                        content.classList.add('hidden');
                    }
                });
            });
        });
    });
</script>
@endsection
