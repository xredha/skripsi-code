<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subkriteria extends Model
{
    use HasFactory;

    protected $table = 'subkriteria';

    protected $fillable = ['range', 'nilai', 'id_kriteria'];

    public function kriteria()
    {
        return $this->belongsTo(Kriteria::class);
    }
}
