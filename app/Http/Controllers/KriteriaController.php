<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use App\Models\PbKriteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class KriteriaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {


        // return $data;
        return view('kriteria.index', [
            'kriteria' => Kriteria::orderBy('kriteria_id', 'asc')->get(),
            'judul' => ' Kriteria'
        ]);
    }

    public function create() {
        return view('kriteria.create');
    }

    public function store(Request $request) {
        $kriteria = new Kriteria();
        $kriteria->kriteria_kode = $request->kriteria_kode;
        $kriteria->kriteria_nama = $request->kriteria_nama;
        $kriteria->kriteria_keterangan = $request->kriteria_keterangan;
        $kriteria->kriteria_atribut = $request->kriteria_atribut;
        $kriteria->save();

        return redirect()->route('kriteria.index');
    }

    public function edit($id) {
        return view('kriteria.edit', [
            'data' => Kriteria::findOrFail(Crypt::decrypt($id))
        ]);
    }

    public function update(Request $request, $id) {
        $kriteria = Kriteria::findOrFail(Crypt::decrypt($id));
        $kriteria->kriteria_kode = $request->kriteria_kode;
        $kriteria->kriteria_nama = $request->kriteria_nama;
        $kriteria->kriteria_keterangan = $request->kriteria_keterangan;
        $kriteria->kriteria_atribut = $request->kriteria_atribut;
        $kriteria->save();

        return redirect()->route('kriteria.index');
    }

    public function destroy($id) {
        Kriteria::findOrFail(Crypt::decrypt($id))->delete();
        return redirect()->route('kriteria.index');

    }
}

