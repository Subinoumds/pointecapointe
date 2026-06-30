@extends('layouts.app')

@section('title', 'Restaurant en Photos | Galerie - Pointe ça Pointe à Bouchemaine')
@section('description', 'Découvrez l\'ambiance bistrot et la terrasse de notre bistrot sur les bords de Loire.')

@push('styles')
    <style>
        /* Lightbox styles */
        .lightbox {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.9);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 50;
            opacity: 0;
            pointer-events: none;
            transition: opacity 0.3s ease-in-out;
        }

        .lightbox.active {
            opacity: 1;
            pointer-events: auto;
        }

        .lightbox-image {
            max-width: 90%;
            max-height: 90%;
            transition: transform 0.3s ease-in-out;
        }

        .lightbox-close {
            position: absolute;
            top: 20px;
            right: 30px;
            color: white;
            font-size: 2rem;
            cursor: pointer;
            z-index: 51;
            background: none;
            border: none;
            outline: none;
        }

        .lightbox-nav {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            color: white;
            cursor: pointer;
            z-index: 51;
            padding: 1rem;
            background: none;
            border: none;
            outline: none;
        }

        .lightbox-nav.prev {
            left: 20px;
        }

        .lightbox-nav.next {
            right: 20px;
        }
    </style>
@endpush

@section('content')
    <section class="relative bg-white py-20 text-center overflow-hidden">
        <div class="container mx-auto max-w-7xl px-4 relative z-20">
            <h1 class="text-5xl md:text-7xl font-bold text-primary-blue" data-aos="fade-up">Galerie</h1>
            <p class="mt-4 text-xl text-gray-600" data-aos="fade-up" data-aos-delay="200">
                Découvrez l'ambiance unique de notre bistrot en images.
            </p>
        </div>
        <div class="wave-container">
            <div class="wave top-wave-blue wave-animation"></div>
        </div>
    </section>
    
    <section class="bg-primary-blue py-20 relative">
        <div class="container mx-auto max-w-7xl px-4 relative z-20">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @forelse($galleryImages as $index => $image)
                <img src="{{ asset('storage/gallery/' . $image->filename) }}" 
                     alt="{{ $image->alt_text ?: 'Pointe ça Pointe gallery image' }}" 
                     class="rounded-xl shadow-lg w-full aspect-[3/2] object-cover cursor-pointer hover:scale-105 transition duration-300" 
                     data-aos="zoom-in" 
                     data-aos-delay="{{ ($index % 4) * 100 }}"
                     loading="lazy"
                     decoding="async"
                     width="600"
                     height="400">
                @empty
                <div class="col-span-full text-center py-12">
                    <p class="text-white text-lg">Aucune image dans la galerie pour le moment.</p>
                </div>
                @endforelse
            </div>
        </div>
        <div class="wave-container">
            <div class="wave bottom-wave-blue"></div>
        </div>
    </section>

    <div id="lightbox" class="lightbox" role="dialog" aria-label="Agrandissement de l'image" aria-modal="true">
        <button class="lightbox-close" aria-label="Fermer la galerie">&times;</button>
        <button class="lightbox-nav prev" aria-label="Image précédente">&#10094;</button>
        <img class="lightbox-image" src="" alt="Image agrandie">
        <button class="lightbox-nav next" aria-label="Image suivante">&#10095;</button>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const images = document.querySelectorAll(".galerie img, section img"); // toutes les images de la galerie
            const lightbox = document.getElementById("lightbox");
            const lightboxImage = lightbox.querySelector(".lightbox-image");
            const closeBtn = lightbox.querySelector(".lightbox-close");
            const prevBtn = lightbox.querySelector(".lightbox-nav.prev");
            const nextBtn = lightbox.querySelector(".lightbox-nav.next");

            let currentIndex = 0;

            if (lightbox && lightboxImage && closeBtn && prevBtn && nextBtn && images.length > 0) {
                function showImage(index) {
                    if (index < 0) index = images.length - 1;
                    if (index >= images.length) index = 0;
                    currentIndex = index;
                    lightboxImage.src = images[currentIndex].src;
                    lightbox.classList.add("active");
                }

                images.forEach((img, index) => {
                    img.addEventListener("click", () => {
                        showImage(index);
                    });
                });

                closeBtn.addEventListener("click", () => {
                    lightbox.classList.remove("active");
                });

                prevBtn.addEventListener("click", () => {
                    showImage(currentIndex - 1);
                });

                nextBtn.addEventListener("click", () => {
                    showImage(currentIndex + 1);
                });

                // Navigation clavier (Esc, flèches gauche/droite)
                document.addEventListener("keydown", (e) => {
                    if (!lightbox.classList.contains("active")) return;
                    if (e.key === "Escape") lightbox.classList.remove("active");
                    if (e.key === "ArrowLeft") showImage(currentIndex - 1);
                    if (e.key === "ArrowRight") showImage(currentIndex + 1);
                });
            }
        });
    </script>
@endpush
