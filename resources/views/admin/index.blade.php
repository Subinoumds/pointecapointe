@extends('layouts.admin')

@section('title', 'Administration - Pointe ça Pointe')
@section('description', 'Interface d\'administration du site Pointe ça Pointe')

@section('content')
<div class="min-h-screen bg-gray-50 py-12">
    <div class="container mx-auto max-w-7xl px-4 py-8">
        
        <!-- En-tête de bienvenue chaleureux -->
        <div class="mb-10 text-left" data-aos="fade-down">
            <h1 class="text-3xl md:text-4xl font-bold text-primary-blue mb-2">Bonjour ! 👋</h1>
            <p class="text-lg text-gray-600">Bienvenue sur le tableau de bord d'administration de votre site. Choisissez ce que vous souhaitez modifier ci-dessous :</p>
        </div>

        <div class="bg-white rounded-3xl shadow-xl border border-gray-100 p-6 md:p-10">
            
            <!-- Grille des actions principales -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-10">
                
                <!-- 1. Textes du site -->
                <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm hover:shadow-lg hover:-translate-y-1 transition-all duration-300 flex flex-col justify-between h-full">
                    <div class="mb-6">
                        <div class="w-12 h-12 bg-blue-50 rounded-2xl flex items-center justify-center text-blue-600 mb-4">
                            <i data-feather="edit-3" class="w-6 h-6"></i>
                        </div>
                        <h2 class="text-xl font-bold text-primary-blue mb-2">Textes d'accueil</h2>
                        <p class="text-sm text-gray-600 leading-relaxed">Modifier facilement le grand titre de la page d'accueil, le texte de présentation "Notre Bistrot" et vos engagements.</p>
                    </div>
                    <a href="{{ route('admin.content.index') }}" class="w-full text-center px-4 py-3 bg-primary-blue hover:bg-secondary-yellow text-white hover:text-primary-blue font-semibold rounded-xl transition duration-300 text-sm flex items-center justify-center gap-2">
                        <span>Gérer les textes</span>
                        <i data-feather="arrow-right" class="w-4 h-4"></i>
                    </a>
                </div>
                
                <!-- 2. Menus & Carte -->
                <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm hover:shadow-lg hover:-translate-y-1 transition-all duration-300 flex flex-col justify-between h-full">
                    <div class="mb-6">
                        <div class="w-12 h-12 bg-yellow-50 rounded-2xl flex items-center justify-center text-yellow-600 mb-4">
                            <i data-feather="book-open" class="w-6 h-6"></i>
                        </div>
                        <h2 class="text-xl font-bold text-primary-blue mb-2">La Carte & Boissons</h2>
                        <p class="text-sm text-gray-600 leading-relaxed">Ajouter, modifier ou retirer des plats (entrées, plats, desserts, burgers), des boissons (fraîches/chaudes) ou des vins.</p>
                    </div>
                    <a href="{{ route('admin.menu.index') }}" class="w-full text-center px-4 py-3 bg-primary-blue hover:bg-secondary-yellow text-white hover:text-primary-blue font-semibold rounded-xl transition duration-300 text-sm flex items-center justify-center gap-2">
                        <span>Gérer la carte</span>
                        <i data-feather="arrow-right" class="w-4 h-4"></i>
                    </a>
                </div>
                
                <!-- 3. Galerie Photo -->
                <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm hover:shadow-lg hover:-translate-y-1 transition-all duration-300 flex flex-col justify-between h-full">
                    <div class="mb-6">
                        <div class="w-12 h-12 bg-green-50 rounded-2xl flex items-center justify-center text-green-600 mb-4">
                            <i data-feather="image" class="w-6 h-6"></i>
                        </div>
                        <h2 class="text-xl font-bold text-primary-blue mb-2">Galerie Photos</h2>
                        <p class="text-sm text-gray-600 leading-relaxed">Ajouter de nouvelles photos du restaurant, de la terrasse au bord de l'eau, ou supprimer des photos existantes de la galerie.</p>
                    </div>
                    <a href="{{ route('admin.image.index') }}" class="w-full text-center px-4 py-3 bg-primary-blue hover:bg-secondary-yellow text-white hover:text-primary-blue font-semibold rounded-xl transition duration-300 text-sm flex items-center justify-center gap-2">
                        <span>Gérer les photos</span>
                        <i data-feather="arrow-right" class="w-4 h-4"></i>
                    </a>
                </div>
                
                <!-- 4. Événements -->
                <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm hover:shadow-lg hover:-translate-y-1 transition-all duration-300 flex flex-col justify-between h-full">
                    <div class="mb-6">
                        <div class="w-12 h-12 bg-purple-50 rounded-2xl flex items-center justify-center text-purple-600 mb-4">
                            <i data-feather="calendar" class="w-6 h-6"></i>
                        </div>
                        <h2 class="text-xl font-bold text-primary-blue mb-2">Événements & Concerts</h2>
                        <p class="text-sm text-gray-600 leading-relaxed">Publier vos prochains concerts et soirées à thème pour les afficher sur le site, ou gérer les photos des soirées passées.</p>
                    </div>
                    <a href="{{ route('admin.event.index') }}" class="w-full text-center px-4 py-3 bg-primary-blue hover:bg-secondary-yellow text-white hover:text-primary-blue font-semibold rounded-xl transition duration-300 text-sm flex items-center justify-center gap-2">
                        <span>Gérer les événements</span>
                        <i data-feather="arrow-right" class="w-4 h-4"></i>
                    </a>
                </div>

                <!-- 5. Carousel Accueil -->
                <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm hover:shadow-lg hover:-translate-y-1 transition-all duration-300 flex flex-col justify-between h-full">
                    <div class="mb-6">
                        <div class="w-12 h-12 bg-indigo-50 rounded-2xl flex items-center justify-center text-indigo-600 mb-4">
                            <i data-feather="sliders" class="w-6 h-6"></i>
                        </div>
                        <h2 class="text-xl font-bold text-primary-blue mb-2">Images du Carrousel</h2>
                        <p class="text-sm text-gray-600 leading-relaxed">Changer, ajouter, supprimer ou réorganiser les grandes photos qui défilent tout en haut de la page d'accueil du site.</p>
                    </div>
                    <a href="{{ route('admin.carousel.index') }}" class="w-full text-center px-4 py-3 bg-primary-blue hover:bg-secondary-yellow text-white hover:text-primary-blue font-semibold rounded-xl transition duration-300 text-sm flex items-center justify-center gap-2">
                        <span>Gérer le carrousel</span>
                        <i data-feather="arrow-right" class="w-4 h-4"></i>
                    </a>
                </div>

                <!-- 6. Avis Clients -->
                <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm hover:shadow-lg hover:-translate-y-1 transition-all duration-300 flex flex-col justify-between h-full">
                    <div class="mb-6">
                        <div class="w-12 h-12 bg-pink-50 rounded-2xl flex items-center justify-center text-pink-600 mb-4">
                            <i data-feather="message-square" class="w-6 h-6"></i>
                        </div>
                        <h2 class="text-xl font-bold text-primary-blue mb-2">Avis Clients</h2>
                        <p class="text-sm text-gray-600 leading-relaxed">Gérer les témoignages de vos clients affichés sur la page d'accueil (modifier la note, le texte ou ajouter/supprimer des avis).</p>
                    </div>
                    <a href="{{ route('admin.testimonial.index') }}" class="w-full text-center px-4 py-3 bg-primary-blue hover:bg-secondary-yellow text-white hover:text-primary-blue font-semibold rounded-xl transition duration-300 text-sm flex items-center justify-center gap-2">
                        <span>Gérer les avis</span>
                        <i data-feather="arrow-right" class="w-4 h-4"></i>
                    </a>
                </div>
            </div>

            <!-- Ligne de séparation et section de sécurité -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mt-12 border-t border-gray-100 pt-10">
                <!-- Message explicatif -->
                <div class="flex flex-col justify-center bg-blue-50/50 p-6 md:p-8 rounded-3xl border border-blue-100/50">
                    <h3 class="text-lg font-bold text-primary-blue mb-2 flex items-center gap-2">
                        <i data-feather="info" class="w-5 h-5 text-blue-600"></i>
                        Besoin d'aide ?
                    </h3>
                    <p class="text-sm text-gray-600 leading-relaxed mb-4">
                        Ce panneau vous permet de modifier tout le site en temps réel. Pour chaque image que vous envoyez, le système s'occupe de l'optimiser pour qu'elle s'affiche rapidement sans ralentir le site de vos clients.
                    </p>
                    <p class="text-xs text-gray-500 font-medium">
                        💡 Conseil : Pensez à vérifier le rendu sur votre téléphone après chaque modification.
                    </p>
                </div>

                <!-- Formulaire de changement de mot de passe -->
                <div class="bg-white p-6 rounded-3xl border border-gray-150 shadow-sm">
                    <h2 class="text-xl font-bold text-primary-blue mb-4 flex items-center gap-2">
                        <i data-feather="key" class="w-5 h-5 text-gray-600"></i>
                        Changer le mot de passe
                    </h2>
                    
                    @if($errors->has('current_password') || $errors->has('new_password'))
                        <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-xl mb-4 text-xs font-semibold">
                            {{ $errors->first('current_password') ?: $errors->first('new_password') }}
                        </div>
                    @endif

                    <form action="{{ route('admin.change-password') }}" method="POST" class="space-y-4">
                        @csrf
                        <div>
                            <label for="current_password" class="block text-xs font-bold text-gray-700 uppercase tracking-wider">Mot de passe actuel</label>
                            <input type="password" id="current_password" name="current_password" required class="w-full mt-1.5 px-3 py-2.5 border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-secondary-yellow focus:border-transparent outline-none transition">
                        </div>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label for="new_password" class="block text-xs font-bold text-gray-700 uppercase tracking-wider">Nouveau mot de passe</label>
                                <input type="password" id="new_password" name="new_password" required class="w-full mt-1.5 px-3 py-2.5 border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-secondary-yellow focus:border-transparent outline-none transition" placeholder="Min. 12 caractères">
                            </div>
                            <div>
                                <label for="new_password_confirmation" class="block text-xs font-bold text-gray-700 uppercase tracking-wider">Confirmer le nouveau</label>
                                <input type="password" id="new_password_confirmation" name="new_password_confirmation" required class="w-full mt-1.5 px-3 py-2.5 border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-secondary-yellow focus:border-transparent outline-none transition">
                            </div>
                        </div>
                        <button type="submit" class="w-full py-3 bg-primary-blue hover:bg-secondary-yellow text-white hover:text-primary-blue font-bold rounded-xl transition duration-300 text-sm shadow-md">
                            Mettre à jour le mot de passe
                        </button>
                    </form>
                </div>
            </div>
        
        </div>
    </div>
</div>
@endsection
