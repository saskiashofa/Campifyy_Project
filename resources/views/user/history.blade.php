@extends('user.layout')

@section('content')
<!-- Breadcrumb -->
<div class="breadcrumb-section hero-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="breadcrumb-text">
                    <p>Tempat Penyewaan Peralatan Outdoor Terbaik</p>
                    <h1>History Campifyy</h1>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container py-5 bg-faded rounded shadow-sm mb-5 mt-5">
    <div class="container px-5">
        
    @if(session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: 'Pesanan Anda telah berhasil dibuat.',
            confirmButtonColor: '#3085d6'
        });
    </script>
    @endif

    @if($sewas->isEmpty())
        <div class="alert alert-info">Belum ada riwayat pesanan.</div>
    @else
        @foreach($sewas as $sewa)
            <div class="card shadow-sm mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div>
                        <strong>Order #{{ $sewa->id }}</strong> | {{ $sewa->created_at->format('d M Y H:i') }}
                    </div>
                    <div>
                        <span class="badge bg-primary">{{ strtoupper($sewa->payment_method) }}</span>
                    </div>
                </div>
                <div class="card-body p-3">
                    <div class="table-responsive">
                        <table class="table table-borderless mb-0">
                            <thead>
                                <tr>
                                    <th>Nama Barang</th>
                                    <th>Periode</th>
                                    <th>Jumlah Hari</th>
                                    <th class="text-end">Total Harga</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $sewa->produk->nama ?? 'Produk sudah dihapus' }}</td>
                                    <td>{{ $sewa->tgl_mulai }} - {{ $sewa->tgl_selesai }}</td>
                                    <td>{{ $sewa->total_hari }}</td>
                                    <td class="text-end">Rp {{ number_format($sewa->total_harga,0,',','.') }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @endforeach
    @endif
</div>
</div>
</section>
@endsection
