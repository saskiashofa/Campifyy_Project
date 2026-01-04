@extends('admin.layoutadmin')
@section('content')
<div class="container mt-4">
    <h3>Daftar User</h3>
    <form action="{{ url('/admin/userbyadmin') }}" method="GET" class="w-25 mb-3">
        <div class="input-group">
            <input type="text"
                class="form-control"
                name="keyword"
                placeholder="Cari user..."
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
                <th>ID</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Tanggal Terdaftar</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->created_at->format('d-m-Y') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection