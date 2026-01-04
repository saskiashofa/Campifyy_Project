@extends('admin.layoutadmin')

@section('content')
<h4>Edit Produk</h4>

<form action="/admin/editproduk/{{ $produk->id_prod}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="mb-3" style="max-width: 500px;">
        <label class="form-label">Gambar Saat Ini</label><br>
        <img src="{{ asset('uploads/produk/'.$produk->gambar)}}"
             alt="Gambar Produk"
             style="max-width: 150px; border: 1px solid #ddd; padding: 5px;">
    </div>

    <div class="mb-3" style="max-width: 500px;">
        <label>Ganti Gambar (Opsional)</label>
        <input type="file" name="gambar" class="form-control">
    </div>

    <div class="mb-3" style="max-width: 500px;">
        <label>Nama Produk</label>
        <input type="text" name="nama" class="form-control" value="{{ $produk->nama}}" required>
    </div>

    <div class="mb-3" style="max-width: 500px;">
        <label class="form-label">Deskripsi</label>
        <textarea name="deskripsi" class="form-control" rows="3" required>{{ $produk->deskripsi}}</textarea>
    </div>

    <div class="mb-3" style="max-width: 500px;">
        <label class="form-label">Harga</label>
        <input type="number" name="harga_day"
       class="form-control"
       value="{{ $produk->harga_day}}"
       required>
    </div>

    <div class="mb-3" style="max-width: 500px;">
        <label class="form-label">Stok</label>
        <input type="number" name="stok" class="form-control" value="{{ $produk->stok}}" required>
    </div>

    <div class="mb-3" style="max-width: 500px;">
    <label class="form-label">Kategori</label>
    <select name="id_ktg" class="form-control" required>
        @foreach($kategori as $k)
            <option value="{{ $k->id_ktg }}"
                {{ $produk->id_ktg ==$k->id_ktg? 'selected' : ''}}>
                {{ $k->nama_ktg }}
            </option>
        @endforeach
    </select>

    <button class="btn btn-primary mt-3">Update</button>
    <a href="/admin/kategori" class="btn btn-secondary mt-3">Kembali</a>
</form>
@endsection