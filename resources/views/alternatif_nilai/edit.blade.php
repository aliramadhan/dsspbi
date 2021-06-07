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
                @php
                    $alternatif_nilai = App\Models\AlternatifNilai::where('alternatif_id',$alternatif->alternatif_id)->where('kriteria_sub_id',$item->kriteria_sub_id)->first();
                @endphp
                <div class="form-group">
                    <label for="">{{$item->kriteria_sub_nama}}</label>
                    <input type="number" name="{{$item->kriteria_sub_id}}" id="" @if($alternatif_nilai != null) value="{{$alternatif_nilai->alternatif_nilai}}" @endif class="form-control">
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
