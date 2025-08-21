@extends('layouts.vendor')

@section('content')
<div class="grid grid-cols-4 gap-6 mb-6">
    <!-- Cards -->
    <div class="bg-white p-4 rounded-xl shadow text-center">
        <p class="text-gray-500">Total Products</p>
        <h2 class="text-2xl font-bold">{{ $productsCount ?? 5483 }}</h2>
    </div>
    <div class="bg-white p-4 rounded-xl shadow text-center">
        <p class="text-gray-500">Orders</p>
        <h2 class="text-2xl font-bold">{{ $ordersCount ?? 2859 }}</h2>
    </div>
    <div class="bg-white p-4 rounded-xl shadow text-center">
        <p class="text-gray-500">Total Stock</p>
        <h2 class="text-2xl font-bold">{{ $stockCount ?? 5483 }}</h2>
    </div>
    <div class="bg-white p-4 rounded-xl shadow text-center">
        <p class="text-gray-500">Out of Stock</p>
        <h2 class="text-2xl font-bold text-red-500">{{ $outOfStock ?? 38 }}</h2>
    </div>
</div>

<div class="grid grid-cols-3 gap-6">
    <!-- Chart: Inventory -->
    <div class="bg-white p-4 rounded-xl shadow">
        <h3 class="font-bold mb-4">Inventory Values</h3>
        <canvas id="inventoryChart"></canvas>
    </div>

    <!-- Chart: Top Stores -->
    <div class="bg-white p-4 rounded-xl shadow col-span-2">
        <h3 class="font-bold mb-4">Top 10 Stores by Sales</h3>
        <canvas id="storeChart"></canvas>
    </div>
</div>

<div class="bg-white p-6 rounded-xl shadow mt-6">
    <h3 class="font-bold mb-4">Expenses vs Profit (last 6 months)</h3>
    <canvas id="profitChart"></canvas>
</div>

<script>
    // Pie Chart
    new Chart(document.getElementById('inventoryChart'), {
        type: 'doughnut',
        data: {
            labels: ['Sold units', 'Total units'],
            datasets: [{
                data: [32, 68],
                backgroundColor: ['#06b6d4', '#e5e7eb'],
            }]
        }
    });

    // Bar Chart
    new Chart(document.getElementById('storeChart'), {
        type: 'bar',
        data: {
            labels: ['Store A','Store B','Store C','Store D','Store E'],
            datasets: [{
                label: 'Sales',
                data: [1200, 950, 870, 740, 500],
                backgroundColor: '#06b6d4'
            }]
        },
        options: { responsive: true, indexAxis: 'y' }
    });

    // Line Chart
    new Chart(document.getElementById('profitChart'), {
        type: 'line',
        data: {
            labels: ['Jan','Feb','Mar','Apr','May','Jun'],
            datasets: [
                { label: 'Expenses', data: [400, 300, 500, 450, 600, 550], borderColor: '#ef4444', fill: false },
                { label: 'Profit', data: [500, 450, 700, 600, 750, 800], borderColor: '#22c55e', fill: false }
            ]
        },
        options: { responsive: true }
    });
</script>
@endsection
