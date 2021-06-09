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
    	<div class="d-flex justify-content-start mb-4">
                <a href="{{ route('hitung.index') }}?hitung=true" style="letter-spacing:1.5px;" class="btn btn-success shadow-sm mx-auto px-5 py-2 text-uppercase"><b>Hitung</b></a>
	        </div>
        <div class="card card-body">
            <div class="d-flex justify-content-between align-items-center my-2">
	        <h3 class="text-uppercase m-0"><b>Hasil konversi nilai perbandingan berpasangan</b></h3>
	        <input type="button" id="show_1" class="btn btn-secondary fw-bolder text-uppercase px-5" style="letter-spacing:1.5px;font-weight: 700;" value="sembunyikan">
	        </div>  
	        <div class="table-responsive " id="show_1_x">
	        	<!-- table kriteria -->
	            <table class="table text-center">
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
	            			<th style="background:#10ac84;">Total</th>
	            			@foreach($kriteria as $setKriteria)
		            			@foreach($setKriteria->kriteria_banding as $pb_kriteria)
	    							@php
	    								$setKriteria->total_krit += $pb_kriteria->nilai->perbandingan_nilai;
	    							@endphp
	            				@endforeach
	            				<th>{{$setKriteria->total_krit}}</th>
	            			@endforeach
            				<th>{{$kriteria->sum('kali_krit')}}</th>
            				<th>{{$kriteria->sum('akar_krit')}}</th>
            				<th>{{$kriteria->sum('norm_bobot')}}</th>
            				<th>{{$kriteria->sum('kali_bobot')}}</th>
	            		</tr>
	            	</tbody>
	            </table>
	            </div>

	            <!-- table subkriteria -->
	         
	          <div class="d-flex justify-content-between align-items-center mt-5">
	        	<h3 class="text-uppercase m-0"><b>Hasil konversi nilai perbandingan berpasangan <br>sub kriteria </b></h3>
	         <input type="button" id="show_2" class="btn btn-secondary fw-bolder text-uppercase px-5" style="letter-spacing:1.5px;font-weight: 700;" value="sembunyikan">   
	        </div> 
	            
	        	<div id="show_2_x">
	            @foreach($kriteria as $setKriteria)
	            <h4 class="text-uppercase text-secondary "><b>Sub Kriteria {{$setKriteria->kriteria_nama}}</b></h4>
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
            			<tr>
	            			<th style="background:#10ac84;">Total</th>
	            			@foreach($setKriteria->kriteria_sub as $setSubKriteria)
		            			@foreach($setSubKriteria->subkriteria_banding as $pb_kriteria)
	    							@php
	    								$setSubKriteria->total_krit += $pb_kriteria->nilai->perbandingan_nilai;
	    							@endphp
	            				@endforeach
	            				<th>{{$setSubKriteria->total_krit}}</th>
	            			@endforeach
            				<th>{{$setKriteria->kriteria_sub->sum('kali_krit')}}</th>
            				<th>{{$setKriteria->kriteria_sub->sum('akar_krit')}}</th>
            				<th>{{$setKriteria->kriteria_sub->sum('norm_bobot')}}</th>
            				<th>{{$setKriteria->kriteria_sub->sum('kali_bobot')}}</th>
            			</tr>
	            	</tbody>
	            </table>
	        	</div>
	            @endforeach
	            </div>
	            <table class="table text-center mb-5 ">
	            	<thead>
	            		<tr>
	            			<th colspan="3">Bobot Kriteria</th>
	            		</tr>
	            		<tr>
	            		@foreach($kriteria as $setKriteria)
	            			@php
	            				$setKriteria->color = sprintf('#%06X', mt_rand(0, 0xFFFFFF));
	            			@endphp
	            			<th style="background:{{$setKriteria->color}};">{{$setKriteria->kriteria_kode}} ( {{$setKriteria->kriteria_atribut}} )</th>
	            		@endforeach
	            		</tr>
	            	</thead>
	            	<tbody>
	            		<tr>
	            		@foreach($kriteria as $setKriteria)
	            			<td>{{$setKriteria->norm_bobot}}</td>
	            		@endforeach
	            		</tr>
	            	</tbody>
	            	
	            </table>
	            <table class="table text-center mb-5 ">
	            	<thead>
	            		<tr>
	            		@foreach($kriteria as $setKriteria)
	            			@foreach($setKriteria->kriteria_sub as $setSubKriteria)
	            				<th style="background:{{$setKriteria->color}};">{{$setSubKriteria->kriteria_sub_kode}} ( {{$setSubKriteria->kriteria_sub_atribut}} )</th>

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
	            			<td>{{$setSubKriteria->norm_bobot}}</td>
	            			@endforeach
	            		@endforeach
	            		</tr>
	            	</tbody>
	            	
	            </table>
	            <table class="table text-center mb-5 ">
	            	<thead>
	            		<tr>
	            		@foreach($kriteria as $setKriteria)
	            			@foreach($setKriteria->kriteria_sub as $setSubKriteria)
	            				<th style="background:{{$setKriteria->color}};">{{$setSubKriteria->kriteria_sub_kode}} ( {{$setSubKriteria->kriteria_sub_atribut}} )</th>

	            			@endforeach
	            		@endforeach
	            		</tr>
	            	</thead>
	            	<tbody>
	            		<tr>
	            		@foreach($kriteria as $setKriteria)
	            			@foreach($setKriteria->kriteria_sub as $setSubKriteria)
	            			<td>{{$setSubKriteria->bobot_global}}</td>
	            			@endforeach
	            		@endforeach
	            		</tr>
	            	</tbody>
	            	
	            </table>
	    </div>
	</div>
</div>

@endsection
