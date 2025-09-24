document.addEventListener('DOMContentLoaded', function() {
            feather.replace();
            AOS.init({
                duration: 1000,
                once: true,
            });

            const mobileMenuBtn = document.getElementById('mobileMenuBtn');
            const closeMenuBtn = document.getElementById('closeMenuBtn');
            const mobileMenu = document.getElementById('mobileMenu');

            mobileMenuBtn.addEventListener('click', () => {
                mobileMenu.classList.add('open');
            });

            closeMenuBtn.addEventListener('click', () => {
                mobileMenu.classList.remove('open');
            });

            const items = document.querySelectorAll('.carousel-item');
            const indicators = document.querySelectorAll('.carousel-indicator');
            let currentIndex = 0;
            
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
            
            gsap.to(".wave-animation", {
                x: "-50%",
                duration: 15,
                repeat: -1,
                ease: "none"
            });

            const toggleBtn = document.getElementById("menuToggle");
    const submenu = document.getElementById("submenu");

    // Toggle menu au clic
    toggleBtn.addEventListener("click", (e) => {
      e.stopPropagation(); // empêche de fermer immédiatement
      submenu.classList.toggle("hidden");
    });

    // Fermer en cliquant ailleurs
    document.addEventListener("click", (e) => {
      if (!submenu.classList.contains("hidden")) {
        submenu.classList.add("hidden");
      }
    });

    // Optionnel : empêcher la fermeture si on clique à l’intérieur du menu
    submenu.addEventListener("click", (e) => {
      e.stopPropagation();
    });
        });