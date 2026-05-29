@extends('layouts.app')

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

<!-- HERO SECTION -->
<section class="relative" data-aos="fade-in">
  <img src="{{ asset('images/tentangkami.jpg') }}" 
       alt="Tentang Omahart Florist"
       class="w-full h-[500px] object-cover">
  
  <div class="absolute inset-0 bg-black/50 flex flex-col justify-center items-center text-center text-white px-6">
    <h1 class="text-4xl md:text-5xl font-extrabold mb-4" data-aos="zoom-in">
      Tentang Kami
    </h1>
    <p class="max-w-2xl text-lg text-gray-200" data-aos="fade-up">
      Kami menghadirkan keindahan dan makna dalam setiap karya dari buket bunga hingga souvenir pernikahan yang berkesan
    </p>
  </div>
</section>


<!-- VISI & MISI -->
<section class="py-20 bg-white">
  <div class="max-w-6xl mx-auto px-6 text-center" data-aos="fade-up">
    <h2 class="text-3xl font-bold text-gray-800 mb-10">Visi & Misi Kami</h2>

    <div class="grid md:grid-cols-2 gap-12 text-left">
      <div data-aos="fade-right">
        <h3 class="text-2xl font-semibold text-pink-600 mb-3">Visi</h3>
        <p class="text-gray-600 leading-relaxed">
          Menjadi toko souvenir dan florist terbaik di Jember yang menghadirkan produk kreatif, elegan, dan penuh makna untuk setiap momen spesial pelanggan kami.
        </p>
      </div>

      <div data-aos="fade-left">
        <h3 class="text-2xl font-semibold text-pink-600 mb-3">Misi</h3>
        <ul class="list-disc list-inside text-gray-600 space-y-2">
          <li>Menghadirkan produk handmade berkualitas tinggi dengan desain unik dan estetis.</li>
          <li>Memberikan pelayanan yang ramah, cepat, dan profesional kepada pelanggan.</li>
          <li>Mendukung acara spesial pelanggan agar lebih berkesan dan indah.</li>
          <li>Terus berinovasi dalam produk souvenir dan dekorasi kekinian.</li>
        </ul>
      </div>
    </div>
  </div>
</section>

<!-- PROFIL TOKO -->
<section class="py-20 bg-pink-50">
  <div class="max-w-6xl mx-auto px-6 grid md:grid-cols-2 gap-10 items-center">

    <div data-aos="zoom-in">
      <img src="{{ asset('images/logo.jpeg') }}" alt="Toko Omahart Florist" class="rounded-2xl shadow-lg">
    </div>

    <div data-aos="fade-left">
      <h2 class="text-3xl font-bold text-gray-800 mb-4">Tentang Omahart Florist</h2>
      <p class="text-gray-600 mb-4 leading-relaxed">
        Omahart Florist berawal dari kecintaan kami terhadap keindahan bunga dan kreativitas dalam membuat souvenir.
        Berdiri sejak tahun <strong>2014</strong>, kami telah melayani beberapa pelanggan dengan berbagai produk mulai dari
        <em>buket bunga, mahar, seserahan, hingga dekorasi acara</em>.
      </p>
      <p class="text-gray-600 leading-relaxed">
        Kami percaya bahwa setiap hadiah memiliki cerita dan kami di sini untuk membantu Anda mengungkapkan makna itu melalui karya terbaik kami
      </p>
    </div>

  </div>
</section>

