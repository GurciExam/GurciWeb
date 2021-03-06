<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $table = 'Kelas';

    public function Guru()
    {
        return $this->belongsTo(Guru::class);
    }

    public function Murid_kelas()
    {
        return $this->hasMany(Murid_kelas::class);
    }
}
