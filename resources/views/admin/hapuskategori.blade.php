@extends('admin.layoutadmin')
@section('content')
<form action="/admin/hapuskategori/{{ $p->id }}" method="POST" style="display:inline">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger btn-user" onclick="return confirm('Yakin ingin menghapus kategori ini?')">
        Hapus
    </button>
</form>
@endsection