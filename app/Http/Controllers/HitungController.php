<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kriteria;
use App\Models\PbKriteria;
use App\Models\Alternatif;
use Illuminate\Support\Collection;

class HitungController extends Controller
{
	public function index(Request $request)
	{
		$judul = 'Hitung Thesis';
		$alternatif = Alternatif::all();
		$kriteria = Kriteria::orderBy('kriteria_id')->get();
		$v = 0;
		if ($request->v != null) {
			$v = $request->v;
		}
		if ($request->submit == 'Hitung') {
			//Konversi nilai Kriteria
			foreach ($kriteria as $listKriteria) {
				$listKriteria->kali_krit = 1;
				//get kali krit
				foreach($listKriteria->perbandingan_kriteria as $pb_kriteria){
					$listKriteria->kali_krit *= $pb_kriteria->nilai->perbandingan_nilai;
				}
				//get akar krit
				$listKriteria->akar_krit = pow($listKriteria->kali_krit,1/$kriteria->count());
				
				//get jml krit
				foreach($listKriteria->perbandingan_kriteria as $pb_kriteria){
					foreach ($kriteria as $listKriteria) {
						if ($pb_kriteria->kriteria_id_2 == $listKriteria->kriteria_id) {
							$listKriteria->jml_krit += $pb_kriteria->nilai->perbandingan_nilai;
						}
					}
				}
			}
			//get norm bobot & kali bobot
			foreach ($kriteria as $listKriteria) {
				$listKriteria->norm_bobot = $listKriteria->akar_krit/$kriteria->sum('akar_krit');
				$listKriteria->kali_bobot = $listKriteria->norm_bobot*$listKriteria->jml_krit;
			}

			//Konversi Nilai Sub Kriteria
			foreach ($kriteria as $listKriteria) {
				//Konversi nilai Kriteria
				foreach ($listKriteria->kriteria_sub as $listSubKriteria) {
					$listSubKriteria->kali_krit = 1;
					//get kali krit
					foreach($listSubKriteria->perbandingan_subkriteria as $pb_subkriteria){
						$listSubKriteria->kali_krit *= $pb_subkriteria->nilai->perbandingan_nilai;
					}
					//get akar krit
					$listSubKriteria->akar_krit = pow($listSubKriteria->kali_krit,1/$listKriteria->kriteria_sub->count());
					
					//get jml krit
					foreach($listSubKriteria->perbandingan_subkriteria as $pb_subkriteria){
						foreach ($listKriteria->kriteria_sub as $listSubKriteria) {
							if ($pb_subkriteria->kriteria_sub_id_2 == $listSubKriteria->kriteria_sub_id) {
								$listSubKriteria->jml_krit += $pb_subkriteria->nilai->perbandingan_nilai;
							}
						}
					}
				}
				//get norm bobot & kali bobot
				foreach ($listKriteria->kriteria_sub as $listSubKriteria) {
					$listSubKriteria->norm_bobot = $listSubKriteria->akar_krit/$listKriteria->kriteria_sub->sum('akar_krit');
					$listSubKriteria->kali_bobot = $listSubKriteria->norm_bobot*$listSubKriteria->jml_krit;
				}
				//set ukuran matrix kriteria
				switch ($kriteria->count()) {
					case 1:
						$listKriteria->matrix_kriteria = 0;
						break;
					case 2:
						$listKriteria->matrix_kriteria = 0;
						break;
					case 3:
						$listKriteria->matrix_kriteria = 0.58;
						break;
					case 4:
						$listKriteria->matrix_kriteria = 0.9;
						break;
					case 5:
						$listKriteria->matrix_kriteria = 1.12;
						break;
					case 6:
						$listKriteria->matrix_kriteria = 1.24;
						break;
					case 7:
						$listKriteria->matrix_kriteria = 1.32;
						break;
					case 8:
						$listKriteria->matrix_kriteria = 1.42;
						break;
					case 9:
						$listKriteria->matrix_kriteria = 1.45;
						break;
					case 10:
						$listKriteria->matrix_kriteria = 1.48;
						break;
					case 11:
						$listKriteria->matrix_kriteria = 1.51;
						break;
					
					default:
						# code...
						break;
				}
				//matrix sub kriteria
				switch ($listKriteria->kriteria_sub->count()) {
					case 1:
						$listKriteria->matrix_sub_kriteria = 0;
						break;
					case 2:
						$listKriteria->matrix_sub_kriteria = 0;
						break;
					case 3:
						$listKriteria->matrix_sub_kriteria = 0.58;
						break;
					case 4:
						$listKriteria->matrix_sub_kriteria = 0.9;
						break;
					case 5:
						$listKriteria->matrix_sub_kriteria = 1.12;
						break;
					case 6:
						$listKriteria->matrix_sub_kriteria = 1.24;
						break;
					case 7:
						$listKriteria->matrix_sub_kriteria = 1.32;
						break;
					case 8:
						$listKriteria->matrix_sub_kriteria = 1.42;
						break;
					case 9:
						$listKriteria->matrix_sub_kriteria = 1.45;
						break;
					case 10:
						$listKriteria->matrix_sub_kriteria = 1.48;
						break;
					case 11:
						$listKriteria->matrix_sub_kriteria = 1.51;
						break;
					
					default:
						# code...
						break;
				}
				//hitung CI/CR
				$listKriteria->ci = ($kriteria->sum('kali_bobot') - $kriteria->count())/($kriteria->count() - 1);;
				$listKriteria->cr = $listKriteria->ci/$listKriteria->matrix_kriteria;;

				$listKriteria->ci_sub = ($listKriteria->kriteria_sub->sum('kali_bobot') - $listKriteria->kriteria_sub->count())/($listKriteria->kriteria_sub->count() - 1);
				$listKriteria->cr_sub = $listKriteria->ci_sub/$listKriteria->matrix_sub_kriteria;
			}
		}
		$total_kriteria = new Collection();
		foreach ($kriteria as $setKriteria) {
			$total_kriteria->put($setKriteria->kriteria_kode,0);
		}
		return view('hitung.index',compact('judul','kriteria','alternatif','v'));
	}
}
