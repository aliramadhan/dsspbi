<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PbKriteriaSub extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'perbandingan_kriteria_sub';
    protected $primaryKey = 'perbandingan_kriteria_sub_id';
    protected $guarded = [];

    public function subkriteria_1()
    {
        return $this->belongsTo(Kriteria::class, 'kriteria_sub_id_1', 'kriteria_sub_id');
    }

    public function subkriteria_2()
    {
        return $this->belongsTo(Kriteria::class, 'kriteria_sub_id_2', 'kriteria_sub_id');
    }
    public function nilai()
    {
        return $this->hasOne(Pb::class, 'perbandingan_id', 'perbandingan_id');
    }
}
