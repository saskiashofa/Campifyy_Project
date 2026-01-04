@extends('admin.layoutadmin')

@section('content')
<h4>Edit Kategori</h4>

<form action="/admin/editkategori/{{ $kategori->id_ktg }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3" style="max-width: 500px;">
        <label>Nama Kategori</label>
        <input type="text" name="nama_ktg"
               class="form-control"
               value="{{ $kategori->nama_ktg }}" required>
    </div>
    <button class="btn btn-primary">Update</button>
    <a href="/admin/kategori" class="btn btn-secondary">Kembali</a>
</form>
@endsection
