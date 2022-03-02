<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $table = 'Kelas';

    public function guru()
    {
        return $this->belongsTo(Guru::class);
    }
}
