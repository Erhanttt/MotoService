<!DOCTYPE html>
<html lang="sq">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontakt - MotoService</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .hero-section {
            background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), 
                        url('https://images.unsplash.com/photo-1558981806-ec527fa84c39?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1920&q=80');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }
        .map-container {
            position: relative;
            overflow: hidden;
            border-radius: 1rem;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
        }
        .map-link {
            transition: all 0.3s ease;
        }
        .map-link:hover {
            transform: scale(1.02);
            box-shadow: 0 15px 30px rgba(0,0,0,0.15);
        }
        .floating {
            animation: floating 3s ease-in-out infinite;
        }
        @keyframes floating {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }
    </style>
</head>
<body class="bg-gray-50">
    <!-- Header -->
    <header class="bg-white shadow-sm border-b border-gray-100 relative z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center py-6">
                <div class="flex-shrink-0">
                    <h1 class="text-2xl font-bold text-gray-800">MotoService</h1>
                </div>

                <!-- Desktop Menu -->
                <nav class="hidden md:flex space-x-8">
                    <a href="/" class="text-gray-600 hover:text-blue-600 transition duration-300">Home</a>
                    <a href="{{ route('dyqani.kategorite') }}" class="text-gray-600 hover:text-blue-600 transition duration-300">Shop</a>
                    <a href="/dyqani/about" class="text-gray-600 hover:text-blue-600 transition duration-300">About Us</a>
                    <a href="/dyqani/contact" class="text-blue-600 font-medium">Contact</a>
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
            <a href="{{ route('dyqani.kategorite') }}" class="block w-full px-4 py-4 text-gray-800 hover:bg-gray-50 hover:text-blue-600 transition border-b border-gray-200">Shop</a>
            <a href="/dyqani/about" class="block w-full px-4 py-4 text-gray-800 hover:bg-gray-50 hover:text-blue-600 transition border-b border-gray-200">About Us</a>
            <a href="/dyqani/contact" class="block w-full px-4 py-4 text-gray-800 hover:bg-gray-50 hover:text-blue-600 transition">Contact</a>
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

    <!-- Hero Section -->
    <section class="hero-section text-white py-20 md:py-32 relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
            <div class="floating mb-8">
                <i class="fas fa-motorcycle text-6xl md:text-7xl opacity-90"></i>
            </div>
            <h1 class="text-4xl md:text-6xl font-bold mb-6">Na Kontaktoni</h1>
            <p class="text-xl md:text-2xl max-w-3xl mx-auto opacity-95 mb-8">Ekspertë në riparime të motocikletave sport dhe performancë</p>
            <div class="flex justify-center space-x-4">
                <a href="#contact" class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-3 rounded-lg font-semibold transition duration-300">
                    <i class="fas fa-phone mr-2"></i>Na Telefononi
                </a>
                <a href="#map" class="bg-transparent border-2 border-white hover:bg-white hover:text-gray-900 text-white px-8 py-3 rounded-lg font-semibold transition duration-300">
                    <i class="fas fa-map-marker-alt mr-2"></i>Vizitona
                </a>
            </div>
        </div>
    </section>

    <!-- Contact Cards -->
    <section id="contact" class="py-16 md:py-20 bg-white">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">Informacione Kontakti</h2>
                <p class="text-lg text-gray-600">Na kontaktoni në cilëndo nga mënyrat e mëposhtme</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 md:gap-8">
                <!-- Address Card -->
                <div class="bg-white rounded-2xl p-6 text-center hover:transform hover:scale-105 transition duration-300 group shadow-lg border border-gray-100">
                    <div class="w-16 h-16 bg-blue-500 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:bg-blue-400 transition duration-300">
                        <i class="fas fa-map-marker-alt text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-3">Adresa</h3>
                    <p class="text-gray-600">Rruga e Dëshmorëve, Nr. 123<br>Tirana, Albania</p>
                </div>

                <!-- Phone Card -->
                <div class="bg-white rounded-2xl p-6 text-center hover:transform hover:scale-105 transition duration-300 group shadow-lg border border-gray-100">
                    <div class="w-16 h-16 bg-green-500 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:bg-green-400 transition duration-300">
                        <i class="fas fa-phone text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-3">Telefoni</h3>
                    <p class="text-gray-600">+355 4X XXX XXX</p>
                    <p class="text-gray-500 text-sm mt-1">+355 6X XXX XXX (WhatsApp)</p>
                </div>

                <!-- Email Card -->
                <div class="bg-white rounded-2xl p-6 text-center hover:transform hover:scale-105 transition duration-300 group shadow-lg border border-gray-100">
                    <div class="w-16 h-16 bg-purple-500 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:bg-purple-400 transition duration-300">
                        <i class="fas fa-envelope text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-3">Email</h3>
                    <p class="text-gray-600">info@motoservice.al</p>
                    <p class="text-gray-600">support@motoservice.al</p>
                </div>

                <!-- Hours Card -->
                <div class="bg-white rounded-2xl p-6 text-center hover:transform hover:scale-105 transition duration-300 group shadow-lg border border-gray-100">
                    <div class="w-16 h-16 bg-orange-500 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:bg-orange-400 transition duration-300">
                        <i class="fas fa-clock text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-3">Orari</h3>
                    <p class="text-gray-600 text-sm">E Hënë - E Premte: 8:00 - 18:00</p>
                    <p class="text-gray-600 text-sm">E Shtunë: 9:00 - 14:00</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Social Media & Map Section -->
    <section id="map" class="py-16 md:py-20 bg-gray-50">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                <!-- Social Media -->
                <div class="text-center lg:text-left">
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-8">Na Ndiqni</h2>
                    <p class="text-gray-600 text-lg mb-8">Qëndroni të përditësuar me ofertat tona të reja dhe këshilla për mirëmbajtjen e motocikletës</p>
                    
                    <div class="flex justify-center lg:justify-start space-x-6">
                        <a href="#" class="w-14 h-14 bg-blue-600 text-white rounded-2xl flex items-center justify-center hover:bg-blue-500 hover:transform hover:scale-110 transition duration-300 shadow-md">
                            <i class="fab fa-facebook-f text-xl"></i>
                        </a>
                        <a href="#" class="w-14 h-14 bg-pink-600 text-white rounded-2xl flex items-center justify-center hover:bg-pink-500 hover:transform hover:scale-110 transition duration-300 shadow-md">
                            <i class="fab fa-instagram text-xl"></i>
                        </a>
                        <a href="#" class="w-14 h-14 bg-black text-white rounded-2xl flex items-center justify-center hover:bg-gray-800 hover:transform hover:scale-110 transition duration-300 shadow-md">
                            <i class="fab fa-tiktok text-xl"></i>
                        </a>
                    </div>

                    <!-- Quick Info -->
                    <div class="mt-12 grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div class="bg-blue-50 rounded-xl p-4 text-center border border-blue-100">
                            <i class="fas fa-tools text-blue-500 text-2xl mb-2"></i>
                            <h4 class="text-gray-800 font-semibold">Riparime të Shpejta</h4>
                            <p class="text-gray-600 text-sm">Servis me kohë rekord</p>
                        </div>
                        <div class="bg-green-50 rounded-xl p-4 text-center border border-green-100">
                            <i class="fas fa-truck text-green-500 text-2xl mb-2"></i>
                            <h4 class="text-gray-800 font-semibold">Transport Falas</h4>
                            <p class="text-gray-600 text-sm">Brez i motocikletës tuaj</p>
                        </div>
                    </div>
                </div>

                <!-- Map -->
                <div>
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-8 text-center lg:text-left">Lokacioni Ynë</h2>
                    <a 
                        href="https://www.google.com/maps/search/?api=1&query=41.9929882297211,20.952648559158625" 
                        target="_blank" 
                        class="map-container h-80 md:h-96 flex items-center justify-center map-link block"
                    >
                        <div class="text-center text-white">
                            <i class="fas fa-map-marked-alt text-6xl mb-4 opacity-90"></i>
                            <p class="text-2xl font-semibold mb-2">Klikoni për të parë lokacionin</p>
                            <p class="text-lg opacity-90">Hapet në Google Maps</p>
                        </div>
                    </a>
                    <p class="text-gray-600 text-center lg:text-left mt-4">
                        <i class="fas fa-map-marker-alt text-blue-500 mr-2"></i>
                        Rruga e Dëshmorëve, Tirana
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
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
                        <a href="#" class="text-gray-300 hover:text-blue-400 transition duration-300">
                            <i class="fab fa-facebook-f text-xl"></i>
                        </a>
                        <a href="#" class="text-gray-300 hover:text-pink-400 transition duration-300">
                            <i class="fab fa-instagram text-xl"></i>
                        </a>
                        <a href="#" class="text-gray-300 hover:text-white transition duration-300">
                            <i class="fab fa-tiktok text-xl"></i>
                        </a>
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