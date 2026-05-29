<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100">

    {{-- Navbar Admin --}}
    <nav class="bg-gray-900 text-white py-4 px-6 flex justify-between items-center">
        <h1 class="font-bold text-xl">Admin Panel</h1>

        <div class="flex items-center gap-6">

            <a href="{{ route('admin.dashboard') }}" 
               class="hover:text-pink-400">
                Dashboard
            </a>

            <a href="{{ route('admin.categories.index') }}" 
               class="hover:text-pink-400">
                Kategori
            </a>

            <a href="{{ route('admin.products.index') }}" 
               class="hover:text-pink-400">
                Produk
            </a>

            <form action="{{ route('admin.logout') }}" method="POST">
                @csrf
                <button class="bg-red-500 px-3 py-1 rounded text-sm hover:bg-red-600">
                    Logout
                </button>
            </form>

        </div>
    </nav>

    {{-- Main Content --}}
    <main class="py-8 px-6">
        @yield('content')
    </main>

</body>
</html>
