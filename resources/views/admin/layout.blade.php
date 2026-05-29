<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin Panel</title>
  @vite('resources/css/app.css')
</head>

<body class="bg-gray-100">

  <nav class="bg-gray-900 text-white p-4 flex justify-between">
    <h1 class="text-xl font-bold">Admin Panel</h1>

    <form action="{{ route('admin.logout') }}" method="POST">
      @csrf
      <button class="bg-red-600 px-4 py-2 rounded">Logout</button>
    </form>
  </nav>

  <main>
    @yield('content')
  </main>

</body>
</html>
