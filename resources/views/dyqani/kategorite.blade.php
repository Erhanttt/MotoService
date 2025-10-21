<!DOCTYPE html>
<html lang="sq">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MotoService - Kategoritë</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .product-card {
            display: flex;
            flex-direction: column;
            height: 100%;
            border: 1px solid #e5e7eb;
            transition: all 0.3s ease;
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
            display: flex;
            flex-direction: column;
            flex-grow: 1;
            padding: 1rem;
        }
        .product-description {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
            margin-bottom: 0.75rem;
            flex-grow: 1;
        }
        .divider {
            border-bottom: 2px solid #e5e7eb;
            margin: 3rem 0;
        }
    </style>
</head>
<body class="bg-gray-50">

    <!-- NAVBAR -->
    <header class="bg-white shadow-sm border-b border-gray-100 relative z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center py-6">
                <div class="flex-shrink-0">
                    <h1 class="text-2xl font-bold text-gray-800">MotoService</h1>
                </div>

                <!-- Desktop Menu -->
                <nav class="hidden md:flex space-x-8">
                    <a href="/" class="text-gray-600 hover:text-blue-600 transition duration-300">Home</a>
                    <a href="{{ route('dyqani.kategorite') }}" class="text-blue-600 font-medium">Shop</a>
                    <a href="{{ route('dyqani.about') }}" class="text-gray-600 hover:text-blue-600 transition duration-300">About Us</a>
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
            <a href="{{ route('dyqani.kategorite') }}" class="block w-full px-4 py-4 text-gray-800 hover:bg-gray-50 hover:text-blue-600 transition border-b border-gray-200">Shop</a>
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

    <!-- SEARCH BAR -->
    <section class="bg-gray-50 py-8 border-b border-gray-200">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <form method="GET" action="{{ route('dyqani.kategorite') }}" class="flex flex-col md:flex-row gap-4">
                <div class="flex-1 relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                    <input
                        type="text"
                        name="search"
                        value="{{ $search ?? '' }}"
                        placeholder="Kërko produkte..."
                        class="block w-full pl-10 pr-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200 text-lg"
                    >
                </div>
                <button type="submit" class="px-6 py-3 bg-blue-600 text-white font-semibold rounded-xl hover:bg-blue-700 transition">
                    Kërko
                </button>
            </form>
        </div>
    </section>

    <!-- PRODUKTET SIPAS KATEGORIVE -->
    <section class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-16">
            @foreach($categories as $category)
                @php
                    $productsForCategory = $paginated[$category->id] ?? collect();
                @endphp

                @if($productsForCategory->count() > 0)
                <div>
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-2xl font-bold text-gray-800">{{ $category->name }}</h2>
                        <span class="text-gray-500 text-sm">{{ $productsForCategory->total() }} produkte</span>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                        @foreach($productsForCategory as $product)
                        <a href="{{ route('dyqani.product.show', $product->id) }}" class="block h-full">
                            <div class="product-card bg-white rounded-xl overflow-hidden">
                                @if($product->image)
                                    <img class="product-image" src="{{ Storage::url('products/' . $product->image) }}" alt="{{ $product->name }}">
                                @else
                                    <div class="product-image bg-gray-200 flex items-center justify-center">
                                        <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                        </svg>
                                    </div>
                                @endif
                                <div class="product-content">
                                    <h3 class="text-lg font-semibold text-gray-900 mb-2">{{ $product->name }}</h3>
                                    <p class="product-description text-gray-600 text-sm">{{ $product->description }}</p>
                                    <div class="flex justify-between items-center mt-2">
                                        <span class="text-blue-600 font-bold">{{ number_format($product->price, 2) }}€</span>
                                        <span class="text-xs bg-blue-100 text-blue-800 px-2 py-1 rounded-full">{{ $category->name }}</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                        @endforeach
                    </div>

                    <!-- Pagination -->
                    <div class="mt-6">
                        {{ $productsForCategory->appends(request()->query())->links() }}
                    </div>

                    <div class="divider"></div>
                </div>
                @endif
            @endforeach
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
