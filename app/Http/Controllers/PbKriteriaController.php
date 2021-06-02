<?php

namespace App\Http\Controllers;

use App\Models\PbKriteria;
use App\Models\Kriteria;
use App\Models\Pb;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class PbKriteriaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {


        $kriteria = Kriteria::orderBy('kriteria_id', 'asc')->get();
        $data =array();
        $row=0;
        foreach($kriteria as $i) {
            $col=0;
            foreach($kriteria as $j){
                // $data[$i][$j] = $kriteiria['kriteria_nama'][$j];
                $perbandingan = PbKriteria::where('kriteria_id_1', $i->kriteria_id)->where('kriteria_id_2', $j->kriteria_id)
                    ->join('perbandingan_nilai', 'perbandingan_nilai.perbandingan_id', 'perbandingan_kriteria.perbandingan_id')
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
        // return $data;
        return view('pb_kriteria.index', [
            'kriteria' => Kriteria::orderBy('kriteria_id', 'asc')->get(),
            'judul' => 'Nilai Perbandingan Kriteria',
            'pb' => Pb::all(),
            'data' => $data
        ]);

        // return $data;
        // $data['title'] = 'Bobot Kriteria';
        // $data['rel_kriteria'] = get_rel_kriteria();
        // $data['ahp'] = new AHP($data['rel_kriteria']);
        // $data['kriterias'] = get_kriteria();

        // foreach ($data['ahp']->prioritas as $key => $val) {
        //     $kriteria = Kriteria::find($key);
        //     $kriteria->bobot = $val;
        //     $kriteria->save();
        // }

    }

    // public function create()
    // {
    //     return view('pb_kriteria.create', [
    //         'kriteria' => Kriteria::all()
    //         ]);
    // }

    public function store(Request $request)
    {
        // $pb_kriteria = PbKriteria::firstOrCreate(
        //     //[$pb_kriteria->pb_kriteria_id = $request->pb_kriteria_id],
        //     [$pb_kriteria->kriteria_id = $request->kriteria_id_1],
        //     [$pb_kriteria->kriteria_id = $request->kriteria_id_2],
        //     [$pb_kriteria->perbandingan_id = $request->perbandingan_id]

        //
        // $pb_kriteria = new PbKriteria();
        // $pb_kriteria->kriteria_id_1 = $request->kriteria_id_1;
        // $pb_kriteria->kriteria_id_2 = $request->kriteria_id_2;
        // $pb_kriteria->perbandingan_id = $request->perbandingan_id;

        // //$pb_kriteria->nilai_pb_kriteria = $request->nilai_pb_kriteria;
        // $pb_kriteria->save();

        // $id = $request->id;
        // $data=array(
        //     $pb_kriteria->kriteria_id_1 = $request->kriteria_id_1,
        //     $pb_kriteria->kriteria_id_2 = $request->kriteria_id_2,
        //     $pb_kriteria->perbandingan_id = $request->perbandingan_id,
        // );
        // $result = DB::table('perbandingan_kriteria')-upsert($data,['id'],['kriteria_id_1', 'kriteria_id_2', 'perbandingan_id']);

        if((request('kriteria_id_1'))==(request('kriteria_id_2'))){
            $pb_kriteria = PbKriteria::updateOrCreate(
                ['kriteria_id_1'=>request('kriteria_id_1'),
                'kriteria_id_2'=>request('kriteria_id_2')],
                ['perbandingan_id'=>'9']
            );
        }
        else{
            if((request('perbandingan_id'))=='1'){
                $pb_kriteria = PbKriteria::updateOrCreate(
                    ['kriteria_id_1'=>request('kriteria_id_1'),
                    'kriteria_id_2'=>request('kriteria_id_2')],
                    ['perbandingan_id'=>request('perbandingan_id')]
                );

                $pb_kriteria = PbKriteria::updateOrCreate(
                    ['kriteria_id_1'=>request('kriteria_id_2'),
                    'kriteria_id_2'=>request('kriteria_id_1')],
                    ['perbandingan_id'=>'17']
                );
            }
            elseif((request('perbandingan_id'))=='2'){
                $pb_kriteria = PbKriteria::updateOrCreate(
                    ['kriteria_id_1'=>request('kriteria_id_1'),
                    'kriteria_id_2'=>request('kriteria_id_2')],
                    ['perbandingan_id'=>request('perbandingan_id')]
                );

                $pb_kriteria = PbKriteria::updateOrCreate(
                    ['kriteria_id_1'=>request('kriteria_id_2'),
                    'kriteria_id_2'=>request('kriteria_id_1')],
                    ['perbandingan_id'=>'16']
                );
            }
            elseif((request('perbandingan_id'))=='3'){
                $pb_kriteria = PbKriteria::updateOrCreate(
                    ['kriteria_id_1'=>request('kriteria_id_1'),
                    'kriteria_id_2'=>request('kriteria_id_2')],
                    ['perbandingan_id'=>request('perbandingan_id')]
                );

                $pb_kriteria = PbKriteria::updateOrCreate(
                    ['kriteria_id_1'=>request('kriteria_id_2'),
                    'kriteria_id_2'=>request('kriteria_id_1')],
                    ['perbandingan_id'=>'15']
                );
            }
            elseif((request('perbandingan_id'))=='4'){
                $pb_kriteria = PbKriteria::updateOrCreate(
                    ['kriteria_id_1'=>request('kriteria_id_1'),
                    'kriteria_id_2'=>request('kriteria_id_2')],
                    ['perbandingan_id'=>request('perbandingan_id')]
                );

                $pb_kriteria = PbKriteria::updateOrCreate(
                    ['kriteria_id_1'=>request('kriteria_id_2'),
                    'kriteria_id_2'=>request('kriteria_id_1')],
                    ['perbandingan_id'=>'14']
                );
            }
            elseif((request('perbandingan_id'))=='5'){
                $pb_kriteria = PbKriteria::updateOrCreate(
                    ['kriteria_id_1'=>request('kriteria_id_1'),
                    'kriteria_id_2'=>request('kriteria_id_2')],
                    ['perbandingan_id'=>request('perbandingan_id')]
                );

                $pb_kriteria = PbKriteria::updateOrCreate(
                    ['kriteria_id_1'=>request('kriteria_id_2'),
                    'kriteria_id_2'=>request('kriteria_id_1')],
                    ['perbandingan_id'=>'13']
                );
            }
            elseif((request('perbandingan_id'))=='6'){
                $pb_kriteria = PbKriteria::updateOrCreate(
                    ['kriteria_id_1'=>request('kriteria_id_1'),
                    'kriteria_id_2'=>request('kriteria_id_2')],
                    ['perbandingan_id'=>request('perbandingan_id')]
                );

                $pb_kriteria = PbKriteria::updateOrCreate(
                    ['kriteria_id_1'=>request('kriteria_id_2'),
                    'kriteria_id_2'=>request('kriteria_id_1')],
                    ['perbandingan_id'=>'12']
                );
            }
            elseif((request('perbandingan_id'))=='7'){
                $pb_kriteria = PbKriteria::updateOrCreate(
                    ['kriteria_id_1'=>request('kriteria_id_1'),
                    'kriteria_id_2'=>request('kriteria_id_2')],
                    ['perbandingan_id'=>request('perbandingan_id')]
                );

                $pb_kriteria = PbKriteria::updateOrCreate(
                    ['kriteria_id_1'=>request('kriteria_id_2'),
                    'kriteria_id_2'=>request('kriteria_id_1')],
                    ['perbandingan_id'=>'11']
                );
            }
            elseif((request('perbandingan_id'))=='8'){
                $pb_kriteria = PbKriteria::updateOrCreate(
                    ['kriteria_id_1'=>request('kriteria_id_1'),
                    'kriteria_id_2'=>request('kriteria_id_2')],
                    ['perbandingan_id'=>request('perbandingan_id')]
                );

                $pb_kriteria = PbKriteria::updateOrCreate(
                    ['kriteria_id_1'=>request('kriteria_id_2'),
                    'kriteria_id_2'=>request('kriteria_id_1')],
                    ['perbandingan_id'=>'10']
                );
            }
            elseif((request('perbandingan_id'))=='17'){
                $pb_kriteria = PbKriteria::updateOrCreate(
                    ['kriteria_id_1'=>request('kriteria_id_1'),
                    'kriteria_id_2'=>request('kriteria_id_2')],
                    ['perbandingan_id'=>request('perbandingan_id')]
                );

                $pb_kriteria = PbKriteria::updateOrCreate(
                    ['kriteria_id_1'=>request('kriteria_id_2'),
                    'kriteria_id_2'=>request('kriteria_id_1')],
                    ['perbandingan_id'=>'1']
                );
            }
            elseif((request('perbandingan_id'))=='16'){
                $pb_kriteria = PbKriteria::updateOrCreate(
                    ['kriteria_id_1'=>request('kriteria_id_1'),
                    'kriteria_id_2'=>request('kriteria_id_2')],
                    ['perbandingan_id'=>request('perbandingan_id')]
                );

                $pb_kriteria = PbKriteria::updateOrCreate(
                    ['kriteria_id_1'=>request('kriteria_id_2'),
                    'kriteria_id_2'=>request('kriteria_id_1')],
                    ['perbandingan_id'=>'2']
                );
            }
            elseif((request('perbandingan_id'))=='15'){
                $pb_kriteria = PbKriteria::updateOrCreate(
                    ['kriteria_id_1'=>request('kriteria_id_1'),
                    'kriteria_id_2'=>request('kriteria_id_2')],
                    ['perbandingan_id'=>request('perbandingan_id')]
                );

                $pb_kriteria = PbKriteria::updateOrCreate(
                    ['kriteria_id_1'=>request('kriteria_id_2'),
                    'kriteria_id_2'=>request('kriteria_id_1')],
                    ['perbandingan_id'=>'3']
                );
            }
            elseif((request('perbandingan_id'))=='14'){
                $pb_kriteria = PbKriteria::updateOrCreate(
                    ['kriteria_id_1'=>request('kriteria_id_1'),
                    'kriteria_id_2'=>request('kriteria_id_2')],
                    ['perbandingan_id'=>request('perbandingan_id')]
                );

                $pb_kriteria = PbKriteria::updateOrCreate(
                    ['kriteria_id_1'=>request('kriteria_id_2'),
                    'kriteria_id_2'=>request('kriteria_id_1')],
                    ['perbandingan_id'=>'4']
                );
            }
            elseif((request('perbandingan_id'))=='13'){
                $pb_kriteria = PbKriteria::updateOrCreate(
                    ['kriteria_id_1'=>request('kriteria_id_1'),
                    'kriteria_id_2'=>request('kriteria_id_2')],
                    ['perbandingan_id'=>request('perbandingan_id')]
                );

                $pb_kriteria = PbKriteria::updateOrCreate(
                    ['kriteria_id_1'=>request('kriteria_id_2'),
                    'kriteria_id_2'=>request('kriteria_id_1')],
                    ['perbandingan_id'=>'5']
                );
            }
            elseif((request('perbandingan_id'))=='12'){
                $pb_kriteria = PbKriteria::updateOrCreate(
                    ['kriteria_id_1'=>request('kriteria_id_1'),
                    'kriteria_id_2'=>request('kriteria_id_2')],
                    ['perbandingan_id'=>request('perbandingan_id')]
                );

                $pb_kriteria = PbKriteria::updateOrCreate(
                    ['kriteria_id_1'=>request('kriteria_id_2'),
                    'kriteria_id_2'=>request('kriteria_id_1')],
                    ['perbandingan_id'=>'6']
                );
            }
            elseif((request('perbandingan_id'))=='11'){
                $pb_kriteria = PbKriteria::updateOrCreate(
                    ['kriteria_id_1'=>request('kriteria_id_1'),
                    'kriteria_id_2'=>request('kriteria_id_2')],
                    ['perbandingan_id'=>request('perbandingan_id')]
                );

                $pb_kriteria = PbKriteria::updateOrCreate(
                    ['kriteria_id_1'=>request('kriteria_id_2'),
                    'kriteria_id_2'=>request('kriteria_id_1')],
                    ['perbandingan_id'=>'7']
                );
            }
            elseif((request('perbandingan_id'))=='10'){
                $pb_kriteria = PbKriteria::updateOrCreate(
                    ['kriteria_id_1'=>request('kriteria_id_1'),
                    'kriteria_id_2'=>request('kriteria_id_2')],
                    ['perbandingan_id'=>request('perbandingan_id')]
                );

                $pb_kriteria = PbKriteria::updateOrCreate(
                    ['kriteria_id_1'=>request('kriteria_id_2'),
                    'kriteria_id_2'=>request('kriteria_id_1')],
                    ['perbandingan_id'=>'8']
                );
            }
            else{
                $pb_kriteria = PbKriteria::updateOrCreate(
                    ['kriteria_id_1'=>request('kriteria_id_1'),
                    'kriteria_id_2'=>request('kriteria_id_2')],
                    ['perbandingan_id'=>request('perbandingan_id')]
                );

                $pb_kriteria = PbKriteria::updateOrCreate(
                    ['kriteria_id_1'=>request('kriteria_id_2'),
                    'kriteria_id_2'=>request('kriteria_id_1')],
                    ['perbandingan_id'=>request('perbandingan_id')]
                );
            }
        }

        // $pb_kriteria = PbKriteria::updateOrCreate(
        //     ['kriteria_id_1'=>request('kriteria_id_1'),
        //     'kriteria_id_2'=>request('kriteria_id_2')],
        //     ['perbandingan_id'=>request('perbandingan_id')]
        // );

        //$pb_kriteria->save();
        return redirect()->route('pb_kriteria.index');
    }

    // public function edit($id)
    // {
    //     return view('pb_kriteria.edit', [
    //         'data' => PbKriteria::findOrFail(Crypt::decrypt($id))
    //     ]);
    // }

    // public function update(Request $request, $id_kriteria1, $id_kriteria2)
    // {
    //     $pb_kriteria = PbKriteria::findOrFail(Crypt::decrypt($id));
    //     $pb_kriteria->kriteria_id = $request->kriteria_id_1;
    //     $pb_kriteria->kriteria_id = $request->kriteria_id_2;
    //     $pb_kriteria->perbandingan_id = $request->perbandingan_id;
    //     //$pb_kriteria->nilai_pb_kriteria = $request->nilai_pb_kriteria;
    //     $pb_kriteria->save();

    //     return redirect()->route('pb_kriteria.index');
    // }

    // public function destroy($id)
    // {
    //     PbKriteria::findOrFail(Crypt::decrypt($id))->delete();
    //     return redirect()->route('pb_kriteria.index');

    // }
}
