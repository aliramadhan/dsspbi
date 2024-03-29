<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kriteria extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'kriteria';
    protected $primaryKey = 'kriteria_id';

    public function kriteria_sub()
    {
        return $this->hasMany(KriteriaSub::class, 'kriteria_id', 'kriteria_id')->orderBy('kriteria_sub_id');
    }
    public function perbandingan_kriteria()
    {
        return $this->hasMany(PbKriteria::class, 'kriteria_id_1', 'kriteria_id')->orderBy('kriteria_id_2');
    }
    public function kriteria_banding()
    {
        return $this->hasMany(PbKriteria::class, 'kriteria_id_2', 'kriteria_id')->orderBy('kriteria_id_1');
    }
}
