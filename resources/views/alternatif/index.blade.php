@extends('layouts.home')
@section('title')
{{ $judul }}
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="card card-body">
                <div class="d-flex justify-content-end">
                    <a href="{{ route('alternatif.create') }}" class="btn btn-primary">Tambah</a>
                </div>
                <hr>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <th>ID</th>
                            <th>Nama Alternatif</th>
                            <th>Tahun Input Alternatif</th>
                            <th>Aksi</th>
                        </thead>
                        @foreach ($alternatif as $item)
                            <tbody>
                                <tr>
                                    <td>{{ $item->alternatif_id }}</td>
                                    <td>{{ $item->alternatif_nama }}</td>
                                    <td>{{ $item->alternatif_tahun }}</td>
                                    <td>
                                        <a href="{{ route('alternatif.edit', [Crypt::encrypt($item->alternatif_id)]) }}" class="btn btn-primary btn-sm">Edit</a>
                                        <form action="{{ route('alternatif.destroy', [Crypt::encrypt($item->alternatif_id)]) }}" class="d-inline"  method="post" onsubmit="return confirm('Pesan  hapus')">
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
