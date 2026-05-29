@extends('layouts.app')

@section('title', 'Hasil Pencarian — ' . ($query ?? ''))

@section('content')
<div class="max-w-6xl mx-auto px-6 py-16">
  <h2 class="text-2xl font-semibold text-gray-800 mb-6">Hasil pencarian: <span class="font-medium text-pink-600">{{ $query }}</span></h2>

  @if(count($products))
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
        </div>
      </a>
      @endforeach
    </div>
  @else
    <p class="text-gray-500">Tidak ada produk yang cocok.</p>
  @endif
</div>
@endsection
