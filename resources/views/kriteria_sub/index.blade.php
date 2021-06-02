@extends('layouts.home')
@section('title')
{{ $judul }}
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="card card-body">
                <div class="d-flex justify-content-end">
                    <a href="{{ route('kriteria_sub.create') }}" class="btn btn-primary">Tambah</a>
                </div>
                <hr>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <th>ID</th>
                            <th>ID Kriteria</th>
                            <th>Kode Sub Kriteria</th>
                            <th>Nama Sub Kriteria</th>
                            <th>Keterangan Sub Kriteria</th>
                            <th>Atribut</th>
                            <th>Aksi</th>
                        </thead>
                        @foreach ($kriteria_sub as $item)
                            <tbody>
                                <tr>
                                    <td>{{ $item->kriteria_sub_id }}</td>
                                    <td>{{ $item->kriteria_id }}</td>
                                    <td>{{ $item->kriteria_sub_kode }}</td>
                                    <td>{{ $item->kriteria_sub_nama }}</td>
                                    <td>{{ $item->kriteria_sub_keterangan }}</td>
                                    <td>{{ $item->kriteria_sub_atribut }}</td>
                                    <td>
                                        <a href="{{ route('kriteria_sub.edit', [Crypt::encrypt($item->kriteria_sub_id)]) }}" class="btn btn-primary btn-sm">Edit</a>
                                        <form action="{{ route('kriteria_sub.destroy', [Crypt::encrypt($item->kriteria_sub_id)]) }}" class="d-inline"  method="post" onsubmit="return confirm('Pesan  hapus')">
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
