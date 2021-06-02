@extends('layouts.home')
@section('title')
{{ $judul }}
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card card-body">
            <form action="{{ route('pb_kriteria.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <div class="d-flex flex-row">
                        <select name="kriteria_id_1" id="" class="form-control">
                            <option value="">List Kriteria</option>
                            @foreach ($kriteria as $item)
                            <option value="{{ $item->kriteria_id }}">{{ $item->kriteria_nama }}</option>
                            @endforeach
                        </select>
                        <select name="perbandingan_id" id="" class="form-control">
                            <option value="">List Perbandingan Kriteria</option>
                            @foreach ($pb as $item)
                            <option value="{{ $item->perbandingan_id }}">{{ $item->perbandingan_nilai }} -
                                {{ $item->perbandingan_nama }}
                            </option>
                            @endforeach
                        </select>
                        <select name="kriteria_id_2" id="" class="form-control">
                            <option value="">List Kriteria</option>
                            @foreach ($kriteria as $item)
                            <option value="{{ $item->kriteria_id }}">{{ $item->kriteria_nama }}</option>
                            @endforeach
                        </select>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </form>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <th></th>
                        @foreach ($kriteria as $item)
                        <th>{{ $item->kriteria_kode }}</th>
                        @endforeach
                    </thead>
                    <tbody>
                        <tr></tr>
                        @php
                            $row=0;
                        @endphp
                        {{-- @foreach ($kriteria as $item)
                        <tr>
                            <td>{{ $item->kriteria_kode }}</td>
                            <td>{{ $data[$row][0] }}</td>
                            <td>{{ $data[$row][1] }}</td>
                            <td>{{ $data[$row][2] }}</td>
                            @php
                                $row++
                            @endphp
                        </tr>
                        @endforeach --}}
                        @php
                            for ($i = 0; $i < sizeof($data); $i++)
                            {
                                echo '<tr><td>' . $kriteria[$i]['kriteria_kode'] . '</td>';
                                    for ($j = 0; $j < sizeof($data[$i]); $j++)
                                    {
                                        echo '<td>' . $data[$i][$j] . '</td>';
                                    }
                                echo '</tr>';
                            }
                        @endphp
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
