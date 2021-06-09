@extends('layouts.home')
@section('title')
{{ $judul }}
@endsection
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$("#show_1").click(function(){
			if ($("#show_1").val() == "Lihat") {	
				$("#show_1_x").toggle();
				$("#show_1").val("sembunyikan");	
			}else{	
				$("#show_1_x").toggle();
				$("#show_1").val("Lihat");
			}
		});


		$("#show_2").click(function(){
			if ($("#show_2").val() == "Lihat") {	
				$("#show_2_x").toggle();
				$("#show_2").val("sembunyikan");	
			}else{	
				$("#show_2_x").toggle();
				$("#show_2").val("Lihat");
			}
		});
	});
</script>
<style type="text/css">
.table thead th {
	vertical-align: middle !important;
}
</style>
<div class="container">


	<div class="row row-cols-1 justify-content-center">

		<div class="d-flex justify-content-start align-items-center mb-4 px-5 ">
			<input class="form-control mr-4 " type="text" placeholder="V Note" aria-label="default input example">			
			<a href="{{ route('hitung.index') }}?hitung=true" style="letter-spacing:1.5px;" class="btn btn-success shadow-sm mx-auto px-5 py-2 text-uppercase"><b>Hitung</b></a>
		</div>
		<div class="card card-body">
			<div class="d-flex justify-content-between align-items-center my-2 pb-2 border-bottom">
				<h3 class="text-uppercase m-0"><b>Hasil konversi nilai perbandingan berpasangan</b></h3>
				<input type="button" id="show_1" class="btn btn-secondary fw-bolder text-uppercase px-5" style="letter-spacing:1.5px;font-weight: 700;" value="sembunyikan">
			</div>  
			<div class="table-responsive " id="show_1_x">
				<!-- table kriteria -->
				<table class="table table-hover text-center">
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
					<tbody>
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
						</tr>
						@endforeach
						<tr>
							<th style="background: #576574;" class="text-white">Total</th>
							@foreach($kriteria as $setKriteria)
							@foreach($setKriteria->kriteria_banding as $pb_kriteria)
							@php
							$setKriteria->total_krit += $pb_kriteria->nilai->perbandingan_nilai;
							@endphp
							@endforeach
							<th class="bg-secondary">{{number_format($setKriteria->total_krit,3)}}</th>
							@endforeach
							<th class="bg-secondary">{{number_format($kriteria->sum('kali_krit'),3)}}</th>
							<th class="bg-secondary">{{number_format($kriteria->sum('akar_krit'),3)}}</th>
							<th class="bg-secondary">{{number_format($kriteria->sum('norm_bobot'),3)}}</th>
							<th class="bg-secondary">{{number_format($kriteria->sum('kali_bobot'),3)}}</th>
						</tr>
					</tbody>
				</table>
			</div>

			<!-- table subkriteria -->

			<div class="d-flex justify-content-between align-items-center mt-5  mb-2 pb-2 border-bottom">
				<h3 class="text-uppercase m-0"><b>Hasil konversi nilai perbandingan berpasangan <br>sub kriteria </b></h3>
				<input type="button" id="show_2" class="btn btn-secondary fw-bolder text-uppercase px-5" style="letter-spacing:1.5px;font-weight: 700;" value="sembunyikan">   
			</div> 

			<div id="show_2_x">
				@foreach($kriteria as $setKriteria)
				<h4 class="text-uppercase text-secondary "><b>Sub Kriteria <span class="text-dark">{{$setKriteria->kriteria_nama}}</span></b></h4>
				<div class="table-responsive overflow-auto mb-5 ">
					<table class="table table-hover text-center ">
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
							<tr>
								<th style="background: #576574;" class="text-white">Total</th>
								@foreach($setKriteria->kriteria_sub as $setSubKriteria)
								@foreach($setSubKriteria->subkriteria_banding as $pb_kriteria)
								@php
								$setSubKriteria->total_krit += $pb_kriteria->nilai->perbandingan_nilai;
								@endphp
								@endforeach
								<th class="bg-secondary">{{number_format($setSubKriteria->total_krit,3)}}</th>
								@endforeach
								<th class="bg-secondary">{{number_format($setKriteria->kriteria_sub->sum('kali_krit'),3)}}</th>
								<th class="bg-secondary">{{number_format($setKriteria->kriteria_sub->sum('akar_krit'),3)}}</th>
								<th class="bg-secondary">{{number_format($setKriteria->kriteria_sub->sum('norm_bobot'),3)}}</th>
								<th class="bg-secondary">{{number_format($setKriteria->kriteria_sub->sum('kali_bobot'),3)}}</th>
							</tr>
						</tbody>
					</table>
				</div>
				@endforeach
			</div>

			<div class="d-flex justify-content-between align-items-center my-2 pb-2 border-bottom">
				<h3 class="text-uppercase m-0"><b>Hasil bobot Kriteria</b></h3>
				<button class="btn btn-primary font-weight-bold" onclick="location.reload();">Change Color</button>
			</div> 
			<div class="table-responsive overflow-auto mb-3">
				<table class="table text-center table-bordered rounded-pill" >
					<thead>

						<tr>
							@foreach($kriteria as $setKriteria)
							@php							
							
							$setKriteria->color = sprintf('#%06X', mt_rand(0, 0xFFFFFF));
							@endphp
							<th style="background:{{$setKriteria->color}};" class="text-white">{{$setKriteria->kriteria_kode}} ({{$setKriteria->kriteria_atribut}})</th>
							@endforeach
						</tr>
					</thead>
					<tbody>
						<tr>
							@foreach($kriteria as $setKriteria)
							<td ><b>{{number_format($setKriteria->norm_bobot,5)}}</b></td>
							@endforeach
						</tr>
					</tbody>

				</table>
			</div>

			<div class="d-flex justify-content-between align-items-center my-2 pb-2 border-bottom">
				<h3 class="text-uppercase m-0"><b>Hasil bobot sub Kriteria</b></h3>
			</div> 
			<div class="table-responsive overflow-auto mb-3">
				<table class="table text-center table-bordered">
					<thead>
						<tr>
							@foreach($kriteria as $setKriteria)
							@foreach($setKriteria->kriteria_sub as $setSubKriteria)
							<th style="background:{{$setKriteria->color}};" class="text-white">{{$setSubKriteria->kriteria_sub_kode}}<br> ({{$setSubKriteria->kriteria_sub_atribut}})</th>

							@endforeach
							@endforeach
						</tr>
					</thead>
					<tbody>
						<tr>
							@foreach($kriteria as $setKriteria)
							@foreach($setKriteria->kriteria_sub as $setSubKriteria)
							@php
							$setSubKriteria->bobot_global = $setSubKriteria->norm_bobot * $setKriteria->norm_bobot;
							@endphp
							<td><b>{{number_format($setSubKriteria->norm_bobot,5)}}</b></td>
							@endforeach
							@endforeach
						</tr>
					</tbody>

				</table>
			</div>

			<div class="d-flex justify-content-between align-items-center my-2 pb-2 border-bottom">
				<h3 class="text-uppercase m-0"><b>Hasil bobot global</b></h3>
			</div> 
			<div class="table-responsive overflow-auto mb-3">
				<table class="table text-center table-bordered ">
					<thead>
						<tr>
							@foreach($kriteria as $setKriteria)
							@foreach($setKriteria->kriteria_sub as $setSubKriteria)
							<th style="background:{{$setKriteria->color}};" class="text-white">{{$setSubKriteria->kriteria_sub_kode}}<br>({{$setSubKriteria->kriteria_sub_atribut}})</th>

							@endforeach
							@endforeach
						</tr>
					</thead>
					<tbody>
						<tr>
							@foreach($kriteria as $setKriteria)
							@foreach($setKriteria->kriteria_sub as $setSubKriteria)
							<td><b>{{number_format($setSubKriteria->bobot_global,5)}}</b></td>
							@endforeach
							@endforeach
						</tr>
					</tbody>

				</table>
			</div>

			

		</div>

		<div class="card card-body mt-4">
			<div class="d-flex justify-content-between align-items-center my-2 pb-2 border-bottom">
				<h3 class="text-uppercase m-0"><b>Normalisasi alternatif MAtrix </b></h3>
			</div> 
		
		<table>
			
		</table>

	
			<div class="d-flex justify-content-between align-items-center my-2 pb-2 border-bottom">
				<h3 class="text-uppercase m-0"><b>Bobot global </b></h3>
			</div> 
		
		<table>
			
		</table>

		
			<div class="d-flex justify-content-between align-items-center my-2 pb-2 border-bottom">
				<h3 class="text-uppercase m-0 text-secondary"><b>Perhitungan <span class="text-dark">utility measure </span></b></h3>
			</div> 
		
		<table>
			
		</table>

	</div>
</div>

@endsection
