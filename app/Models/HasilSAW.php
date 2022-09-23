<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HasilSAW extends Model
{
    use HasFactory;

    protected $table = 'hasil_saw';

    public function alternatif()
    {
        return $this->belongsTo(Alternatif::class);
    }
}
