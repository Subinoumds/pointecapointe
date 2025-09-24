@extends('layouts.app')

@section('title', 'Pointe ça Pointe - Menus de groupe à Bouchemaine')
@section('description', 'Découvrez nos menus de groupe au Pointe ça Pointe, votre bistrot sur les bords de Loire à Bouchemaine.')

@section('content')
<div class="min-h-screen bg-gray-100 pt-20">
    <div class="container mx-auto max-w-7xl px-4 py-20">
        <h1 class="text-4xl md:text-5xl font-bold text-center mb-16 text-primary-blue">Menus de groupe</h1>
        
        <div class="text-center">
            <p class="text-xl text-gray-600 mb-8">Page en cours de développement...</p>
            <a href="{{ route('home') }}" class="px-8 py-4 bg-primary-blue text-white font-semibold rounded-full shadow-lg hover:bg-secondary-yellow hover:text-primary-blue transition duration-300">
                Retour à l'accueil
            </a>
        </div>
    </div>
</div>
@endsection
