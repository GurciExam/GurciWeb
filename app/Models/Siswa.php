<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'Siswa';

    protected $casts = [
        'tanggalLahir'  => 'date:Y-m-d',
    ];
}
