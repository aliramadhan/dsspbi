<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pb extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'perbandingan_nilai';
    protected $primaryKey = 'perbandingan_id';
}
