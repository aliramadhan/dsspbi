<?php

namespace App\Http\Controllers;

use App\Models\AlternatifNilai;
use App\Models\Alternatif;
use App\Models\KriteriaSub;
use App\Models\Kriteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class AlternatifNilaiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {

        return view('alternatif_nilai.index', [
            'alternatif_nilai' => AlternatifNilai::orderBy('alternatif_nilai_id', 'asc')->get(),
            'judul' => 'Alternatif Nilai',
            'alternatif' => Alternatif::all(),
            'kriteria' => Kriteria::all(),
            'kriteria_sub' => KriteriaSub::all()
        ]);
    }

    public function create() {
        return view('alternatif_nilai.create');
    }

    public function store(Request $request) {
        $alternatif_nilai = new AlternatifNilai();
        $alternatif_nilai->alternatif_nilai_nama = $request->alternatif_nilai_nama;
        $alternatif_nilai->alternatif_nilai_tahun = $request->alternatif_nilai_tahun;
        $alternatif_nilai->save();

        return redirect()->route('alternatif_nilai.index');
    }

    public function edit($id) {
        //decrypt id
        $id = Crypt::decryptString($id);
        $alternatif = Alternatif::findOrFail($id);
        $subkriteria = KriteriaSub::orderBy('kriteria_sub_id')->get();
        $judul = 'Nilai Alternatif '.$alternatif->alternatif_nama;
        return view('alternatif_nilai.edit',compact('alternatif','subkriteria','judul'));
    }

    public function update(Request $request, $id) {
        $id = Crypt::decryptString($id);
        $subkriteria = KriteriaSub::orderBy('kriteria_sub_id')->get();
        foreach ($subkriteria as $item) {
            $alternatif_nilai = AlternatifNilai::updateOrCreate([
                'alternatif_id' => $id,
                'kriteria_sub_id' => $item->kriteria_sub_id,
            ],[
                'alternatif_nilai' => $request->input($item->kriteria_sub_id)
            ]);
        }

        return redirect()->route('alternatif_nilai.index');
    }

    public function destroy($id) {
        AlternatifNilai::findOrFail(Crypt::encryptString($id))->delete();
        return redirect()->route('alternatif_nilai.index');

    }
}

