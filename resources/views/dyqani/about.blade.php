<!DOCTYPE html>
<html lang="sq">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MotoService - Rreth Nesh</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        @keyframes slow-zoom {
            0% { transform: scale(1.05); }
            50% { transform: scale(1.08); }
            100% { transform: scale(1.05); }
        }
        .animate-slow-zoom {
            animation: slow-zoom 20s ease-in-out infinite;
        }
        .parallax-video {
            will-change: transform;
            transition: transform 0.2s linear;
        }
    </style>
</head>
<body class="bg-gray-50">

    <!-- HEADER -->
    <header class="bg-white shadow-sm border-b border-gray-100 relative z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center py-6">
                <div class="flex-shrink-0">
                    <h1 class="text-2xl font-bold text-gray-800">MotoService</h1>
                </div>

                <!-- Desktop Menu -->
                <nav class="hidden md:flex space-x-8">
                    <a href="/" class="text-gray-600 hover:text-blue-600 transition duration-300">Home</a>
                    <a href="{{ route('dyqani.kategorite') }}" class="text-gray-600 hover:text-blue-600 transition duration-300">Dyqani</a>
                    <a href="/dyqani/about" class="text-blue-600 font-medium">About Us</a>
                    <a href="{{ route('dyqani.contact') }}" class="text-gray-600 hover:text-blue-600 transition duration-300">Contact</a>
                </nav>

                <!-- Hamburger Button -->
                <button id="hamburger" class="md:hidden focus:outline-none">
                    <i class="fas fa-bars text-2xl"></i>
                </button>
            </div>
        </div>

        <!-- Mobile Menu -->
        <nav id="mobile-menu" class="max-h-0 opacity-0 overflow-hidden flex-col md:hidden bg-white w-full shadow-lg transition-all duration-700 ease-in-out">
            <a href="/" class="block w-full px-4 py-4 text-gray-800 hover:bg-gray-50 hover:text-blue-600 transition border-b border-gray-200">Home</a>
            <a href="{{ route('dyqani.kategorite') }}" class="block w-full px-4 py-4 text-gray-800 hover:bg-gray-50 hover:text-blue-600 transition border-b border-gray-200">Dyqani</a>
            <a href="/dyqani/about" class="block w-full px-4 py-4 text-gray-800 hover:bg-gray-50 hover:text-blue-600 transition border-b border-gray-200">About Us</a>
            <a href="{{ route('dyqani.contact') }}" class="block w-full px-4 py-4 text-gray-800 hover:bg-gray-50 hover:text-blue-600 transition">Contact</a>
        </nav>
    </header>

    <script>
        const hamburger = document.getElementById('hamburger');
        const mobileMenu = document.getElementById('mobile-menu');
        let menuOpen = false;

        hamburger.addEventListener('click', (e) => {
            e.stopPropagation();
            menuOpen = !menuOpen;
            if (menuOpen) {
                mobileMenu.style.maxHeight = mobileMenu.scrollHeight + "px";
                mobileMenu.style.opacity = "1";
            } else {
                mobileMenu.style.maxHeight = "0";
                mobileMenu.style.opacity = "0";
            }
        });

        document.addEventListener('click', (e) => {
            const clickInsideMenu = mobileMenu.contains(e.target);
            const clickOnButton = hamburger.contains(e.target);
            if (!clickInsideMenu && !clickOnButton && menuOpen) {
                menuOpen = false;
                mobileMenu.style.maxHeight = "0";
                mobileMenu.style.opacity = "0";
            }
        });
    </script>

    <!-- HERO (video background me efekt paralax dhe overlay modern) -->
    <section class="relative h-[70vh] flex items-center justify-center overflow-hidden bg-black">
        <video autoplay muted loop playsinline id="heroVideo" class="parallax-video absolute inset-0 w-full h-full object-cover scale-105 animate-slow-zoom">
            <source src="{{ asset('storage/fotot/hero.mp4') }}" type="video/mp4">
            Shfletuesi juaj nuk e mbështet videon.
        </video>
        <div class="absolute inset-0 bg-black bg-opacity-50"></div>
        <div class="relative z-10 text-center text-white px-4">
            <h1 class="text-5xl md:text-6xl font-bold mb-4 drop-shadow-lg">Pasion për Motocikleta</h1>
            <p class="text-xl md:text-2xl max-w-2xl mx-auto text-gray-200">
                Krijuar nga dashuria për shpejtësinë, besueshmërinë dhe artin e mekanikës.
            </p>
        </div>
    </section>

    <script>
        const video = document.getElementById('heroVideo');
        window.addEventListener('scroll', () => {
            const scrollY = window.scrollY;
            video.style.transform = `translateY(${scrollY * 0.4}px) scale(1.05)`;
        });
    </script>

    <!-- MISIONI YNË -->
    <section class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-6 lg:px-8 grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            <div class="space-y-6">
                <h2 class="text-4xl font-extrabold text-gray-900 leading-tight">Misioni Ynë është Qartësia, Cilësia dhe Besimi</h2>
                <p class="text-lg text-gray-600">
                    MotoService ka lindur nga pasioni për të mbajtur çdo motoçikletë në gjendje perfekte. Që prej vitit 2008, 
                    kemi ndihmuar qindra moto-entuziazistë të ndihen të sigurt dhe të lirë në rrugë. 
                </p>
                <p class="text-lg text-gray-600">
                    Ne nuk jemi thjesht servis — jemi një komunitet që jeton me motorë. 
                    Çdo riparim, çdo këshillë, çdo pjesë e dorëzuar është pjesë e misionit tonë për cilësi dhe kujdes të përkryer.
                </p>
                <div class="flex space-x-6 pt-4">
                    <div class="flex items-center space-x-3">
                        <i class="fas fa-wrench text-blue-600 text-2xl"></i>
                        <span class="text-gray-800 font-semibold">Riparime të garantuara</span>
                    </div>
                    <div class="flex items-center space-x-3">
                        <i class="fas fa-certificate text-green-600 text-2xl"></i>
                        <span class="text-gray-800 font-semibold">Pjesë origjinale</span>
                    </div>
                </div>
            </div>

            <div class="relative">
                <img src="https://images.unsplash.com/photo-1609630875171-b1321377ee65?auto=format&fit=crop&w=900&q=80" 
                     alt="Servisi MotoService" 
                     class="rounded-2xl shadow-2xl w-full h-[450px] object-cover">
                <div class="absolute -bottom-6 -right-6 bg-blue-600 text-white px-6 py-4 rounded-lg shadow-lg">
                    <p class="text-lg font-semibold">🛠️ 15+ Vite Eksperiencë</p>
                </div>
            </div>
        </div>
    </section>

    <!-- SHËRBIMET TONA -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-4xl font-bold text-gray-900 mb-4">Shërbimet Tona Profesionale</h2>
            <p class="text-lg text-gray-600 mb-12 max-w-2xl mx-auto">Zgjidh çdo problem me motoçikletën tënde me ndihmën e profesionistëve tanë.</p>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
                <div class="p-8 bg-gray-50 hover:bg-blue-50 rounded-2xl shadow-md hover:shadow-xl transition-all duration-300">
                    <i class="fas fa-tools text-blue-600 text-4xl mb-4"></i>
                    <h3 class="text-2xl font-semibold text-gray-900 mb-2">Riparime Mekanike</h3>
                    <p class="text-gray-600">Riparime të motorëve, sistemeve të frenimit dhe çdo komponenti mekanik me precizion maksimal.</p>
                </div>

                <div class="p-8 bg-gray-50 hover:bg-green-50 rounded-2xl shadow-md hover:shadow-xl transition-all duration-300">
                    <i class="fas fa-bolt text-green-600 text-4xl mb-4"></i>
                    <h3 class="text-2xl font-semibold text-gray-900 mb-2">Sisteme Elektrike</h3>
                    <p class="text-gray-600">Diagnostikim dhe riparim për çdo problem elektrik ose elektronik të motoçikletës suaj.</p>
                </div>

                <div class="p-8 bg-gray-50 hover:bg-red-50 rounded-2xl shadow-md hover:shadow-xl transition-all duration-300">
                    <i class="fas fa-cogs text-red-600 text-4xl mb-4"></i>
                    <h3 class="text-2xl font-semibold text-gray-900 mb-2">Pjesë Origjinale</h3>
                    <p class="text-gray-600">Pjesë të certifikuara për performancë maksimale dhe jetëgjatësi të motoçikletës tuaj.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- HISTORIA JONË -->
    <section class="relative bg-gradient-to-r from-gray-900 via-blue-900 to-gray-900 text-white py-24 overflow-hidden">
        <div class="absolute inset-0 opacity-20">
            <img src="https://superbikefactory.co.uk/media/wysiwyg/new-design/fix-bike.jpg" class="w-full h-full object-cover">
        </div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-4xl font-extrabold mb-6">Historia Jonë</h2>
            <p class="text-lg max-w-3xl mx-auto text-gray-200">
                Çdo motor që kalon nëpër duart tona ka një histori, dhe çdo klient bëhet pjesë e familjes MotoService.  
                Nga një garazh i vogël në fillim, sot jemi një nga servisët më të njohur për cilësi dhe besueshmëri në rajon.  
                <br><br>Çdo ditë punojmë me pasion për t’i dhënë jetë çdo motori dhe buzëqeshje çdo shoferi.
            </p>
        </div>
    </section>

    <!-- FOOTER -->
    <footer class="bg-gray-800 text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div>
                    <h3 class="text-xl font-bold text-white mb-4">MotoService</h3>
                    <p class="text-gray-300">
                        Ekspertë në riparime motocikletash dhe shitje pjesësh të cilësisë së lartë.
                    </p>
                </div>
                <div>
                    <h3 class="text-xl font-bold text-white mb-4">Kontakt</h3>
                    <p class="text-gray-300 mb-2"><i class="fas fa-phone mr-2"></i> +355 4X XXX XXX</p>
                    <p class="text-gray-300 mb-2"><i class="fas fa-envelope mr-2"></i> info@motoservice.al</p>
                    <p class="text-gray-300"><i class="fas fa-map-marker-alt mr-2"></i> Rruga e Dëshmorëve, Tirana</p>
                </div>
                <div>
                    <h3 class="text-xl font-bold text-white mb-4">Rrjetet Sociale</h3>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-300 hover:text-blue-400 transition duration-300"><i class="fab fa-facebook-f text-xl"></i></a>
                        <a href="#" class="text-gray-300 hover:text-pink-400 transition duration-300"><i class="fab fa-instagram text-xl"></i></a>
                        <a href="#" class="text-gray-300 hover:text-white transition duration-300"><i class="fab fa-tiktok text-xl"></i></a>
                    </div>
                </div>
            </div>
            <div class="border-t border-gray-700 mt-8 pt-8 text-center text-gray-400">
                <p>&copy; 2024 MotoService. Të gjitha të drejtat e rezervuara.</p>
            </div>
        </div>
    </footer>

</body>
</html>
