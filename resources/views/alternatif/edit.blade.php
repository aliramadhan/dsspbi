@extends('layouts.home')
@section('title')
Edit Alternatif
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card card-body">
            <form action="{{ route('alternatif.update', [Crypt::encrypt($data->alternatif_id)]) }}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="">Nama Alternatif</label>
                    <input type="text" name="alternatif_nama" id="" class="form-control" value="{{ $data->alternatif_nama }}">
                </div>
                <div class="form-group">
                    <label for="">Tahun Input Alternatif</label>
                    <input type="text" name="alternatif_tahun" id="" class="form-control" value="{{ $data->alternatif_tahun }}">
                </div>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
