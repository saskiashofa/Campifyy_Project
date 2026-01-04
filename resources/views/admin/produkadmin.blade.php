@extends('admin.layoutadmin')
@section('content')
<h3 class="mb-4">Data Produk</h3>
<div class="d-flex justify-content-between align-items-center mb-3">
    <a href="/admin/tambahproduk" class="btn btn-primary">
        Tambah Produk
    </a>

    <form action="{{ url('/admin/produk') }}" method="GET" class="d-flex w-2">
    <input type="text"
           class="form-control me-2"
           name="keyword"
           placeholder="Cari produk..."
           value="{{ request('keyword') }}"
           autocomplete="off">
    <button class="btn btn-primary" type="submit">
        <i class="bi bi-search"></i> Cari
    </button>
</form>

</div>

    <table class="table table-bordered bg-white mt-3" style="text-align: center;">
        <tr class="bg-primary text-white">
            <th>No</th>
            <th>Gambar</th>
            <th>Nama</th>
            <th>Deskripsi</th>
            <th>Stok</th>
            <th>Harga</th>
            <th>Kategori</th>
            <th>Aksi</th>
        </tr>
        <tbody>
              @foreach($produk as $p)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>
                  <img src="{{ asset('uploads/produk/'.$p->gambar) }}"width="80">
                </td>
                <td>{{ $p->nama }}</td>
                <td style="max-width: 380px; text-align: justify;">{{ $p->deskripsi }}</td>
                <td>{{ $p->stok }}</td>
                <td style="max-width: 200px">Rp {{ number_format($p->harga_day, 0, ',', '.') }}</td>
                <td>{{ $p->kategori->nama_ktg ?? '-' }}</td>
                <td>
                <a href="/admin/editproduk/{{ $p->id_prod }}" class="btn btn-warning btn-sm mb-1">Edit</a>
                <form action="{{ route('admin.produk.destroy', $p->id_prod) }}" method="POST" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm"
                        onclick="return confirm('Yakin ingin hapus?')">Hapus</button>
                </form>
                </td>
                </td>
              </tr>
              @endforeach
            </tbody>
</table>
@endsection
