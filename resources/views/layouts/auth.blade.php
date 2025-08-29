<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'auth page')</title>
    <script src="https:://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="w-full max-w-md bg-white p-8 rounded-xl shadow-lg">
        <h1 class="text-2x1 font-bold mb-6 text-center">@yield('title')</h1>
        @if(session('success'))
        <div class="bg-green-100 text-green-800 p-3 rounded mb-4">{{ session('success') }}</div>
        @endif
        @yield('content')
    </div>
    
</body>
</html>