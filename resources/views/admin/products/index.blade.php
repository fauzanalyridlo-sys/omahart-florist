@extends('admin.layouts.app')

@section('title', 'List Produk')

@section('content')
<div class="p-6">

    {{-- Header --}}
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Manajemen Produk</h2>

        <a href="{{ route('admin.products.create') }}"
           class="px-4 py-2 rounded-lg bg-blue-600 text-white font-medium hover:bg-blue-700 shadow transition">
            + Tambah Produk
        </a>
    </div>

    {{-- Alert sukses --}}
    @if(session('success'))
        <div class="p-4 mb-6 bg-green-100 border border-green-300 text-green-800 rounded-lg">
            {{ session('success') }}
        </div>
    @endif

    {{-- Tabel Produk --}}
    <div class="bg-white rounded-xl shadow border overflow-hidden">
        <table class="w-full table-auto text-sm">
            <thead>
                <tr class="bg-gray-100 text-gray-700 uppercase text-xs">
                    <th class="p-3 border">Gambar</th>
                    <th class="p-3 border text-left">Nama Produk</th>
                    <th class="p-3 border text-left">Kategori</th>
                    <th class="p-3 border text-left">Harga</th>
                    <th class="p-3 border text-center">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse($products as $p)
                <tr class="hover:bg-gray-50 transition">

                    {{-- Gambar Produk --}}
                    <td class="p-3 border text-center">
                        @if($p->image)
                            <img src="{{ asset('produk/' . $p->image) }}"
                                class="w-16 h-16 object-cover rounded-lg shadow-sm mx-auto">
                        @else
                            <span class="px-2 py-1 bg-gray-200 text-gray-600 text-xs rounded-full">
                                Tidak ada gambar
                            </span>
                        @endif
                    </td>

                    {{-- Nama --}}
                    <td class="p-3 border font-medium text-gray-800">
                        {{ $p->name }}
                    </td>

                    {{-- Kategori --}}
                    <td class="p-3 border">
                        <span class="bg-pink-100 text-pink-600 px-2 py-1 rounded text-xs">
                            {{ $p->category->name }}
                        </span>
                    </td>

                    {{-- Harga --}}
                    <td class="p-3 border font-semibold text-gray-700">
                        Rp {{ number_format($p->start_price, 0, ',', '.') }}
                    </td>

                    {{-- Aksi --}}
                    <td class="p-3 border text-center space-x-2">

                        {{-- Edit --}}
                        <a href="{{ route('admin.products.edit', $p->id) }}"
                           class="px-3 py-1 rounded-md bg-blue-500 text-white hover:bg-blue-600 transition">
                            Edit
                        </a>

                        {{-- Delete --}}
                        <form action="{{ route('admin.products.destroy', $p->id) }}"
                              method="POST" class="inline"
                              onsubmit="return confirm('Yakin ingin menghapus produk ini?')">
                            
                            @csrf
                            @method('DELETE')

                            <button class="px-3 py-1 rounded-md bg-red-500 text-white hover:bg-red-600 transition">
                                Hapus
                            </button>
                        </form>

                    </td>

                </tr>

                @empty
                <tr>
                    <td colspan="5" class="p-6 text-center text-gray-500 text-sm">
                        Belum ada produk.
                    </td>
                </tr>
                @endforelse
            </tbody>

        </table>
    </div>

</div>
@endsection
