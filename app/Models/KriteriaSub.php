<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kriteria;

class KriteriaSub extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'kriteria_sub';
    protected $primaryKey = 'kriteria_sub_id';

    // $kriteria_sub = kriteria::find('id_kriteria')->kriteria_sub;

    // foreach $kriteria_sub as $item
    // {
    //     $item = kriteria::find('id_kriteria')->kriteria()
    //                             ->where('id_kriteria','1')
    //                             ->first();
    // }

}