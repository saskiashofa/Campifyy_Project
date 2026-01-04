@extends('admin.layoutadmin')
@section('content')
<form action="{{ route('admin.produk.destroy', $p->id) }}" method="POST" style="display:inline">
    @csrf
    @method('DELETE')
    <button type="submit"
        class="btn btn-danger btn-user"
        onclick="return confirm('Yakin ingin menghapus produk ini?')">
        Hapus
    </button>
</form>
@endsection