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
}
