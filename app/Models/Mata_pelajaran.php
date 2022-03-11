<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mata_pelajaran extends Model
{
    protected $table = 'Mata_pelajaran';

    public function guru()
    {
        return $this->hasMany(Guru::class);
    }

    public function Murid_kelas()
    {
        return $this->hasMany(Murid_kelas::class);
    }
}
