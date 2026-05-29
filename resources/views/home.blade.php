@php
    use Illuminate\Support\Str;
@endphp

@extends('layouts.app')

@section('content')

<!-- NAVBAR -->
<header class="bg-gray-900 text-white shadow-lg fixed top-0 left-0 right-0 z-50">
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
             focus-within:ring-2 focus-within:ring-pink-400 transition">
      <i class="fa-solid fa-search text-gray-400 mr-3"></i>
      <input 
        type="text" name="q"
        placeholder="Cari produk souvenir, buket, mahar..."
        class="flex-grow bg-transparent text-gray-700 text-sm focus:outline-none">
    </form>

    <!-- MENU -->
    <nav class="flex space-x-8 items-center text-sm font-medium" x-data="{ openMenu:false }">

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

<!-- HERO SLIDER -->
<section class="relative">
  <div class="swiper mySwiper h-[500px]">
    <div class="swiper-wrapper">

      <!-- SLIDE 1 -->
      <div class="swiper-slide relative">
        <img src="{{ asset('images/sunik.jpg') }}" 
             class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-black/40 flex flex-col justify-center px-10 md:px-24">
          <h2 class="text-white text-4xl md:text-5xl font-extrabold mb-4 drop-shadow-lg">
            Temukan Souvenir Unik Disini
          </h2>
        </div>
      </div>

      <!-- SLIDE 2 -->
      <div class="swiper-slide relative">
        <img src="{{ asset('images/buket.jpg') }}" 
             class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-black/40 flex flex-col justify-center px-10 md:px-24">
          <h2 class="text-white text-4xl md:text-5xl font-extrabold mb-4">
            Buket Menarik
          </h2>
        </div>
      </div>

      <!-- SLIDE 3 -->
      <div class="swiper-slide relative">
        <img src="{{ asset('images/shadiah.jpg') }}" 
             class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-black/40 flex flex-col justify-center px-10 md:px-24">
          <h2 class="text-white text-4xl md:text-5xl font-extrabold mb-4">
            Souvenir Cantik untuk Hadiah
          </h2>
        </div>
      </div>

    </div>
    
    <!-- PAGINATION -->
    <div class="swiper-pagination !bottom-5 z-50"></div>
  </div>
</section>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
  const swiper = new Swiper(".mySwiper", {
    loop: true,
    autoplay: {
      delay: 4000,
      disableOnInteraction: false,
    },
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    grabCursor: true,
  });
});
</script>
@endpush



<!--SECTION TENTANG-->
<section id="tentang" class="py-28 bg-white text-center">
  <h2 class="text-4xl font-bold text-gray-800 mb-6">
    Tentang <span class="text-pink-600">Omahart Florist</span>
  </h2>
  <p class="text-gray-600 max-w-3xl mx-auto leading-relaxed text-lg">
    Omahart Florist menghadirkan berbagai produk souvenir dan bunga berkualitas,
    mulai dari <strong class="text-pink-500">buket, mahar, seserahan, mug custom</strong>,
    hingga dekorasi yang dirancang dengan penuh cinta.
  </p>
</section>


<!-- SECTION: KATEGORI -->
<section class="py-20 bg-pink-50">
  <div class="max-w-6xl mx-auto px-6">

    <h2 class="text-3xl font-bold text-center text-gray-800 mb-12">Kategori Souvenir</h2>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-10">

      @foreach($categories as $kategori)
      <a href="{{ route('category.show', $kategori->id) }}"
         class="bg-white rounded-2xl shadow-sm hover:shadow-xl hover:-translate-y-2 
                transition-all duration-300 overflow-hidden block border border-gray-100">

       <img src="{{ asset('images/kategori/' . $kategori->image) }}"
     class="w-full h-64 object-cover">

        <div class="p-6 text-center">
          <h3 class="text-xl font-semibold text-gray-800">{{ $kategori->name }}</h3>
          <p class="text-gray-500 text-sm mt-2">Souvenir cantik untuk momen spesial Anda</p>
        </div>

      </a>
      @endforeach

    </div>

  </div>
</section>


<!-- SECTION: PRODUK TERBARU -->
<section id="produk" class="py-20 bg-white">
  <div class="max-w-6xl mx-auto px-6 text-center">

    <h2 class="text-3xl font-bold text-gray-800 mb-12">Produk Terbaru</h2>

    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-8">
      @foreach($products as $product)
      <a href="{{ route('product.detail', $product->id) }}"
         class="bg-white border border-gray-100 rounded-2xl overflow-hidden shadow-md 
                hover:shadow-xl hover:-translate-y-2 transition-all block">

        <img src="{{ asset('produk/' . $product->image) }}"
             class="w-full h-48 object-cover">

        <div class="p-5 text-left">
          <h3 class="text-lg font-semibold text-gray-800">{{ $product->name }}</h3>
          <p class="text-gray-500 text-sm mb-2">{{ $product->description }}</p>

         <p class="text-pink-600 font-bold text-lg">
    Mulai dari Rp {{ number_format($product->start_price, 0, ',', '.') }}
</p>

</p>
        </div>
      </a>
      @endforeach
    </div>

  </div>
</section>
