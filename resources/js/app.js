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
        function showItem(index) {
            items.forEach((item, i) => {
                item.style.opacity = i === index ? '1' : '0';
            });
            
            indicators.forEach((indicator, i) => {
                indicator.classList.toggle('bg-opacity-100', i === index);
                indicator.classList.toggle('bg-opacity-50', i !== index);
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
