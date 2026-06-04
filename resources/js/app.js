import './bootstrap';

document.addEventListener('DOMContentLoaded', function() {
    // Initialize Feather Icons
    if (typeof feather !== 'undefined') {
        feather.replace();
    }

    // Initialize AOS (Animate on Scroll)
    if (typeof AOS !== 'undefined') {
        AOS.init({
            duration: 1000,
            once: true,
        });
    }

    // Mobile Menu Toggle
    const mobileMenuBtn = document.getElementById('mobileMenuBtn');
    const closeMenuBtn = document.getElementById('closeMenuBtn');
    const mobileMenu = document.getElementById('mobileMenu');

    if (mobileMenuBtn && closeMenuBtn && mobileMenu) {
        mobileMenuBtn.addEventListener('click', () => {
            mobileMenu.classList.add('open');
        });

        closeMenuBtn.addEventListener('click', () => {
            mobileMenu.classList.remove('open');
        });
    }

    // Home Hero Carousel
    const items = document.querySelectorAll('.carousel-item');
    const indicators = document.querySelectorAll('.carousel-indicator');
    let currentIndex = 0;
    
    if (items.length > 0) {
        // Ensure the initial item has the active class
        items[0].classList.add('active');

        // Remove onload-animate class after initial page animations finish (2 seconds)
        setTimeout(() => {
            const initialSlide = document.querySelector('.carousel-item.onload-animate');
            if (initialSlide) {
                initialSlide.classList.remove('onload-animate');
            }
        }, 2000);

        function showItem(index) {
            items.forEach((item, i) => {
                if (i === index) {
                    item.style.opacity = '1';
                    item.classList.add('active');
                } else {
                    item.style.opacity = '0';
                    item.classList.remove('active');
                }
            });
            
            indicators.forEach((indicator, i) => {
                if (i === index) {
                    indicator.classList.remove('bg-white/50', 'w-3');
                    indicator.classList.add('bg-white', 'w-6');
                } else {
                    indicator.classList.remove('bg-white', 'w-6');
                    indicator.classList.add('bg-white/50', 'w-3');
                }
            });
            
            currentIndex = index;
        }
        
        function nextItem() {
            const nextIndex = (currentIndex + 1) % items.length;
            showItem(nextIndex);
        }
        
        let interval = setInterval(nextItem, 5000);
        
        indicators.forEach((indicator, index) => {
            indicator.addEventListener('click', () => {
                clearInterval(interval);
                showItem(index);
                interval = setInterval(nextItem, 5000);
            });
        });
    }
    
    // Global GSAP Wave Animation
    if (typeof gsap !== 'undefined' && document.querySelector(".wave-animation")) {
        gsap.to(".wave-animation", {
            x: "-50%",
            duration: 15,
            repeat: -1,
            ease: "none"
        });
    }

    // Header Navigation Dropdown Menu
    const toggleBtn = document.getElementById("menuToggle");
    const submenu = document.getElementById("submenu");

    if (toggleBtn && submenu) {
        // Toggle menu on click
        toggleBtn.addEventListener("click", (e) => {
            e.stopPropagation();
            submenu.classList.toggle("hidden");
        });

        // Close when clicking elsewhere
        document.addEventListener("click", () => {
            if (!submenu.classList.contains("hidden")) {
                submenu.classList.add("hidden");
            }
        });

        // Prevent closing when clicking inside
        submenu.addEventListener("click", (e) => {
            e.stopPropagation();
        });
    }
});
