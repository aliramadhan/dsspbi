@extends('layouts.home')
@section('title')
{{ $judul }}
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card card-body">
            {{-- <div class="d-flex justify-content-end">
                    <a href="{{ route('alternatif_nilai.create') }}" class="btn btn-primary">Tambah</a>
        </div> --}}
        {{-- <hr> --}}
        <div class="table-responsive">
            <table class="table table-striped text-center">
                <thead>
                    <th>ID</th>
                    <th>Nama Alternatif</th>
                    {{-- <th>Tahun Input Alternatif</th> --}}
                    @foreach ($kriteria_sub as $item)
                    <th>{{ $item->kriteria_sub_kode }}</th>
                    @endforeach
                    <th>Aksi</th>
                </thead>
                @foreach ($alternatif as $item)
                <tbody>
                    <tr>
                        <td>{{ $item->alternatif_id }}</td>
                        <td>{{ $item->alternatif_nama }}</td>
                        @foreach($item->nilai_sub_kriteria as $items)
                        <td>{{ $items->alternatif_nilai }}</td>
                        @endforeach
                        <td >
                            <div class="d-flex">
                            <a href="{{ route('alternatif_nilai.edit', [Crypt::encryptString($item->alternatif_id)]) }}"
                                class="btn btn-primary btn-sm mr-2">Edit</a>
                            <form action="{{ route('alternatif.destroy', [Crypt::encryptString($item->alternatif_id)]) }}"
                                class="d-inline" method="post" onsubmit="return confirm('Pesan  hapus')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                            </div>
                        </td>
                    </tr>
                </tbody>
                @endforeach

            </table>
        </div>
    </div>
</div>
</div>
<!--
 <button type="button" class="btn btn-primary mr-2" data-toggle="modal" data-target="#Modal{{$item->alternatif_id}}">
                                     Edit
                                 </button>
                <div class="modal fade" id="Modal{{$item->alternatif_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Alternatif 
                            <span class="font-weight-bold">{{ $item->alternatif_nama }}</span></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <div class="modal-body px-4">
                    <div class="row">
                     <div class="form-group col">
                        <label for="exampleFormControlInput1">JAK</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="fill number of criteria">
                    </div>
                     <div class="form-group col">
                        <label for="exampleFormControlInput1">JAS</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="fill number of criteria">
                    </div>
                    </div>

                    <div class="row">
                     <div class="form-group col">
                        <label for="exampleFormControlInput1">JAB</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="fill number of criteria">
                    </div>
                     <div class="form-group col">
                        <label for="exampleFormControlInput1">JKK</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="fill number of criteria">
                    </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
-->
@endsection
