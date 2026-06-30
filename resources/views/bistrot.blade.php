@extends('layouts.app')

@section('title', 'Bistrot Bouchemaine | Notre Concept & Histoire - Pointe ça Pointe')
@section('description', 'Découvrez l\'histoire et la définition du bistrot, ce concept qui nous est si cher à Pointe ça Pointe.')

@section('content')
<section class="relative bg-white py-20 text-center overflow-hidden">
    <div class="container mx-auto max-w-7xl px-4 relative z-20">
        <h1 class="text-5xl md:text-7xl font-bold text-primary-blue" data-aos="fade-up">Notre définition du Bistrot</h1>
        <p class="mt-4 text-xl text-gray-600" data-aos="fade-up" data-aos-delay="200">
            L'histoire derrière le concept qui nous est si cher.
        </p>
    </div>
    <div class="wave-container">
        <div class="wave top-wave-blue wave-animation"></div>
    </div>
</section>

<section class="bg-primary-blue text-white py-20">
    <div class="container mx-auto max-w-7xl px-4 relative z-20">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-12 items-center">
        <div class="md:col-span-1 lg:col-span-1" data-aos="fade-right">
            <img src="{{ asset('img/galerie/DSC06121.jpg') }}" alt="Ambiance bistrot chaleureuse" class="rounded-xl shadow-lg w-full h-auto object-cover border-4 border-secondary-yellow" width="1600" height="1067" loading="lazy" decoding="async">
        </div>
        <div class="md:col-span-1 lg:col-span-2" data-aos="fade-left" data-aos-delay="100">
            <h2 class="text-4xl md:text-5xl font-bold text-secondary-yellow mb-6">Mais alors d'où vient le mot <br> « Bistrot » ?</h2>
            <p class="text-lg mb-4">
            Le terme « bistrot » trouve ses racines dans l'histoire parisienne du 19e siècle. 
            Le mot vient du russe « Быстро » (bystro), qui signifie « vite ». 
            Selon la légende, pendant l'occupation de Paris par les troupes russes en 1814, 
            les soldats demandaient des repas rapides dans les tavernes parisiennes en criant « bistrot ! ». 
            Ce cri aurait ensuite été repris par les taverniers pour désigner leurs établissements.
            </p>
        </div>
        </div>

        <!-- Section Les Premiers Bistrots -->
        <div class="mt-20" data-aos="fade-up">
        <h2 class="text-3xl md:text-4xl font-bold text-secondary-yellow mb-6">Les Premiers Bistrots</h2>
        <p class="text-lg text-white mb-4">
            Les premiers bistrots étaient de petits établissements, souvent ouverts par des restaurateurs locaux, 
            qui offraient des repas simples et abordables aux ouvriers et aux passants. 
            Ces lieux se distinguaient par une atmosphère décontractée, une décoration minimale, 
            et un menu mettant en avant des plats traditionnels français préparés avec des ingrédients locaux. 
            Ils se différenciaient des restaurants plus sophistiqués par leur accessibilité et leur ambiance informelle.
        </p>
        </div>

        <!-- Section Caractéristiques -->
        <div class="mt-20">
        <h2 class="text-4xl md:text-5xl font-bold text-center text-secondary-yellow mb-12" data-aos="fade-up">Les Caractéristiques du Bistrot</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-primary-blue" data-aos="fade-up" data-aos-delay="200">
            
            <!-- Décor et ambiance -->
            <div class="bg-white p-8 rounded-xl shadow-lg h-full">
            <h3 class="text-2xl font-bold mb-4 text-primary-blue">Décor et Ambiance</h3>
            <p class="text-gray-700 mb-4">
                Les bistrots traditionnels présentent souvent un décor simple et fonctionnel. 
                On y trouve des tables en bois massif, des chaises en métal ou en bois, et un comptoir en zinc ou en marbre. 
                Les murs sont parfois ornés de photographies anciennes, d'affiches vintage et de tableaux représentant des scènes de la vie quotidienne. 
            </p>
            <p class="text-gray-700">
                Cette simplicité contribue à une atmosphère chaleureuse et décontractée, 
                ce qui les différencie des restaurants plus sophistiqués.
            </p>
            </div>

            <!-- Cuisine -->
            <div class="bg-white p-8 rounded-xl shadow-lg h-full">
            <h3 class="text-2xl font-bold mb-4 text-primary-blue">Cuisine Traditionnelle et Menu</h3>
            <p class="text-gray-700 mb-4">
                Le menu des bistrots est généralement axé sur une cuisine française traditionnelle, simple mais savoureuse. 
                Ils mettent en avant des spécialités régionales, des plats faits maison et des ingrédients locaux.
            </p>
            <p class="text-gray-700">
                Les repas incluent des soupes, des ragoûts, des viandes grillées, et des desserts classiques comme les tartes aux fruits et les crèmes brûlées. 
                On y retrouve aussi une belle sélection de vins et de boissons à des prix abordables.
            </p>
            </div>

            <!-- Service -->
            <div class="bg-white p-8 rounded-xl shadow-lg h-full">
            <h3 class="text-2xl font-bold mb-4 text-primary-blue">Service et Clientèle</h3>
            <p class="text-gray-700 mb-4">
                Le service est souvent informel et convivial. 
                Les serveurs connaissent bien les habitués, créant ainsi une atmosphère de communauté et de convivialité.
            </p>
            <p class="text-gray-700">
                Les bistrots attirent une clientèle variée : travailleurs, familles, touristes ou étudiants. 
                Cette diversité contribue à l'ambiance animée et cosmopolite qui fait leur charme.
            </p>
            </div>

        </div>
        </div>
    </div>
    </section>

    <!-- Résumé -->
    <section class="bg-white text-primary-blue py-20 relative">
    <div class="container mx-auto max-w-7xl px-4 relative z-20">
        <div class="mt-20 text-center" data-aos="fade-up" data-aos-delay="300">
        <h2 class="text-4xl md:text-5xl font-bold text-accent-gold mb-6">En résumé, c'est ça un Bistrot !</h2>
        <p class="text-xl font-bold mb-4">
            Une cuisine savoureuse au sein d'une ambiance décontractée. 
            À l'origine, un bistrot constituait le lieu de prédilection des classes populaires 
            qui venaient s'y détendre après une journée de travail.
        </p>
        <p class="text-xl">
            Dans le monde de la gastronomie, le terme « bistrot » désigne un petit restaurant de cuisine de qualité, 
            généralement servi par ses propriétaires.
        </p>
        </div>
    </div>
    <div class="wave-container">
        <div class="wave top-wave-blue"></div>
    </div>
    </section>
@endsection