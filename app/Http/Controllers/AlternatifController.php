<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class AlternatifController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        return view('alternatif.index', [
            'alternatif' => Alternatif::orderBy('alternatif_id', 'asc')->get(),
            'judul' => 'Alternatif'
        ]);
    }

    public function create() {
        return view('alternatif.create');
    }

    public function store(Request $request) {
        $alternatif = new Alternatif();
        $alternatif->alternatif_nama = $request->alternatif_nama;
        $alternatif->alternatif_tahun = $request->alternatif_tahun;
        $alternatif->save();

        return redirect()->route('alternatif.index');
    }

    public function edit($id) {
        return view('alternatif.edit', [
            'data' => Alternatif::findOrFail(Crypt::decrypt($id))
        ]);
    }

    public function update(Request $request, $id) {
        $alternatif = Alternatif::findOrFail(Crypt::decrypt($id));
        $alternatif->alternatif_nama = $request->alternatif_nama;
        $alternatif->alternatif_tahun = $request->alternatif_tahun;
        $alternatif->save();

        return redirect()->route('alternatif.index');
    }

    public function destroy($id) {
        Alternatif::findOrFail(Crypt::decrypt($id))->delete();
        return redirect()->route('alternatif.index');

    }
}

