@php
    use Illuminate\Support\Str;
@endphp

@extends('layouts.app')

@section('title', $product->name . ' — Omahart Florist')

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

<!-- Spacer supaya konten tidak ketutup navbar -->
<div class="mt-24"></div>


<!-- =======================
      DETAIL PRODUK
=========================== -->
<div class="max-w-6xl mx-auto px-6 py-10">
  <div class="grid grid-cols-1 md:grid-cols-2 gap-10 items-start">
    
    {{-- Gambar utama --}}
    <div class="bg-white rounded-2xl shadow-sm overflow-hidden">
      <img 
        src="{{ asset('produk/' . ($product->image ?? 'placeholder.jpg')) }}" 
        alt="{{ $product->name }}" 
        class="w-full h-[520px] object-cover">
    </div>

    {{-- Info produk --}}
    <div>
      <h1 class="text-3xl font-bold text-gray-800 mb-4">{{ $product->name }}</h1>

     <p class="text-pink-600 font-bold text-lg">
    Mulai dari Rp {{ number_format($product->start_price, 0, ',', '.') }}
</p>
      <p class="text-gray-600 mb-6 leading-relaxed">{{ $product->description ?? 'Deskripsi tidak tersedia.' }}</p>

      <div class="flex flex-wrap gap-3">
        <div class="mt-8 space-y-2 text-sm text-gray-600">
        <p><strong>Klik Chat via WhatsApp di bawah ini untuk memesan</strong>
      </div>
        {{-- WhatsApp --}}
        <a href="https://wa.me/6281358657068?text={{ urlencode('Halo Omahart Florist, saya tertarik dengan produk: '.$product->name) }}"
           target="_blank"
           class="bg-green-500 hover:bg-green-600 text-white px-5 py-3 rounded-full flex items-center gap-2 transition">
          <i class="fa-brands fa-whatsapp"></i> Chat via WhatsApp 
        </a>
      </div>

      {{-- Detail tambahan --}}
      <div class="mt-8 space-y-2 text-sm text-gray-600">
        <p><strong>Kategori:</strong> {{ $product->category->name ?? 'Umum' }}</p>
      </div>
    </div>
  </div>
</div>
@endsection
