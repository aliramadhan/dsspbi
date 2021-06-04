@extends('layouts.home')
@section('title')
{{ $judul }}
@endsection
@section('content')



<!-- Modal -->

<div class="container">
    <div class="row justify-content-center">
        <div class="card card-body">
            {{-- <div class="d-flex justify-content-end">
                    <a href="{{ route('alternatif_nilai.create') }}" class="btn btn-primary">Tambah</a>
        </div> --}}
        {{-- <hr> --}}
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <th>ID</th>
                    <th>Nama Alternatif</th>
                    {{-- <th>Tahun Input Alternatif</th> --}}
                    @foreach ($kriteria_sub as $item)
                    <th>{{ $item->kriteria_sub_kode }}</th>
                    @endforeach
                    <th class="text-center">Aksi</th>
                </thead>
                @foreach ($alternatif as $item)
                <tbody>
                    <tr>
                        <td>{{ $item->alternatif_id }}</td>
                        <td>{{ $item->alternatif_nama }}</td>
                        @foreach($kriteria_sub as $items)
                        <td>{{ $items->kriteria_sub_id }}</td>
                        @endforeach
                        <td>
                            <!-- <a href="{{ route('alternatif.edit', [Crypt::encrypt($item->alternatif_id)]) }}"
                                class="btn btn-primary btn-sm">Edit</a> -->
                                <div class="d-flex flex-row">
                                 
                                    <button type="button" class="btn btn-primary mr-2" data-toggle="modal" data-target="#Modal{{$item->alternatif_id}}">
                                     Edit
                                 </button>
                                
                                 
                                    <form action="{{ route('alternatif.destroy', [Crypt::encrypt($item->alternatif_id)]) }}"
                                        method="post" onsubmit="return confirm('Pesan  hapus')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                    </form>
                                
                            </div>
                        </td>
                    </tr>
                </tbody>


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
                @endforeach

            </table>
        </div>
    </div>
</div>
</div>
@endsection
