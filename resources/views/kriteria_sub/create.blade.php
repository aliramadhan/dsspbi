@extends('layouts.home')
@section('title')
Tambah Sub-Kriteria
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card card-body">
            <form action="{{ route('kriteria_sub.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="">ID Kriteria</label>
                    <select name="kriteria_id" id="" class="form-control">
                        <option value="">List Kriteria</option>
                        @foreach ($kriteria as $item)
                            <option value="{{ $item->kriteria_id }}">{{ $item->kriteria_nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Kode Sub Kriteria</label>
                    <input type="text" name="kriteria_sub_kode" id="" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Nama Sub Kriteria</label>
                    <input type="text" name="kriteria_sub_nama" id="" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Keterangan Sub Kriteria</label>
                    <textarea name="kriteria_sub_keterangan" id="" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <label for="">Atribut Sub Kriteria</label>
                    <select name="kriteria_sub_atribut" id="" class="form-control">
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
