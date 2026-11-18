@extends('layouts.app')

@section('title', 'Mentions Légales | Restaurant Bistrot Pointe ça Pointe Bouchemaine')
@section('description', 'Consultez les mentions légales du site officiel de Pointe ça Pointe : éditeur du site, gérance Papa Poule, hébergement Hetzner, propriété intellectuelle et médiation.')

@section('content')
<section class="relative bg-white py-16 md:py-20 text-center overflow-hidden">
    <div class="container mx-auto max-w-7xl px-4 relative z-20">
        <h1 class="text-4xl md:text-6xl font-bold text-primary-blue" data-aos="fade-up">Mentions Légales</h1>
        <p class="mt-4 text-lg md:text-xl text-gray-600 max-w-3xl mx-auto" data-aos="fade-up" data-aos-delay="150">
            Informations légales, identification de l'éditeur et conditions générales d'utilisation du site de Pointe ça Pointe.
        </p>
    </div>
    <div class="wave-container">
        <div class="wave top-wave-blue wave-animation"></div>
    </div>
</section>

<section class="bg-primary-blue text-white py-16">
    <div class="container mx-auto max-w-5xl px-4 relative z-20">
        
        <!-- Sommaire rapide -->
        <nav aria-label="Sommaire des mentions légales" class="bg-white/10 backdrop-blur-sm border border-white/20 rounded-2xl p-6 mb-12" data-aos="fade-up">
            <h2 class="text-xl font-bold text-secondary-yellow mb-4 flex items-center gap-2">
                <i data-feather="list" class="w-5 h-5 text-secondary-yellow" aria-hidden="true"></i>
                Sommaire des mentions légales
            </h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 text-sm md:text-base text-gray-200">
                <a href="#editeur" class="hover:text-secondary-yellow transition-colors flex items-center gap-2">
                    <span class="text-secondary-yellow font-bold">1.</span> Éditeur du site & Exploitation
                </a>
                <a href="#hebergement" class="hover:text-secondary-yellow transition-colors flex items-center gap-2">
                    <span class="text-secondary-yellow font-bold">2.</span> Hébergement du site
                </a>
                <a href="#conception" class="hover:text-secondary-yellow transition-colors flex items-center gap-2">
                    <span class="text-secondary-yellow font-bold">3.</span> Conception & Réalisation
                </a>
                <a href="#propriete" class="hover:text-secondary-yellow transition-colors flex items-center gap-2">
                    <span class="text-secondary-yellow font-bold">4.</span> Propriété intellectuelle
                </a>
                <a href="#responsabilite" class="hover:text-secondary-yellow transition-colors flex items-center gap-2">
                    <span class="text-secondary-yellow font-bold">5.</span> Responsabilité & Tarifs
                </a>
                <a href="#liens" class="hover:text-secondary-yellow transition-colors flex items-center gap-2">
                    <span class="text-secondary-yellow font-bold">6.</span> Liens hypertextes
                </a>
                <a href="#mediation" class="hover:text-secondary-yellow transition-colors flex items-center gap-2">
                    <span class="text-secondary-yellow font-bold">7.</span> Médiation & Règlement des litiges
                </a>
                <a href="#droit" class="hover:text-secondary-yellow transition-colors flex items-center gap-2">
                    <span class="text-secondary-yellow font-bold">8.</span> Droit applicable
                </a>
            </div>
        </nav>

        <div class="space-y-8 text-primary-blue">
            
            <!-- 1. Éditeur -->
            <article id="editeur" class="bg-white p-8 md:p-10 rounded-2xl shadow-xl scroll-mt-24" data-aos="fade-up">
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-12 h-12 rounded-xl bg-primary-blue/10 flex items-center justify-center flex-shrink-0 text-primary-blue">
                        <i data-feather="briefcase" class="w-6 h-6" aria-hidden="true"></i>
                    </div>
                    <div>
                        <span class="text-sm uppercase tracking-wider font-bold text-accent-gold">Article 1</span>
                        <h2 class="text-2xl md:text-3xl font-bold text-primary-blue">Éditeur du Site & Exploitation</h2>
                    </div>
                </div>
                
                <p class="text-gray-700 leading-relaxed mb-6">
                    En vertu de l'article 6 de la loi n° 2004-575 du 21 juin 2004 pour la confiance dans l'économie numérique (LCEN), il est précisé aux utilisateurs du site <strong>pointe-ca-pointe.fr</strong> l'identité des différents intervenants dans le cadre de sa réalisation et de son suivi :
                </p>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 bg-gray-50 p-6 rounded-xl border border-gray-200">
                    <div>
                        <p class="text-xs uppercase font-bold text-gray-500">Nom commercial</p>
                        <p class="font-bold text-primary-blue text-lg">Pointe ça Pointe</p>
                    </div>
                    <div>
                        <p class="text-xs uppercase font-bold text-gray-500">Raison sociale / Entité</p>
                        <p class="font-bold text-primary-blue text-lg">Exploitation sous la gérance « Papa Poule »</p>
                    </div>
                    <div>
                        <p class="text-xs uppercase font-bold text-gray-500">Adresse de l'établissement</p>
                        <p class="text-gray-800">4 Place Ruzebouc, 49080 Bouchemaine, France</p>
                    </div>
                    <div>
                        <p class="text-xs uppercase font-bold text-gray-500">Registre du Commerce</p>
                        <p class="text-gray-800">Immatriculé au RCS d'Angers</p>
                    </div>
                    <div>
                        <p class="text-xs uppercase font-bold text-gray-500">Téléphone</p>
                        <p class="text-gray-800"><a href="tel:+33244855536" class="hover:text-primary-blue font-semibold underline">+33 2 44 85 55 36</a></p>
                    </div>
                    <div>
                        <p class="text-xs uppercase font-bold text-gray-500">Adresse email</p>
                        <p class="text-gray-800"><a href="mailto:direction.papapoule@gmail.com" class="hover:text-primary-blue font-semibold underline">direction.papapoule@gmail.com</a></p>
                    </div>
                    <div>
                        <p class="text-xs uppercase font-bold text-gray-500">Directeur de la publication</p>
                        <p class="text-gray-800">La Gérance de l'établissement</p>
                    </div>
                    <div>
                        <p class="text-xs uppercase font-bold text-gray-500">TVA Intracommunautaire</p>
                        <p class="text-gray-800">Assujetti à la TVA française</p>
                    </div>
                </div>
            </article>

            <!-- 2. Hébergement -->
            <article id="hebergement" class="bg-white p-8 md:p-10 rounded-2xl shadow-xl scroll-mt-24" data-aos="fade-up">
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-12 h-12 rounded-xl bg-primary-blue/10 flex items-center justify-center flex-shrink-0 text-primary-blue">
                        <i data-feather="server" class="w-6 h-6" aria-hidden="true"></i>
                    </div>
                    <div>
                        <span class="text-sm uppercase tracking-wider font-bold text-accent-gold">Article 2</span>
                        <h2 class="text-2xl md:text-3xl font-bold text-primary-blue">Hébergement du Site</h2>
                    </div>
                </div>

                <p class="text-gray-700 leading-relaxed mb-6">
                    Le site internet <strong>https://pointe-ca-pointe.fr</strong> est hébergé par une infrastructure serveurs haute disponibilité localisée au sein de l'Union Européenne :
                </p>

                <div class="bg-gray-50 p-6 rounded-xl border border-gray-200 space-y-2">
                    <p class="text-lg font-bold text-primary-blue">Hetzner Online GmbH</p>
                    <p class="text-gray-700"><strong>Adresse postale :</strong> Industriestr. 25, 91710 Gunzenhausen, Allemagne</p>
                    <p class="text-gray-700"><strong>Téléphone :</strong> +49 (0)9831 505-0</p>
                    <p class="text-gray-700"><strong>Site internet :</strong> <a href="https://www.hetzner.com" target="_blank" rel="noopener noreferrer" class="text-primary-blue font-semibold underline">www.hetzner.com</a></p>
                    <p class="text-gray-700"><strong>Centre de données :</strong> Union Européenne (Allemagne), répondant aux normes ISO 27001 de sécurité physique et logique des données.</p>
                </div>
            </article>

            <!-- 3. Conception -->
            <article id="conception" class="bg-white p-8 md:p-10 rounded-2xl shadow-xl scroll-mt-24" data-aos="fade-up">
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-12 h-12 rounded-xl bg-primary-blue/10 flex items-center justify-center flex-shrink-0 text-primary-blue">
                        <i data-feather="code" class="w-6 h-6" aria-hidden="true"></i>
                    </div>
                    <div>
                        <span class="text-sm uppercase tracking-wider font-bold text-accent-gold">Article 3</span>
                        <h2 class="text-2xl md:text-3xl font-bold text-primary-blue">Conception, Développement & Webmastering</h2>
                    </div>
                </div>

                <p class="text-gray-700 leading-relaxed mb-4">
                    La conception, l'architecture applicative full-stack, le développement technique et l'optimisation des performances du site ont été réalisés par :
                </p>

                <div class="bg-gray-50 p-6 rounded-xl border border-gray-200">
                    <p class="text-lg font-bold text-primary-blue">Khadidja Masri</p>
                    <p class="text-gray-700">Développeuse Fullstack Web & Mobile</p>
                    <p class="text-gray-700 mt-2">
                        <strong>Site web :</strong> 
                        <a href="https://khadidja-masri.fr" target="_blank" rel="noopener noreferrer" class="text-primary-blue font-semibold underline">
                            https://khadidja-masri.fr
                        </a>
                    </p>
                </div>
            </article>

            <!-- 4. Propriété intellectuelle -->
            <article id="propriete" class="bg-white p-8 md:p-10 rounded-2xl shadow-xl scroll-mt-24" data-aos="fade-up">
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-12 h-12 rounded-xl bg-primary-blue/10 flex items-center justify-center flex-shrink-0 text-primary-blue">
                        <i data-feather="shield" class="w-6 h-6" aria-hidden="true"></i>
                    </div>
                    <div>
                        <span class="text-sm uppercase tracking-wider font-bold text-accent-gold">Article 4</span>
                        <h2 class="text-2xl md:text-3xl font-bold text-primary-blue">Propriété Intellectuelle & Droits d'Auteur</h2>
                    </div>
                </div>

                <div class="text-gray-700 leading-relaxed space-y-4">
                    <p>
                        L'ensemble des éléments constituant le site <strong>pointe-ca-pointe.fr</strong> (notamment, mais non limitativement : l'architecture globale, les textes, photographies, vidéos, cartes, menus, logos, icônes, illustrations graphiques, charte graphique, sons, bases de données ainsi que les développements logiciels) est protégé par les dispositions du Code de la Propriété Intellectuelle et par les traités internationaux relatifs aux droits d'auteur.
                    </p>
                    <p>
                        Ces éléments sont la propriété exclusive de l'établissement <strong>Pointe ça Pointe / Papa Poule</strong> ou de tiers ayant consenti une licence d'utilisation.
                    </p>
                    <p>
                        Toute reproduction, représentation, diffusion, adaptation, modification, traduction ou exploitation commerciale, intégrale ou partielle, de l'un quelconque de ces éléments, par quelque moyen ou procédé que ce soit, sans l'accord exprès, préalable et écrit de l'exploitant, est formellement interdite et constitue une contrefaçon sanctionnée par les articles L. 335-2 et suivants du Code de la propriété intellectuelle.
                    </p>
                    <p class="bg-light-blue/40 p-4 rounded-lg border-l-4 border-primary-blue text-sm text-gray-800">
                        <strong>Crédits photographiques :</strong> Photographies d'illustration des plats, de la terrasse, des bords de Loire et des événements capturées et produites pour le restaurant Pointe ça Pointe. Tous droits réservés.
                    </p>
                </div>
            </article>

            <!-- 5. Responsabilité -->
            <article id="responsabilite" class="bg-white p-8 md:p-10 rounded-2xl shadow-xl scroll-mt-24" data-aos="fade-up">
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-12 h-12 rounded-xl bg-primary-blue/10 flex items-center justify-center flex-shrink-0 text-primary-blue">
                        <i data-feather="alert-circle" class="w-6 h-6" aria-hidden="true"></i>
                    </div>
                    <div>
                        <span class="text-sm uppercase tracking-wider font-bold text-accent-gold">Article 5</span>
                        <h2 class="text-2xl md:text-3xl font-bold text-primary-blue">Limite de Responsabilité & Tarifs</h2>
                    </div>
                </div>

                <div class="text-gray-700 leading-relaxed space-y-4">
                    <p>
                        Les informations présentées sur le site (horaires d'ouverture, cartes des plats et des vins, suggestions du chef, événements et formules) sont fournies à titre indicatif et sont susceptibles d'évoluer à tout moment selon les saisons, la disponibilité des produits frais du marché et les nécessités d'exploitation.
                    </p>
                    <p>
                        Bien que nous apportions le plus grand soin à l'exactitude des contenus, des erreurs ou omissions involontaires peuvent survenir. Seuls les tarifs et indications affichés directement au sein de l'établissement lors de votre visite font foi.
                    </p>
                    <p>
                        Pointe ça Pointe ne pourra être tenue responsable des dommages directs ou indirects causés au matériel de l'utilisateur lors de l'accès au site, résultant soit de l'utilisation d'un matériel ne répondant pas aux spécifications requises, soit de l'apparition d'un bogue ou d'une incompatibilité.
                    </p>
                </div>
            </article>

            <!-- 6. Liens -->
            <article id="liens" class="bg-white p-8 md:p-10 rounded-2xl shadow-xl scroll-mt-24" data-aos="fade-up">
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-12 h-12 rounded-xl bg-primary-blue/10 flex items-center justify-center flex-shrink-0 text-primary-blue">
                        <i data-feather="link" class="w-6 h-6" aria-hidden="true"></i>
                    </div>
                    <div>
                        <span class="text-sm uppercase tracking-wider font-bold text-accent-gold">Article 6</span>
                        <h2 class="text-2xl md:text-3xl font-bold text-primary-blue">Liens Hypertextes</h2>
                    </div>
                </div>

                <div class="text-gray-700 leading-relaxed space-y-4">
                    <p>
                        Le site peut contenir des liens vers des sites ou plateformes externes (réseaux sociaux tels que Facebook et Instagram, services de cartographie Google Maps, etc.). Ces liens sont proposés pour le confort des visiteurs. L'établissement n'exerce aucun contrôle permanent sur le contenu de ces sites tiers et décline toute responsabilité quant à leurs informations ou pratiques.
                    </p>
                    <p>
                        La création de liens hypertextes vers la page d'accueil ou les pages internes du site <strong>pointe-ca-pointe.fr</strong> est autorisée sous réserve qu'elle ne porte pas atteinte à l'image, aux intérêts légitimes ou à la réputation de l'établissement.
                    </p>
                </div>
            </article>

            <!-- 7. Médiation -->
            <article id="mediation" class="bg-white p-8 md:p-10 rounded-2xl shadow-xl scroll-mt-24" data-aos="fade-up">
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-12 h-12 rounded-xl bg-primary-blue/10 flex items-center justify-center flex-shrink-0 text-primary-blue">
                        <i data-feather="check-circle" class="w-6 h-6" aria-hidden="true"></i>
                    </div>
                    <div>
                        <span class="text-sm uppercase tracking-wider font-bold text-accent-gold">Article 7</span>
                        <h2 class="text-2xl md:text-3xl font-bold text-primary-blue">Médiation de la Consommation & Règlement des Litiges</h2>
                    </div>
                </div>

                <div class="text-gray-700 leading-relaxed space-y-4">
                    <p>
                        Conformément aux articles L.616-1 et R.616-1 du Code de la consommation, en cas de litige entre le consommateur et notre établissement, nous nous efforçons toujours de trouver une issue amiable et constructive.
                    </p>
                    <p>
                        Si aucune solution satisfaisante n'est trouvée suite à une réclamation écrite adressée à notre service par email (<a href="mailto:direction.papapoule@gmail.com" class="text-primary-blue underline font-semibold">direction.papapoule@gmail.com</a>) ou par courrier postal, le consommateur a la possibilité de recourir gratuitement au dispositif de médiation de la consommation :
                    </p>
                    <div class="bg-gray-50 p-6 rounded-xl border border-gray-200">
                        <p class="font-bold text-primary-blue">Médiation du Tourisme et du Voyage (MTV)</p>
                        <p class="text-gray-700">BP 80303 - 75823 Paris Cedex 17</p>
                        <p class="text-gray-700">Site internet : <a href="https://www.mtv.travel" target="_blank" rel="noopener noreferrer" class="text-primary-blue underline font-semibold">www.mtv.travel</a></p>
                    </div>
                    <p>
                        Vous pouvez également consulter la plateforme européenne de règlement en ligne des litiges (RLL) mise à disposition par la Commission européenne à l'adresse suivante : 
                        <a href="https://ec.europa.eu/consumers/odr" target="_blank" rel="noopener noreferrer" class="text-primary-blue underline font-semibold">
                            https://ec.europa.eu/consumers/odr
                        </a>.
                    </p>
                </div>
            </article>

            <!-- 8. Droit applicable -->
            <article id="droit" class="bg-white p-8 md:p-10 rounded-2xl shadow-xl scroll-mt-24" data-aos="fade-up">
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-12 h-12 rounded-xl bg-primary-blue/10 flex items-center justify-center flex-shrink-0 text-primary-blue">
                        <i data-feather="compass" class="w-6 h-6" aria-hidden="true"></i>
                    </div>
                    <div>
                        <span class="text-sm uppercase tracking-wider font-bold text-accent-gold">Article 8</span>
                        <h2 class="text-2xl md:text-3xl font-bold text-primary-blue">Droit Applicable & Juridiction Compétente</h2>
                    </div>
                </div>

                <p class="text-gray-700 leading-relaxed">
                    Le présent site internet et ses mentions légales sont soumis au droit français. En cas de contestation ou de litige qui ne pourrait être résolu à l'amiable, attribution exclusive de compétence est accordée aux tribunaux compétents du ressort de la Cour d'appel d'Angers (Maine-et-Loire).
                </p>
            </article>

        </div>

        <!-- Bouton retour -->
        <div class="mt-12 text-center" data-aos="fade-up">
            <a href="{{ route('home') }}" class="inline-flex items-center gap-2 bg-secondary-yellow text-primary-blue font-bold px-8 py-4 rounded-xl shadow-lg hover:bg-yellow-400 hover:scale-105 transition-all duration-300">
                <i data-feather="arrow-left" class="w-5 h-5" aria-hidden="true"></i>
                Retour à l'accueil
            </a>
        </div>

    </div>
</section>
@endsection
