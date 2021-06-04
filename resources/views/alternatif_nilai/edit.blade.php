@extends('layouts.home')
@section('title')
{{ $judul }}
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card card-body">
            <form action="{{route('alternatif_nilai.update',[Crypt::encryptString($alternatif->alternatif_id)])}}" method="post">
                @csrf
                @method('PUT')
                @foreach($subkriteria as $item)
                <div class="form-group">
                    <label for="">{{$item->kriteria_sub_nama}}</label>
                    <input type="number" name="{{$item->kriteria_sub_id}}" id="" class="form-control">
                </div>
                @endforeach
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
