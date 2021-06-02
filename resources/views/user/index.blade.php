@extends('layout.home')
@section('title')
{{ $judul }}
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="card card-body">
                <div class="d-flex justify-content-end">
                    <a href="{{ route('user.create') }}" class="btn btn-primary">Tambah</a>
                </div>
                <hr>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <th>ID</th>
                            <th>Nama User</th>
                            <th>Email User</th>
                            <th>Password User</th>
                            <th>Role User</th>
                            <th>Aksi</th>
                        </thead>
                        @foreach ($user as $item)
                            <tbody>
                                <tr>
                                    <td>{{ $item->id_user }}</td>
                                    <td>{{ $item->nama_user }}</td>
                                    <td>{{ $item->email_user }}</td>
                                    <td>{{ $item->password_user }}</td>
                                    <td>{{ $item->id_role }}</td>
                                    <td>
                                        <a href="{{ route('user.edit', [Crypt::encrypt($item->id_user)]) }}" class="btn btn-primary btn-sm">Edit</a>
                                        <form action="{{ route('user.destroy', [Crypt::encrypt($item->id_user)]) }}" class="d-inline"  method="post" onsubmit="return confirm('Pesan  hapus')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
