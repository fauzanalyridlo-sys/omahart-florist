@extends('admin.layouts.app')

@section('title', 'Tambah Kategori')

@section('content')
<div class="p-6">

    <h2 class="text-xl font-bold mb-6">Tambah Kategori</h2>

    <form action="{{ route('admin.categories.store') }}"
          method="POST"
          enctype="multipart/form-data"
          class="bg-white p-6 rounded-xl shadow">

        @csrf

        {{-- Nama Kategori --}}
        <label class="block mb-2 font-semibold">Nama Kategori:</label>
        <input type="text"
               name="name"
               class="w-full p-3 border rounded mb-4"
               placeholder="Masukkan nama kategori"
               required>

        {{-- Upload Gambar --}}
        <label class="block mb-2 font-semibold">Gambar:</label>
        <input type="file" name="image" class="mb-4">

        {{-- Tombol --}}
        <button class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
            Simpan
        </button>

    </form>
</div>
@endsection
