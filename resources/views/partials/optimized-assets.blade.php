{{-- Assets optimisés avec cache busting --}}
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

{{-- CSS optimisé --}}
<link href="{{ asset('style.css') }}?v={{ filemtime(public_path('style.css')) }}" rel="stylesheet">
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

{{-- JavaScript optimisé --}}
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js" defer></script>
<script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js" defer></script>
<script src="https://unpkg.com/feather-icons" defer></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/gsap.min.js" defer></script>

{{-- Tailwind CSS optimisé --}}
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
