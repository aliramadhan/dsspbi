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
}
