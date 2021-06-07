@extends('layouts.home')
@section('title')
{{ $judul }}
@endsection
@section('content')
<style type="text/css">
.table thead th {
    vertical-align: middle !important;
    }
    </style>
<div class="container">
    <div class="row justify-content-center">
    	<div class="d-flex justify-content-start mb-4">
                <a href="{{ route('hitung.index') }}?hitung=true" style="letter-spacing:1.5px;" class="btn btn-success shadow-sm mx-auto px-5 py-2 text-uppercase"><b>Hitung</b></a>
	        </div>
        <div class="card card-body">
            
	        <h3 class="text-uppercase"><b>Hasil konversi nilai perbandingan berpasangan</b></h3>
	        <div class="table-responsive">
	        	<!-- table kriteria -->
	            <table class="table text-center" >
	            	<thead class="bg-primary" style="border-radius:10px; letter-spacing: 0.5px;">
	            		<tr>
	            			<th>Kriteria</th>
	            			@foreach($kriteria as $setKriteria)
	            				<th style="background: #3395ff;color: #fff;">{{$setKriteria->kriteria_kode}}</th>
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
	            				<th class="text-secondary">{{number_format($pb_kriteria->nilai->perbandingan_nilai,3)}}</th>
	            				@endforeach

	            				<th class="text-white" style="background:#10ac84;">{{number_format($setKriteria->kali_krit,3)}}</th>
	            				<th class="">{{number_format($setKriteria->akar_krit,3)}}</th>
	            				<th class="text-warning" style="background: #222f3e">{{number_format($setKriteria->norm_bobot,3)}}</th>
	            				<th class="text-secondary">{{number_format($setKriteria->kali_bobot,3)}}</th>
	            		@endforeach
	            	</tbody>
	            </table>
	            </div>

	            <!-- table subkriteria -->
	            <h3 class="text-uppercase mt-5"><b>Hasil konversi nilai perbandingan berpasangan</b></h3>
	            @foreach($kriteria as $setKriteria)
	            <h4 class="text-uppercase text-secondary"><b>Sub Kriteria {{$setKriteria->kriteria_nama}}</b></h4>
	            <div class="table-responsive overflow-auto">
	            <table class="table text-center mb-5 ">
	            	<thead class="bg-primary" style="border-radius:10px; letter-spacing: 0.5px;">
	            		<tr>
	            			<th>Sub Kriteria</th>
	            			@foreach($setKriteria->kriteria_sub as $setSubKriteria)
	            			<th style="background: #3395ff;color: #fff;">{{$setSubKriteria->kriteria_sub_kode}}</th>
	            			@endforeach
	            			<th>Kali Sub Krit</th>
	            			<th>Akar Pangkat</th>
	            			<th>Normalisasi Bobot</th>
	            			<th>Kali Bobot</th>
	            		</tr>
	            	</thead>
	            	<tbody>
	            		
            			@foreach($setKriteria->kriteria_sub as $setSubKriteria)
            			<tr>
            				<th style="background: #3395ff;color: #fff;">{{$setSubKriteria->kriteria_sub_kode}}</th>
            				@foreach($setSubKriteria->perbandingan_subkriteria as $pb_subkriteria)
            				<th>{{number_format($pb_subkriteria->nilai->perbandingan_nilai,3)}}</th>
            				@endforeach
            				<th class="text-white" style="background:#10ac84;">{{number_format($setSubKriteria->kali_krit,3)}}</th>
            				<th>{{number_format($setSubKriteria->akar_krit,3)}}</th>
            				<th class="text-warning" style="background: #222f3e">{{number_format($setSubKriteria->norm_bobot,3)}}</th>
            				<th>{{number_format($setSubKriteria->kali_bobot,3)}}</th>
            			</tr>
            			@endforeach
	            	</tbody>
	            </table>
	        </div>
	            @endforeach
	        
	    </div>
	</div>
</div>
@endsection
