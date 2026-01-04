@extends('user.layout')

@section('content')

<!-- breadcrumb -->
<div class="breadcrumb-section hero-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="breadcrumb-text">
                    <p>Tempat Penyewaan Peralatan Outdoor Terbaik</p>
                    <h1>Products Campifyy</h1>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- search & filter -->
<div class="container mt-5">
    <form action="{{ route('products') }}" method="GET" class="row g-2 justify-content-center">
        <div class="col-md-5">
            <input type="text" name="keyword" class="form-control form-control-lg" style="font-family: 'Poppins', sans-serif;"
                   placeholder="Cari produk..." 
                   value="{{ request('keyword') }}">
        </div>
        <div class="col-md-4">
            <select name="kategori" class="form-control form-control-lg" style="font-family: 'Poppins', sans-serif;">
                <option value="">Semua Kategori</option>
                @foreach($kategoris as $ktg)
                    <option value="{{ $ktg->id_ktg }}" 
                        {{ request('kategori') == $ktg->id_ktg ? 'selected' : '' }}>
                        {{ $ktg->nama_ktg }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="col-md-2">
            <button type="submit" class="btn btn-login w-70">Cari</button>
        </div>
    </form>
</div>

<!-- product section -->
<section class="product-section mt-100 mb-100">
    <div class="container">
        <div class="row product-lists">
            @foreach($products as $product)
                <div class="col-lg-3 col-md-6 text-center {{ $product->kategori->slug ?? '' }}">
                    <div class="single-product-item">

                        <div class="product-image">
                            <img src="{{ asset('uploads/produk/' . $product->gambar) }}" 
                                 alt="{{ $product->nama }}">
                        </div>

                        <h3>{{ $product->nama }}</h3>

                        <p class="product-price">
                            <span>Harga per hari</span>
                            Rp {{ number_format($product->harga_day,0,',','.') }}
                        </p>

                        <p class="text-muted" style="font-size:14px">
                            Kategori: {{ $product->kategori->nama_ktg ?? '-' }} <br>
                            Stok: {{ $product->stok }}
                        </p>

                        @if(Auth::check())
                        <a href="javascript:void(0)" 
                           class="cart-btn"
                           onclick="addToCart('{{ $product->id_prod }}')">
                            <i class="fas fa-shopping-cart"></i> Add to Cart
                        </a>
                        @else
                        <a href="javascript:void(0)" 
                           class="cart-btn w-5"
                           onclick="loginAlert()">
                            <i class="fas fa-shopping-cart"></i> Add to Cart
                        </a>
                        @endif

                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- SweetAlert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
function loginAlert() {
    Swal.fire({
        icon: 'warning',
        title: 'Login',
        text: 'Silahkan Login',
        confirmButtonText: 'Login',
        backdrop: false,
        showClass: { popup: "" },
        hideClass: { popup: "" },
        backdrop: false,
    }).then(() => {
        window.location.href = "{{ route('login') }}";
    });
}

function addToCart(id_prod){
    fetch(`/cart/add/${id_prod}`, {
        method: 'POST',
        headers:{
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            'Accept': 'application/json'
        }
    })
    .then(res => res.json())
    .then(data => {
        Swal.fire({
            icon: data.status,
            title: data.status === 'success' ? 'Berhasil' : 'Gagal',
            text: 'Produk Berhasil ditambahkan ke keranjang!',
            timer: 1200,
            showConfirmButton: false,
            backdrop: false,
            showClass: { popup: "" },
            hideClass: { popup: "" }
        });
    })
    .catch(err => console.error('Error:', err));
}
</script>

@endsection