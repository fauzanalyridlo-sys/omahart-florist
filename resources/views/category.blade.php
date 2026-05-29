@php
    use Illuminate\Support\Str;
@endphp

@extends('layouts.app')

@section('title', $category->name . ' — Omahart Florist')

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


<!-- SPACER (karena navbar fixed) -->
<div class="mt-20"></div>


<!-- BREADCRUMB -->
<div class="max-w-6xl mx-auto px-6 pt-6 text-sm text-gray-600">
    <a href="/" class="hover:text-pink-500">Home</a> /
    <span class="text-pink-600 font-medium">{{ $category->name }}</span>
</div>


<!-- PRODUK DALAM KATEGORI -->
<section class="max-w-6xl mx-auto px-6 py-12">

    @if($products->count() == 0)
        <div class="text-center text-gray-600 py-20">
            <h2 class="text-xl font-semibold">Belum ada produk di kategori ini</h2>
        </div>
    @else
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
            @foreach($products as $product)
            <div class="bg-white rounded-xl shadow hover:shadow-lg transition overflow-hidden">

                <a href="{{ route('product.detail', $product->id) }}">
                    <img src="{{ asset('produk/' . $product->image) }}"
                        class="w-full h-48 object-cover">
                </a>

               <div class="p-4">
    <h3 class="text-gray-800 font-semibold text-sm md:text-base line-clamp-1">
        {{ $product->name }}
    </h3>

    <!-- Deskripsi singkat -->
    <p class="text-gray-600 text-xs md:text-sm line-clamp-2 mt-1">
        {{ Str::limit($product->description, 80) }}
    </p>

    <p class="text-pink-600 font-bold text-lg mt-3">
        Mulai dari Rp {{ number_format($product->start_price, 0, ',', '.') }}
    </p>

    <!-- Tombol WA -->
    <a href="https://wa.me/6281358657068?text=Halo%20kak,%20saya%20ingin%20bertanya%20tentang%20produk%20{{ urlencode($product->name) }}"
        target="_blank"
        class="mt-3 block bg-green-500 text-white text-center py-2 rounded-lg text-sm hover:bg-green-600 transition">
        Pesan via WhatsApp
    </a>
</div>

            </div>
            @endforeach
        </div>
    @endif

</section>

@endsection
