@extends('layouts.home')
@section('title')
Tambah Alternatif
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card card-body">
            <form action="{{ route('alternatif.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="">Nama alternatif</label>
                    <input type="text" name="alternatif_nama" id="" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Tahun Input Alternatif</label>
                    <input type="text" name="alternatif_tahun" id="" class="form-control">
                </div>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
