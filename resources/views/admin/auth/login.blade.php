<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Admin</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 min-h-screen flex items-center justify-center px-4">

    <div class="bg-white p-10 rounded-2xl shadow-xl w-full max-w-md border border-gray-200 text-center">

        <!-- LOGO -->
        <div class="flex justify-center mb-6">
            <img 
                src="/images/logo.jpeg" 
                alt="Logo" 
                class="w-24 h-24 object-cover rounded-full shadow"
            >
        </div>

        <h2 class="text-3xl font-bold mb-6 text-gray-800 tracking-wide">
            Admin Login
        </h2>

        @if (session('error'))
            <p class="text-red-600 bg-red-100 py-2 px-3 rounded mb-4 text-sm">
                {{ session('error') }}
            </p>
        @endif

        <form method="POST" action="{{ route('admin.login.submit') }}">
            @csrf

            <div class="text-left">

                <!-- Email -->
                <label class="block mb-2 font-medium text-gray-700">Email</label>
                <input 
                    type="email" 
                    name="email" 
                    class="w-full p-3 border border-gray-300 rounded-lg mb-4 
                           focus:ring-2 focus:ring-pink-400 focus:border-pink-500 transition"
                    placeholder="admin@example.com"
                    required
                >

                <!-- Password -->
                <label class="block mb-2 font-medium text-gray-700">Password</label>
                <input 
                    type="password" 
                    name="password" 
                    class="w-full p-3 border border-gray-300 rounded-lg mb-6
                           focus:ring-2 focus:ring-pink-400 focus:border-pink-500 transition"
                    placeholder="••••••••"
                    required
                >
            </div>

            <!-- Button -->
            <button 
                class="w-full bg-pink-600 hover:bg-pink-700 text-white py-3 rounded-lg 
                       text-lg font-semibold transition shadow-sm hover:shadow"
            >
                Login
            </button>

        </form>

    </div>

</body>
</html>
