@extends('admin.layoutadmin')

@section('content')
<h4 class="mb-4">Tambah Product</h4>

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif


<form action="/admin/tambahproduk" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="mb-3" style="max-width: 500px;">
        <label class="form-label">Gambar Produk</label>
        <input type="file" name="gambar" class="form-control" required>
    </div>

    <div class="mb-3" style="max-width: 500px;">
        <label class="form-label">Nama Produk</label>
        <input type="text" name="nama" class="form-control" required>
    </div>

    <div class="mb-3" style="max-width: 500px;">
        <label class="form-label">Deskripsi</label>
        <textarea name="deskripsi" class="form-control" rows="3" required></textarea>
    </div>

    <div class="mb-3" style="max-width: 500px;">
        <label class="form-label">Harga</label>
        <input type="number" name="harga_day" class="form-control" required>
    </div>

    <div class="mb-3" style="max-width: 500px;">
        <label class="form-label">Stok</label>
        <input type="number" name="stok" class="form-control" required>
    </div>

    <div class="mb-3" style="max-width: 500px;">
    <label class="form-label">Kategori</label>
    <select name="id_ktg" class="form-control" required>
        <option value="">-- Pilih Kategori --</option>
        @foreach($kategori as $k)
            <option value="{{ $k->id_ktg }}">{{ $k->nama_ktg }}</option>
        @endforeach
    </select>
    </div>

    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="/admin/produk" class="btn btn-secondary">Kembali</a>
</form>
@endsection
