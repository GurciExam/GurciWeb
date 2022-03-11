<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jawaban_ujian extends Model
{
    protected $table = 'Jawaban_ujian';

    public function Siswa()
    {
        return $this->belongsTo(Siswa::class);
    }

    public function Ujian()
    {
        return $this->belongsTo(Ujian::class);
    }
}
