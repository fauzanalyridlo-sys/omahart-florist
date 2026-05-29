@extends('admin.layouts.app')

@section('title', 'Edit Produk')

@section('content')
<div class="p-6">

    <h2 class="text-2xl font-bold mb-6">Edit Produk</h2>

    <form action="{{ route('admin.products.update', $product->id) }}"
          method="POST" enctype="multipart/form-data"
          class="bg-white p-6 rounded-xl shadow-md">

        @csrf
        @method('PUT')

        {{-- Nama Produk --}}
        <label class="block font-medium mb-1">Nama Produk</label>
        <input type="text" name="name" value="{{ $product->name }}"
               class="w-full p-3 border rounded-lg mb-4 focus:ring focus:ring-pink-300">

        {{-- Kategori --}}
        <label class="block font-medium mb-1">Kategori</label>
        <select name="category_id"
                class="w-full p-3 border rounded-lg mb-4 focus:ring focus:ring-pink-300">
            @foreach($categories as $c)
                <option value="{{ $c->id }}" {{ $c->id == $product->category_id ? 'selected' : '' }}>
                    {{ $c->name }}
                </option>
            @endforeach
        </select>

        {{-- Harga --}}
        <label class="block font-medium mb-1">Harga (Start Price)</label>
        <input type="text" name="start_price" value="{{ $product->start_price }}"
               class="w-full p-3 border rounded-lg mb-4 focus:ring focus:ring-pink-300">

        {{-- Deskripsi --}}
        <label class="block font-medium mb-1">Deskripsi</label>
        <textarea name="description" rows="4"
                  class="w-full p-3 border rounded-lg mb-4 focus:ring focus:ring-pink-300">{{ $product->description }}</textarea>

        {{-- Upload Gambar --}}
        <label class="block font-medium mb-1">Gambar</label>
        <input type="file" name="image" class="mb-4">

        {{-- Gambar Lama --}}
        @if($product->image)
            <div class="mb-4">
                <p class="text-sm text-gray-500 mb-1">Gambar Saat Ini:</p>
                <img src="{{ asset('produk/' . $product->image) }}"
                     class="w-24 h-24 object-cover rounded-lg shadow">
            </div>
        @endif

        {{-- Tombol Update --}}
        <button class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-lg shadow">
            Update Produk
        </button>

    </form>

</div>
@endsection
