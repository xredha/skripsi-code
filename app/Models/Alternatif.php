<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alternatif extends Model
{
    use HasFactory;

    protected $table = 'alternatif';

    public function nilaiBobot()
    {
        return $this->hasMany(NilaiBobot::class);
    }

    public function hasilSAW()
    {
        return $this->hasMany(HasilSAW::class);
    }

    public function hasilWP()
    {
        return $this->hasMany(HasilWP::class);
    }
}
