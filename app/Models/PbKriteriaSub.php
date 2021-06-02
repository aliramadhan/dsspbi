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
}
