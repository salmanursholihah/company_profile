@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div class="container-fluid">
    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-dark fw-bold">Dashboard</h1>
        <input type="text" class="form-control w-25" placeholder="Search...">
    </div>

    <!-- Statistik Cards -->
    <div id="stats" class="row mb-4"></div>

    <!-- Content Grid -->
    <div class="row">
        <!-- Chart utama -->
        <div class="col-lg-8 mb-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title fw-bold mb-3">Page Analytics</h5>
                    <canvas id="barChart" height="100"></canvas>
                </div>
            </div>
        </div>

        <!-- Chart tambahan -->
        <div class="col-lg-4 mb-4 admin-only">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title fw-bold mb-3">Survey Analytics</h5>
                    <canvas id="pieChart" height="200"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const role = "{{ auth()->user()->role ?? 'vendor' }}"; // ambil dari Laravel Auth

    const stats = document.getElementById("stats");

    if (role === "super_admin") {
        stats.innerHTML = `
            <div class="col-md-3">
                <div class="card text-white bg-primary mb-3 shadow">
                    <div class="card-body">
                        <h6 class="card-title">Visitors</h6>
                        <h3>2690</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-white bg-warning mb-3 shadow">
                    <div class="card-body">
                        <h6 class="card-title">Feedback</h6>
                        <h3>40</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-white bg-info mb-3 shadow">
                    <div class="card-body">
                        <h6 class="card-title">Vendors</h6>
                        <h3>230</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-white bg-success mb-3 shadow">
                    <div class="card-body">
                        <h6 class="card-title">Products Sold</h6>
                        <h3>450</h3>
                    </div>
                </div>
            </div>
        `;
    } else {
        stats.innerHTML = `
            <div class="col-md-3">
                <div class="card text-white bg-primary mb-3 shadow">
                    <div class="card-body">
                        <h6 class="card-title">Produk Saya</h6>
                        <h3>25</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-white bg-warning mb-3 shadow">
                    <div class="card-body">
                        <h6 class="card-title">Blog</h6>
                        <h3>18</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-white bg-info mb-3 shadow">
                    <div class="card-body">
                        <h6 class="card-title">User</h6>
                        <h3>Rp 12jt</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-white bg-success mb-3 shadow">
                    <div class="card-body">
                        <h6 class="card-title">Vendor</h6>
                        <h3>4.7</h3>
                    </div>
                </div>
            </div>
        `;
    }

    // sembunyikan bagian khusus
    if (role === "super_admin") {
        document.querySelectorAll(".vendor-only").forEach(el => el.style.display = "none");
    } else {
        document.querySelectorAll(".admin-only").forEach(el => el.style.display = "none");
    }

    // === Chart.js ===
    new Chart(document.getElementById('barChart'), {
        type: 'bar',
        data: {
            labels: ['Jan','Feb','Mar','Apr','Mei','Jun'],
            datasets: [{
                label: 'Visitors',
                data: [120,190,300,500,200,300],
                backgroundColor: 'rgba(54,162,235,0.7)'
            }]
        },
        options: {
            plugins: { legend: { display: false } },
            scales: { y: { beginAtZero: true } }
        }
    });

    if (role === "super_admin") {
        new Chart(document.getElementById('pieChart'), {
            type: 'pie',
            data: {
                labels: ['Excellent','Good','Medium','Bad'],
                datasets: [{
                    data: [55,25,15,5],
                    backgroundColor: ['#198754','#0d6efd','#ffc107','#dc3545']
                }]
            }
        });
    }
});
</script>
@endpush
