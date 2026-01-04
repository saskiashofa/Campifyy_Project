@extends('admin.layoutadmin')

@section('content')
<div class="container py-5">
    <h2 class="mb-4"><b>Hello, Admin Campifyy!</b></h2>
    <div class="row g-4">

        <!-- Produk -->
        <div class="col-md-3">
            <a href="{{ route('admin.produk') }}" class="text-decoration-none">
                <div class="card shadow-sm h-100 text-center">
                    <div class="card-body">
                        <i class="fas fa-box fa-2x mb-3"></i>
                        <h5 class="card-title">Produk</h5>
                        <p class="card-text">Lihat daftar alat camping yang tersedia.</p>
                    </div>
                </div>
            </a>
        </div>

        <!-- Sewa -->
        <div class="col-md-3">
            <a href="{{ route('admin.sewa') }}" class="text-decoration-none">
                <div class="card shadow-sm h-100 text-center">
                    <div class="card-body">
                        <i class="fas fa-shopping-cart fa-2x mb-3"></i>
                        <h5 class="card-title">Riwayat Sewa</h5>
                        <p class="card-text">Cek status pesanan dan riwayat sewa.</p>
                    </div>
                </div>
            </a>
        </div>

        <!-- Kategori -->
        <div class="col-md-3">
            <a href="{{ route('admin.kategori') }}" class="text-decoration-none">
                <div class="card shadow-sm h-100 text-center">
                    <div class="card-body">
                        <i class="fas fa-tags fa-2x mb-3"></i>
                        <h5 class="card-title">Kategori</h5>
                        <p class="card-text">Lihat kategori produk camping.</p>
                    </div>
                </div>
            </a>
        </div>

        <!-- User -->
        <div class="col-md-3">
            <a href="{{ route('admin.users') }}" class="text-decoration-none">
                <div class="card shadow-sm h-100 text-center">
                    <div class="card-body">
                        <i class="fas fa-user fa-2x mb-3"></i>
                        <h5 class="card-title">User</h5>
                        <p class="card-text">Lihat daftar user yang sudah bergabung.</p>
                    </div>
                </div>
            </a>
        </div>

    </div>
</div>
@endsection
