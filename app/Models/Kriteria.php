<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kriteria extends Model
{
    use HasFactory;

    protected $table = 'kriteria';

    public function subkriteria()
    {
        return $this->hasMany(Subkriteria::class);
    }

    public function nilaiBobot()
    {
        return $this->hasMany(NilaiBobot::class);
    }
}
