<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HasilWP extends Model
{
    use HasFactory;

    protected $table = 'hasil_wp';

    public function alternatif()
    {
        return $this->belongsTo(Alternatif::class);
    }
}
