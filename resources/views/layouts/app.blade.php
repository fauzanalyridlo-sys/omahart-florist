<!DOCTYPE html>
<html lang="id" x-data>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>@yield('title', 'Omahart Florist')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/a2c2d66f8a.js" crossorigin="anonymous" defer></script>

    <!-- AOS CSS -->
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css"/>

     <!-- AUTO FONT APPLY -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&family=Playfair+Display:wght@500;600;700&display=swap" rel="stylesheet">

    <style>
        /* AUTO APPLY FONT */
        body {
            font-family: 'Inter', sans-serif;
        }

        h1, h2, h3, h4, h5, h6 {
            font-family: 'Playfair Display', serif;
            font-weight: 600;
            letter-spacing: 0.5px;
        }
    </style>

    <!-- FIX UTAMA: reset + stabilizer -->
    <style>
        html, body {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

    <!-- FIX UTAMA: reset + stabilizer -->
    <style>
        /* RESET AMAN */
        html, body {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        *, *::before, *::after {
            box-sizing: inherit;
        }

        /* Pengaman untuk hero slider */
        .img-cover {
            object-fit: cover;
            width: 100%;
            height: 100%;
        }
    </style>
</head>

<body class="antialiased bg-gray-50 text-gray-900">

    <!-- NAVBAR FIXED -->
    <header class="bg-gray-900 text-white shadow-lg fixed top-0 left-0 right-0 z-50">
        <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">

            <!-- LOGO -->
            <a href="{{ url('/') }}" class="flex items-center space-x-3">
                <img src="{{ asset('images/logo.jpeg') }}"
                     alt="Omahart Florist"
                     class="w-10 h-10 rounded-md bg-white p-1 shadow-sm">
                <h1 class="font-bold text-lg tracking-wide hidden sm:block">Omahart Florist</h1>
            </a>

            <!-- SEARCH BAR -->
            <form action="{{ route('search') }}" method="GET"
                  class="hidden md:flex items-center w-1/3 bg-white rounded-full shadow-md px-4 py-2 
                         focus-within:ring-2 focus-within:ring-pink-400 transition">
                <i class="fa-solid fa-search text-gray-400 mr-3"></i>
                <input type="text" name="q" placeholder="Cari produk souvenir, buket, mahar..."
                       class="flex-grow bg-transparent text-gray-700 text-sm focus:outline-none">
            </form>

            <!-- MENU -->
            <nav class="flex space-x-8 items-center text-sm font-medium" x-data="{ openMenu:false }">

                <a href="{{ route('about') }}" class="hover:text-pink-400 transition">Tentang Kami</a>

                <!-- DROPDOWN PRODUK -->
                <div class="relative">
                    <button @click="openMenu = !openMenu"
                            class="hover:text-pink-400 transition flex items-center gap-1">
                        Produk
                        <i class="fa-solid fa-chevron-down text-xs transition-transform"
                           :class="{ 'rotate-180': openMenu }"></i>
                    </button>

                    <div x-show="openMenu" x-transition @click.away="openMenu = false"
                         class="absolute mt-2 w-56 bg-white text-gray-800 rounded-lg shadow-lg 
                                border border-gray-100 py-2 z-50">

                        @foreach(App\Models\Category::all() as $kategori)
                            <a href="{{ route('category.show', $kategori->id) }}"
                               class="block px-4 py-2 hover:bg-pink-100 transition">
                                {{ $kategori->name }}
                            </a>
                        @endforeach
                    </div>
                </div>

                <a href="{{ route('contact') }}" class="hover:text-pink-400 transition">Kontak</a>
            </nav>
        </div>
    </header>

    <!-- FIX SCROLLING NAVBAR (FINAL STABLE VERSION) -->
    <script>
        function updateNavbarPadding() {
            const navbar = document.querySelector("header");
            const body = document.body;

            if (navbar) {
                const height = navbar.offsetHeight;
                body.style.paddingTop = height + "px";
            }
        }

        document.addEventListener("DOMContentLoaded", updateNavbarPadding);
        window.addEventListener("resize", updateNavbarPadding);
    </script>

    <!-- HALAMAN -->
    @yield('content')

    <!-- FOOTER -->
    <footer class="bg-gray-900 text-gray-300 py-16 mt-20">
        <div class="max-w-6xl mx-auto grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-10 px-6">

            <div>
                <h3 class="font-semibold text-white text-xl mb-3">Omahart Florist</h3>
                <p class="text-sm leading-relaxed">
                    Toko souvenir dan florist dengan produk kreatif dan elegan untuk setiap momen spesial.
                </p>
            </div>

            <div>
                <h3 class="font-semibold text-white mb-3">Navigasi</h3>
                <ul class="space-y-2 text-sm">
                    <li><a href="/" class="hover:text-pink-400 transition">Home</a></li>
                    <li><a href="{{ route('about') }}" class="hover:text-pink-400 transition">Tentang Kami</a></li>
                    <li><a href="#produk" class="hover:text-pink-400 transition">Produk</a></li>
                </ul>
            </div>

           <div>
    <h3 class="font-semibold text-white mb-3">Ikuti Kami</h3>
    <ul class="space-y-2 text-sm">

        {{-- Instagram --}}
        <li>
            <a href="https://instagram.com/omahart_florist" 
               target="_blank"
               class="hover:text-pink-400 transition">
                Instagram
            </a>
        </li>

        {{-- Shopee --}}
        <li>
            <a href="https://id.shp.ee/HZCReCf"
               target="_blank"
               class="hover:text-pink-400 transition">
                Shopee
            </a>
        </li>

        {{-- WhatsApp --}}
        <li>
            <a href="https://wa.me/6281358657068"
               target="_blank"
               class="hover:text-pink-400 transition">
                WhatsApp
            </a>
        </li>

    </ul>
</div>

            <div>
                <h3 class="font-semibold text-white mb-3">Kontak</h3>
                <p class="text-sm">Jl Imam Bonol, Plalangan, Sumber Jeruk, Kalisat, Jember</p>
                <p class="text-sm">WA: +62 813-5865-7068</p>
            </div>

        </div>

        <p class="text-center text-gray-500 mt-10 text-sm">
            © 2025 Omahart Florist. All rights reserved.
        </p>
    </footer>

    <!-- JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <script>
        AOS.init({
            duration: 1000,
            once: true,
            offset: 120,
            easing: 'ease-out',
        });
    </script>

    @stack('scripts')
</body>
</html>
