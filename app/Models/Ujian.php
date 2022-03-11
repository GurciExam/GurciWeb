<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ujian extends Model
{
    protected $table = 'Ujian';

    public function Guru()
    {
        return $this->belongsTo(Guru::class);
    }
    
    public function Kelas()
    {
        return $this->belongsTo(Kelas::class);
    }
}
