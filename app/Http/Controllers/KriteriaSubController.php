<?php

namespace App\Http\Controllers;

use App\Models\KriteriaSub;
use App\Models\Kriteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class KriteriaSubController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('kriteria_sub.index', [
            'kriteria_sub' => KriteriaSub::orderBy('kriteria_sub_id', 'asc')->get(),
            'judul' => 'Sub Kriteria',
            'kriteria' => Kriteria::all()
        ]);
    }

    public function create()
    {
        return view('kriteria_sub.create', [
            'kriteria' => Kriteria::all()
        ]);
    }

    public function store(Request $request)
    {
        $kriteria_sub = new KriteriaSub();
        $kriteria_sub->kriteria_id = $request->kriteria_id;
        $kriteria_sub->kriteria_sub_id = $request->kriteria_sub_id;
        $kriteria_sub->kriteria_sub_kode = $request->kriteria_sub_kode;
        $kriteria_sub->kriteria_sub_nama = $request->kriteria_sub_nama;
        $kriteria_sub->kriteria_sub_atribut = $request->kriteria_sub_atribut;
        $kriteria_sub->save();

        return redirect()->route('kriteria_sub.search');
    }

    public function edit($id)
    {
        return view('kriteria_sub.edit', [
            'data' => KriteriaSub::findOrFail(Crypt::decrypt($id)),
            'kriteria' => Kriteria::all()
        ]);
    }

    public function update(Request $request, $id)
    {
        $kriteria_sub = KriteriaSub::findOrFail(Crypt::decrypt($id));
        $kriteria_sub->kriteria_id = $request->kriteria_id;
        $kriteria_sub->kriteria_sub_kode = $request->kriteria_sub_kode;
        $kriteria_sub->kriteria_sub_nama = $request->kriteria_sub_nama;
        $kriteria_sub->kriteria_sub_atribut = $request->kriteria_sub_atribut;
        $kriteria_sub->save();

        return redirect()->route('kriteria_sub.index');
    }

    public function destroy($id)
    {
        KriteriaSub::findOrFail(Crypt::decrypt($id))->delete();
        return redirect()->route('kriteria_sub.index');

    }
}
