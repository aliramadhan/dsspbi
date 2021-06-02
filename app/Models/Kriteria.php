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
        return $this->hasMany(KriteriaSub::class, 'kriteria_id', 'kriteria_id');
    }
}
