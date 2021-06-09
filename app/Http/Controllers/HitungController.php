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
		if ($request->hitung == 'true') {
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
			}
		}
		$total_kriteria = new Collection();
		foreach ($kriteria as $setKriteria) {
			$total_kriteria->put($setKriteria->kriteria_kode,0);
		}
		return view('hitung.index',compact('judul','kriteria','alternatif'));
	}
}
