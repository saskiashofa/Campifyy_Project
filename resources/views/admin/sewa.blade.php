@extends('admin.layoutadmin')

@section('content')
<div class="container mt-4">
    <h3>Daftar Sewa</h3>
    <form action="{{ url('/admin/sewa') }}" method="GET" class="w-25 mb-3">
        <div class="input-group">
            <input type="text"
                class="form-control"
                name="keyword"
                placeholder="Cari user atau produk..."
                value="{{ request('keyword') }}"
                autocomplete="off">
            <button class="btn btn-primary" type="submit">
                <i class="bi bi-search"></i> Cari
            </button>
        </div>
    </form>
    <table class="table table-bordered bg-white mt-3" style="text-align: center;">
        <thead class="bg-primary text-white">
            <tr>
                <th>ID Sewa</th>
                <th>Nama User</th>
                <th>Produk</th>
                <th>Gambar</th>
                <th>Total Harga</th>
                <th>Tanggal Checkout</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($sewas as $sewa)
            <tr>
                <td>{{ $sewa->id }}</td>
                <td>{{ $sewa->user->name }}</td>
                <td>{{ $sewa->produk->nama ?? '-' }}</td>
                <td><img src="{{ asset('uploads/produk/' . $sewa->produk->gambar) }}" alt="{{ $sewa->produk->nama }}" width="80"> </td>
                <td>Rp {{ number_format($sewa->produk->harga_day ?? 0, 0, ',', '.') }}</td>
                <td>{{ $sewa->created_at->format('d-m-Y H:i') }}</td>
                <td>
                    <form action="{{ route('admin.sewa.updateStatus', $sewa->id) }}" method="POST" class="d-flex">
    @csrf
    @method('PATCH')
    <button type="submit" name="status" value="order" class="btn btn-sm {{ $sewa->status=='order' ? 'btn-primary' : 'btn-outline-primary' }}">Order</button>
    <button type="submit" name="status" value="pickup" class="btn btn-sm {{ $sewa->status=='pickup' ? 'btn-warning text-dark' : 'btn-outline-warning' }}">Pickup</button>
    <button type="submit" name="status" value="done" class="btn btn-sm {{ $sewa->status=='done' ? 'btn-success' : 'btn-outline-success' }}">Done</button>
</form>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
