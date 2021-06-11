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
						@php $cs=0; @endphp
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
						@php $cs++ @endphp
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
						<tr>
							<td colspan="{{$cs+3}}"></td>
							<td>CI</td>
							<td>{{$setKriteria->ci}} 1</td>
						</tr>
						<tr>
							<td colspan="{{$cs+3}}"></td>
							<td>CR</td>
							<td>{{$setKriteria->cr}} 1</td>
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
							<tr>
								<td colspan="3"></td>
								<td>CI</td>
								<td>{{$setKriteria->ci_sub}}</td>
							</tr>
							<tr>
								<td colspan="3"></td>
								<td>CR</td>
								<td>{{$setKriteria->cr_sub}}</td>
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

            <!-- Table Hitung Alternatif Nilai x Sub Kriteria -->
			
</div>
		<div class="card card-body mt-4">

			<div class="d-flex justify-content-between align-items-center my-2 pb-2 border-bottom">
				<h3 class="text-uppercase m-0"><b>Alternatif Nilai</b></h3>
			</div> 
			<div class="table-responsive overflow-auto mb-3">
				<table class="table text-center table-bordered table-hover">
					<thead>
	            		<tr>
	            			<th>Alternatif</th>
	            		@foreach($kriteria as $setKriteria)
	            			@foreach($setKriteria->kriteria_sub as $setSubKriteria)
	            				<th style="background:{{$setKriteria->color}};" class="text-white">{{$setSubKriteria->kriteria_sub_kode}} <br>({{$setSubKriteria->kriteria_sub_atribut}})</th>

	            			@endforeach
	            		@endforeach
	            		</tr>
	            	</thead>
	            	<tbody>
	            		@php $alter_sqrt=array();$a=0; @endphp
            			@foreach($alternatif as $setAlternatif)
	            		<tr>
	            			
            				<th>{{$setAlternatif->alternatif_nama}}</th>
            				@php $b=0; @endphp
            				@foreach($setAlternatif->nilai_sub_kriteria as $nilaiSubKriteria)
            					<td> {{$alter_sqrt[$a][$b]=number_format($nilaiSubKriteria->alternatif_nilai,3)}}</td>
            					@php $b++ @endphp
            				@endforeach
            				<br>
	            		</tr>
	            		@php $a++ @endphp
            			@endforeach
	            	</tbody>

				</table>
			</div>

			
			<div class="d-flex justify-content-between align-items-center my-2 pb-2 border-bottom">
				<h3 class="text-uppercase m-0"><b>Normalisasi alternatif MAtrix </b></h3>
			</div> 
			
			
				@php $d=0;$alter_tot= array();$a=0; @endphp
				@foreach($setAlternatif->nilai_sub_kriteria as $nilaiSubKriteria)
				@php $c=0;$alter_tot_temp=0; @endphp

				@foreach($alternatif as $setAlternatif)
				
				@php
				

				$tempt_sqrt= (float)$alter_sqrt[$c][$d];

				$alter_tot_temp= ($tempt_sqrt*$tempt_sqrt)+$alter_tot_temp;
				$c++;			

				@endphp
				

				
				@endforeach			
					

				@php 
				$alter_tot[$a]=sqrt(sqrt($alter_tot_temp));
				$alter_tot_temp=0;
				$d++;$a++;
				@endphp 
			

				@endforeach

			
			<div class="table-responsive overflow-auto mb-3">
				<table class="table text-center table-bordered table-hover">
					<thead>
						<tr>
							<th>Alternatif</th>
							@foreach($kriteria as $setKriteria)
							@foreach($setKriteria->kriteria_sub as $setSubKriteria)
							<th style="background:{{$setKriteria->color}};" class="text-white">{{$setSubKriteria->kriteria_sub_kode}} <br>({{$setSubKriteria->kriteria_sub_atribut}})</th>

							@endforeach
							@endforeach
						</tr>
					</thead>
					<tbody>
						@php $b=0;$sch_max_temp=array(); @endphp
						@foreach($alternatif as $setAlternatif)

						<tr>		
							@php $a=0; @endphp		
							<th>{{$setAlternatif->alternatif_nama}}</th>	
							@php $x=0; @endphp						
							@foreach($setAlternatif->nilai_sub_kriteria as $nilaiSubKriteria)
							@php 
							
							$sch_max_temp[$b][$a]=number_format($nilaiSubKriteria->alternatif_nilai/$alter_tot[$a],3);
							 @endphp
							<td>{{$sch_max_temp[$b][$a]}} {{$a}}{{$b}}</td>
							@php $a++; @endphp			
							@endforeach
							@php
												
							$b++;
							@endphp
						</tr>
						
						@endforeach

						@php $d=0;$max=array();$min=array();$a=0; @endphp

						@foreach($kriteria as $setKriteria)
							@foreach($setKriteria->kriteria_sub as $setSubKriteria)
						@php $c=0;$sch_max=array(); @endphp

						@foreach($alternatif as $setAlternatif)

						@php
						
						$sch_max[$c]=$sch_max_temp[$c][$d];	
						$c++;			
						@endphp
						
						@endforeach					

						@php 
						
						if($setSubKriteria->kriteria_sub_atribut=='Cost'){
							$max[$a] = min($sch_max);
							$min[$a] = max($sch_max);

						}else{
							$max[$a] = max($sch_max);
							$min[$a] = min($sch_max);
						}
						
						reset($sch_max);
						$d++;$a++; 
						@endphp 
						@endforeach	
						@endforeach

						<tr>
							<th>BEST</th>
							@php $a=0; @endphp
							@foreach($setAlternatif->nilai_sub_kriteria as $nilaiSubKriteria)
							<th>{{$max[$a]}}</th>
							@php $a++; @endphp
							@endforeach

						</tr>
						<tr>
							<th>WORST</th>
							@php $a=0; @endphp
							@foreach($setAlternatif->nilai_sub_kriteria as $nilaiSubKriteria)
							<th>{{$min[$a]}}</th>
								@php $a++; @endphp
							@endforeach
						</tr>
					</tbody>

				</table>
			</div>

	
			<div class="d-flex justify-content-between align-items-center my-2 pb-2 border-bottom">
				<h3 class="text-uppercase m-0"><b>Bobot global </b></h3>
			</div> 
		
			<div class="table-responsive overflow-auto mb-3">
				<table class="table text-center table-bordered ">
					<thead>
						<tr>
							<th></th>
							@foreach($kriteria as $setKriteria)
							@foreach($setKriteria->kriteria_sub as $setSubKriteria)
							<th style="background:{{$setKriteria->color}};" class="text-white">{{$setSubKriteria->kriteria_sub_kode}}<br>({{$setSubKriteria->kriteria_sub_atribut}})</th>

							@endforeach
							@endforeach
						</tr>
					</thead>
					<tbody>
						<tr>
							<th></th>
							@php $bobot_gl=array();$a=0; @endphp
							@foreach($kriteria as $setKriteria)
							@foreach($setKriteria->kriteria_sub as $setSubKriteria)
							<td><b>{{$bobot_gl[$a]=number_format($setSubKriteria->bobot_global,5)}}</b></td>
							@php $a++ @endphp
							@endforeach
							@endforeach
						</tr>
						<tr>
							<th>BEST</th>
							@php $a=0; @endphp
							@foreach($setAlternatif->nilai_sub_kriteria as $nilaiSubKriteria)
							<th>{{$max[$a]}}</th>
							@php $a++; @endphp
							@endforeach

						</tr>
						<tr>
							<th>WORST</th>
							@php $a=0; @endphp
							@foreach($setAlternatif->nilai_sub_kriteria as $nilaiSubKriteria)
							<th>{{$min[$a]}}</th>
								@php $a++; @endphp
							@endforeach
						</tr>
					</tbody>

				</table>
			</div>

		
			<div class="d-flex justify-content-between align-items-center my-2 pb-2 border-bottom">
				<h3 class="text-uppercase m-0 text-secondary"><b>Perhitungan <span class="text-dark">utility measure </span></b></h3>

			</div> 
		
		<div class="table-responsive overflow-auto">
				<table class="table text-center table-bordered table-hover">
					<thead>
						<tr>
							<th>Alternatif</th>
							@foreach($kriteria as $setKriteria)
							@foreach($setKriteria->kriteria_sub as $setSubKriteria)
							<th style="background:{{$setKriteria->color}};" class="text-white">{{$setSubKriteria->kriteria_sub_kode}} <br>({{$setSubKriteria->kriteria_sub_atribut}})</th>

							@endforeach
							@endforeach
							<th>Si</th>
							<th>Ri</th>
							<th>Qi</th>
							<th>Rank</th>
						</tr>
	            	</thead>
	            	<tbody>
	            		@php $x=0;$si_kal=array();$ri_kal=array();$rank=array();
	            		$max_print_si=0;
	            		$max_print_ri=0;
	            		$min_print_si=0;
	            		$min_print_ri=0;
	            		 @endphp	
            			@foreach($alternatif as $setAlternatif)
	            		<tr>		
							@php $a=0;$hum=array();$si=0;$ri=array(); @endphp		
							<th>{{$setAlternatif->alternatif_nama}}</th>	
												
							@foreach($setAlternatif->nilai_sub_kriteria as $nilaiSubKriteria)
							<td>
									@php
									if(($nilaiSubKriteria->alternatif_nilai<=0)OR($alter_tot[$a]<=0)){
										$alternatif_nilaiZero=0;
									}else{
										$alternatif_nilaiZero=$nilaiSubKriteria->alternatif_nilai/$alter_tot[$a];
									}
									@endphp
									{{$bobot_gl[$a]}}*(({{$max[$a]}}-{{number_format($alternatif_nilaiZero,3)}})/({{$min[$a]}}-{{number_format($alternatif_nilaiZero,3)}}))<br>
									
									@php
									$maxNum=$max[$a];
									$minNum=$min[$a];
									$ht_max = (double)$maxNum-($alternatif_nilaiZero);
									$ht_min = (double)$minNum-($alternatif_nilaiZero);
									if(($ht_max<=0)OR($ht_min<=0)){
										$ht_bg = $ht_max;
									}else{
										$ht_bg = $ht_max/$ht_min;
									}
									
									$si=$bobot_gl[$a]*$ht_bg+$si;
									$ri[$a]=$bobot_gl[$a]*$ht_bg;
									@endphp
									<b>
									{{ $hum[$a]=number_format($bobot_gl[$a]*$ht_bg,5) }}
									</b>
							</td>

						

							@php $a++; @endphp			
							@endforeach

							
							<td>{{$si_kal[$x]=number_format($si,3)}}</td>
							<td>{{$ri_kal[$x]=number_format(max($ri),3)}}</td>

							@php													
							$max_print_si=max($si_kal);
							$max_print_ri=max($ri_kal);
							$min_print_si=min($si_kal);
							$min_print_ri=min($ri_kal);
							
							
							$p_2=((double)$max_print_si-(double)$min_print_si);							
							$p_3=((double)$min_print_ri-(double)$max_print_ri);

							
							$p_2=1;
							$p_3=1;

							$rank[$x]=
							(0.5*(((double)$si_kal[$x] - (double)$max_print_si)/$p_2))+((1-0.5)*(((double)$ri_kal[$x]-(double)$min_print_si)/$p_3));							
							@endphp

							<td>(0.5*(({{$si_kal[$x]}} - {{$max_print_si}})/({{$max_print_si}}-{{$min_print_si}})))+((1-0.5)*(({{$ri_kal[$x]}}-{{$min_print_si}})/({{$min_print_ri}}-{{$max_print_ri}}))) <b>{{abs($rank[$x])}}</b></td>

							

							

						
	            		@php $x++;reset($ri) @endphp
	            		
            			@endforeach
            					</tr>
            			
            			
							
							
						
            			


            			<tr class="font-weight-bold">
            				<td colspan="{{$a}}"></td>
            				<td>S*,R*</td>
            				<td>{{$max_print_si}}</td>
            				<td>{{$max_print_ri}}</td>
            			</tr>
            			<tr class="font-weight-bold">
            				<td  colspan="{{$a}}"></td>
            				<td >S-,R-</td>
            				<td>{{$min_print_si}}</td>
            				<td>{{$min_print_ri}}</td>
            			</tr>
            			
            			@php
							$ordered_values = $rank;
							rsort($ordered_values);

							foreach ($rank as $key => $rank) {
								foreach ($ordered_values as $ordered_key => $ordered_value) {
									if ($rank === $ordered_value) {
										$key = $ordered_key;
										break;
									}
								}
								echo '<td rowspan="2">'. ((int) $key + 1) . '</td>';
							
							
							}
							@endphp
							

            				

            			

	            	</tbody>

				</table>
			</div>

	</div>
</div>

@endsection
