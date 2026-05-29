@extends('admin.layouts.app')

@section('title', 'Dashboard Admin')

@section('content')
<div class="p-6">

    {{-- Judul --}}
    <h1 class="text-2xl font-bold mb-6">Dashboard Admin</h1>

    {{-- Cards Statistik --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

        {{-- Total Kategori --}}
        <div class="bg-white rounded-xl shadow-md p-6">
            <h3 class="text-gray-600 text-sm">Total Kategori</h3>
            <p class="text-3xl font-bold mt-2">{{ $totalCategories }}</p>
        </div>

        {{-- Total Produk --}}
        <div class="bg-white rounded-xl shadow-md p-6">
            <h3 class="text-gray-600 text-sm">Total Produk</h3>
            <p class="text-3xl font-bold mt-2">{{ $totalProducts }}</p>
        </div>

        {{-- Total Admin --}}
        <div class="bg-white rounded-xl shadow-md p-6">
            <h3 class="text-gray-600 text-sm">Total Admin</h3>
            <p class="text-3xl font-bold mt-2">{{ $totalUsers }}</p>
        </div>

    </div>

</div>
@endsection
