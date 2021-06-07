@extends('layouts.home')
@section('title')
{{ $judul }}
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card card-body">
            <div class="d-flex justify-content-start">
                <a href="{{ route('hitung.index') }}?hitung=true" class="btn btn-primary">Hitung</a>
	        </div>
	        <div class="table-responsive">
	        	<!-- table kriteria -->
	            <table class="table">
	            	<thead>
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
	            	<tbody>
	            		@foreach($kriteria as $setKriteria)
	            			<tr>
	            				<th>{{$setKriteria->kriteria_kode}}</th>
	            				@foreach($setKriteria->perbandingan_kriteria as $pb_kriteria)
	            				<th>{{$pb_kriteria->nilai->perbandingan_nilai}}</th>
	            				@endforeach
	            				<th>{{$setKriteria->kali_krit}}</th>
	            				<th>{{$setKriteria->akar_krit}}</th>
	            				<th>{{$setKriteria->norm_bobot}}</th>
	            				<th>{{$setKriteria->kali_bobot}}</th>
	            		@endforeach
	            	</tbody>
	            </table>

	            <!-- table subkriteria -->
	            @foreach($kriteria as $setKriteria)
	            <table class="table mt-5 mb-5">
	            	<thead>
	            		<tr>
	            			<th>Sub Kriteria</th>
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
