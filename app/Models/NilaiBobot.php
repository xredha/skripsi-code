<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NilaiBobot extends Model
{
    use HasFactory;

    protected $table = 'nilai_bobot';

    public function kriteria()
    {
        return $this->belongsTo(Kriteria::class);
    }

    public function alternatif()
    {
        return $this->belongsTo(Alternatif::class);
    }
}
