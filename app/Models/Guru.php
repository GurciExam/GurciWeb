<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    protected $table = 'Guru';

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function kelas()
    {
        return $this->hasMany(Kelas::class);
    }

    public function Mata_pelajaran()
    {
        return $this->hasMany(Mata_pelajaran::class);
    }

    public function Ujian()
    {
        return $this->hasMany(Ujian::class);
    }
}
