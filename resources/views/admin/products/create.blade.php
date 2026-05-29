@extends('admin.layouts.app')

@section('title', 'Tambah Produk')

@section('content')
<div class="p-6">
    <h2 class="text-xl font-bold mb-4">Tambah Produk</h2>

    <form action="{{ route('admin.products.store') }}" 
          method="POST" 
          enctype="multipart/form-data" 
          class="bg-white p-6 rounded-lg shadow">

        @csrf

        {{-- Nama Produk --}}
        <label class="block mb-2 font-semibold">Nama Produk:</label>
        <input type="text" name="name" 
               class="w-full p-2 border rounded mb-4" required>

        {{-- Kategori --}}
        <label class="block mb-2 font-semibold">Kategori:</label>
        <select name="category_id" 
                class="w-full p-2 border rounded mb-4" required>
            @foreach($categories as $c)
                <option value="{{ $c->id }}">{{ $c->name }}</option>
            @endforeach
        </select>

        {{-- Start Price --}}
        <label class="block mb-2 font-semibold">Harga (Start Price):</label>
        <input type="text" name="start_price" 
               class="w-full p-2 border rounded mb-4" 
               placeholder="contoh: 50000" required>

        {{-- Deskripsi --}}
        <label class="block mb-2 font-semibold">Deskripsi:</label>
        <textarea name="description" 
                  class="w-full p-2 border rounded mb-4" 
                  rows="4" required></textarea>

        {{-- Gambar --}}
        <label class="block mb-2 font-semibold">Gambar:</label>
        <input type="file" name="image" 
               class="mb-4" required>

        <button class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded">
            Simpan
        </button>
    </form>
</div>
@endsection
