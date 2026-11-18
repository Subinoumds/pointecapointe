@extends('layouts.app')

@section('title', 'Politique de Confidentialité & RGPD | Restaurant Pointe ça Pointe Bouchemaine')
@section('description', 'Découvrez la politique de confidentialité et de protection des données personnelles (RGPD) du bistrot Pointe ça Pointe à Bouchemaine.')

@section('content')
<section class="relative bg-white py-16 md:py-20 text-center overflow-hidden">
    <div class="container mx-auto max-w-7xl px-4 relative z-20">
        <h1 class="text-4xl md:text-6xl font-bold text-primary-blue" data-aos="fade-up">Politique de Confidentialité</h1>
        <p class="mt-4 text-lg md:text-xl text-gray-600 max-w-3xl mx-auto" data-aos="fade-up" data-aos-delay="150">
            Protection de vos données personnelles et respect de votre vie privée conformément au RGPD.
        </p>
    </div>
    <div class="wave-container">
        <div class="wave top-wave-blue wave-animation"></div>
    </div>
</section>

<section class="bg-primary-blue text-white py-16">
    <div class="container mx-auto max-w-5xl px-4 relative z-20">
        
        <!-- Sommaire rapide -->
        <nav aria-label="Sommaire de la politique de confidentialité" class="bg-white/10 backdrop-blur-sm border border-white/20 rounded-2xl p-6 mb-12" data-aos="fade-up">
            <h2 class="text-xl font-bold text-secondary-yellow mb-4 flex items-center gap-2">
                <i data-feather="list" class="w-5 h-5 text-secondary-yellow" aria-hidden="true"></i>
                Sommaire de la politique
            </h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 text-sm md:text-base text-gray-200">
                <a href="#engagement" class="hover:text-secondary-yellow transition-colors flex items-center gap-2">
                    <span class="text-secondary-yellow font-bold">1.</span> Engagement de transparence
                </a>
                <a href="#responsable" class="hover:text-secondary-yellow transition-colors flex items-center gap-2">
                    <span class="text-secondary-yellow font-bold">2.</span> Responsable du traitement
                </a>
                <a href="#donnees" class="hover:text-secondary-yellow transition-colors flex items-center gap-2">
                    <span class="text-secondary-yellow font-bold">3.</span> Données collectées
                </a>
                <a href="#finalites" class="hover:text-secondary-yellow transition-colors flex items-center gap-2">
                    <span class="text-secondary-yellow font-bold">4.</span> Finalités & Bases légales
                </a>
                <a href="#conservation" class="hover:text-secondary-yellow transition-colors flex items-center gap-2">
                    <span class="text-secondary-yellow font-bold">5.</span> Durée de conservation
                </a>
                <a href="#destinataires" class="hover:text-secondary-yellow transition-colors flex items-center gap-2">
                    <span class="text-secondary-yellow font-bold">6.</span> Destinataires des données
                </a>
                <a href="#droits" class="hover:text-secondary-yellow transition-colors flex items-center gap-2">
                    <span class="text-secondary-yellow font-bold">7.</span> Vos droits RGPD & Recours CNIL
                </a>
                <a href="#securite" class="hover:text-secondary-yellow transition-colors flex items-center gap-2">
                    <span class="text-secondary-yellow font-bold">8.</span> Sécurité & Chiffrement
                </a>
                <a href="#cookies" class="hover:text-secondary-yellow transition-colors flex items-center gap-2">
                    <span class="text-secondary-yellow font-bold">9.</span> Cookies & Traceurs
                </a>
                <a href="#contact-dpo" class="hover:text-secondary-yellow transition-colors flex items-center gap-2">
                    <span class="text-secondary-yellow font-bold">10.</span> Nous contacter
                </a>
            </div>
        </nav>

        <div class="space-y-8 text-primary-blue">
            
            <!-- 1. Engagement -->
            <article id="engagement" class="bg-white p-8 md:p-10 rounded-2xl shadow-xl scroll-mt-24" data-aos="fade-up">
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-12 h-12 rounded-xl bg-primary-blue/10 flex items-center justify-center flex-shrink-0 text-primary-blue">
                        <i data-feather="shield" class="w-6 h-6" aria-hidden="true"></i>
                    </div>
                    <div>
                        <span class="text-sm uppercase tracking-wider font-bold text-accent-gold">Section 1</span>
                        <h2 class="text-2xl md:text-3xl font-bold text-primary-blue">Engagement de Confidentialité & Cadre Légal</h2>
                    </div>
                </div>

                <div class="text-gray-700 leading-relaxed space-y-4">
                    <p>
                        L'établissement <strong>Pointe ça Pointe</strong> (exploité par « Papa Poule ») accorde une importance primordiale au respect de votre vie privée et à la sécurité de vos données personnelles.
                    </p>
                    <p>
                        La présente Politique de Confidentialité a pour objet de vous informer avec clarté et transparence sur la manière dont nous collectons, traitons, conservons et protégeons vos données à caractère personnel lors de votre navigation sur notre site internet <strong>https://pointe-ca-pointe.fr</strong>, conformément aux dispositions du :
                    </p>
                    <ul class="list-disc list-inside space-y-1 text-gray-800 font-medium pl-2">
                        <li><strong>Règlement Général sur la Protection des Données (RGPD)</strong> n° 2016/679 du Parlement européen et du Conseil du 27 avril 2016 ;</li>
                        <li>De la <strong>Loi n° 78-17 du 6 janvier 1978 modifiée</strong>, dite « Informatique et Libertés ».</li>
                    </ul>
                </div>
            </article>

            <!-- 2. Responsable -->
            <article id="responsable" class="bg-white p-8 md:p-10 rounded-2xl shadow-xl scroll-mt-24" data-aos="fade-up">
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-12 h-12 rounded-xl bg-primary-blue/10 flex items-center justify-center flex-shrink-0 text-primary-blue">
                        <i data-feather="user-check" class="w-6 h-6" aria-hidden="true"></i>
                    </div>
                    <div>
                        <span class="text-sm uppercase tracking-wider font-bold text-accent-gold">Section 2</span>
                        <h2 class="text-2xl md:text-3xl font-bold text-primary-blue">Responsable du Traitement des Données</h2>
                    </div>
                </div>

                <p class="text-gray-700 leading-relaxed mb-6">
                    Le responsable du traitement de vos données personnelles est l'entité exploitant le bistrot Pointe ça Pointe :
                </p>

                <div class="bg-gray-50 p-6 rounded-xl border border-gray-200 space-y-2">
                    <p class="text-lg font-bold text-primary-blue">Pointe ça Pointe (Gérance Papa Poule)</p>
                    <p class="text-gray-700"><strong>Adresse :</strong> 4 Place Ruzebouc, 49080 Bouchemaine, France</p>
                    <p class="text-gray-700"><strong>Téléphone :</strong> +33 2 44 85 55 36</p>
                    <p class="text-gray-700"><strong>Email dédié à la protection des données :</strong> <a href="mailto:direction.papapoule@gmail.com" class="text-primary-blue font-semibold underline">direction.papapoule@gmail.com</a></p>
                </div>
            </article>

            <!-- 3. Données collectées -->
            <article id="donnees" class="bg-white p-8 md:p-10 rounded-2xl shadow-xl scroll-mt-24" data-aos="fade-up">
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-12 h-12 rounded-xl bg-primary-blue/10 flex items-center justify-center flex-shrink-0 text-primary-blue">
                        <i data-feather="database" class="w-6 h-6" aria-hidden="true"></i>
                    </div>
                    <div>
                        <span class="text-sm uppercase tracking-wider font-bold text-accent-gold">Section 3</span>
                        <h2 class="text-2xl md:text-3xl font-bold text-primary-blue">Données Personnelles Collectées</h2>
                    </div>
                </div>

                <p class="text-gray-700 leading-relaxed mb-4">
                    Conformément au principe de <em>minimisation des données</em> (Article 5 du RGPD), nous ne collectons que les informations strictement nécessaires à la finalité envisagée :
                </p>

                <div class="space-y-4">
                    <div class="p-5 rounded-xl bg-gray-50 border border-gray-200">
                        <h3 class="text-lg font-bold text-primary-blue mb-2 flex items-center gap-2">
                            <i data-feather="mail" class="w-5 h-5 text-secondary-yellow" aria-hidden="true"></i>
                            1. Formulaires de contact et renseignements généraux
                        </h3>
                        <p class="text-gray-700 text-sm leading-relaxed">
                            Nom, prénom, adresse électronique, numéro de téléphone, et le texte libre de votre demande d'information.
                        </p>
                    </div>

                    <div class="p-5 rounded-xl bg-gray-50 border border-gray-200">
                        <h3 class="text-lg font-bold text-primary-blue mb-2 flex items-center gap-2">
                            <i data-feather="users" class="w-5 h-5 text-secondary-yellow" aria-hidden="true"></i>
                            2. Demandes de réservation de groupe & Privatisation
                        </h3>
                        <p class="text-gray-700 text-sm leading-relaxed">
                            Nom de l'organisateur ou de l'entreprise, coordonnées de contact (téléphone, email), date et créneau souhaités, nombre d'invités estimé, choix des menus/formules, et éventuelles indications spécifiques (ex. allergies alimentaires ou contraintes transmises volontairement).
                        </p>
                    </div>

                    <div class="p-5 rounded-xl bg-gray-50 border border-gray-200">
                        <h3 class="text-lg font-bold text-primary-blue mb-2 flex items-center gap-2">
                            <i data-feather="cpu" class="w-5 h-5 text-secondary-yellow" aria-hidden="true"></i>
                            3. Données techniques de navigation et sécurité
                        </h3>
                        <p class="text-gray-700 text-sm leading-relaxed">
                            Horodatage des requêtes, adresse IP (utilisée à des fins de sécurité et de blocage d'attaques par force brute), système d'exploitation et agent utilisateur du navigateur.
                        </p>
                    </div>
                </div>
            </article>

            <!-- 4. Finalités & Bases légales -->
            <article id="finalites" class="bg-white p-8 md:p-10 rounded-2xl shadow-xl scroll-mt-24" data-aos="fade-up">
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-12 h-12 rounded-xl bg-primary-blue/10 flex items-center justify-center flex-shrink-0 text-primary-blue">
                        <i data-feather="check-square" class="w-6 h-6" aria-hidden="true"></i>
                    </div>
                    <div>
                        <span class="text-sm uppercase tracking-wider font-bold text-accent-gold">Section 4</span>
                        <h2 class="text-2xl md:text-3xl font-bold text-primary-blue">Finalités du Traitement & Bases Légales</h2>
                    </div>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left text-sm border-collapse">
                        <thead>
                            <tr class="bg-primary-blue text-white">
                                <th class="p-4 rounded-tl-lg">Finalité du traitement</th>
                                <th class="p-4">Données concernées</th>
                                <th class="p-4 rounded-tr-lg">Base légale (RGPD)</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 text-gray-700">
                            <tr class="hover:bg-gray-50">
                                <td class="p-4 font-semibold text-primary-blue">Réponse aux demandes de contact</td>
                                <td class="p-4">Identité, téléphone, email, message</td>
                                <td class="p-4">Intérêt légitime / Démarche précontractuelle (Art. 6.1.b)</td>
                            </tr>
                            <tr class="hover:bg-gray-50">
                                <td class="p-4 font-semibold text-primary-blue">Gestion des réservations de groupe & devis</td>
                                <td class="p-4">Coordonnées, date, nombre de couverts, formule</td>
                                <td class="p-4">Exécution contractuelle ou précontractuelle (Art. 6.1.b)</td>
                            </tr>
                            <tr class="hover:bg-gray-50">
                                <td class="p-4 font-semibold text-primary-blue">Sécurité du site & prévention des cyberattaques</td>
                                <td class="p-4">Logs serveur, adresse IP, tentatives d'accès</td>
                                <td class="p-4">Intérêt légitime à protéger l'infrastructure (Art. 6.1.f)</td>
                            </tr>
                            <tr class="hover:bg-gray-50">
                                <td class="p-4 font-semibold text-primary-blue">Obligations comptables et légales</td>
                                <td class="p-4">Factures, éléments de paiement</td>
                                <td class="p-4">Obligation légale (Art. 6.1.c)</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </article>

            <!-- 5. Conservation -->
            <article id="conservation" class="bg-white p-8 md:p-10 rounded-2xl shadow-xl scroll-mt-24" data-aos="fade-up">
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-12 h-12 rounded-xl bg-primary-blue/10 flex items-center justify-center flex-shrink-0 text-primary-blue">
                        <i data-feather="clock" class="w-6 h-6" aria-hidden="true"></i>
                    </div>
                    <div>
                        <span class="text-sm uppercase tracking-wider font-bold text-accent-gold">Section 5</span>
                        <h2 class="text-2xl md:text-3xl font-bold text-primary-blue">Durée de Conservation des Données</h2>
                    </div>
                </div>

                <div class="text-gray-700 leading-relaxed space-y-4">
                    <p>
                        Vos données sont conservées uniquement pendant la durée strictement nécessaire à l'accomplissement des objectifs poursuivis :
                    </p>
                    <ul class="list-disc list-inside space-y-2 text-gray-800 pl-2">
                        <li><strong>Demandes d'information & devis sans conclusion de contrat :</strong> conservées pendant une durée maximale de <strong>3 ans</strong> à compter du dernier contact émanant de votre part.</li>
                        <li><strong>Réservations effectives et prestations réalisées :</strong> conservées pendant la durée de la relation commerciale, puis archivées pour une durée de <strong>10 ans</strong> pour les pièces comptables (Code de commerce).</li>
                        <li><strong>Logs techniques de sécurité :</strong> conservés pendant une durée maximale de <strong>12 mois</strong> conformément à la réglementation française.</li>
                    </ul>
                </div>
            </article>

            <!-- 6. Destinataires -->
            <article id="destinataires" class="bg-white p-8 md:p-10 rounded-2xl shadow-xl scroll-mt-24" data-aos="fade-up">
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-12 h-12 rounded-xl bg-primary-blue/10 flex items-center justify-center flex-shrink-0 text-primary-blue">
                        <i data-feather="lock" class="w-6 h-6" aria-hidden="true"></i>
                    </div>
                    <div>
                        <span class="text-sm uppercase tracking-wider font-bold text-accent-gold">Section 6</span>
                        <h2 class="text-2xl md:text-3xl font-bold text-primary-blue">Destinataires des Données & Absence de Revente</h2>
                    </div>
                </div>

                <div class="text-gray-700 leading-relaxed space-y-4">
                    <p>
                        Les données personnelles collectées sont réservées à l'usage exclusif de la direction et du personnel habilité de <strong>Pointe ça Pointe</strong>.
                    </p>
                    <div class="p-4 rounded-xl bg-green-50 border-l-4 border-green-600 text-green-900 font-semibold text-sm">
                        🔒 Engagement formel : Nous ne vendons, ne louons, n'échangeons et ne cédons aucune donnée personnelle à des entreprises tierces ou des régies publicitaires.
                    </div>
                    <p>
                        Nos seuls sous-traitants techniques sont nos prestataires d'hébergement informatique sécurisé (Hetzner Online GmbH), localisés sur le territoire de l'Union Européenne et tenus à des obligations contractuelles strictes de sécurité et de confidentialité conformément à l'article 28 du RGPD.
                    </p>
                </div>
            </article>

            <!-- 7. Vos droits -->
            <article id="droits" class="bg-white p-8 md:p-10 rounded-2xl shadow-xl scroll-mt-24" data-aos="fade-up">
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-12 h-12 rounded-xl bg-primary-blue/10 flex items-center justify-center flex-shrink-0 text-primary-blue">
                        <i data-feather="key" class="w-6 h-6" aria-hidden="true"></i>
                    </div>
                    <div>
                        <span class="text-sm uppercase tracking-wider font-bold text-accent-gold">Section 7</span>
                        <h2 class="text-2xl md:text-3xl font-bold text-primary-blue">Vos Droits RGPD & Voies de Recours</h2>
                    </div>
                </div>

                <div class="text-gray-700 leading-relaxed space-y-4">
                    <p>
                        Conformément au Règlement Général sur la Protection des Données et à la loi Informatique et Libertés, vous disposez des droits fondamentaux suivants :
                    </p>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 my-6">
                        <div class="p-4 rounded-xl border border-gray-200 bg-gray-50">
                            <p class="font-bold text-primary-blue mb-1">Droit d'accès (Art. 15 RGPD)</p>
                            <p class="text-sm text-gray-600">Obtenir confirmation que vos données sont traitées et en obtenir une copie intégrale.</p>
                        </div>
                        <div class="p-4 rounded-xl border border-gray-200 bg-gray-50">
                            <p class="font-bold text-primary-blue mb-1">Droit de rectification (Art. 16 RGPD)</p>
                            <p class="text-sm text-gray-600">Exiger la modification de vos données personnelles si elles sont inexactes ou incomplètes.</p>
                        </div>
                        <div class="p-4 rounded-xl border border-gray-200 bg-gray-50">
                            <p class="font-bold text-primary-blue mb-1">Droit à l'effacement (Art. 17 RGPD)</p>
                            <p class="text-sm text-gray-600">Demander l'effacement de vos données (« droit à l'oubli »), dans les limites des obligations légales.</p>
                        </div>
                        <div class="p-4 rounded-xl border border-gray-200 bg-gray-50">
                            <p class="font-bold text-primary-blue mb-1">Droit d'opposition (Art. 21 RGPD)</p>
                            <p class="text-sm text-gray-600">Vous opposer à tout moment, pour des motifs légitimes, au traitement de vos données.</p>
                        </div>
                        <div class="p-4 rounded-xl border border-gray-200 bg-gray-50">
                            <p class="font-bold text-primary-blue mb-1">Droit à la limitation (Art. 18 RGPD)</p>
                            <p class="text-sm text-gray-600">Demander le gel temporaire du traitement de certaines de vos données.</p>
                        </div>
                        <div class="p-4 rounded-xl border border-gray-200 bg-gray-50">
                            <p class="font-bold text-primary-blue mb-1">Droit à la portabilité (Art. 20 RGPD)</p>
                            <p class="text-sm text-gray-600">Recevoir vos données dans un format structuré et lisible par machine.</p>
                        </div>
                    </div>

                    <div class="bg-light-blue/40 p-6 rounded-xl border-l-4 border-primary-blue">
                        <h3 class="text-lg font-bold text-primary-blue mb-2">Comment exercer vos droits ?</h3>
                        <p class="text-sm text-gray-700 leading-relaxed mb-3">
                            Pour exercer l'un de ces droits, il vous suffit de nous adresser une demande accompagnée d'une preuve d'identité :
                        </p>
                        <p class="text-sm text-gray-800">
                            📧 <strong>Par email :</strong> <a href="mailto:direction.papapoule@gmail.com" class="text-primary-blue underline font-bold">direction.papapoule@gmail.com</a>
                        </p>
                        <p class="text-sm text-gray-800 mt-1">
                            📬 <strong>Par courrier postal :</strong> Pointe ça Pointe — Délégué à la Protection des Données, 4 Place Ruzebouc, 49080 Bouchemaine, France.
                        </p>
                        <p class="text-xs text-gray-500 mt-3">
                            Une réponse vous sera apportée dans un délai légal maximum d'un (1) mois à compter de la réception de votre demande complète.
                        </p>
                    </div>

                    <div class="mt-4">
                        <h3 class="text-base font-bold text-primary-blue mb-1">Réclamation auprès de l'autorité de contrôle (CNIL)</h3>
                        <p class="text-sm text-gray-600">
                            Si vous considérez que vos droits n'ont pas été respectés après nous avoir contactés, vous avez le droit d'introduire une réclamation auprès de la <strong>CNIL</strong> (Commission Nationale de l'Informatique et des Libertés) : en ligne sur <a href="https://www.cnil.fr" target="_blank" rel="noopener noreferrer" class="text-primary-blue underline font-semibold">www.cnil.fr</a> ou par courrier (3 Place de Fontenoy - TSA 80715 - 75334 Paris Cedex 07).
                        </p>
                    </div>
                </div>
            </article>

            <!-- 8. Sécurité -->
            <article id="securite" class="bg-white p-8 md:p-10 rounded-2xl shadow-xl scroll-mt-24" data-aos="fade-up">
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-12 h-12 rounded-xl bg-primary-blue/10 flex items-center justify-center flex-shrink-0 text-primary-blue">
                        <i data-feather="shield" class="w-6 h-6" aria-hidden="true"></i>
                    </div>
                    <div>
                        <span class="text-sm uppercase tracking-wider font-bold text-accent-gold">Section 8</span>
                        <h2 class="text-2xl md:text-3xl font-bold text-primary-blue">Sécurité & Chiffrement</h2>
                    </div>
                </div>

                <div class="text-gray-700 leading-relaxed space-y-4">
                    <p>
                        Nous appliquons un ensemble de mesures techniques et d'organisation pour garantir un niveau de sécurité adapté au risque :
                    </p>
                    <ul class="list-disc list-inside space-y-2 text-gray-800 pl-2">
                        <li><strong>Chiffrement SSL/TLS :</strong> L'ensemble de la navigation et des échanges sur le site est sécurisé par le protocole <code>HTTPS</code> (certificat Let's Encrypt).</li>
                        <li><strong>Protection contre les attaques :</strong> Pare-feu applicatif, limitation des taux de requêtes (rate limiting), protection contre les failles CSRF (Cross-Site Request Forgery) et injection SQL.</li>
                        <li><strong>Habilitations strictes :</strong> Accès au back-office réservé exclusivement à l'administration du restaurant via authentification sécurisée.</li>
                    </ul>
                </div>
            </article>

            <!-- 9. Cookies -->
            <article id="cookies" class="bg-white p-8 md:p-10 rounded-2xl shadow-xl scroll-mt-24" data-aos="fade-up">
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-12 h-12 rounded-xl bg-primary-blue/10 flex items-center justify-center flex-shrink-0 text-primary-blue">
                        <i data-feather="eye" class="w-6 h-6" aria-hidden="true"></i>
                    </div>
                    <div>
                        <span class="text-sm uppercase tracking-wider font-bold text-accent-gold">Section 9</span>
                        <h2 class="text-2xl md:text-3xl font-bold text-primary-blue">Politique en Matière de Cookies & Traceurs</h2>
                    </div>
                </div>

                <div class="text-gray-700 leading-relaxed space-y-4">
                    <p>
                        Un cookie est un petit fichier texte déposé sur votre équipement terminal (ordinateur, tablette, smartphone) lors de la consultation d'un site web.
                    </p>
                    
                    <div class="bg-gray-50 p-6 rounded-xl border border-gray-200">
                        <h3 class="text-lg font-bold text-primary-blue mb-2">Cookies strictement nécessaires au fonctionnement</h3>
                        <p class="text-gray-700 text-sm leading-relaxed mb-4">
                            Notre site utilise <strong>uniquement des cookies techniques et de session</strong> indispensables à la navigation et à la sécurité :
                        </p>
                        <div class="overflow-x-auto">
                            <table class="w-full text-left text-xs border border-gray-200 rounded-lg">
                                <thead class="bg-gray-100 text-gray-800">
                                    <tr>
                                        <th class="p-3">Nom du cookie</th>
                                        <th class="p-3">Finalité</th>
                                        <th class="p-3">Durée de conservation</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 text-gray-700">
                                    <tr>
                                        <td class="p-3 font-mono font-bold">XSRF-TOKEN</td>
                                        <td class="p-3">Sécurité : protection contre les attaques de falsification de requêtes (CSRF)</td>
                                        <td class="p-3">2 heures</td>
                                    </tr>
                                    <tr>
                                        <td class="p-3 font-mono font-bold">pointe-ca-pointe-session</td>
                                        <td class="p-3">Maintien de la session technique utilisateur et sécurité de navigation</td>
                                        <td class="p-3">2 heures</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="p-4 rounded-xl bg-green-50 border-l-4 border-green-600 text-green-900 text-sm">
                        ✅ <strong>Aucun cookie publicitaire tiers ni outil intrusif de traçage commercial :</strong> Conformément aux lignes directrices de la CNIL, ces cookies techniques de fonctionnement sont dispensés du recueil préalable de consentement.
                    </div>

                    <p class="text-sm">
                        Vous pouvez néanmoins à tout moment choisir de désactiver ou supprimer les cookies via les réglages de votre logiciel de navigation (Chrome, Safari, Firefox, Edge). Veuillez noter que certaines fonctionnalités du site pourraient alors devenir indisponibles.
                    </p>
                </div>
            </article>

            <!-- 10. Contact DPO -->
            <article id="contact-dpo" class="bg-white p-8 md:p-10 rounded-2xl shadow-xl scroll-mt-24" data-aos="fade-up">
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-12 h-12 rounded-xl bg-primary-blue/10 flex items-center justify-center flex-shrink-0 text-primary-blue">
                        <i data-feather="mail" class="w-6 h-6" aria-hidden="true"></i>
                    </div>
                    <div>
                        <span class="text-sm uppercase tracking-wider font-bold text-accent-gold">Section 10</span>
                        <h2 class="text-2xl md:text-3xl font-bold text-primary-blue">Nous Contacter & Mises à Jour</h2>
                    </div>
                </div>

                <p class="text-gray-700 leading-relaxed mb-4">
                    Pour toute question relative à cette politique de confidentialité ou pour toute demande concernant vos données à caractère personnel, vous pouvez nous écrire à :
                </p>
                <div class="bg-gray-50 p-6 rounded-xl border border-gray-200">
                    <p class="text-gray-800 font-bold">Pointe ça Pointe — Service Protection des Données</p>
                    <p class="text-gray-700">4 Place Ruzebouc, 49080 Bouchemaine, France</p>
                    <p class="text-gray-700 mt-2">
                        Courriel : <a href="mailto:direction.papapoule@gmail.com" class="text-primary-blue font-bold underline">direction.papapoule@gmail.com</a>
                    </p>
                </div>
                <p class="text-xs text-gray-500 mt-4">
                    <em>Dernière mise à jour : Novembre 2026. Cette politique peut être révisée à tout moment en fonction des évolutions légales et réglementaires.</em>
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
