@extends('admin.layouts.app')

@section('title', 'Kategori Produk')

@section('content')
<div class="p-6">

    {{-- Header --}}
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Manajemen Kategori</h2>

        <a href="{{ route('admin.categories.create') }}" 
           class="px-4 py-2 rounded-lg bg-blue-600 text-white font-medium hover:bg-blue-700 transition">
            + Tambah Kategori
        </a>
    </div>

    {{-- Success Message --}}
    @if(session('success'))
        <div class="p-4 mb-5 bg-green-100 border border-green-300 text-green-800 rounded-lg">
            {{ session('success') }}
        </div>
    @endif

    {{-- Tabel --}}
    <div class="bg-white shadow rounded-xl overflow-hidden border">
        <table class="w-full table-auto text-sm">
            <thead>
                <tr class="bg-gray-100 text-gray-700 uppercase text-xs">
                    <th class="p-3 border">Gambar</th>
                    <th class="p-3 border text-left">Nama Kategori</th>
                    <th class="p-3 border text-center">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @foreach($categories as $kategori)
                <tr class="hover:bg-gray-50 transition">
                    
                    {{-- Gambar --}}
                    <td class="p-3 border text-center">
                        @if($kategori->image)
                            <img src="{{ asset('images/kategori/' . $kategori->image) }}" 
                                 class="w-16 h-16 object-cover rounded-lg shadow-sm mx-auto">
                        @else
                            <span class="px-2 py-1 text-xs bg-gray-200 text-gray-600 rounded-full">
                                Tidak ada gambar
                            </span>
                        @endif
                    </td>

                    {{-- Nama --}}
                    <td class="p-3 border font-medium text-gray-800">
                        {{ $kategori->name }}
                    </td>

                    {{-- Aksi --}}
                    <td class="p-3 border text-center space-x-2">

                        {{-- Tombol Edit --}}
                        <a href="{{ route('admin.categories.edit', $kategori->id) }}"
                           class="px-3 py-1 rounded-md bg-blue-500 text-white hover:bg-blue-600 transition">
                            Edit
                        </a>

                        {{-- Tombol Hapus --}}
                        <form action="{{ route('admin.categories.destroy', $kategori->id) }}"
                              method="POST"
                              class="inline"
                              onsubmit="return confirm('Yakin ingin menghapus kategori ini?')">

                            @csrf
                            @method('DELETE')

                            <button 
                                class="px-3 py-1 rounded-md bg-red-500 text-white hover:bg-red-600 transition">
                                Hapus
                            </button>
                        </form>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>
@endsection
