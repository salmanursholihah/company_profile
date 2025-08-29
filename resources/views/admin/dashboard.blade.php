@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
  <!-- Header -->
  <div class="flex justify-between items-center mb-6">
    <h1 class="text-3xl font-bold">Dashboard</h1>
    <input type="text" placeholder="Search..." class="border rounded px-3 py-1">
  </div>

  <!-- Statistik Cards -->
  <div id="stats" class="grid grid-cols-4 gap-6 mb-6"></div>

  <!-- Content Grid -->
  <div class="grid grid-cols-3 gap-6">
    <div class="col-span-2 bg-white p-6 rounded-xl shadow">
      <h2 class="font-bold text-lg mb-4">Page Analytics</h2>
      <canvas id="barChart"></canvas>
    </div>
    <div class="bg-white p-6 rounded-xl shadow admin-only">
      <h2 class="font-bold text-lg mb-4">Survey Analytics</h2>
      <canvas id="pieChart"></canvas>
    </div>
  </div>
@endsection

@push('scripts')
<script>
  const role = "vendor"; // ubah ke admin/vendor

  const stats = document.getElementById("stats");
  if(role === "super_admin") {
    stats.innerHTML = `
      <div class="bg-blue-500 text-white p-5 rounded-xl shadow">Visitors<br><span class="text-2xl font-bold">2690</span></div>
      <div class="bg-yellow-400 text-white p-5 rounded-xl shadow">Feedback<br><span class="text-2xl font-bold">40</span></div>
      <div class="bg-teal-500 text-white p-5 rounded-xl shadow">Vendors<br><span class="text-2xl font-bold">230</span></div>
      <div class="bg-green-500 text-white p-5 rounded-xl shadow">Products Sold<br><span class="text-2xl font-bold">450</span></div>
    `;
  } else {
    stats.innerHTML = `
      <div class="bg-blue-500 text-white p-5 rounded-xl shadow">Produk Saya<br><span class="text-2xl font-bold">25</span></div>
      <div class="bg-yellow-400 text-white p-5 rounded-xl shadow">blog<br><span class="text-2xl font-bold">18</span></div>
      <div class="bg-teal-500 text-white p-5 rounded-xl shadow">user<br><span class="text-2xl font-bold">Rp 12jt</span></div>
      <div class="bg-green-500 text-white p-5 rounded-xl shadow">vendor<br><span class="text-2xl font-bold">4.7</span></div>
    `;
  }

  if(role === "super_admin") {
    document.querySelectorAll(".vendor-only").forEach(el => el.style.display = "none");
  } else {
    document.querySelectorAll(".admin-only").forEach(el => el.style.display = "none");
  }

  new Chart(document.getElementById('barChart'), {
    type: 'bar',
    data: {
      labels: ['Jan','Feb','Mar','Apr','Mei','Jun'],
      datasets: [{ label: 'Visitors', data: [120,190,300,500,200,300], backgroundColor: 'rgba(59,130,246,0.7)' }]
    }
  });

  if(role === "super_admin") {
    new Chart(document.getElementById('pieChart'), {
      type: 'pie',
      data: {
        labels: ['Excellent','Good','Medium','Bad'],
        datasets: [{ data: [55,25,15,5], backgroundColor: ['#10B981','#3B82F6','#FBBF24','#EF4444'] }]
      }
    });
  }
</script>
@endpush
