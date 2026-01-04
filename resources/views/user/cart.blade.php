@extends('user.layout')

@section('content')

<!-- Breadcrumb -->
<div class="breadcrumb-section hero-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="breadcrumb-text">
                    <p>Tempat Penyewaan Peralatan Outdoor Terbaik</p>
                    <h1>Cart campifyy</h1>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="cart-section mt-5 mb-5">
    <div class="container">

        @if(empty($cart))
            <div class="alert alert-warning text-center">
                Keranjang masih kosong. <a href="{{ route('products') }}">Kembali ke produk</a>
            </div>
        @else
        @php $grandTotal = 0; @endphp

        <div class="row">
            <!-- Cart Items -->
            <div class="col-lg-8 col-md-12">
                <div class="cart-table-wrap bg-light p-3 rounded shadow-sm">
                    <table class="cart-table table table-striped">
                        <thead>
                            <tr>
                                <th>Remove</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Price/Hari</th>
                                <th>Qty</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($cart as $id => $item)
                            @php
                                $start = $item['start_date'];
                                $end = $item['end_date'];
                                $days = (strtotime($end) - strtotime($start)) / 86400 + 1;
                                if($days < 1) $days = 1;

                                $subtotal = $item['harga_day'] * $item['quantity'] * $days;
                                $grandTotal += $subtotal;
                            @endphp
                            <tr>
                                <td>
                                    <button class="btn btn-danger btn-sm" onclick="hapusLangsung('{{ $id }}')">✕</button>
                                </td>
                                <td>
                                    <img src="{{ asset('uploads/produk/' . $item['gambar']) }}" class="img-fluid" width="60">
                                </td>
                                <td>{{ $item['nama'] }}</td>
                                <td>Rp {{ number_format($item['harga_day'],0,',','.') }}</td>
                                <td class="d-flex align-items-center">
                                    <button class="btn btn-outline-secondary btn-sm me-1" data-id="{{ $id }}" onclick="kurangiBtn(this)">−</button>
                                    <span class="mx-2 fw-bold">{{ $item['quantity'] }}</span>
                                    <button class="btn btn-outline-secondary btn-sm ms-1" data-id="{{ $id }}" onclick="tambahBtn(this)">+</button>
                                </td>
                                <td>Rp {{ number_format($subtotal,0,',','.') }}</td>
                            </tr>
                            <tr>
                                <td colspan="6">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Start Date:</label>
                                            <input type="date" class="form-control form-control-sm"
                                                   value="{{ $item['start_date'] }}"
                                                   onchange="updateDate('{{ $id }}','start',this.value)">
                                        </div>
                                        <div class="col-md-6">
                                            <label>End Date:</label>
                                            <input type="date" class="form-control form-control-sm"
                                                   value="{{ $item['end_date'] }}"
                                                   onchange="updateDate('{{ $id }}','end',this.value)">
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Cart Summary -->
            <div class="col-lg-4">
                <div class="total-section bg-light p-3 rounded shadow-sm">
                    <h5 class="mb-3">Cart Summary</h5>
                    <table class="table">
                        <tr>
                            <td><strong>Total:</strong></td>
                            <td class="text-end">Rp {{ number_format($grandTotal,0,',','.') }}</td>
                        </tr>
                    </table>

                    <div class="mt-3 text-center">
                        <a href="{{ route('cart.sewa') }}" class="boxed-btn green w-100">Sewa Sekarang</a>
                    </div>

                    <div class="mt-2 text-center">
                        <a href="{{ route('products') }}" class="text-decoration-none">
                            <i class="fas fa-long-arrow-alt-left"></i> Back to Shop
                        </a>
                    </div>
                </div>
            </div>

        </div>
        @endif
    </div>
</section>

<!-- SweetAlert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
function kurangiBtn(btn){
    let id = btn.dataset.id;
    
    Swal.fire({
        icon: 'warning',
        title: 'Kurangi jumlah?',
        text: 'Apakah Kamu Yakin Ingin Mengurangi Jumlah Produk Ini?',
        showCancelButton: true,
        confirmButtonText: 'Ya',
        cancelButtonText: 'Batal',
        backdrop: false
    }).then((result)=>{
        if(result.isConfirmed){
            updateQuantity(id, -1);
        }
    });
}

function tambahBtn(btn){
    let id = btn.dataset.id;
    updateQuantity(id, 1);
}

function updateQuantity(id, change){
    fetch('/cart/update-quantity/' + id, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': document
                .querySelector('meta[name="csrf-token"]')
                .getAttribute('content'),
            'Content-Type': 'application/json',
            'Accept': 'application/json'
        },
        body: JSON.stringify({ change: change })
    })
    .then(res => res.json())
    .then(data => {
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: 'Produk Berhasil Diupdate',
            timer: 1000,
            showConfirmButton: false,
            backdrop: false
        }).then(() => location.reload());
    });
}

function hapusLangsung(id){
    Swal.fire({
        icon: 'warning',
        title: 'Hapus produk?',
        text: 'Apakah Kamu Yakin Ingin Menghapus Produk Ini?',
        showCancelButton: true,
        confirmButtonText: 'Ya',
        cancelButtonText: 'Batal',
        backdrop: false
    }).then((result)=>{
        if(result.isConfirmed){
            fetch('/cart/remove/' + id, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': document
                        .querySelector('meta[name="csrf-token"]')
                        .getAttribute('content'),
                    'Accept': 'application/json'
                }
            })
            .then(res => res.json())
            .then(data => {
                Swal.fire({
                    icon: 'success',
                    title: 'Dihapus',
                    timer: 1000,
                    showConfirmButton: false,
                    backdrop: false
                }).then(()=> location.reload());
            });
        }
    });
}

function updateDate(id, type, value){
    fetch('/cart/update-dates/' + id, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': document
                .querySelector('meta[name="csrf-token"]')
                .getAttribute('content'),
            'Content-Type': 'application/json',
            'Accept': 'application/json'
        },
        body: JSON.stringify({ type: type, value: value })
    })
    .then(res => res.json())
    .then(() => {
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: 'Tanggal berhasil diupdate',
            timer: 1000,
            showConfirmButton: false,
            backdrop: false
        }).then(()=> location.reload());
    });
}
</script>

@endsection
