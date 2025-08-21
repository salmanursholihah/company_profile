
@section('title', 'Daftar Produk')

@section('content')
<main class="main container py-5">
    <h2 class="fw-bold mb-4 text-center">Daftar Produk</h2>
    <div class="row g-4">

        <!-- Produk 1 -->
        <div class="col-md-3">
            <div class="card h-100 shadow-sm">
                <img src="{{ asset('assets/img/product1.jpg') }}" class="card-img-top" alt="Produk 1">
                <div class="card-body text-center">
                    <h6 class="fw-bold">Produk Contoh</h6>
                    <p class="text-success">Rp 160.000</p>
                    <a href="{{ route('product.show','produk-contoh') }}" class="btn btn-sm btn-outline-primary">Detail</a>
                </div>
            </div>
        </div>

        <!-- Produk 2 -->
        <div class="col-md-3">
            <div class="card h-100 shadow-sm">
                <img src="{{ asset('assets/img/product2.jpg') }}" class="card-img-top" alt="Produk 2">
                <div class="card-body text-center">
                    <h6 class="fw-bold">Produk Kedua</h6>
                    <p class="text-success">Rp 250.000</p>
                    <a href="{{ route('product.show','produk-kedua') }}" class="btn btn-sm btn-outline-primary">Detail</a>
                </div>
            </div>
        </div>

    </div>
</main>
@endsection