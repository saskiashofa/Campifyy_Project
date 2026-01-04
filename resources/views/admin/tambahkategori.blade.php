@extends('admin.layoutadmin')

@section('content')
<h4>Tambah Kategori</h4>

<form action="/admin/tambahkategori" method="POST">
    @csrf
    <div class="mb-3" style="max-width: 500px;">
        <label>Nama Kategori</label>
        <input type="text" name="nama_ktg" class="form-control" required>
    </div>
    <button class="btn btn-primary">Simpan</button>
    <a href="/admin/kategori" class="btn btn-secondary">Kembali</a>
</form>
@endsection
