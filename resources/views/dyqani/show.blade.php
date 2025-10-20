<!DOCTYPE html>
<html lang="sq">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ $product->name }} - MotoService</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://kit.fontawesome.com/a2e0d5c6b6.js" crossorigin="anonymous"></script>
  <style>
    .product-image-container {
      width: 400px;
      height: 400px;
      overflow: hidden;
      border-radius: 1.25rem;
      background-color: #f3f4f6;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
    }
    .product-image-container img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: transform 0.6s ease;
    }
    .product-image-container:hover img {
      transform: scale(1.05);
    }
    .badge {
      background: linear-gradient(135deg, #2563eb, #3b82f6);
      color: white;
    }
  </style>
</head>
<body class="bg-gray-50 text-gray-800 flex flex-col min-h-screen">

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
      <a href="/" class="block px-4 py-4 text-gray-800 hover:bg-gray-50 hover:text-blue-600 border-b border-gray-200">Home</a>
      <a href="{{ route('dyqani.kategorite') }}" class="block px-4 py-4 text-gray-800 hover:bg-gray-50 hover:text-blue-600 border-b border-gray-200">Dyqani</a>
      <a href="{{ route('dyqani.about') }}" class="block px-4 py-4 text-gray-800 hover:bg-gray-50 hover:text-blue-600 border-b border-gray-200">About Us</a>
      <a href="{{ route('dyqani.contact') }}" class="block px-4 py-4 text-gray-800 hover:bg-gray-50 hover:text-blue-600">Contact</a>
    </nav>
  </header>

  <script>
    const hamburger = document.getElementById('hamburger');
    const mobileMenu = document.getElementById('mobile-menu');
    let menuOpen = false;

    hamburger.addEventListener('click', (e) => {
      e.stopPropagation();
      menuOpen = !menuOpen;
      mobileMenu.style.maxHeight = menuOpen ? mobileMenu.scrollHeight + "px" : "0";
      mobileMenu.style.opacity = menuOpen ? "1" : "0";
    });

    document.addEventListener('click', (e) => {
      if (!mobileMenu.contains(e.target) && !hamburger.contains(e.target) && menuOpen) {
        menuOpen = false;
        mobileMenu.style.maxHeight = "0";
        mobileMenu.style.opacity = "0";
      }
    });
  </script>

  <!-- CONTENT -->
  <main class="flex-grow">
    <section class="w-full py-12 px-4 sm:px-6 lg:px-12">
      <div class="max-w-7xl mx-auto space-y-10">

        <!-- Back Button -->
        <div>
          <a href="{{ route('dyqani.index') }}" class="inline-flex items-center text-blue-600 hover:text-blue-800 font-medium transition transform hover:-translate-x-1">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
            </svg>
            Kthehu te Dyqani
          </a>
        </div>

        <!-- Product Section -->
        <div class="flex flex-col lg:flex-row gap-12 items-start justify-center lg:justify-between">

          <!-- Image -->
          <div class="flex justify-center w-full lg:w-auto">
            <div class="product-image-container">
              @if($product->image)
                <img src="{{ asset('storage/products/' . $product->image) }}" alt="{{ $product->name }}">
              @else
                <div class="w-full h-full flex flex-col items-center justify-center text-gray-400 bg-gray-200">
                  <svg class="w-20 h-20 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                  </svg>
                  <p>Nuk ka foto</p>
                </div>
              @endif
            </div>
          </div>

          <!-- Details -->
          <div class="lg:w-1/2 w-full space-y-8">
            
            <!-- Label i emrit -->
            <div class="inline-block bg-blue-600 text-white px-6 py-2 rounded-full text-lg font-semibold shadow-md">
              {{ $product->name }}
            </div>

            <!-- Box me detaje -->
            <div class="bg-white rounded-2xl shadow-lg border border-gray-200 p-6 space-y-5">
              <div>
                <p class="text-gray-500 text-sm uppercase mb-1 font-semibold tracking-wide">Përshkrimi i produktit</p>
                <p class="text-gray-700 text-lg leading-relaxed">{{ $product->description }}</p>
              </div>

              <div class="border-t pt-4">
                <p class="text-gray-500 text-sm uppercase mb-1 font-semibold tracking-wide">Çmimi i produktit</p>
                <p class="text-3xl font-bold text-green-600">{{ number_format($product->price, 2) }} €</p>
              </div>

              <div class="border-t pt-4">
                <p class="text-gray-500 text-sm uppercase mb-1 font-semibold tracking-wide">Kategoria</p>
                <span class="badge px-4 py-1.5 rounded-full text-sm font-semibold inline-block shadow-sm">
                  {{ $product->category->name }}
                </span>
              </div>
            </div>

          </div>
        </div>

      </div>
    </section>
  </main>

  <!-- FOOTER -->
  <footer class="bg-gray-800 text-white py-12 mt-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <div>
          <h3 class="text-xl font-bold text-white mb-4">MotoService</h3>
          <p class="text-gray-300">Ekspertë në riparime motocikletash dhe shitje pjesësh të cilësisë së lartë.</p>
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
