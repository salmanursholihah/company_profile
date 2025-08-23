<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Ositech Admin')</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="flex bg-gray-100">

  <!-- Sidebar -->
  <aside class="w-64 bg-white shadow h-screen p-5">
    <h2 class="text-2xl font-bold mb-8">Ositech</h2>
    <nav class="flex-1 px-4 space-y-2">
      <a href="{{ route('admin.dashboard') }}" class="block py-2 px-3 rounded hover:bg-cyan-600">Dashboard</a>
      <a href="{{ route('admin.product.index') }}" class="block py-2 px-3 rounded hover:bg-cyan-600">Product</a>
      <a href="{{ route('admin.product_saya.index') }}" class="block py-2 px-3 rounded hover:bg-cyan-600">Product vendor</a>
      <a href="{{ route('admin.vendor.index') }}" class="block py-2 px-3 rounded hover:bg-cyan-600">Vendor</a>
      <a href="{{ route('admin.blog.index') }}" class="block py-2 px-3 rounded hover:bg-cyan-600">Blog artikel</a>
      <a href="{{ route('admin.contact.index') }}" class="block py-2 px-3 rounded hover:bg-cyan-600">Contact</a>
      <a href="{{ route('admin.user.index') }}" class="block py-2 px-3 rounded hover:bg-cyan-600">Users</a>
      <a href="{{ route('admin.setting') }}" class="block py-2 px-3 rounded hover:bg-cyan-600">Settings</a>
      <a href="{{ route('admin.profile.admin_profile') }}" class="block py-2 px-3 rounded hover:bg-cyan-600">profile admin</a>
      <a href="{{ route('admin.profile.vendor_profile') }}" class="block py-2 px-3 rounded hover:bg-cyan-600">Vendor admin</a>
    </nav>
    <div class="p-4 border-t border-cyan-600">
      <a href="#" class="block py-2 px-3 rounded hover:bg-cyan-600">Logout</a>
    </div>
  </aside>

  <!-- Main -->
  <main class="flex-1 p-6">
    @yield('content')
  </main>

  @stack('scripts')
  @stack('styles')
</body>
</html>
