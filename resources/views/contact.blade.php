@extends('layouts.app')

@section('title', 'Kontak Kami — Omahart Florist')

@section('content')

<!-- NAVBAR -->
<header class="bg-gray-900 text-white shadow-lg fixed top-0 left-0 right-0 z-50" data-aos="fade-down">
  <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">

    <!-- LOGO -->
   <a href="{{ url('/') }}" class="flex items-center space-x-3">
  <img src="{{ asset('images/logo.jpeg') }}" 
       alt="Omahart Florist"
       class="w-10 h-10 rounded-md bg-white p-1 shadow-sm">
  <h1 class="font-bold text-lg tracking-wide hidden sm:block">
      Omahart Florist
  </h1>
</a>


    <!-- SEARCH BAR -->
    <form action="{{ route('search') }}" method="GET"
          class="hidden md:flex items-center w-1/3 bg-white rounded-full shadow-md px-4 py-2 
                 focus-within:ring-2 focus-within:ring-pink-400 transition"
          data-aos="fade-down">
      <i class="fa-solid fa-search text-gray-400 mr-3"></i>
      <input 
        type="text" name="q"
        placeholder="Cari produk souvenir, buket, mahar..."
        class="flex-grow bg-transparent text-gray-700 text-sm focus:outline-none">
    </form>

    <!-- MENU -->
    <nav class="flex space-x-8 items-center text-sm font-medium" x-data="{ openMenu:false }" data-aos="fade-left">

      <a href="{{ route('about') }}" class="hover:text-pink-400 transition">Tentang Kami</a>

      <div class="relative">
        <button 
          @click="openMenu = !openMenu"
          class="hover:text-pink-400 transition flex items-center gap-1">
          Produk
          <i class="fa-solid fa-chevron-down text-xs transition-transform" 
             :class="{ 'rotate-180': openMenu }"></i>
        </button>

        <!-- DROPDOWN -->
        <div 
          x-show="openMenu"
          x-transition
          @click.away="openMenu = false"
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

<!-- HEADER / HERO -->
<section class="relative">
  <img src="{{ asset('images/shadiah.jpg') }}" 
       alt="Kontak Omahart Florist" 
       class="w-full h-[500px] md:h-[600px] object-cover">

  <div class="absolute inset-0 bg-black/50 flex flex-col justify-center items-center text-center text-white px-6">
    <h1 class="text-4xl md:text-5xl font-extrabold mb-4" data-aos="zoom-in">
      Kontak Kami
    </h1>
    <p class="max-w-2xl text-lg text-gray-200" data-aos="fade-up">
      Hubungi kami melalui WhatsApp, Instagram, atau datang langsung ke toko.
    </p>
  </div>
</section>


<!-- KONTEN -->
<section class="max-w-6xl mx-auto px-6 py-12">
  <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
    <div class="bg-white p-6 rounded-xl shadow-sm">
      <h3 class="text-lg font-semibold mb-4">Hubungi Kami</h3>
      <p class="text-gray-600 mb-4">Butuh bantuan? Tanyakan detail produk atau pemesanan via WhatsApp.</p>

      <div class="space-y-3 text-sm">
        <div class="flex items-center gap-3">
          <i class="fa-brands fa-whatsapp text-green-500 text-xl"></i>
          <a href="https://wa.me/6281358657068" target="_blank" class="font-medium text-gray-800">+62 813-5865-7068 (WhatsApp)</a>
        </div>

        <div class="flex items-center gap-3">
          <i class="fa-brands fa-instagram text-pink-500 text-xl"></i>
          <a href="https://instagram.com/omahart_florist" target="_blank" class="font-medium text-gray-800">omahart_florist (Instagram)</a>
        </div>

        <div class="flex items-start gap-3">
          <i class="fa-solid fa-map-marker-alt text-gray-700 text-xl mt-1"></i>
          <div>
            <div class="font-medium text-gray-800">Alamat</div>
            <div class="text-gray-500 text-sm">Jl Imam Bonol, Plalangan, Sumber Jeruk, Kalisat, Jember</div>
          </div>
        </div>
      </div>
    </div>

    <div class="bg-white p-6 rounded-xl shadow-sm">
      <h3 class="text-lg font-semibold mb-4">Lokasi</h3>

      {{-- Google Maps embed (gunakan link share dari Google Maps) --}}
      <div class="w-full h-64 overflow-hidden rounded-lg border">
        <iframe
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d188.03527129498121!2d113.79562598348053!3d-8.131487844821649!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd6bfb3d1e0f951%3A0x831fe13203cb60ee!2sVQ9W%2B96F%2C%20Plalangan%2C%20Sumber%20Jeruk%2C%20Kec.%20Kalisat%2C%20Kabupaten%20Jember%2C%20Jawa%20Timur%2068193!5e1!3m2!1sid!2sid!4v1760003527437!5m2!1sid!2sid" 
          width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
      </div>

      <p class="text-xs text-gray-500 mt-3">Klik pin di Google Maps untuk petunjuk arah di HP.</p>
    </div>
  </div>
</section>

