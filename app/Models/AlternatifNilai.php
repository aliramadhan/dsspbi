<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\KriteriaSub;
use App\Models\Alternatif;


class AlternatifNilai extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'alternatif_nilai';
    protected $primaryKey = 'alternatif_nilai_id';
    protected $fillable = [
    	'alternatif_nilai_id',
    	'alternatif_id',
    	'kriteria_sub_id',
    	'alternatif_nilai'  
    ];
    public function sub_kriteria()
    {
        return $this->hasOne(KriteriaSub::class, 'kriteria_sub_id', 'kriteria_sub_id');
    }
}
