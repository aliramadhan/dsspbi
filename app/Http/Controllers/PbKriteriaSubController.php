<?php

namespace App\Http\Controllers;

use App\Models\PbKriteriaSub;
use App\Models\Pb;
use App\Models\Kriteria;
use App\Models\KriteriaSub;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class PbKriteriaSubController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        return view('pb_kriteria_sub.index', [
            'kriteria_sub' => KriteriaSub::orderBy('kriteria_sub_id', 'asc')->get(),
            'kriteria' => Kriteria::all(),
            'judul' => 'Nilai Perbandingan Sub Kriteria',
            'pb' => Pb::all(),
            'search' => false
        ]);
    }

    // public function create($id)
    // {
    //     return view('pb_kriteria_sub.create',[
    //     'kriteria_sub' => KriteriaSub::orderBy('kriteria_sub_id', 'asc')->get(),
    //     'kriteria' => Kriteria::all(),
    //     'judul' => 'Nilai Perbandingan Sub Kriteria',
    //     'pb' => Pb::all()
    // ]);
    // }

    public function search(Request $request)
    {
        $res = Kriteria::with('kriteria_sub')->where('kriteria_id', $request->kriteria_sub_id_1)->get();

        $kriteria_sub = KriteriaSub::orderBy('kriteria_sub_id', 'asc')->where('kriteria_id', $request->kriteria_sub_id_1)->get();
        $data =array();
        $row=0;
        foreach($kriteria_sub as $i) {
            $col=0;
            foreach($kriteria_sub as $j){
                // $data[$i][$j] = $kriteiria['kriteria_nama'][$j];
                $perbandingan = PbKriteriaSub::where('kriteria_sub_id_1', $i->kriteria_sub_id)->where('kriteria_sub_id_2', $j->kriteria_sub_id)
                    ->join('perbandingan_nilai', 'perbandingan_nilai.perbandingan_id', 'perbandingan_kriteria_sub.perbandingan_id')
                    ->select('perbandingan_nilai.perbandingan_nilai')
                    ->first();
                if (is_null($perbandingan)) {
                    $data[$row][$col] = '';
                } else {
                    $data[$row][$col] = $perbandingan->perbandingan_nilai;
                }
                $col++;
            }
            $row++;
        }
        return view('pb_kriteria_sub.index', [
            'kriteria' => Kriteria::all(),
            'search_res' => $res,
            'judul' => 'Nilai Perbandingan Sub Kriteria',
            'search' => true,
            'pb' => Pb::all(),
            'kriteria_sub' => KriteriaSub::where('kriteria_id', $request->kriteria_sub_id_1)->orderBy('kriteria_sub_id', 'asc')->get(),
            'data' => $data
        ]);
        // return $data;
    }

    public function store(Request $request)
    {
        // $pb_kriteria_sub = PbKriteriaSub::updateOrCreate(
        //     ['kriteria_sub_id_1'=>request('kriteria_sub_id_1'),
        //     'kriteria_sub_id_2'=>request('kriteria_sub_id_2')],
        //     ['perbandingan_id'=>request('perbandingan_id')]
        // );

        if((request('kriteria_sub_id_1'))==(request('kriteria_sub_id_2'))){
            $pb_kriteria_sub = PbKriteriaSub::updateOrCreate(
                ['kriteria_sub_id_1'=>request('kriteria_sub_id_1'),
                'kriteria_sub_id_2'=>request('kriteria_sub_id_2')],
                ['perbandingan_id'=>'9']
            );
        }
        else{
            if((request('perbandingan_id'))=='1'){
                $pb_kriteria_sub = PbKriteriaSub::updateOrCreate(
                    ['kriteria_sub_id_1'=>request('kriteria_sub_id_1'),
                    'kriteria_sub_id_2'=>request('kriteria_sub_id_2')],
                    ['perbandingan_id'=>request('perbandingan_id')]
                );

                $pb_kriteria_sub = PbKriteriaSub::updateOrCreate(
                    ['kriteria_sub_id_1'=>request('kriteria_sub_id_2'),
                    'kriteria_sub_id_2'=>request('kriteria_sub_id_1')],
                    ['perbandingan_id'=>'17']
                );
            }
            elseif((request('perbandingan_id'))=='2'){
                $pb_kriteria_sub = PbKriteriaSub::updateOrCreate(
                    ['kriteria_sub_id_1'=>request('kriteria_sub_id_1'),
                    'kriteria_sub_id_2'=>request('kriteria_sub_id_2')],
                    ['perbandingan_id'=>request('perbandingan_id')]
                );

                $pb_kriteria_sub = PbKriteriaSub::updateOrCreate(
                    ['kriteria_sub_id_1'=>request('kriteria_sub_id_2'),
                    'kriteria_sub_id_2'=>request('kriteria_sub_id_1')],
                    ['perbandingan_id'=>'16']
                );
            }
            elseif((request('perbandingan_id'))=='3'){
                $pb_kriteria_sub = PbKriteriaSub::updateOrCreate(
                    ['kriteria_sub_id_1'=>request('kriteria_sub_id_1'),
                    'kriteria_sub_id_2'=>request('kriteria_sub_id_2')],
                    ['perbandingan_id'=>request('perbandingan_id')]
                );

                $pb_kriteria_sub = PbKriteriaSub::updateOrCreate(
                    ['kriteria_sub_id_1'=>request('kriteria_sub_id_2'),
                    'kriteria_sub_id_2'=>request('kriteria_sub_id_1')],
                    ['perbandingan_id'=>'15']
                );
            }
            elseif((request('perbandingan_id'))=='4'){
                $pb_kriteria_sub = PbKriteriaSub::updateOrCreate(
                    ['kriteria_sub_id_1'=>request('kriteria_sub_id_1'),
                    'kriteria_sub_id_2'=>request('kriteria_sub_id_2')],
                    ['perbandingan_id'=>request('perbandingan_id')]
                );

                $pb_kriteria_sub = PbKriteriaSub::updateOrCreate(
                    ['kriteria_sub_id_1'=>request('kriteria_sub_id_2'),
                    'kriteria_sub_id_2'=>request('kriteria_sub_id_1')],
                    ['perbandingan_id'=>'14']
                );
            }
            elseif((request('perbandingan_id'))=='5'){
                $pb_kriteria_sub = PbKriteriaSub::updateOrCreate(
                    ['kriteria_sub_id_1'=>request('kriteria_sub_id_1'),
                    'kriteria_sub_id_2'=>request('kriteria_sub_id_2')],
                    ['perbandingan_id'=>request('perbandingan_id')]
                );

                $pb_kriteria_sub = PbKriteriaSub::updateOrCreate(
                    ['kriteria_sub_id_1'=>request('kriteria_sub_id_2'),
                    'kriteria_sub_id_2'=>request('kriteria_sub_id_1')],
                    ['perbandingan_id'=>'13']
                );
            }
            elseif((request('perbandingan_id'))=='6'){
                $pb_kriteria_sub = PbKriteriaSub::updateOrCreate(
                    ['kriteria_sub_id_1'=>request('kriteria_sub_id_1'),
                    'kriteria_sub_id_2'=>request('kriteria_sub_id_2')],
                    ['perbandingan_id'=>request('perbandingan_id')]
                );

                $pb_kriteria_sub = PbKriteriaSub::updateOrCreate(
                    ['kriteria_sub_id_1'=>request('kriteria_sub_id_2'),
                    'kriteria_sub_id_2'=>request('kriteria_sub_id_1')],
                    ['perbandingan_id'=>'12']
                );
            }
            elseif((request('perbandingan_id'))=='7'){
                $pb_kriteria_sub = PbKriteriaSub::updateOrCreate(
                    ['kriteria_sub_id_1'=>request('kriteria_sub_id_1'),
                    'kriteria_sub_id_2'=>request('kriteria_sub_id_2')],
                    ['perbandingan_id'=>request('perbandingan_id')]
                );

                $pb_kriteria_sub = PbKriteriaSub::updateOrCreate(
                    ['kriteria_sub_id_1'=>request('kriteria_sub_id_2'),
                    'kriteria_sub_id_2'=>request('kriteria_sub_id_1')],
                    ['perbandingan_id'=>'11']
                );
            }
            elseif((request('perbandingan_id'))=='8'){
                $pb_kriteria_sub = PbKriteriaSub::updateOrCreate(
                    ['kriteria_sub_id_1'=>request('kriteria_sub_id_1'),
                    'kriteria_sub_id_2'=>request('kriteria_sub_id_2')],
                    ['perbandingan_id'=>request('perbandingan_id')]
                );

                $pb_kriteria_sub = PbKriteriaSub::updateOrCreate(
                    ['kriteria_sub_id_1'=>request('kriteria_sub_id_2'),
                    'kriteria_sub_id_2'=>request('kriteria_sub_id_1')],
                    ['perbandingan_id'=>'10']
                );
            }
            elseif((request('perbandingan_id'))=='17'){
                $pb_kriteria_sub = PbKriteriaSub::updateOrCreate(
                    ['kriteria_sub_id_1'=>request('kriteria_sub_id_1'),
                    'kriteria_sub_id_2'=>request('kriteria_sub_id_2')],
                    ['perbandingan_id'=>request('perbandingan_id')]
                );

                $pb_kriteria_sub = PbKriteriaSub::updateOrCreate(
                    ['kriteria_sub_id_1'=>request('kriteria_sub_id_2'),
                    'kriteria_sub_id_2'=>request('kriteria_sub_id_1')],
                    ['perbandingan_id'=>'1']
                );
            }
            elseif((request('perbandingan_id'))=='16'){
                $pb_kriteria_sub = PbKriteriaSub::updateOrCreate(
                    ['kriteria_sub_id_1'=>request('kriteria_sub_id_1'),
                    'kriteria_sub_id_2'=>request('kriteria_sub_id_2')],
                    ['perbandingan_id'=>request('perbandingan_id')]
                );

                $pb_kriteria_sub = PbKriteriaSub::updateOrCreate(
                    ['kriteria_sub_id_1'=>request('kriteria_sub_id_2'),
                    'kriteria_sub_id_2'=>request('kriteria_sub_id_1')],
                    ['perbandingan_id'=>'2']
                );
            }
            elseif((request('perbandingan_id'))=='15'){
                $pb_kriteria_sub = PbKriteriaSub::updateOrCreate(
                    ['kriteria_sub_id_1'=>request('kriteria_sub_id_1'),
                    'kriteria_sub_id_2'=>request('kriteria_sub_id_2')],
                    ['perbandingan_id'=>request('perbandingan_id')]
                );

                $pb_kriteria_sub = PbKriteriaSub::updateOrCreate(
                    ['kriteria_sub_id_1'=>request('kriteria_sub_id_2'),
                    'kriteria_sub_id_2'=>request('kriteria_sub_id_1')],
                    ['perbandingan_id'=>'3']
                );
            }
            elseif((request('perbandingan_id'))=='14'){
                $pb_kriteria_sub = PbKriteriaSub::updateOrCreate(
                    ['kriteria_sub_id_1'=>request('kriteria_sub_id_1'),
                    'kriteria_sub_id_2'=>request('kriteria_sub_id_2')],
                    ['perbandingan_id'=>request('perbandingan_id')]
                );

                $pb_kriteria_sub = PbKriteriaSub::updateOrCreate(
                    ['kriteria_sub_id_1'=>request('kriteria_sub_id_2'),
                    'kriteria_sub_id_2'=>request('kriteria_sub_id_1')],
                    ['perbandingan_id'=>'4']
                );
            }
            elseif((request('perbandingan_id'))=='13'){
                $pb_kriteria_sub = PbKriteriaSub::updateOrCreate(
                    ['kriteria_sub_id_1'=>request('kriteria_sub_id_1'),
                    'kriteria_sub_id_2'=>request('kriteria_sub_id_2')],
                    ['perbandingan_id'=>request('perbandingan_id')]
                );

                $pb_kriteria_sub = PbKriteriaSub::updateOrCreate(
                    ['kriteria_sub_id_1'=>request('kriteria_sub_id_2'),
                    'kriteria_sub_id_2'=>request('kriteria_sub_id_1')],
                    ['perbandingan_id'=>'5']
                );
            }
            elseif((request('perbandingan_id'))=='12'){
                $pb_kriteria_sub = PbKriteriaSub::updateOrCreate(
                    ['kriteria_sub_id_1'=>request('kriteria_sub_id_1'),
                    'kriteria_sub_id_2'=>request('kriteria_sub_id_2')],
                    ['perbandingan_id'=>request('perbandingan_id')]
                );

                $pb_kriteria_sub = PbKriteriaSub::updateOrCreate(
                    ['kriteria_sub_id_1'=>request('kriteria_sub_id_2'),
                    'kriteria_sub_id_2'=>request('kriteria_sub_id_1')],
                    ['perbandingan_id'=>'6']
                );
            }
            elseif((request('perbandingan_id'))=='11'){
                $pb_kriteria_sub = PbKriteriaSub::updateOrCreate(
                    ['kriteria_sub_id_1'=>request('kriteria_sub_id_1'),
                    'kriteria_sub_id_2'=>request('kriteria_sub_id_2')],
                    ['perbandingan_id'=>request('perbandingan_id')]
                );

                $pb_kriteria_sub = PbKriteriaSub::updateOrCreate(
                    ['kriteria_sub_id_1'=>request('kriteria_sub_id_2'),
                    'kriteria_sub_id_2'=>request('kriteria_sub_id_1')],
                    ['perbandingan_id'=>'7']
                );
            }
            elseif((request('perbandingan_id'))=='10'){
                $pb_kriteria_sub = PbKriteriaSub::updateOrCreate(
                    ['kriteria_sub_id_1'=>request('kriteria_sub_id_1'),
                    'kriteria_sub_id_2'=>request('kriteria_sub_id_2')],
                    ['perbandingan_id'=>request('perbandingan_id')]
                );

                $pb_kriteria_sub = PbKriteriaSub::updateOrCreate(
                    ['kriteria_sub_id_1'=>request('kriteria_sub_id_2'),
                    'kriteria_sub_id_2'=>request('kriteria_sub_id_1')],
                    ['perbandingan_id'=>'8']
                );
            }
            else{
                $pb_kriteria_sub = PbKriteriaSub::updateOrCreate(
                    ['kriteria_sub_id_1'=>request('kriteria_sub_id_1'),
                    'kriteria_sub_id_2'=>request('kriteria_sub_id_2')],
                    ['perbandingan_id'=>request('perbandingan_id')]
                );

                $pb_kriteria_sub = PbKriteriaSub::updateOrCreate(
                    ['kriteria_sub_id_1'=>request('kriteria_sub_id_2'),
                    'kriteria_sub_id_2'=>request('kriteria_sub_id_1')],
                    ['perbandingan_id'=>request('perbandingan_id')]
                );
            }
        }
        //$pb_kriteria->save();
        return redirect()->back();
        return redirect()->route('pb_kriteria_sub.index');
    }

    public function edit($id)
    {
        return view('pb_kriteria_sub.edit', [
            'data' => PbKriteriaSub::findOrFail(Crypt::decrypt($id))
        ]);
    }

    public function update(Request $request, $id)
    {
        $pb_kriteria_sub = PbKriteriaSub::findOrFail(Crypt::decrypt($id));
        $pb_kriteria_sub->kriteria_sub_id = $request->kriteria_sub_id_1;
        $pb_kriteria_sub->kriteria_sub_id = $request->kriteria_sub_id_2;
        $pb_kriteria_sub->perbandingan_id = $request->perbandingan_id;
        $pb_kriteria_sub->save();

        return redirect()->route('pb_kriteria_sub.index');
    }

    public function destroy($id)
    {
        PbKriteriaSub::findOrFail(Crypt::decrypt($id))->delete();
        return redirect()->route('pb_kriteria_sub.index');

    }
}
