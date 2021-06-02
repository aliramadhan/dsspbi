<?php

namespace App\Http\Controllers;

use App\Models\AlternatifNilai;
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
            'judul' => 'Alternatif Nilai'
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
        return view('alternatif_nilai.edit', [
            'data' => AlternatifNIlai::findOrFail(Crypt::decrypt($id))
        ]);
    }

    public function update(Request $request, $id) {
        $alternatif_nilai = AlternatifNilai::findOrFail(Crypt::decrypt($id));
        $alternatif_nilai->alternatif_nilai_nama = $request->alternatif_nilai_nama;
        $alternatif_nilai->alternatif_nilai_tahun = $request->alternatif_nilai_tahun;
        $alternatif_nilai->save();

        return redirect()->route('alternatif_nilai.index');
    }

    public function destroy($id) {
        AlternatifNilai::findOrFail(Crypt::decrypt($id))->delete();
        return redirect()->route('alternatif_nilai.index');

    }
}

