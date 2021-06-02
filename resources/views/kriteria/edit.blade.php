@extends('layouts.home')
@section('title')
Edit Kriteria
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card card-body">
            <form action="{{ route('kriteria.update', [Crypt::encrypt($data->kriteria_id)]) }}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="">Kode Kriteria</label>
                    <input type="text" name="kriteria_kode" id="" class="form-control" value="{{ $data->kriteria_kode }}">
                </div>
                <div class="form-group">
                    <label for="">Nama Kriteria</label>
                    <input type="text" name="kriteria_nama" id="" class="form-control" value="{{ $data->kriteria_nama }}">
                </div>
                <div class="form-group">
                    <label for="">Keterangan Kriteria</label>
                    <textarea name="kriteria_keterangan" id="" class="form-control" value="{{ $data->kriteria_keterangan }}"></textarea>
                </div>
                <div class="form-group">
                    <label for="">Attribut Kriteria</label>
                    <select name="kriteria_atribut" id="" class="form-control">
                        <option value="">Pilih</option>
                        <option value="benefit" {{ $data->kriteria_atribut == 'benefit' ? 'selected' : '' }}>Benefit</option>
                        <option value="cost" {{ $data->kriteria_atribut == 'cost' ? 'selected' : '' }}>Cost</option>
                    </select>
                </div>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
