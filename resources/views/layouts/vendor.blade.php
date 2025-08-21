<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Dashboard' }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="bg-gray-100 font-sans">

    <div class="flex h-screen">
        <!-- Sidebar -->
        <aside class="w-64 bg-gradient-to-b from-cyan-900 to-cyan-700 text-white flex flex-col">
            <div class="p-6 text-2xl font-bold">Ositech</div>
            <nav class="flex-1 px-4 space-y-2">
                <a href="{{ route('vendor.dashboard') }}" class="block py-2 px-3 rounded hover:bg-cyan-600">Dashboard</a>
                <a href="#" class="block py-2 px-3 rounded hover:bg-cyan-600">product saya</a>
                <a href="#" class=" block py-2 px-3 rounded hover:bg-cyan-600">pesanan saya</a>
                <a href="#" class="block py-2 px-3 rounded hover:bg-cyan-600">profil vendor</a>
                <a href="#" class="block py-2 px-3 rounded hover:bg-cyan-600">Settings</a>
            </nav>
            <div class="p-4 border-t border-cyan-600">
                <a href="#" class="block py-2 px-3 rounded hover:bg-cyan-600">Logout</a>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-6 overflow-y-auto">
            <header class="flex justify-between items-center mb-6">
                <h1 class="text-2xl font-bold">{{ $title ?? 'Dashboard' }}</h1>
                <input type="text" placeholder="Search..." class="px-3 py-2 rounded border border-gray-300">
            </header>

            @yield('content')
        </main>
    </div>

</body>
</html>
