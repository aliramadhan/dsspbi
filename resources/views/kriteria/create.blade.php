@extends('layouts.home')
@section('title')
Tambah Kriteria
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card card-body">
            <form action="{{ route('kriteria.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="">Kode Kriteria</label>
                    <input type="text" name="kriteria_kode" id="" class="form-control">
                </div>

                <div class="form-group">
                    <label for="">Nama Kriteria</label>
                    <input type="text" name="kriteria_nama" id="" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Keterangan Kriteria</label>
                    <textarea name="kriteria_keterangan" id="" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <label for="">Atribut Kriteria</label>
                    <select name="kriteria_atribut" id="" class="form-control">
                        <option value="">Pilih</option>
                        <option value="benefit">Benefit</option>
                        <option value="cost">Cost</option>
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
