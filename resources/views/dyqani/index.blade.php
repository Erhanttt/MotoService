<!DOCTYPE html>
<html lang="sq">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MotoService - Dyqani Ynë</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .hero-section {
            background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)),
                        url('{{ asset('storage/fotot/mm93.jpg') }}');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }
        .modern-gradient {
            background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
            clip-path: polygon(0 0, 100% 0, 100% 90%, 0 100%);
        }
        .floating {
            animation: floating 3s ease-in-out infinite;
        }
        @keyframes floating {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }
        .product-card {
            transition: all 0.3s ease;
            border: 1px solid #e5e7eb;
            height: 100%;
            display: flex;
            flex-direction: column;
        }
        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
            border-color: #3b82f6;
        }
        .product-image {
            height: 200px;
            object-fit: cover;
            width: 100%;
        }
        .product-content {
            flex: 1;
            display: flex;
            flex-direction: column;
        }
        .product-description {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
            flex-grow: 1;
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
                <a href="/" class="text-blue-600 font-medium">Home</a>
                <a href="{{ route('dyqani.kategorite') }}" class="text-gray-600 hover:text-blue-600 transition duration-300">Dyqani</a>
                <a href="{{ route('dyqani.about') }}" class="text-gray-600 hover:text-blue-600 transition duration-300">About Us</a>
                <a href="{{ route('dyqani.contact') }}" class="text-gray-600 hover:text-blue-600 transition duration-300">Contact</a>
            </nav>

            <!-- Hamburger Button -->
            <button id="hamburger" class="md:hidden focus:outline-none">
                <i class="fas fa-bars text-2xl"></i>
            </button>
        </div>
    </div>

    <!-- Mobile Menu with smooth transition -->
    <nav id="mobile-menu" class="max-h-0 opacity-0 overflow-hidden flex-col md:hidden bg-white w-full shadow-lg transition-all duration-700 ease-in-out">
        <a href="/" class="block w-full px-4 py-4 text-gray-800 hover:bg-gray-50 hover:text-blue-600 transition border-b border-gray-200">Home</a>
        <a href="{{ route('dyqani.kategorite') }}" class="block w-full px-4 py-4 text-gray-800 hover:bg-gray-50 hover:text-blue-600 transition border-b border-gray-200">Dyqani</a>
        <a href="{{ route('dyqani.about') }}" class="block w-full px-4 py-4 text-gray-800 hover:bg-gray-50 hover:text-blue-600 transition border-b border-gray-200">About Us</a>
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

    // Mbyll dropdown kur klikohet jashtë
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
    <section class="hero-section text-white py-24 md:py-32 relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
            <h1 class="text-4xl md:text-6xl font-bold mb-6 leading-tight">Ekspertë në Botën e Motocikletave</h1>
            <p class="text-xl md:text-2xl max-w-3xl mx-auto opacity-95 mb-8">Riparime profesionale dhe pjesë të cilësisë së lartë për motocikletën tuaj</p>
            <div class="flex flex-col sm:flex-row justify-center space-y-4 sm:space-y-0 sm:space-x-4">
                <a href="#products" class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-4 rounded-lg font-semibold transition duration-300 text-lg">
                    Eksploro Produktet
                </a>
                <a href="{{ route('dyqani.about') }}" class="bg-transparent border-2 border-white hover:bg-white hover:text-gray-900 text-white px-8 py-4 rounded-lg font-semibold transition duration-300 text-lg">
                    Rreth Nesh
                </a>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-16 md:py-20 bg-white">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">Shërbimet Tona Premium</h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">Ofrojmë zgjidhje të plota për çdo nevojë të motocikletës suaj</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="text-center group">
                    <div class="w-24 h-24 bg-gradient-to-br from-blue-500 to-blue-700 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition duration-300 shadow-lg">
                        <i class="fas fa-tools text-white text-3xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-3">Riparime Profesionale</h3>
                    <p class="text-gray-600">Servis i specializuar për të gjitha markat dhe modelet e motocikletave</p>
                </div>
                <div class="text-center group">
                    <div class="w-24 h-24 bg-gradient-to-br from-green-500 to-green-700 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition duration-300 shadow-lg">
                        <i class="fas fa-cogs text-white text-3xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-3">Pjesë Origjinale</h3>
                    <p class="text-gray-600">Pjesë të garantuara dhe aksesorë të cilësisë më të lartë</p>
                </div>
                <div class="text-center group">
                    <div class="w-24 h-24 bg-gradient-to-br from-purple-500 to-purple-700 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition duration-300 shadow-lg">
                        <i class="fas fa-star text-white text-3xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-3">Eksperiencë 15+ Vjet</h3>
                    <p class="text-gray-600">Përvojë e gjerë në industri me specialistë të certifikuar</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Passion Section -->
    <section class="modern-gradient text-white py-20 md:py-28">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl md:text-5xl font-bold mb-6">Pasioni për Performancë</h2>
            <p class="text-xl md:text-2xl max-w-3xl mx-auto mb-12 opacity-90">Ne kuptojmë pasionin tuaj për shpejtësinë dhe ofrojmë shërbimet më të mira për performancën maksimale</p>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white bg-opacity-10 rounded-2xl p-8 backdrop-blur-sm border border-white border-opacity-20">
                    <i class="fas fa-tachometer-alt text-4xl mb-4 text-blue-300"></i>
                    <h3 class="text-xl font-semibold mb-4">Optimizim Performancë</h3>
                    <p class="opacity-90">Përmirësime teknike për performancë më të lartë dhe efikasitet optimal</p>
                </div>
                <div class="bg-white bg-opacity-10 rounded-2xl p-8 backdrop-blur-sm border border-white border-opacity-20">
                    <i class="fas fa-microchip text-4xl mb-4 text-green-300"></i>
                    <h3 class="text-xl font-semibold mb-4">Teknologji e Avancuar</h3>
                    <p class="opacity-90">Përdorim teknologjinë më të fundit për diagnostikim dhe riparime të sakta</p>
                </div>
                <div class="bg-white bg-opacity-10 rounded-2xl p-8 backdrop-blur-sm border border-white border-opacity-20">
                    <i class="fas fa-medal text-4xl mb-4 text-yellow-300"></i>
                    <h3 class="text-xl font-semibold mb-4">Cilësi e Garantuar</h3>
                    <p class="opacity-90">Çdo shërbim i kryer me standardet më të larta të cilësisë dhe sigurisë</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Products Header -->
    <section id="products" class="py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">Koleksioni Ynë i Produkteve</h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">Zgjidhni nga një gamë e gjerë e pjesëve dhe aksesorëve të cilësisë së lartë</p>
            </div>
        </div>
    </section>

    <!-- Search and Filter Section -->
    <section class="bg-gray-50 py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <form method="GET" action="{{ route('dyqani.index') }}" class="flex flex-col lg:flex-row gap-4 mb-12">
                <!-- Search Input -->
                <div class="flex-1">
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                        <input 
                            type="text" 
                            name="search" 
                            value="{{ request('search') }}"
                            placeholder="Kërko produktet..."
                            class="block w-full pl-10 pr-4 py-4 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200 text-lg"
                        >
                    </div>
                </div>

                <!-- Category Filter -->
                <div class="w-full lg:w-64">
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                            </svg>
                        </div>
                        <select 
                            name="category_id" 
                            class="block w-full pl-10 pr-4 py-4 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200 appearance-none bg-white text-lg"
                            onchange="this.form.submit()"
                        >
                            <option value="">Të gjitha kategoritë</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <button 
                    type="submit"
                    class="inline-flex items-center px-8 py-4 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-xl transition-colors duration-200 text-lg"
                >
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                    Filtro Produktet
                </button>
            </form>
        </div>
    </section>

    <!-- Products Section -->
    <section class="bg-gray-50 py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            @if($products->count() > 0)
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                    @foreach ($products as $product)
                    <a href="{{ route('dyqani.product.show', $product->id) }}" class="block h-full">
                        <div class="product-card bg-white rounded-xl overflow-hidden">
                            @if($product->image)
                                <div class="relative overflow-hidden">
                                    <img class="product-image transition duration-300 hover:scale-105" 
                                         src="{{ Storage::url('products/' . $product->image) }}" 
                                         alt="{{ $product->name }}">
                                    <div class="absolute top-3 right-3">
                                        <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                            {{ $product->category->name ?? 'Pa Kategori' }}
                                        </span>
                                    </div>
                                </div>
                            @else
                                <div class="product-image bg-gradient-to-br from-gray-200 to-gray-300 flex items-center justify-center">
                                    <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                </div>
                            @endif
                            <div class="product-content p-4">
                                <h3 class="text-lg font-semibold text-gray-900 mb-2 leading-tight line-clamp-2">{{ $product->name }}</h3>
                                <p class="product-description text-gray-600 mb-3 text-sm leading-relaxed">
                                    {{ $product->description }}
                                </p>
                                <div class="flex justify-between items-center mt-auto">
                                    <span class="text-xl font-bold text-blue-600">{{ number_format($product->price, 2) }}€</span>
                                    <button class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-2 rounded-lg font-semibold transition duration-300 text-xs">
                                        Shiko Detajet
                                    </button>
                                </div>
                            </div>
                        </div>
                    </a>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="mt-12 flex justify-center">
                    {{ $products->links() }}
                </div>
            @else
                <div class="text-center py-16">
                    <div class="w-24 h-24 bg-gray-200 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-medium text-gray-900 mb-4">Nuk u gjet asnjë produkt</h3>
                    <p class="text-gray-500 text-lg">
                        @if(request('search') || request('category_id'))
                            Asnjë produkt nuk përputhet me kërkimin tuaj. Provoni filtra të ndryshëm.
                        @else
                            Nuk ka produkte në dyqan për momentin.
                        @endif
                    </p>
                </div>
            @endif
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

    <script>
        // Shtojmë line-clamp support për browsers që nuk e mbështesin
        if (!('webkitLineClamp' in document.documentElement.style)) {
            const descriptions = document.querySelectorAll('.product-description');
            descriptions.forEach(desc => {
                const text = desc.textContent;
                if (text.length > 120) {
                    desc.textContent = text.substring(0, 120) + '...';
                }
            });
        }
    </script>
</body>
</html>