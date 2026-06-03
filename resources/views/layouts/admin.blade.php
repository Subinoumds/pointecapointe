<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Administration - Pointe ça Pointe')</title>
    <meta name="description" content="@yield('description', 'Interface d\'administration du site Pointe ça Pointe')">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('img/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('img/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('img/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('site.webmanifest') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'primary-blue': '#003366',
                        'secondary-yellow': '#fbbd08',
                        'light-blue': '#e6f0ff',
                    },
                    fontFamily: {
                        sans: ['Poppins', 'sans-serif'],
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gray-100 font-sans">
    <!-- Navigation admin responsive -->
    <nav class="bg-primary-blue text-white py-3 px-4 md:px-6 shadow-lg">
        <div class="container mx-auto max-w-7xl">
            <div class="flex justify-between items-center">
                <!-- Logo et lien vers le site -->
                <div class="flex items-center space-x-4">
                    <a href="{{ route('admin.index') }}" class="text-lg md:text-xl font-bold text-secondary-yellow">
                        Administration
                    </a>
                    <span class="text-gray-300 hidden md:inline">|</span>
                    <a href="{{ route('home') }}" class="text-sm text-white hover:text-secondary-yellow transition-colors duration-300" target="_blank">
                        Voir le site
                    </a>
                </div>
                
                <!-- Menu de navigation (desktop) -->
                <div class="hidden md:flex items-center space-x-6">
                    <a href="{{ route('admin.index') }}" class="text-sm text-white hover:text-secondary-yellow transition-colors duration-300">
                        Dashboard
                    </a>
                    <a href="{{ route('admin.content.index') }}" class="text-sm text-white hover:text-secondary-yellow transition-colors duration-300">
                        Contenu de la page d'accueil
                    </a>
                    <a href="{{ route('admin.carousel.index') }}" class="text-sm text-white hover:text-secondary-yellow transition-colors duration-300">
                        Carousel Accueil
                    </a>
                    <a href="{{ route('admin.menu.index') }}" class="text-sm text-white hover:text-secondary-yellow transition-colors duration-300">
                        Menus
                    </a>
                    <a href="{{ route('admin.image.index') }}" class="text-sm text-white hover:text-secondary-yellow transition-colors duration-300">
                        Galerie
                    </a>
                    <a href="{{ route('admin.event.index') }}" class="text-sm text-white hover:text-secondary-yellow transition-colors duration-300">
                        Événements
                    </a>
                    <form action="{{ route('admin.logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="text-sm text-red-300 hover:text-red-100 transition-colors duration-300">
                            Déconnexion
                        </button>
                    </form>
                </div>
                
                <!-- Menu hamburger pour mobile -->
                <button id="mobile-menu-button" class="md:hidden text-white hover:text-secondary-yellow transition-colors duration-300">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
            
            <!-- Menu de navigation mobile -->
            <div id="mobile-menu" class="hidden md:hidden mt-4">
                <div class="flex flex-col space-y-2">
                    <a href="{{ route('admin.index') }}" class="text-sm text-white hover:text-secondary-yellow transition-colors duration-300 py-2">
                        Dashboard
                    </a>
                    <a href="{{ route('admin.content.index') }}" class="text-sm text-white hover:text-secondary-yellow transition-colors duration-300 py-2">
                        Contenu
                    </a>
                    <a href="{{ route('admin.carousel.index') }}" class="text-sm text-white hover:text-secondary-yellow transition-colors duration-300 py-2">
                        Carousel Accueil
                    </a>
                    <a href="{{ route('admin.menu.index') }}" class="text-sm text-white hover:text-secondary-yellow transition-colors duration-300 py-2">
                        Menus
                    </a>
                    <a href="{{ route('admin.image.index') }}" class="text-sm text-white hover:text-secondary-yellow transition-colors duration-300 py-2">
                        Galerie
                    </a>
                    <a href="{{ route('admin.event.index') }}" class="text-sm text-white hover:text-secondary-yellow transition-colors duration-300 py-2">
                        Événements
                    </a>
                </div>
            </div>
        </div>
    </nav>

    @yield('content')
    
    <!-- Scripts -->
    <script src="https://unpkg.com/feather-icons"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            feather.replace();
            
            // Menu mobile
            const mobileMenuButton = document.getElementById('mobile-menu-button');
            const mobileMenu = document.getElementById('mobile-menu');
            
            if (mobileMenuButton && mobileMenu) {
                mobileMenuButton.addEventListener('click', function() {
                    mobileMenu.classList.toggle('hidden');
                });
            }
        });
    </script>
    @yield('scripts')
    
    <!-- Système global d'alertes et de confirmations de suppression personnalisées (Lighthouse/UX) -->
    <script>
        (function() {
            // Création des conteneurs
            const toastContainer = document.createElement('div');
            toastContainer.id = 'custom-toast-container';
            toastContainer.className = 'fixed top-5 right-5 z-[9999] flex flex-col gap-3 pointer-events-none max-w-sm w-full px-4';
            document.body.appendChild(toastContainer);

            const modalContainer = document.createElement('div');
            modalContainer.id = 'custom-confirm-container';
            modalContainer.className = 'fixed inset-0 z-[9999] flex items-center justify-center p-4 bg-black/50 backdrop-blur-sm opacity-0 pointer-events-none transition-opacity duration-300';
            modalContainer.innerHTML = `
                <div class="bg-white rounded-2xl shadow-2xl max-w-md w-full overflow-hidden transform scale-90 opacity-0 transition-all duration-300">
                    <div class="p-6">
                        <div class="flex items-center gap-4 text-red-600 mb-4">
                            <div class="w-12 h-12 bg-red-100 rounded-full flex items-center justify-center flex-shrink-0">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900">Confirmation requise</h3>
                        </div>
                        <p id="confirm-modal-message" class="text-gray-600 mb-6 text-sm">Êtes-vous sûr de vouloir continuer ?</p>
                        <div class="flex justify-end gap-3">
                            <button id="confirm-modal-cancel" class="px-5 py-2.5 bg-gray-100 hover:bg-gray-200 text-gray-700 font-semibold rounded-xl transition duration-200 text-sm">
                                Annuler
                            </button>
                            <button id="confirm-modal-ok" class="px-5 py-2.5 bg-red-600 hover:bg-red-700 text-white font-semibold rounded-xl transition duration-200 text-sm">
                                Confirmer
                            </button>
                        </div>
                    </div>
                </div>
            `;
            document.body.appendChild(modalContainer);

            const modalBox = modalContainer.querySelector('div');
            const modalMessage = document.getElementById('confirm-modal-message');
            const cancelBtn = document.getElementById('confirm-modal-cancel');
            const okBtn = document.getElementById('confirm-modal-ok');

            let onConfirmCallback = null;

            function closeConfirm() {
                modalContainer.classList.add('opacity-0');
                modalContainer.classList.add('pointer-events-none');
                modalBox.classList.add('scale-90', 'opacity-0');
                modalBox.classList.remove('scale-100', 'opacity-100');
            }

            cancelBtn.addEventListener('click', closeConfirm);
            modalContainer.addEventListener('click', function(e) {
                if (e.target === modalContainer) closeConfirm();
            });

            okBtn.addEventListener('click', function() {
                if (onConfirmCallback) onConfirmCallback();
                closeConfirm();
            });

            window.showCustomConfirm = function(message, onConfirm) {
                modalMessage.textContent = message;
                onConfirmCallback = onConfirm;
                
                modalContainer.classList.remove('pointer-events-none');
                modalContainer.classList.remove('opacity-0');
                
                setTimeout(() => {
                    modalBox.classList.remove('scale-90', 'opacity-0');
                    modalBox.classList.add('scale-100', 'opacity-100');
                }, 10);
            };

            // Surcharge de window.alert en Toast personnalisé
            window.alert = function(message) {
                const toast = document.createElement('div');
                toast.className = 'transform translate-x-full transition-all duration-300 ease-out p-4 rounded-2xl shadow-2xl flex items-start gap-3 bg-white text-gray-800 border-l-4 border-secondary-yellow pointer-events-auto w-full';
                toast.innerHTML = `
                    <div class="text-secondary-yellow mt-0.5 flex-shrink-0">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                    </div>
                    <div class="flex-1 text-sm font-semibold leading-5 text-primary-blue">${message}</div>
                    <button class="text-gray-400 hover:text-gray-600 focus:outline-none text-lg font-bold leading-3" onclick="this.parentElement.remove()">&times;</button>
                `;
                toastContainer.appendChild(toast);
                
                setTimeout(() => {
                    toast.classList.remove('translate-x-full');
                }, 10);

                setTimeout(() => {
                    toast.classList.add('translate-x-full');
                    toast.addEventListener('transitionend', () => toast.remove());
                }, 5000);
            };

            // Interception des clics (phase de capture) pour bloquer les confirm() sur les boutons/liens
            document.addEventListener('click', function(e) {
                let target = e.target;
                
                // Remonter jusqu'à l'élément interactif parent si cliqué sur une icône (SVG)
                while (target && target !== document.body) {
                    if (target.getAttribute) {
                        const onclickAttr = target.getAttribute('onclick');
                        if (onclickAttr && onclickAttr.includes('confirm(')) {
                            const match = onclickAttr.match(/confirm\(['"](.+?)['"]\)/);
                            if (match) {
                                const message = match[1];
                                
                                // Bloquer immédiatement le comportement par défaut et stopper la propagation
                                e.preventDefault();
                                e.stopPropagation();
                                
                                // Retirer temporairement l'onclick pour éviter les déclenchements répétés
                                target.removeAttribute('onclick');
                                
                                window.showCustomConfirm(message, function() {
                                    // Si confirmé, on soumet le formulaire parent ou on navigue
                                    if ((target.tagName === 'BUTTON' && target.type === 'submit') || target.tagName === 'INPUT') {
                                        const form = target.closest('form');
                                        if (form) {
                                            form.dataset.confirmed = 'true';
                                            form.submit();
                                        }
                                    } else if (target.tagName === 'A') {
                                        window.location.href = target.href;
                                    } else {
                                        // Comportement générique : on simule le clic sans l'attribut
                                        target.click();
                                    }
                                });
                                return;
                            }
                        }
                    }
                    target = target.parentElement;
                }
            }, true); // TRUE pour la phase de capture !

            // Interception des soumissions (phase de capture) pour bloquer les confirm() sur les formulaires
            document.addEventListener('submit', function(e) {
                if (e.target.dataset.confirmed === 'true') {
                    return;
                }
                
                const onsubmitAttr = e.target.getAttribute('onsubmit');
                if (onsubmitAttr && onsubmitAttr.includes('confirm(')) {
                    const match = onsubmitAttr.match(/confirm\(['"](.+?)['"]\)/);
                    if (match) {
                        const message = match[1];
                        
                        // Bloquer immédiatement
                        e.preventDefault();
                        e.stopPropagation();
                        
                        e.target.removeAttribute('onsubmit');
                        
                        window.showCustomConfirm(message, function() {
                            e.target.dataset.confirmed = 'true';
                            e.target.submit();
                        });
                    }
                }
            }, true); // TRUE pour la phase de capture !
        })();
    </script>
</body>
</html>
