@extends('admin.layoutadmin')

@section('content')
<h3 class="mb-4">Data Kategori</h3>
<div class="d-flex justify-content-between align-items-center mb-3">
    <a href="/admin/tambahkategori" class="btn btn-primary mb-3">
        Tambah Kategori
    </a>
    <form action="{{ url('/admin/kategori') }}" method="GET" class="w-25">
        <div class="input-group">
            <input type="text"
                   class="form-control"
                   name="keyword"
                   placeholder="Cari kategori..."
                   value="{{ request('keyword') }}"
                   autocomplete="off">
            <button class="btn btn-primary" type="submit">
                <i class="bi bi-search"></i> Cari
            </button>
        </div>
    </form>
</div>

<table class="table table-bordered bg-white mt-3" style="text-align: center;">
        <thead class="bg-primary text-white">
        <tr>
            <th>No</th>
            <th>Nama Kategori</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($kategori as $k)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $k->nama_ktg }}</td>
            <td>
                <a href="/admin/editkategori/{{ $k->id_ktg }}" class="btn btn-warning btn-sm">Edit</a>
                <a href="/admin/hapuskategori/{{ $k->id_ktg }}" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin hapus?')">Hapus</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
