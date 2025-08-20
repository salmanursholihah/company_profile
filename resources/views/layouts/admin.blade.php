<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Admin Panel')</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body { background: #f8f9fa; }
    .sidebar {
      height: 100vh;
      background: #343a40;
      padding-top: 1rem;
    }
    .sidebar a {
      color: #fff;
      display: block;
      padding: 10px 15px;
      text-decoration: none;
    }
    .sidebar a:hover {
      background: #495057;
    }
  </style>
</head>
<body>
  <div class="container-fluid">
    <div class="row">
      <!-- Sidebar -->
      <div class="col-md-2 sidebar">
        <h5 class="text-white px-3">Admin Panel</h5>
        <a href="{{ route('admin.dashboard') }}">Dashboard</a>
        <a href="{{ route('admin.users') }}">Users</a>
        <a href="{{ route('admin.settings') }}">Settings</a>
      </div>

      <!-- Content -->
      <div class="col-md-10 p-4">
        <h3>@yield('page-title')</h3>
        <hr>
        @yield('content')
      </div>
    </div>
  </div>
</body>
</html>
