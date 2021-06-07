@extends('layouts.home')
@section('title')
{{ $judul }}
@endsection
@section('content')

<div class="container">
    <div class="row justify-content-center">
    	<div class="d-flex justify-content-start mb-4">
                <a href="{{ route('hitung.index') }}?hitung=true" class="btn btn-success shadow-sm mx-auto px-4 text-uppercase"><b>Hitung</b></a>
	        </div>
        <div class="card card-body">
            
	        <h3 class="text-uppercase">Hasil konversi nilai perbandingan berpasangan</h3>
	        <div class="table-responsive">
	        	<!-- table kriteria -->
	            <table class="table text-center" >
	            	<thead class="bg-primary" style="border-radius:10px; letter-spacing: 0.5px;">
	            		<tr>
	            			<th>Kriteria</th>
	            			@foreach($kriteria as $setKriteria)
	            				<th>{{$setKriteria->kriteria_kode}}</th>
	            			@endforeach
	            			<th>Kali Krit</th>
	            			<th>Akar Pangkat Krit</th>
	            			<th>Normalisasi Bobot</th>
	            			<th>Kali Bobot</th>
	            		</tr>
	            	</thead>
	            	<tbody >
	            		@foreach($kriteria as $setKriteria)
	            			<tr>
	            				<th style="background: #3395ff;color: #fff;">{{$setKriteria->kriteria_kode}}</th>
	            				@foreach($setKriteria->perbandingan_kriteria as $pb_kriteria)
	            				<th class="text-secondary">{{$pb_kriteria->nilai->perbandingan_nilai}}</th>
	            				@endforeach

	            				<th class="text-white" style="background:#1dd1a1;">{{$setKriteria->kali_krit}}</th>
	            				<th class="">{{$setKriteria->akar_krit}}</th>
	            				<th class="text-warning" style="background: #222f3e">{{$setKriteria->norm_bobot}}</th>
	            				<th class="text-secondary">{{$setKriteria->kali_bobot}}</th>
	            		@endforeach
	            	</tbody>
	            </table>

	            <!-- table subkriteria -->
	            @foreach($kriteria as $setKriteria)
	            <table class="table mt-5 mb-5">
	            	<thead>
	            		<tr>
	            			<th>Sub Kriteria {{$setKriteria->kriteria_nama}}</th>
	            			@foreach($setKriteria->kriteria_sub as $setSubKriteria)
	            				<th>{{$setSubKriteria->kriteria_sub_kode}}</th>
	            			@endforeach
	            			<th>Kali Sub Krit</th>
	            			<th>Akar Pangkat Sub Krit</th>
	            			<th>Normalisasi Bobot Sub</th>
	            			<th>Kali Bobot Sub</th>
	            		</tr>
	            	</thead>
	            	<tbody>
	            		
            			@foreach($setKriteria->kriteria_sub as $setSubKriteria)
            			<tr>
            				<th>{{$setSubKriteria->kriteria_sub_kode}}</th>
            				@foreach($setSubKriteria->perbandingan_subkriteria as $pb_subkriteria)
            				<th>{{$pb_subkriteria->nilai->perbandingan_nilai}}</th>
            				@endforeach
            				<th>{{$setSubKriteria->kali_krit}}</th>
            				<th>{{$setSubKriteria->akar_krit}}</th>
            				<th>{{$setSubKriteria->norm_bobot}}</th>
            				<th>{{$setSubKriteria->kali_bobot}}</th>
            			</tr>
            			@endforeach
	            	</tbody>
	            </table>
	            @endforeach
	        </div>
	    </div>
	</div>
</div>
@endsection
