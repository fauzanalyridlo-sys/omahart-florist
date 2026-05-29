@extends('admin.layouts.app')

@section('title', 'Edit Kategori')

@section('content')
<div class="p-6">

    <h2 class="text-xl font-bold mb-6">Edit Kategori</h2>

    <form action="{{ route('admin.categories.update', $category->id) }}"
          method="POST"
          enctype="multipart/form-data"
          class="bg-white p-6 rounded-xl shadow">
        
        @csrf
        @method('PUT')

        {{-- Nama Kategori --}}
        <label class="block mb-2 font-semibold">Nama Kategori:</label>
        <input type="text"
               name="name"
               value="{{ $category->name }}"
               class="w-full p-3 border rounded mb-4"
               required>

        {{-- Gambar --}}
        <label class="block mb-2 font-semibold">Gambar:</label>
        <input type="file" name="image" class="mb-4">

        {{-- Preview Gambar Lama --}}
        @if($category->image)
           <img src="{{ asset('images/kategori/' . $category->image) }}"
                class="w-24 h-24 object-cover rounded mb-4">
        @endif

        <button class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Update
        </button>

    </form>
</div>
@endsection
