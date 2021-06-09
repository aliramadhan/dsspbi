<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alternatif extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'alternatif';
    protected $primaryKey = 'alternatif_id';

    public function alternatif_nilai()
    {
        return $this->hasMany(KriteriaSub::class, 'alternatif_id', 'alternatif_id');
    }
    public function nilai_sub_kriteria()
    {
        return $this->hasMany(AlternatifNilai::class, 'alternatif_id', 'alternatif_id')->orderBy('kriteria_sub_id');
    }
}
