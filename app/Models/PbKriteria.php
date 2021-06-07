<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PbKriteria extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'perbandingan_kriteria';
    protected $primaryKey = 'perbandingan_kriteria_id';
    protected $guarded = [];

    public function kriteria_1()
    {
        return $this->belongsTo(Kriteria::class, 'kriteria_id_1', 'kriteria_id');
    }

    public function kriteria_2()
    {
        return $this->belongsTo(Kriteria::class, 'kriteria_id_2', 'kriteria_id');
    }
    public function nilai()
    {
        return $this->hasOne(Pb::class, 'perbandingan_id', 'perbandingan_id');
    }
}
